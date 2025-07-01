<?php
// Pornim o sesiune
session_start();
//echo $_SESSION['user_id'];
// Verificăm dacă utilizatorul este autentificat
if (!isset($_SESSION['user_id'])) {
    // Redirecționăm către pagina de autentificare
    header('Location: login.php');
    exit;
}
?>