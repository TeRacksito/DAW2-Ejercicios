<?php

$gf_exp = array_fill(0, 512, 0);
$gf_log = array_fill(0, 256, 0);
$field_charac = pow(2, 8) - 1;

function init_tables($prim = 0x11d, $generator = 2, $c_exp = 8) {
    global $gf_exp, $gf_log, $field_charac;
    $field_charac = pow(2, $c_exp) - 1;
    $gf_exp = array_fill(0, $field_charac * 2, 0);
    $gf_log = array_fill(0, $field_charac + 1, 0);

    $x = 1;
    for ($i = 0; $i < $field_charac; $i++) {
        $gf_exp[$i] = $x;
        $gf_log[$x] = $i;
        $x = gf_mult_noLUT($x, $generator, $prim, $field_charac + 1);
    }

    for ($i = $field_charac; $i < $field_charac * 2; $i++) {
        $gf_exp[$i] = $gf_exp[$i - $field_charac];
    }

    return array($gf_log, $gf_exp);
}

function gf_mul($x, $y) {
    global $gf_exp, $gf_log, $field_charac;
    if ($x == 0 || $y == 0) {
        return 0;
    }
    return $gf_exp[($gf_log[$x] + $gf_log[$y]) % $field_charac];
}

function gf_pow($x, $power) {
    global $gf_exp, $gf_log, $field_charac;
    return $gf_exp[($gf_log[$x] * $power) % $field_charac];
}

function gf_mult_noLUT($x, $y, $prim = 0, $field_charac_full = 256, $carryless = true) {
    $r = 0;
    while ($y) {
        if ($y & 1) {
            $r = $carryless ? ($r ^ $x) : ($r + $x);
        }
        $y = $y >> 1;
        $x = $x << 1;
        if ($prim > 0 && $x & $field_charac_full) {
            $x = $x ^ $prim;
        }
    }
    return $r;
}

function gf_poly_mul($p, $q) {
    global $gf_exp, $gf_log;
    $r = array_fill(0, count($p) + count($q) - 1, 0);
    $lp = array_map(function($item) {
        global $gf_log;
        return $gf_log[$item];
    }, $p);

    for ($j = 0; $j < count($q); $j++) {
        $qj = $q[$j];
        if ($qj != 0) {
            $lq = $gf_log[$qj];
            for ($i = 0; $i < count($p); $i++) {
                if ($p[$i] != 0) {
                    $r[$i + $j] ^= $gf_exp[$lp[$i] + $lq];
                }
            }
        }
    }
    return $r;
}

function rs_generator_poly($nsym, $fcr = 0, $generator = 2) {
    $g = array(1);
    for ($i = 0; $i < $nsym; $i++) {
        $g = gf_poly_mul($g, array(1, gf_pow($generator, $i + $fcr)));
    }
    return $g;
}

function rs_encode_msg($msg_in, $nsym, $fcr = 0, $generator = 2, $gen = null) {
    global $field_charac;
    if (count($msg_in) + $nsym > $field_charac) {
        throw new Exception("Message is too long (" . (count($msg_in) + $nsym) . " when max is " . $field_charac . ")");
    }
    if (is_null($gen)) {
        $gen = rs_generator_poly($nsym, $fcr, $generator);
    }
    $msg_out = array_fill(0, count($msg_in) + count($gen) - 1, 0);
    array_splice($msg_out, 0, count($msg_in), $msg_in);

    for ($i = 0; $i < count($msg_in); $i++) {
        $coef = $msg_out[$i];

        if ($coef != 0) {
            for ($j = 1; $j < count($gen); $j++) {
                $msg_out[$i + $j] ^= gf_mul($gen[$j], $coef);
            }
        }
    }

    array_splice($msg_out, 0, count($msg_in), $msg_in);

    return $msg_out;
}