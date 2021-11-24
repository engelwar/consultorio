<?php include('../include/header.php') ?>

<?php

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../login_paciente.php');
}

$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];

include('../config.php');

if (isset($_GET['id'])) {
  $sqlPersonal = ("SELECT * FROM personal WHERE CODIGO = '" . $_GET['id'] . "' ");
  $queryPersonal = mysqli_query($con, $sqlPersonal);
  $dataPersonal = mysqli_fetch_array($queryPersonal);
}

if (isset($_GET['fecha_consulta'])) {
  $sqlConsultaHorario = ("SELECT t.* FROM reservas r, turnos t WHERE r.CODIGO_TURNOS != t.CODIGO AND r.FECHA_RESERVA = '".$_GET['fecha_consulta']."' ");
  $queryConsultaHorario = mysqli_query($con, $sqlConsultaHorario);
}

$Doctor = $dataPersonal['NOMBRE'];

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
  <div class="container w-25">
    <h4><?php echo $Doctor; ?></h4>
    <form action="consultar_hora.php" method="$_POST">
      <div class="form-group">
        <label for="fecha_consulta" class="form-label">Fecha consultar</label>
        <input type="date" id="fecha_consulta" class="form-control" name="fecha_consulta" min="23-11-2021" max="23-02-2022" step="1" value="">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Consultar Horarios</button>
      </div>
    </form>
    <div class="col-md-12 mt-2">
      <label for="" class="mr-4">
        <h4>Especialistas en:</h4>
      </label>
      <select class="form-select" multiple aria-label="multiple select example" name="id">
        <option selected>Open this select menu</option>
        <?php
        while ($dataHorario = mysqli_fetch_array($queryPersonal)) {
        ?>
          <option value="<?php echo $dataHorario['HORARIO']; ?>"><?php echo $dataHorario['HORARIO']; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
</div>

<?php include('../include/footer.php') ?>