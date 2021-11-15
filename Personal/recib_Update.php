
<?php
include('../config.php');
$idRegistros = $_REQUEST['id'];
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


$update = ("UPDATE personal 
	SET 
	nombres  ='" .$nombres. "',
	apellidos  ='" .$apellidos. "',
	ci ='" .$ci. "', 
	nacionalidad ='" .$nacionalidad. "', 
	fecha_nacimiento ='" .$fecha_nacimiento. "', 
	direccion ='" .$direccion. "', 
	cargo ='" .$cargo. "', 
	especialidad ='" .$especialidad. "', 
	turno ='" .$turno. "', 
	correo ='" .$correo. "', 
	telefono ='" .$telefono. "' 

WHERE id='" .$idRegistros. "'
");
$result_update = mysqli_query($con, $update);

echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";

?>
