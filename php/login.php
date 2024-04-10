<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["username"] && $_POST["password"]) {

        $usuarios = isset($_COOKIE["usuarios"]) ? unserialize($_COOKIE["usuarios"]) : array();

        if (isset($usuarios[$_POST["username"]]) && $usuarios[$_POST["username"]] == $_POST["password"]) {
            setcookie("usuario", $_POST["username"], time() + 3600, "/");
            header("Location: ../php/productos.php");
            exit;
        } else {
            $_SESSION["error"] = "Error! Credenciales incorrectas.";
        }
    }
}

header("Location: ../indexx.php");
exit;
