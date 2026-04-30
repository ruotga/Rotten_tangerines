<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotten Tangerines - Lista de Películas</title>
    <!-- Bootstrap 5 para un diseño rápido y limpio -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .movie-card { transition: transform 0.2s; }
        .movie-card:hover { transform: scale(1.02); }
        .poster-img { height: 400px; object-fit: cover; }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5">Catálogo de Películas</h1>
        <a href="index.php?action=crear" class="btn btn-primary">+ Añadir Película</a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if (!empty($movies)): ?>
            <?php foreach ($movies as $movie): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm movie-card">
                        <!-- Poster -->
                        <img src="<?= $movie->getPosterUrl() ?? 'https://via.placeholder.com/300x450?text=No+Poster' ?>" 
                             class="card-img-top poster-img" 
                             alt="<?= htmlspecialchars($movie->getTitle()) ?>">
                        
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($movie->getTitle()) ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted small">
                                <?= htmlspecialchars($movie->getGenre()) ?> | 
                                <?= $movie->getFormattedRuntime() ?>
                            </h6>
                            <p class="card-text text-truncate" style="max-height: 60px;">
                                <?= htmlspecialchars($movie->getSynopsis()) ?>
                            </p>
                        </div>

                        <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between">
                            <a href="index.php?action=ver&id=<?= $movie->getId() ?>" class="btn btn-outline-info btn-sm">Ver detalles</a>
                            <div>
                                <a href="index.php?action=editar&id=<?= $movie->getId() ?>" class="btn btn-light btn-sm text-warning">✏️</a>
                                <a href="index.php?action=borrar&id=<?= $movie->getId() ?>" class="btn btn-light btn-sm text-danger" onclick="return confirm('¿Seguro?')">🗑️</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No se encontraron películas en la base de datos.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>