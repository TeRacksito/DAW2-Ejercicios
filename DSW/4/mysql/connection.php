<?php

@$link = new mysqli("localhost", "shopuser", "2345", "shop");
$error = $link->connect_errno;

if ($error) {
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $error . "\n";
    echo "Error: " . $link->connect_error . "\n";
    exit;
}


