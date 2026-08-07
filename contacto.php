<?php
require_once 'conexion.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre     = trim($_POST['nombre']);
    $correo     = trim($_POST['correo']);
    $asunto     = trim($_POST['asunto']);
    $comentario = trim($_POST['comentario']);

    if (!empty($nombre) && !empty($correo) && !empty($asunto) && !empty($comentario)) {
        $sql = "INSERT INTO contacto (nombre, correo, asunto, comentario) VALUES (:nombre, :correo, :asunto, :comentario)";
        $stmt = $pdo->prepare($sql);
        
        $exito = $stmt->execute([
            ':nombre'     => $nombre,
            ':correo'     => $correo,
            ':asunto'     => $asunto,
            ':comentario' => $comentario
        ]);

        if ($exito) {
            $mensaje = '<div class="alert alert-success">¡Gracias por tu mensaje! Ha sido guardado correctamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">Ocurrió un error al guardar la información.</div>';
        }
    } else {
        $mensaje = '<div class="alert alert-warning">Por favor completa todos los campos requeridos.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería Online - Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Librería Online</a>
    <div class="navbar-nav">
      <a class="nav-link" href="libros.php">Libros</a>
      <a class="nav-link" href="autores.php">Autores</a>
      <a class="nav-link active" href="contacto.php">Contacto</a>
    </div>
  </div>
</nav>

<div class="container" style="max-width: 600px;">
    <h1 class="mb-4">Formulario de Contacto</h1>
    
    <?php echo $mensaje; ?>

    <form action="contacto.php" method="POST" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="mb-3">
            <label for="asunto" class="form-label">Asunto</label>
            <input type="text" class="form-control" id="asunto" name="asunto" required>
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Enviar Mensaje</button>
    </form>
</div>

</body>
</html>