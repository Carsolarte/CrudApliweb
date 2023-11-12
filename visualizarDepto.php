<?php
include('includes/header.php');
include("db.php");
?>
<div class="container">
    <h1>Sistema De Empleados</h1>
</div>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="col-md-4">
                <table border="1" cellpadding="2" class="table  table-striped">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select emp_no, first_name, last_name
                                 from employees                    
                                limit 9;";
                        $resultado = mysqli_query($conexion, $query);
                        while ($fila = mysqli_fetch_array($resultado)) { ?>
                            <tr>
                                <td>
                                    <?php echo $fila['emp_no'] ?>
                                </td>
                                <td>
                                    <?php echo $fila['first_name'] ?>
                                <td>
                                    <?php echo $fila['last_name'] ?>

                                <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-md-4">
            <table border="1" cellpadding="2" class="table  table-striped">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>Departamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "select dept_no, dept_name
                      from departments                     
                      limit 20;";
                    $resultado = mysqli_query($conexion, $query);
                    while ($fila = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                            <td>
                                <?php echo $fila['dept_no'] ?>
                            </td>
                            <td>
                                <?php echo $fila['dept_name'] ?>
                            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <h1>Sistema De Registro Empleado Departamento</h1>
</div>

<div class="container p-4">
    <div class="col-md-4">
        <div class="row">
        
            <div class="card card-body">
                <form action="CrudDeptEmp.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="dept_no" class="form-control" placeholder="N° Departameto" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="emp_no" class="form-control" placeholder="N° Empleado" autofocus>
                    </div>
                    <div class="d-grid">
                        <input name="bt_guardar_dep_emp" type="submit" class="btn btn-success" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?>  alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset();
} ?>
<div class="container ">
    <table border="1" cellpadding="2" class="table  table-striped">
        <thead>
            <tr>
                <th>id empleado</th>
                <th>Empleado</th>
                <th>Departamento</th>
                <th>from_date</th>
                <th>to_date</th>
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
                        <?php echo $fila['emp_no'] ?>
                    </td>
                    <td>
                        <?php echo $fila['first_name'] ?>
                    </td>
                    <td>
                        <?php echo $fila['dept_name'] ?>
                    </td>
                    <td>
                        <?php echo $fila['from_date'] ?>
                    </td>
                    <td>
                        <?php echo $fila['to_date'] ?>
                    </td>
                    <td>
                        <button class="btn btn-secondary"
                            onclick="editarRegistro(<?php echo $fila['emp_no']; ?>, '<?php echo $fila['dept_no']; ?>')">Editar</button>
                    </td>
                    <td>
                        <form action="CrudDeptEmp.php" method="POST">
                            <input type="hidden" name="emp_no" value="<?php echo $fila['emp_no']; ?>">
                            <input type="hidden" name="dept_no" value="<?php echo $fila['dept_no']; ?>">
                            <input name="bt_delete_dep_emp" type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                    </td>
                <?php } ?>
                <div class="modal" tabindex="-1" id="editarModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Fecha</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editarForm" action="CrudDeptEmp.php" method="POST">
                                    <div class="form-group">
                                        <label for="nuevaFecha">Nueva Fecha:</label>
                                        <input type="date" class="form-control" id="nuevaFecha" name="nuevaFecha"
                                            required>
                                    </div>
                                    <input type="hidden" id="empNoHidden" name="emp_no" value="">
                                    <input type="hidden" id="deptNoHidden" name="dept_no" value="">
                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary" name="bt_update_dep_emp">Guardar
                                            Cambios</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

        </tbody>
    </table>
</div>

<script>
    function editarRegistro(empNo, deptNo) {
        // Prellenar los campos ocultos en el formulario de edición
        document.getElementById('empNoHidden').value = empNo;
        document.getElementById('deptNoHidden').value = deptNo;

        // Abrir el modal
        var editarModal = new bootstrap.Modal(document.getElementById('editarModal'));
        editarModal.show();
    }
</script>
<?php
include('includes/footer.php');
?>