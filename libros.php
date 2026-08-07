<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'conexion.php';

try {
    $stmt = $pdo->query("SELECT * FROM titulos");
    $libros = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería - Listado de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="libros.php">Librería Online</a>
            <div class="navbar-nav">
                <a class="nav-link active" href="libros.php">Libros</a>
                <a class="nav-link" href="autores.php">Autores</a>
                <a class="nav-link" href="contacto.php">Contacto</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Catálogo de Libros (Total: <?= count($libros) ?>)</h1>
        <div class="row">
            <?php if (!empty($libros)): ?>
                <?php foreach ($libros as $libro): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= htmlspecialchars($libro['titulo'] ?? $libro['titulo_id'] ?? 'Libro sin título') ?>
                                </h5>
                                <p class="card-text text-muted">
                                    <strong>Tipo:</strong> <?= htmlspecialchars($libro['tipo'] ?? 'General') ?><br>
                                    <strong>Precio:</strong> $<?= htmlspecialchars($libro['precio'] ?? '0.00') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning">No se encontraron libros en la base de datos.</div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
