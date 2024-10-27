<?php
$host = 'sql203.infinityfree.com';
$dbname = 'if0_37343909_invitados';  // Cambia esto por el nombre de tu base de datos
$username = 'if0_37343909';            // O el usuario que uses para acceder a phpMyAdmin
$password = 'gHJBq634lSN3tq5';                // Deja esto vacío si no has establecido una contraseña

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error en la conexión: ' . $e->getMessage();
    exit;
}
?>