<?php
session_start();
 include('includes/header.php'); 
 include("db.php"); 
?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 ">
        
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        <form action="addDepto.php" method="POST">
          <div class="form-group mb-3">
            <input type="text" name="dept_no" class="form-control" placeholder="N° Departamento" autofocus>
          </div>
          <div class="form-group mb-3">
            <input name="text" name="dept_name" class="form-control" placeholder="Nombre del Departamento" autofocus>
          </div>
          <div class="d-grid">
            <input type="submit" name="Guardar" class="btn btn-success" value="Guardar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
