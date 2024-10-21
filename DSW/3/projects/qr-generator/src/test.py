gf_exp = [0] * 512
gf_log = [0] * 256
field_charac = int(2**8 - 1)


def init_tables(prim=0x11d, generator=2, c_exp=8):
    global gf_exp, gf_log, field_charac
    field_charac = int(2**c_exp - 1)
    gf_exp = [0] * (field_charac * 2)
    gf_log = [0] * (field_charac+1)

    x = 1
    for i in range(field_charac):
        gf_exp[i] = x
        gf_log[x] = i
        x = gf_mult_noLUT(x, generator, prim, field_charac+1)

    for i in range(field_charac, field_charac * 2):
        gf_exp[i] = gf_exp[i - field_charac]

    return [gf_log, gf_exp]


def gf_mul(x, y):
    if x == 0 or y == 0:
        return 0
    return gf_exp[(gf_log[x] + gf_log[y]) % field_charac]


def gf_pow(x, power):
    return gf_exp[(gf_log[x] * power) % field_charac]


def gf_mult_noLUT(x, y, prim=0, field_charac_full=256, carryless=True):
    r = 0
    while y:
        if y & 1:
            r = r ^ x if carryless else r + x
        y = y >> 1
        x = x << 1
        if prim > 0 and x & field_charac_full:
            x = x ^ prim

    return r


def gf_poly_mul(p, q):
    r = [0] * (len(p) + len(q) - 1)
    lp = [gf_log[p[i]] for i in range(len(p))]
    for j in range(len(q)):
        qj = q[j]
        if qj != 0:
            lq = gf_log[qj]
            for i in range(len(p)):
                if p[i] != 0:
                    r[i + j] ^= gf_exp[lp[i] + lq]
    return r


def rs_generator_poly(nsym, fcr=0, generator=2):
    g = [1]
    for i in range(nsym):
        g = gf_poly_mul(g, [1, gf_pow(generator, i+fcr)])
    return g


def rs_encode_msg(msg_in, nsym, fcr=0, generator=2, gen=None):
    global field_charac
    if (len(msg_in) + nsym) > field_charac:
        raise ValueError("Message is too long (%i when max is %i)" %
                         (len(msg_in)+nsym, field_charac))
    if gen is None:
        gen = rs_generator_poly(nsym, fcr, generator)
    msg_out = [0] * (len(msg_in) + len(gen)-1)
    msg_out[:len(msg_in)] = msg_in

    for i in range(len(msg_in)):
        coef = msg_out[i]

        if coef != 0:
            for j in range(1, len(gen)):
                msg_out[i+j] ^= gf_mul(gen[j], coef)

    msg_out[:len(msg_in)] = msg_in

    return msg_out


init_tables()

msg_in = [0b01000001, 0b00010100, 0b10000110, 0b01010110, 0b11000110, 0b11000110, 0b11110010, 0b11000010, 0b00000111,
          0b01110110, 0b11110111, 0b00100110, 0b11000110, 0b01000010, 0b00010010, 0b00000011, 0b00010011, 0b00100011, 0b00110000]
print(rs_encode_msg(msg_in, 7)[-7:])
