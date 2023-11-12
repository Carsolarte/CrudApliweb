<?php
include('includes/header.php');
include("db.php");
?>
<div class="container">
  
<h1>Sistema De Departamento De Empleados</h1>
</div>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 ">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php session_unset();
      } ?>
      <div class="card card-body">
        <form action="addDepto.php" method="POST">
          <div class="form-group mb-3">
            <input type="text" name="dept_no" class="form-control" placeholder="N° Departamneto" autofocus>
          </div>
          <div class="form-group mb-3">
            <input type="text" name="emp_np" class="form-control" placeholder="N° Empleado" autofocus>
          </div>
          <div class="d-grid">
            <input name="bt_guardar_dep_emp" type="submit" class="btn btn-success" value="Guardar">
          </div>
        </form>
      </div>
    </div>
    <div class="col">
      <p></p>
    </div>
  </div>
</div>
<div class="container ">
<table border="1" cellpadding="2" class="table  table-striped">
        <thead>
          <tr>
            <th>Empleado</th>
            <th>Departamento</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "select *
                      from employees as e 
                      inner join dept_emp as c on e.emp_no=c.emp_no 
                      inner join departments as d on c.dept_no=d.dept_no 
                      limit 50;";
          $resultado = mysqli_query($conexion, $query);
          while ($fila = mysqli_fetch_array($resultado)) { ?>
            <tr>
              <td>
                <?php echo $fila['first_name'] ?>
              </td>
              <td>
                <?php echo $fila['dept_name'] ?>
              <td>
                <a class="btn btn-secondary" href="editar_tarea.php?id=<?php echo $fila['emp_no'] . '_' . $fila['dept_no']; ?>">Editar</a>
                <a class="btn btn-danger" href="eliminar_tarea.php?id=<?php echo $fila['emp_no'] . '_' . $fila['dept_no']; ?>">Eliminar</a>
              </td>
            <?php } ?>
        </tbody>
      </table>
</div>
<?php
include('includes/footer.php');
?>