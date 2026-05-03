<?php 
$movie = $movie ?? null; 

$cookie_name = "theme_user_" . $_SESSION['username'];
$user_theme = $_COOKIE[$cookie_name] ?? 'dark';
$currentAction = $movie ? 'editMovie&id=' . $movie->getId() : 'createMovie';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $movie ? 'Editar' : 'Añadir' ?> Película - Rotten Tangerines</title>
    <link rel="stylesheet" href="Views/CSS/styles.css">
    <link rel="stylesheet" href="Views/CSS/MovieForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="form-page <?= $user_theme ?>">

<header class="main-header">
    <div class="container header-content">
        <a href="index.php" class="logo">Rotten <span>Tangerines</span></a>
        
        <div class="header-actions">
            <div class="theme-container">
                <?php if ($user_theme === 'light'): ?>
                    <a href="index.php?action=<?= $currentAction ?>&theme=dark" class="theme-switch-link"><i class="fas fa-moon"></i></a>
                <?php else: ?>
                    <a href="index.php?action=<?= $currentAction ?>&theme=light" class="theme-switch-link"><i class="fas fa-sun"></i></a>
                <?php endif; ?>
            </div>
            <nav class="nav-menu">
                <a href="index.php?action=logout" class="btn-logout"><i class="fas fa-sign-out-alt"></i></a>
            </nav>  
        </div>
    </div>
</header>


<main class="container">
    <section class="form-card">
        <div class="form-header">
            <h2><?= $movie ? 'Editar Detalles de la Película' : 'Registrar Nueva Película' ?></h2>
            <p><?= $movie ? 'Modifica los campos necesarios para actualizar la información.' : 'Completa el formulario para añadir contenido al catálogo.' ?></p>
        </div>

        <form action="index.php?action=<?= $movie ? 'updateMovie' : 'createMovie' ?>" method="POST" class="custom-form">
            
            <?php if ($movie): ?>
                <input type="hidden" name="id" value="<?= $movie->getId() ?>">
            <?php endif; ?>

            <div class="form-group-row">
                <div class="form-group">
                    <label for="title">Título de la Película</label>
                    <input type="text" id="title" name="title" 
                           value="<?= $movie ? htmlspecialchars($movie->getTitle()) : '' ?>" 
                           placeholder="Ej: Inception" required>
                </div>

                <div class="form-group">
                    <label for="genre">Género</label>
                    <input type="text" id="genre" name="genre" 
                           value="<?= $movie ? htmlspecialchars($movie->getGenre()) : '' ?>" 
                           placeholder="Ej: Ciencia Ficción">
                </div>
            </div>

            <div class="form-group">
                <label for="synopsis">Sinopsis</label>
                <textarea id="synopsis" name="synopsis" rows="4" 
                          placeholder="Escribe un breve resumen de la trama..."><?= $movie ? htmlspecialchars($movie->getSynopsis()) : '' ?></textarea>
            </div>

            <div class="form-group-row three-cols">
                <div class="form-group">
                    <label for="release_date">Fecha de Estreno</label>
                    <input type="date" id="release_date" name="release_date" 
                           value="<?= $movie ? $movie->getReleaseDate() : '' ?>">
                </div>

                <div class="form-group">
                    <label for="runtime_minutes">Duración (min)</label>
                    <input type="number" id="runtime_minutes" name="runtime_minutes" 
                           value="<?= $movie ? $movie->getRuntime() : '' ?>" 
                           placeholder="Ej: 120">
                </div>

                <div class="form-group">
                    <label for="poster_url">URL del Póster</label>
                    <input type="url" id="poster_url" name="poster_url" 
                           value="<?= $movie ? htmlspecialchars($movie->getPosterUrl()) : '' ?>" 
                           placeholder="https://link-a-la-imagen.jpg">
                </div>
            </div>

            <div class="form-footer">
                <a href="index.php" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-submit <?= $movie ? 'btn-update' : 'btn-save' ?>">
                    <i class="fas <?= $movie ? 'fa-save' : 'fa-plus-circle' ?>"></i>
                    <?= $movie ? 'Actualizar Película' : 'Guardar Película' ?>
                </button>
            </div>
        </form>
    </section>
</main>

</body>
</html>