<?php
session_start();

// Productos disponibles
$productos = [
    ['id' => 1, 'nombre' => 'NESCAFÉ® Taster`s Choice® Caramel Dark Chocolate', 'precio' => 150, 'imagen' => '../img/productos/producto1.webp'],
    ['id' => 2, 'nombre' => 'NESCAFÉ® Taster`s Choice® Tostado y Molido', 'precio' => 250, 'imagen' => '../img/productos/producto2.webp'],
    ['id' => 3, 'nombre' => 'NESTLÉ® COFFEE MATE® Almendra', 'precio' => 90, 'imagen' => '../img/productos/producto3.webp'],
    ['id' => 4, 'nombre' => 'NESTLÉ® COFFEE MATE® Coco', 'precio' => 90, 'imagen' => '../img/productos/producto4.webp'],
    ['id' => 5, 'nombre' => 'NESTLÉ® COFFEE MATE® Polvo Extra Cremoso', 'precio' => 95, 'imagen' => '../img/productos/producto5.webp'],
    ['id' => 6, 'nombre' => 'NESCAFÉ® Black: Tostado Intenso', 'precio' => 120, 'imagen' => '../img/productos/producto6.webp']
];

// Verificar si se ha enviado el formulario para agregar al carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
    $productoId = $_POST["producto_id"];
    $cantidad = 1;

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION["carrito"][$productoId])) {
        $_SESSION["carrito"][$productoId]["cantidad"] += $cantidad;
    } else {
        // Agregar el producto al carrito
        $_SESSION["carrito"][$productoId] = [
            "id" => $productos[$productoId - 1]["id"],
            "nombre" => $productos[$productoId - 1]["nombre"],
            "precio" => $productos[$productoId - 1]["precio"],
            "cantidad" => $cantidad
        ];
    }

    // Redireccionar a esta misma página para evitar el reenvío del formulario
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Tareas</title>

    <!-- Preload -->
    <!-- <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css"> -->

    <link rel="preload" href="../css/productos.css" as="style">
    <link rel="stylesheet" href="../css/productos.css">

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
            <a class="link seleccionado" href="productos.php">Productos</a>
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
            <h2>Productos</h2>
        </div>
        <form class="form-buscar">
            <input class="input-buscar" id="filtro" type="text" name="buscar">
            <button class="btn-buscar" type="submit">Borrar</button>
        </form>
    </div>

    <div class="contenedor-centrado">
        <ul class="contenedor-productos" id="lista-productos">
            <?php foreach ($productos as $producto) : ?>
                <li data-nombre="<?php echo strtolower($producto['nombre']); ?>">
                    <div class="producto">
                        <div class="cont-img">
                            <img src="<?php echo $producto['imagen']; ?>" alt="imagen producto">
                        </div>
                        <h3 class="titulo-producto"><?php echo $producto['nombre']; ?></h3>
                        <div class="cont-precio-boton">
                            <h3 class="precio-producto">$<?php echo $producto['precio']; ?> / pz</h3>
                            <form method="post" action="">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                                <button class="agregar-carrito" type="submit" name="agregar">Agregar al carrito</button>
                            </form>

                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script>
        // Script para filtrar productos
        document.getElementById("filtro").addEventListener("input", function() {
            var filtro = this.value.toLowerCase();
            var productos = document.querySelectorAll("#lista-productos li");
            productos.forEach(function(producto) {
                var nombre = producto.dataset.nombre;
                if (nombre.includes(filtro)) {
                    producto.style.display = "block";
                } else {
                    producto.style.display = "none";
                }
            });
        });
    </script>
</body>

<script src="../js/configuracion.js"></script>
<script src="../js/productos.js"></script>

</html>