<?php

// Configurări pentru baza de date
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'flowershop');

// Conectare la baza de date
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificare conexiune
if (!$conn) {
    die("Conexiunea la baza de date a esuat: " . mysqli_connect_error());
}
