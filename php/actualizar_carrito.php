<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["actualizar"])) {
    $cantidades = $_POST["cantidad"];
    foreach ($cantidades as $productoId => $cantidad) {
        $_SESSION["carrito"][$productoId]["cantidad"] = $cantidad;
    }
}

header("Location: carrito.php");
exit;
