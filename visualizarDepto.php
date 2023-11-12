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
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();
            } ?>

            <!-- Primer formulario -->
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

        <!-- Segundo formulario -->
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

<div class="container p-4">
    <div class="col-md-4">
        <div class="row">
            <div class="card card-body">
                <form action="addDepto.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="dept_no" class="form-control" placeholder="N° Departameto" autofocus>
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
    </div>
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
                        <button class="btn btn-secondary editar-btn" data-toggle="modal" data-target="#editarModal"
                            data-emp-no="<?php echo $fila['emp_no'];
                            ?>" data-dept-no="<?php echo $fila['dept_no']; ?>">Editar</button>
                        <a class="btn btn-danger"
                            href="eliminar_tarea.php?id=<?php echo $fila['emp_no'] . '_' . $fila['dept_no']; ?>">Eliminar</a>
                    </td>
                <?php } ?>
               
                <div class="modal" tabindex="-1"id="editarModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Fecha</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form id="editarForm">
                                    <div class="form-group">
                                        <label for="nuevaFecha">Nueva Fecha:</label>
                                        <input type="date" class="form-control" id="nuevaFecha" name="nuevaFecha">
                                    </div>
                                    <input type="hidden" id="empNoHidden" name="empNoHidden" value="">
                                    <input type="hidden" id="deptNoHidden" name="deptNoHidden" value="">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

        </tbody>
    </table>
</div>
<?php
include('includes/footer.php');
?>