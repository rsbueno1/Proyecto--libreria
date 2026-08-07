<?php
// Sustituye los valores entre comillas con los datos reales de tu panel de InfinityFree
$host = "sql312.infinityfree.com";     // NO uses "localhost". Usa el host que empieza con sql...
$dbname = "if0_42597179_libreria";     // Nombre completo de la base de datos creada
$user = "if0_42597179";              // Tu usuario MySQL de InfinityFree
$pass = "gnXwloi9MxdHE1";     // Contraseña de tu cuenta de InfinityFree

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}
?>
