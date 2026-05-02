<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Rotten Tangerines</title>
</head>
<body>
    <h2>Crear Cuenta</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="index.php?action=register" method="POST">
        <label for="username">Nombre de Usuario:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="email">Correo Electrónico:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Registrarse</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="index.php?action=login">Inicia sesión aquí</a></p>
</body>
</html>