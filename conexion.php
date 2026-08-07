<?php
// Configuración de parámetros de la base de datos local
$host     = 'localhost';
$dbname   = 'libreria'; // Nombre de la base de datos que importaste
$username = 'root';     // Usuario por defecto en XAMPP/WAMP
$password = '';         // Contraseña por defecto (en XAMPP suele ir vacía)

try {
    // Creación de la instancia PDO con codificación UTF-8
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configurar PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Descomenta la siguiente línea solo si quieres verificar visualmente la conexión:
    // echo "¡Conexión exitosa a la base de datos!";
} catch (PDOException $e) {
    // Si hay error en la conexión, detiene la ejecución y muestra el mensaje
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}
?>