<?php
    session_start();

    // Verifica si se enviaron datos mediante POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene los datos del formulario
        $submittedUsername = $_POST["username"];
        $submittedPassword = $_POST["password"];

        if ($submittedUsername == $_SESSION["username"] && $submittedPassword == $_SESSION["password"]) {
            // Si la autenticación es exitosa, redirige a visualizarDepto.php después de 2 segundos
            echo "<script>setTimeout(function(){ window.location.href = 'visualizarDepto.php'; }, 1000);</script>";
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