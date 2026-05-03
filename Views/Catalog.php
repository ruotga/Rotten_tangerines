<?php
$cookie_name = "theme_user_" . $_SESSION['username'];
$user_theme = $_COOKIE[$cookie_name] ?? 'dark';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotten Tangerines - Catálogo</title>
    <link rel="stylesheet" href="Views/CSS/styles.css">
    <link rel="stylesheet" href="Views/CSS/Catalog.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="<?= $user_theme ?>">

<header class="main-header">
    <div class="container header-content">
        <a href="index.php" class="logo">Rotten <span>Tangerines</span></a>
        
        <div class="header-actions">
            <div class="theme-container">
                <?php if ($user_theme === 'light'): ?>
                    <a href="index.php?theme=dark" class="theme-switch-link"><i class="fas fa-moon"></i></a>
                <?php else: ?>
                    <a href="index.php?theme=light" class="theme-switch-link"><i class="fas fa-sun"></i></a>
                <?php endif; ?>
            </div>

            <nav class="nav-menu">
                <?php if (isset($_SESSION['can_edit']) && $_SESSION['can_edit'] == 1): ?>
                    <a href="index.php?action=createMovie" class="btn-add">Añadir</a>
                <?php endif; ?>
                <a href="index.php?action=logout" class="btn-logout"><i class="fas fa-sign-out-alt"></i></a>
            </nav>  
        </div>
    </div>
</header>

<main class="container">
    <section class="movie-grid">
        <?php if (!empty($movies)): ?>
            <?php foreach ($movies as $movie): ?>
                <article class="movie-card">
                    <div class="poster-container">
                        <img src="<?= $movie->getPosterUrl() ?? 'https://via.placeholder.com/300x450' ?>" class="poster-img">
                        <div class="movie-overlay">
                            <a href="index.php?action=watch&id=<?= $movie->getId() ?>" class="btn-view">Ver Detalles</a>
                        </div>
                    </div>
                    
                    <div class="movie-info">
                        <h2 class="movie-title"><?= htmlspecialchars($movie->getTitle()) ?></h2>
                        <div class="movie-meta">
                            <span><?= htmlspecialchars($movie->getGenre()) ?></span>
                            <span>•</span>
                            <span><?= $movie->getFormattedRuntime() ?></span>
                        </div>
                        <p class="movie-synopsis"><?= htmlspecialchars(substr($movie->getSynopsis(), 0, 100)) ?>...</p>
                    </div>

                    <?php if (isset($_SESSION['can_edit']) && $_SESSION['can_edit'] == 1): ?>
                        <div class="movie-actions">
                            <a href="index.php?action=editMovie&id=<?= $movie->getId() ?>" class="action-btn edit"><i class="fas fa-edit"></i></a>
                            <a href="index.php?action=deleteMovie&id=<?= $movie->getId() ?>" class="action-btn delete" onclick="return confirm('¿Seguro?')"><i class="fas fa-trash"></i></a>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state"><p>No hay películas disponibles.</p></div>
        <?php endif; ?>
    </section>
</main>

</body>
</html>