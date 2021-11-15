
<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];
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

$update = ("UPDATE paciente 
	SET 
	nombres  ='" .$nombres. "',
	apellidos  ='" .$apellidos. "',
	correo ='" .$correo. "', 
	direccion  ='" .$direccion. "',
	enfermedad_base  ='" .$enfermedad_base. "',
	nacionalidad ='" .$nacionalidad. "', 
	telefono  ='" .$telefono. "',
	fecha_nacimiento  ='" .$fecha_nacimiento. "',
	num_referencia ='" .$num_referencia. "', 
	personal_referencia  ='" .$personal_referencia. "',
	profesion  ='" .$profesion. "',
	tipo_sangre ='" .$tipo_sangre. "', 
	ci  ='" .$ci. "' 

WHERE id='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";

?>
