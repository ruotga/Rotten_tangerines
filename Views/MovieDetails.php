<?php
$cookie_name = "theme_user_" . $_SESSION['username'];
$user_theme = $_COOKIE[$cookie_name] ?? 'dark';
if (!$movie) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($movie->getTitle()) ?> - Rotten Tangerines</title>
    <link rel="stylesheet" href="Views/CSS/styles.css">
    <link rel="stylesheet" href="Views/CSS/MovieDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="form-page <?= $user_theme ?>">
    <header class="main-header">
        <div class="container header-content">
            <a href="index.php" class="logo">Rotten <span>Tangerines</span></a>
            
            <div class="header-actions">
                <div class="theme-container">
                    <?php if ($user_theme === 'light'): ?>
                        <a href="index.php?action=watch&id=<?=$movie->getId();?>&theme=dark" class="theme-switch-link"><i class="fas fa-moon"></i></a>
                    <?php else: ?>
                        <a href="index.php?action=watch&id=<?=$movie->getId();?>&theme=light" class="theme-switch-link"><i class="fas fa-sun"></i></a>
                    <?php endif; ?>
                </div>

                <nav class="nav-menu">
                    <a href="index.php?action=logout" class="btn-logout"><i class="fas fa-sign-out-alt"></i></a>
                </nav>  
            </div>
        </div>
    </header>
    <main class="details-container"> 
        <article class="movie-detail">
            <div class="movie-header">
                <img src="<?= $movie->getPosterUrl() ?>" alt="Poster" class="detail-poster">
                <div class="movie-info">
                    <h1><?= htmlspecialchars($movie->getTitle()) ?></h1>
                    <p class="synopsis"><strong>Sinopsis:</strong> <?= htmlspecialchars($movie->getSynopsis()) ?></p>
                    <h3 class="avg-score">Nota Media: ★ <?= $average ?></h3>
                </div>
            </div>

            <hr>

            <section class="rating-box">
                <?php if ($userScore !== null): ?>
                    <h4>Tu puntuación: ★ <?= $userScore ?></h4>
                    <p>¿Has cambiado de opinión? Actualiza tu nota:</p>
                <?php else: ?>
                    <h4>¿Qué nota le das?</h4>
                <?php endif; ?>

                <form action="index.php?action=rateMovie" method="POST" class="rating-form">
                    <input type="hidden" name="movie_id" value="<?= $movie->getId() ?>">
                    <select name="score" required>
                        <option value="" disabled selected>Selecciona...</option>
                        <?php for($i=1; $i<=5; $i++): ?>
                            <option value="<?= $i ?>" <?= $userScore == $i ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <button type="submit" class="btn-rate">
                        <?= $userScore !== null ? 'Actualizar' : 'Puntuar' ?>
                    </button>
                </form>
            </section>

            <a href="index.php" class="back-link">← Volver al catálogo</a>
        </article>
    </main>
</body>
</html>