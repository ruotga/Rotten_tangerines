<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Rotten Tangerines</title>
    <link rel="stylesheet" href="Views/CSS/styles.css">
    <link rel="stylesheet" href="Views/CSS/Auth.css?v=1.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="<?= $user_theme ?? 'dark' ?>">

    <main class="auth-page">
        <div class="auth-card">
            <h2>Iniciar Sesión</h2>
            <p>Accede a tu cuenta en Rotten Tangerines</p>

            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="index.php?action=login" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <label class="remember-me-container">
                    <input type="checkbox" name="remember-me" id="remember-me">
                    <span>Recordarme en este equipo</span>
                </label>

                <button type="submit" class="btn-auth">Entrar</button>
            </form>

            <div class="auth-footer">
                ¿No tienes cuenta? <a href="index.php?action=register">Regístrate aquí</a>
            </div>
        </div>
    </main>

</body>
</html>