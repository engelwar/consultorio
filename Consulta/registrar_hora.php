<?php include('../include/header.php') ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];

include('../config.php');

if (isset($_GET['especialidad']) && $_GET['especialidad'] != null) {
  $sqlPersonal   = ("SELECT * FROM personal where ESPECIALIDAD = '" . $_GET['especialidad'] . "' ");
  $queryPersonal = mysqli_query($con, $sqlPersonal);
} else {
  $sqlPersonal   = ("SELECT * FROM personal where ESPECIALIDAD = '" . null . "' ");
  $queryPersonal = mysqli_query($con, $sqlPersonal);
}

?>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark d-flex justify-content-between">
  <!-- Navbar Brand-->
  <a class="navbar-brand ps-3" href="../index.php">CONSULTORIO</a>
  <!-- Navbar-->
  <span class="text-info fs-2"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
    </svg><?php echo $nombres; ?></span>
  <div>
    <a class="navbar-brand ps-3" href="../logout.php">Cerrar Sesion</a>
  </div>
</nav>
<div class="jumbotron">
  <div class="container text-center w-50 shadow-lg p-4">
    <div class="col-md-12 mt-4">
      <form action="consultar_hora.php" method="$_POST" class="row flex-column">
        <label for="" class="mr-4">
          <h4>Medicos:</h4>
        </label>
        <select class="form-select" multiple aria-label="multiple select example" name="id">
          <option selected>Sin seleccionar</option>
          <?php
          while ($dataPersonal = mysqli_fetch_array($queryPersonal)) {
          ?>
            <option value="<?php echo $dataPersonal['CODIGO']; ?>"><?php echo $dataPersonal['NOMBRE'] . ' ' . $dataPersonal['APELLIDO']; ?></option>
          <?php } ?>
        </select>
        <label for="" class="mr-4">
          <h4>Fecha:</h4>
        </label>
        <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" step="1" autofocus>
        <label for="" class="mr-4">
          <h4>Horarios:</h4>
        </label>
        <select class="form-select" multiple aria-label="multiple select example" name="id">
          <option selected>Sin seleccionar</option>
          <?php
          while ($dataPersonal = mysqli_fetch_array($queryPersonal)) {
          ?>
            <option value="<?php echo $dataPersonal['CODIGO']; ?>"><?php echo $dataPersonal['NOMBRE'] . ' ' . $dataPersonal['APELLIDO']; ?></option>
          <?php } ?>
        </select>
        <div class="col-md-12 mt-2">
          <button type="submit" class="btn btn-danger">Consultar Medicos</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('../include/footer.php') ?>