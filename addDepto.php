<?php

include('db.php');

if (isset($_POST['addDepto'])) {
  $idDepto = $_POST['dept_no'];
  $name = $_POST['dept_name'];
  $query = "INSERT INTO departments(dept_no, dept_name) VALUES ('$idDepto', '$name')";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }
  echo"saved";

  $_SESSION['message'] = 'Departamento guardado correctamentex';
  $_SESSION['message_type'] = 'success';
  header('Location: visualizarDepto.php');

}

?>