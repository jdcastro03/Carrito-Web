<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["username"] && $_POST["password"]) {

        $usuarios = isset($_COOKIE["usuarios"]) ? unserialize($_COOKIE["usuarios"]) : array();

        if (isset($usuarios[$_POST["username"]])) {
            $_SESSION["error"] = "El usuario ya existe. Por favor, elija otro nombre de usuario.";
        } else {

            $usuarios[$_POST["username"]] = $_POST["password"];

            setcookie("usuarios", serialize($usuarios), time() + (365 * 24 * 60 * 60), "/");

            header("Location: ../html/exito.html");
            exit;
        }
    }
}

header("Location: registrarse.php");
exit;
