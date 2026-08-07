<?php
require_once 'conexion.php';

$stmt = $pdo->query("SELECT * FROM autores");
$autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Librería Online - Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Librería Online</a>
    <div class="navbar-nav">
      <a class="nav-link" href="libros.php">Libros</a>
      <a class="nav-link active" href="autores.php">Autores</a>
      <a class="nav-link" href="contacto.php">Contacto</a>
    </div>
  </div>
</nav>

<div class="container">
    <h1 class="mb-4">Nuestros Autores</h1>
    <ul class="list-group shadow-sm">
        <?php foreach ($autores as $autor): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><strong><?php echo htmlspecialchars($autor['nombre'] . ' ' . ($autor['apellido'] ?? '')); ?></strong></span>
                <span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($autor['nacionalidad'] ?? 'Autor'); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>