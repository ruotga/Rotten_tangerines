<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Rotten Tangerines</title>
    <link rel="stylesheet" href="Views/CSS/styles.css">
    <link rel="stylesheet" href="Views/CSS/Auth.css?v=1.1">
</head>
<body class="<?= $user_theme ?? 'dark' ?>">

    <main class="auth-page">
        <div class="auth-card">
            <h2>Crear Cuenta</h2>
            <p>Únete a la comunidad de Rotten Tangerines</p>

            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="index.php?action=register" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" placeholder="Tu apodo" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Mínimo 6 caracteres" required>
                </div>

                <button type="submit" class="btn-auth">
                    <i class="fas fa-user-plus"></i> Registrarse
                </button>
            </form>

            <div class="auth-footer">
                ¿Ya tienes cuenta? <a href="index.php?action=login">Inicia sesión aquí</a>
            </div>
        </div>
    </main>

</body>
</html>