<?php
$conexion= mysqli_connect(
    'localhost',
    'root',
    '',
    'employees'
);
if(isset($conexion)){
    echo 'BD conectada';
}
?>