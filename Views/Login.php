<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Rotten Tangerines</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'registrado'): ?>
        <p style="color: green;">¡Registro completado! Ya puedes entrar.</p>
    <?php endif; ?>

    <form action="index.php?action=login" method="POST">
        <label for="username">Usuario:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password" required><br>
        <input type="checkbox" name="remember-me" id="remember-me">
        <label for="remember-me">Recordarme en este equipo</label><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p>¿No tienes cuenta? <a href="index.php?action=register">Regístrate aquí</a></p>
</body>
</html>