<?php

include('db.php');

if (isset($_POST['bt_guardar_dep_emp'])) {
  $idDepto = $_POST['dept_no'];
  $name = $_POST['emp_np'];
  $fechaActual = date('Y-m-d');
  echo "<script>";
  echo "console.log('idDepto:', '$idDepto');";
  echo "console.log('name:', '$name');";
  echo "</script>";
  $query = "INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date) VALUES ('$idDepto', '$name', '$fechaActual', '2023-12-31')";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Query Failed.");
  }
  echo"saved";

  $_SESSION['message'] = 'Departamento guardado correctamentex';
  $_SESSION['message_type'] = 'success';
 }
?>