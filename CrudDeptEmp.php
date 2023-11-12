<?php
session_start();
include('db.php');

//create
if (isset($_POST['bt_guardar_dep_emp'])) {
  $idDepto = $_POST['dept_no'];
  $idemp = $_POST['emp_no'];
  $fechaActual = date('Y-m-d');
  if ($idDepto != '' and $idDepto != null and $idemp != '' and $idemp != null) {
  
    $query = "INSERT INTO dept_emp(emp_no, dept_no, from_date, to_date) VALUES ( '$idemp', '$idDepto', '$fechaActual', '2023-12-31')";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
      $_SESSION['message'] = 'Error: No se pudo guardar el departamento.';
      $_SESSION['message_type'] = 'danger';
 
    } else {
     
      $_SESSION['message'] = 'Departamento guardado correctamente.';
      $_SESSION['message_type'] = 'success';
    }
  } else {
    $_SESSION['message'] = 'Error: Los campos no pueden estar vacíos.';
    $_SESSION['message_type'] = 'danger';
  }
 

}


//update
if (isset($_POST['bt_update_dep_emp'])) {
  $idDepto = $_POST['dept_no'];
  $idemp = $_POST['emp_no'];
  $fechaActual = $_POST['nuevaFecha'];
  echo "<script>";
  echo "console.log('idDepto:', '$idDepto');";
  echo "console.log('name:', '$name');";
  echo "console.log('fechaActual:', '$fechaActual');";
  echo "</script>";
  if ($idDepto != '' and $idDepto != null and $idemp != '' and $idemp != null) {
    
    $queryUpdateDeptEmp = "UPDATE dept_emp SET to_date = '$fechaActual' WHERE emp_no = '$idemp' AND dept_no = '$idDepto'";
    $resultUpdateDeptEmp = mysqli_query($conexion, $queryUpdateDeptEmp);
    if (!$resultUpdateDeptEmp) {
      $_SESSION['message'] = 'Error: No se pudo actualizar la fecha.';
      $_SESSION['message_type'] = 'danger';
    }
    echo "updated";
    $_SESSION['message'] = 'Departamento actualizado correctamente';
    $_SESSION['message_type'] = 'success';
  }
}
//delete
if (isset($_POST['bt_delete_dep_emp'])) {
  $idDepto = $_POST['dept_no'];
  $idemp = $_POST['emp_no'];
  $fechaActual = date('Y-m-d');
  if ($idDepto != '' and $idDepto != null and $idemp != '' and $idemp != null) {
    $queryDeleteDeptEmp = "DELETE FROM dept_emp WHERE emp_no = '$idemp' AND dept_no = '$idDepto'";
    $resultDeleteDeptEmp = mysqli_query($conexion, $queryDeleteDeptEmp);
    if (!$resultDeleteDeptEmp) {
      $_SESSION['message'] = 'Error: No se pudo eliminar el departamento.';
      $_SESSION['message_type'] = 'danger';
    }
    echo "deleted";
    $_SESSION['message'] = 'Departamento eliminado correctamente';
    $_SESSION['message_type'] = 'success';
  }
}
header('Location: visualizarDepto.php');
?>