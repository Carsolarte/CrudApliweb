<?php
// procesar_login.php

session_start();

// Incluir el archivo de conexión a la base de datos (db.php)
include("db.php");
// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Realizar la autenticación (esto puede variar según tu lógica de autenticación)
// En este ejemplo, simplemente verifica si el usuario y la contraseña son iguales
if ($username === 'usuario_demo' && $password === 'contraseña_demo') {
    // Autenticación exitosa, almacenar el nombre de usuario en la sesión
    $_SESSION['username'] = $username;

    // Redirigir a la página de inicio o a donde desees después del inicio de sesión
    header('Location: VisualizarDepto.php');
    exit();
} else {
    // Autenticación fallida, redirigir a la página de inicio de sesión con un mensaje de error
    header('Location: login.php?error=1');
    exit();
}
?>
