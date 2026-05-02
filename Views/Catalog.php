<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotten Tangerines - Catálogo</title>
    <!-- Enlace al CSS personalizado -->
    <link rel="stylesheet" href="Views/CSS/Catalog.css">
    <!-- Iconos opcionales (FontAwesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header class="main-header">
    <div class="container header-content">
        <h1 class="logo">Rotten <span>Tangerines</span></h1>
        <a href="index.php?action=createMovie" class="btn-add">
            <i class="fas fa-plus"></i> Añadir Película
        </a>
    </div>
</header>

<main class="container">
    <section class="movie-grid">
        <?php if (!empty($movies)): ?>
            <?php foreach ($movies as $movie): ?>
                <article class="movie-card">
                    <div class="poster-container">
                        <img src="<?= $movie->getPosterUrl() ?? 'https://via.placeholder.com/300x450?text=No+Poster' ?>" 
                             alt="<?= htmlspecialchars($movie->getTitle()) ?>" 
                             class="poster-img">
                        <div class="movie-overlay">
                            <a href="index.php?action=ver&id=<?= $movie->getId() ?>" class="btn-view">Ver Detalles</a>
                        </div>
                    </div>
                    
                    <div class="movie-info">
                        <h2 class="movie-title"><?= htmlspecialchars($movie->getTitle()) ?></h2>
                        <div class="movie-meta">
                            <span><?= htmlspecialchars($movie->getGenre()) ?></span>
                            <span class="separator">•</span>
                            <span><?= $movie->getFormattedRuntime() ?></span>
                        </div>
                        <p class="movie-synopsis">
                            <?= htmlspecialchars($movie->getSynopsis()) ?>
                        </p>
                    </div>

                    <div class="movie-actions">
                        <a href="index.php?action=editMovie&id=<?= $movie->getId() ?>" class="action-btn edit" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?action=deleteMovie&id=<?= $movie->getId() ?>" 
                           class="action-btn delete" 
                           onclick="return confirm('¿Seguro?')" title="Borrar">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <p>No se encontraron películas en la base de datos.</p>
            </div>
        <?php endif; ?>
    </section>
</main>

</body>
</html>