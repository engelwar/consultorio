
<?php
include('../config.php');
$idRegistros = $_REQUEST['CODIGO'];
$nombres      = $_REQUEST['nombres'];
$apellidos 	 = $_REQUEST['apellidos'];
$ci 	 = $_REQUEST['ci'];
$fecha_nacimiento 	 = $_REQUEST['fecha_nacimiento'];
$direccion 	 = $_REQUEST['direccion'];
$telefono 	 = $_REQUEST['telefono'];
$correo 	 = $_REQUEST['correo'];
$cargo 	 = $_REQUEST['cargo'];
$especialidad 	 = $_REQUEST['especialidad'];
$turno 	 = $_REQUEST['turno'];
$nacionalidad 	 = $_REQUEST['nacionalidad'];


$update = ("UPDATE personal 
	SET 
	nombres  ='" .$nombres. "',
	apellidos  ='" .$apellidos. "',
	ci ='" .$ci. "', 
	fecha_nacimiento ='" .$fecha_nacimiento. "', 
	direccion ='" .$direccion. "', 
	telefono ='" .$telefono. "', 
	correo ='" .$correo. "', 
	cargo ='" .$cargo. "', 
	especialidad ='" .$especialidad. "', 
	turno ='" .$turno. "', 
	nacionalidad ='" .$nacionalidad. "' 

WHERE CODIGO ='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";

?>
