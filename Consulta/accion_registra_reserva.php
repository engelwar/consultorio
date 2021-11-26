<?php

include('../config.php');

$idPaciente = $_GET['idPaciente'];
$idMedico = $_GET['medico'];
$idHorario = $_GET['id_horario'];
$Fecha = $_GET['fecha_consulta'];

$sqlAccion = (" INSERT INTO `reservas` (`CODIGO_RESERVA`, `CODIGO_PACIENTE`, `CODIGO_PERSONAL`, `CODIGO_TURNOS`, `FECHA_RESERVA`) VALUES (NULL, '".$idPaciente."', '".$idMedico."', '".$idHorario."', '".$Fecha."'); ");

$queryAccion = mysqli_query($con, $sqlAccion);

if($queryAccion){
  header('Location: registrar_reserva.php');
} else {
  echo "error";
}

?>