<?php
session_start();

// Verifica si se enviaron datos mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $Username = $_POST["username"];
    $Password = $_POST["password"];

    if ($Username == $_SESSION["username"] && $Password == $_SESSION["password"]) {
        setcookie("Usuario", $Username, time() + (86400 * 30), "/");
        header("Location: visualizarDepto.php");
        exit();
    } else {
        echo "<script>
            alert('Usuario o contraseña incorrectos. Vuelve a intentarlo.');
            window.location.href = 'index.php';
          </script>";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>