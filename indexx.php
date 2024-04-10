<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>

    <!-- Preload -->
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">

    <link rel="preload" href="css/inicio.css" as="style">
    <link rel="stylesheet" href="css/inicio.css">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<script>
    function toggleUsuarios() {
        var usuariosList = document.getElementById('usuariosList');
        usuariosList.style.display = usuariosList.style.display === 'none' ? 'block' : 'none';
    }
</script>

<body>
    <section class="contenedor-sesion">
        <form class="contenedor-sesion-panel" action="php/login.php" method="post">
            <div class="sesion-icono">
                <div class="icono-cont-img">
                    <img class="icono-img" src="img/usuario.webp" alt="icono user">
                </div>
            </div>
            <H1 class="titulo-h1">Inicio de sesión</H1>
            <div class="sesion-campos">
                <input class="usuario" type="text" name="username" placeholder="Usuario" required>
                <input class="password" type="password" name="password" placeholder="Contraseña" required>
                <span class="ver-password">
                    <img class="password-icono" src="img/ojo.webp" alt="ojo">
                </span>
            </div>
            <?php
            if (isset($_SESSION["error"])) {
                echo "<p id='login-error'>{$_SESSION["error"]}</p>";
                unset($_SESSION["error"]);
            }
            $usuarios = isset($_COOKIE["usuarios"]) ? unserialize($_COOKIE["usuarios"]) : array();
            ?>
            <div class="sesion-registrarse">
                <p>¿No tienes una cuenta?</p>
                <a class="link-registro" href="php/registrarse.php">Registrarse</a>
            </div>
            <div class="sesion-botones">
                <button class="boton btn-ingresar" type="submit">Ingresar</button>
                <button class="boton btn-restaurar" type="reset">Restaurar</button>
            </div>
            <button class="btn-usuarios" onclick="toggleUsuarios()">Listar/ocultar usuarios</button>
            <ul id="usuariosList" style="display: none;">
                <?php foreach ($usuarios as $usuario => $contrasena) : ?>
                    <li><strong>Usuario:</strong> <?php echo $usuario; ?>, <strong>Contraseña:</strong> <?php echo $contrasena; ?></li>
                <?php endforeach; ?>
            </ul>
        </form>
    </section>

</body>

<script src="js/inicio_sesion.js"></script>

</html>