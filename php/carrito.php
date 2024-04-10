<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>

    <!-- Preload -->
    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">

    <link rel="preload" href="../css/carrito.css" as="style">
    <link rel="stylesheet" href="../css/carrito.css">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
</head>

<body>

    <header class="header">
        <div class="header-logo">
            <img src="../img/cafe.webp" alt="cafe logo">
            <h1>Café del bosque</h1>
        </div>

        <div class="header-links">
            <a class="link" href="productos.php">Productos</a>
            <a class="link" href="configuracion.php">Configuracion</a>
            <a class="link" href="contacto.php">Contacto</a>
            <?php

            echo "<div id='elemento'>";
            if (isset($_COOKIE["usuario"])) {
                $usuario = $_COOKIE["usuario"];
                echo "<a class='link' href=''>$usuario</a>";
            } else {
                echo "<a class='link' href=''>Usuario 1</a>";
            }
            echo "<button id='cerrar-sesion' href=''>Cerrar sesión</button>";

            echo "</div>";

            $cantidadProductos = 0;
            if (isset($_SESSION["carrito"]) && is_array($_SESSION["carrito"])) {
                $cantidadProductos = count($_SESSION["carrito"]);
            }
            echo "<a class='boton btn-carrito' href='carrito.php'>Carrito (<span class='boton-carrito'>{$cantidadProductos}</span>)</a>";
            ?>

        </div>
    </header>

    <div class="banner">
        <div class="subtitulo">
            <h2>Carrito de compra</h2>
        </div>
    </div>

    <!-- <section class="contenedor-productos"> -->

    <?php
    // Verificar si el carrito está vacío
    if (empty($_SESSION["carrito"])) {
        echo "<p class='carrito-vacio'>El carrito está vacío</p>";
    } else {
        echo "<form class='form-productos' method='post' action='actualizar_carrito.php'>";
        echo "<section class='contenedor-productos'>";
        $total = 0;
        foreach ($_SESSION["carrito"] as $productoId => $item) {
            $subtotal = intval($item['precio']) * intval($item['cantidad']);

            $total += $subtotal;


            echo "<div class='producto'>
                <div class='cont-img'>
                    <img src='../img/productos/producto{$productoId}.webp' alt='producto 1'>
                </div>
                <div>
                    <h3 class='titulo-producto'>{$item['nombre']}</h3>
                    <h3 class='precio-producto'>$<span class='precio-producto-monto'>{$item['precio']}</span> / pz</h3>
                </div>
                <div class='cont-precio-boton'>
                    <div class='cantidad'>
                        <h3 class='label-cantidad'>Cantidad:</h3>
                        <input class='cantida-producto' type='number' name='cantidad[{$productoId}]' value='{$item['cantidad']}' min='1'>
                       
                    </div>
                    <a class='eliminar-carrito' href='eliminar_producto.php?id={$productoId}'>Eliminar</a>
                </div>
            </div>";
        }
        echo "</section>";
        echo "<div class='actualizar-total'>";
        echo "<input class='boton actualizar-carrito' type='submit' name='actualizar' value='Actualizar Carrito'>";
        echo "<div class='carrito-total'>
            <h2 class='total-label'>Total: <span class='total-cantidad'>$$total</span></h2>
            <button class='boton btn-pago'>Proceder al pago</button>
        </div>";
        echo "</div>";
        echo "</form>";
    }
    ?>
</body>

<script src="../js/configuracion.js"></script>
<script src="../js/productos.js"></script>

</html>