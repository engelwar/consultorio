<?php
include('../config.php');
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$correo 	 = $_REQUEST['correo'];
$direccion      = $_REQUEST['direccion'];
$enfermedad_base 	 = $_REQUEST['enfermedad_base'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];
$telefono      = $_REQUEST['telefono'];
$fecha_nacimiento 	 = $_REQUEST['fecha_nacimiento'];
$num_referencia 	 = $_REQUEST['num_referencia'];
$personal_referencia      = $_REQUEST['personal_referencia'];
$profesion 	 = $_REQUEST['profesion'];
$tipo_sangre 	 = $_REQUEST['tipo_sangre'];
$ci      = $_REQUEST['ci'];

$QueryInsert = ("INSERT INTO paciente(
    nombres,
    apellidos,
    correo,
    direccion,
    enfermedad_base,
    nacionalidad,
    telefono,
    fecha_nacimiento,
    num_referencia,
    personal_referencia,
    profesion,
    tipo_sangre,
    ci
)
VALUES (
    '".$nombres. "',
    '".$apellidos. "',
    '".$correo."',
    '".$direccion. "',
    '".$enfermedad_base. "',
    '".$nacionalidad."',
    '".$telefono. "',
    '".$fecha_nacimiento. "',
    '".$num_referencia."',
    '".$personal_referencia. "',
    '".$profesion. "',
    '".$tipo_sangre."',
    '".$ci. "'
)");
$inserInmueble = mysqli_query($con, $QueryInsert);

header("location:index.php");
?>
