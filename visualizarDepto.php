<?php
// inicio.php


session_start();

// Verificar si el usuario está autenticado (si la sesión tiene el nombre de usuario)
if (!isset($_SESSION['username'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... Tu código HTML anterior ... -->
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Bienvenido:, <?php echo $_SESSION['username']; ?>!</h3>
                </div>
                <div class="card-body">
                    <!-- Contenido de la página de inicio -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
