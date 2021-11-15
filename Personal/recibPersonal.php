<?php
include('../config.php');
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci 	 = $_REQUEST['ci'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];
$fecha_nacimiento 	 = $_REQUEST['fecha_nacimiento'];
$direccion 	 = $_REQUEST['direccion'];
$cargo 	 = $_REQUEST['cargo'];
$especialidad 	 = $_REQUEST['especialidad'];
$turno 	 = $_REQUEST['turno'];
$correo 	 = $_REQUEST['correo'];
$telefono 	 = $_REQUEST['telefono'];

$QueryInsert = ("INSERT INTO personal(
    nombres,
    apellidos,
    ci,
    nacionalidad,
    fecha_nacimiento,
    direccion,
    cargo,
    especialidad,
    turno,
    correo,
    telefono
)
VALUES (
    '".$nombres. "',
    '".$apellidos. "',
    '".$ci."',
    '".$nacionalidad."',
    '".$fecha_nacimiento."',
    '".$direccion."',
    '".$cargo."',
    '".$especialidad."',
    '".$turno."',
    '".$correo."',
    '".$telefono."'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:index.php");
?>
