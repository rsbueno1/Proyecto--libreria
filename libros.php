<?php
// Incluir el archivo de conexión que ya probamos en el paso anterior
require_once 'conexion.php';

try {
    // Consulta PDO para obtener todos los registros de la tabla libros
    $stmt = $pdo->query("SELECT * FROM libros");
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Uso de la función count() requerida por el proyecto
    $totalLibros = count($libros);
} catch (PDOException $e) {
    die("Error al consultar la base de datos: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Online - Libros</title>
    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Barra de navegación en español -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="libros.php">Librería Online</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="libros.php">Libros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="autores.php">Autores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Catálogo de Libros</h1>
        <span class="badge bg-primary fs-6">
            Total de libros: <?php echo $totalLibros; ?>
        </span>
    </div>

    <div class="row">
        <?php if ($totalLibros > 0): ?>
            <!-- Bucle foreach para iterar sobre la lista de libros -->
            <?php foreach ($libros as $libro): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">
                                <?php echo htmlspecialchars($libro['titulo'] ?? $libro['nombre'] ?? 'Título no disponible'); ?>
                            </h5>
                            <p class="card-text text-secondary flex-grow-1">
                                <?php echo htmlspecialchars($libro['descripcion'] ?? 'Sin descripción disponible.'); ?>
                            </p>
                            <div class="mt-auto pt-3 border-top">
                                <strong class="fs-5 text-success">
                                    $<?php echo htmlspecialchars($libro['precio'] ?? '0.00'); ?>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    No hay libros disponibles en este momento.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>