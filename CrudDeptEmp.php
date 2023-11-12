<?php

include('db.php');
//create
if (isset($_POST['bt_guardar_dep_emp'])) {
  $idDepto = $_POST['dept_no'];
  $idemp = $_POST['emp_np'];
  $fechaActual = date('Y-m-d');
  if ($idDepto != '' and $idDepto != null and $idemp != '' and $idemp != null) {
    $query = "INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date) VALUES ( '$idemp', '$idDepto', '$fechaActual', '2023-12-31')";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
      die("Query Failed.");
    }
    echo "saved";

    $_SESSION['message'] = 'Departamento guardado correctamentex';
    $_SESSION['message_type'] = 'success';
  }
}
//update
if (isset($_POST['bt_update_dep_emp'])) {
  $idDepto = $_POST['dept_no'];
  $idemp = $_POST['emp_np'];
  $fechaActual = date('Y-m-d');
  if ($idDepto != '' and $idDepto != null and $idemp != '' and $idemp != null) {
     // Actualiza la fecha to_date en la tabla dept_emp
     $queryUpdateDeptEmp = "UPDATE dept_emp SET to_date = '$fechaActual' WHERE emp_no = '$idemp' AND dept_no = '$idDepto'";
     $resultUpdateDeptEmp = mysqli_query($conexion, $queryUpdateDeptEmp);
     if (!$resultUpdateDeptEmp) {
         die("Query Failed: " . mysqli_error($conexion));
     }
 
     echo "updated";
    
    
    $query = "INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date) VALUES ( '$idemp', '$idDepto', '$fechaActual', '2023-12-31')";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
      die("Query Failed.");
    }
    echo "saved";
    $_SESSION['message'] = 'Departamento actualizado correctamente';
    $_SESSION['message_type'] = 'success';
  
  }
}
//delete
if (isset($_POST['bt_delete_dep_emp'])) {
  $idDepto = $_POST['dept_no'];
  $idemp = $_POST['emp_np'];
  $fechaActual = date('Y-m-d');
  if ($idDepto != '' and $idDepto != null and $idemp != '' and $idemp != null) {
    $queryDeleteDeptEmp = "DELETE FROM dept_emp WHERE emp_no = '$idemp' AND dept_no = '$idDepto'";
    $resultDeleteDeptEmp = mysqli_query($conexion, $queryDeleteDeptEmp);
    if (!$resultDeleteDeptEmp) {
        die("Query Failed: " . mysqli_error($conexion));
    }
    echo "deleted";

    $_SESSION['message'] = 'Departamento eliminado correctamente';
    $_SESSION['message_type'] = 'success';

  }
}
header('Location: visualizarDepto.php');
?>