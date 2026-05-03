<?php
$cookie_name = "theme_user_" . $_SESSION['username'];
$user_theme = $_COOKIE[$cookie_name] ?? 'dark';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($movie->getTitle()) ?> - Rotten Tangerines</title>
    <link rel="stylesheet" href="Views/CSS/styles.css">
    <link rel="stylesheet" href="Views/CSS/MovieDetails.css">
</head>
<body class="form-page <?= $user_theme ?>">
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