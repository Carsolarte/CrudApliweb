<?php
    session_start();

    // Verifica si se enviaron datos mediante POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene los datos del formulario
        $Username = $_POST["username"];
        $Password = $_POST["password"];

        if ($Username == $_SESSION["username"] && $Password == $_SESSION["password"]) {
            setcookie("Usuario", $Username, time() + (86400 * 30), "/");
            // Si la autenticación es exitosa, redirige a visualizarDepto.php después de 2 segundos
            header("Location: visualizarDepto.php");
            exit();
        } else {
            // Si la autenticación falla, puedes redirigir a una página de error o volver al formulario de inicio de sesión
            echo "Usuario o contraseña incorrectos. Vuelve a intentarlo.";
        } 
    } else {
        // Si no se enviaron datos mediante POST, redirige a la página de inicio de sesión
        header("Location: index.php");
        exit();
    }
?>