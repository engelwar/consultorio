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
