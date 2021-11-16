<?php
include('../config.php');
$idRegistros = $_REQUEST['CODIGO'];

$DeleteRegistro = ("DELETE FROM personal WHERE CODIGO = '".$idRegistros."' ");
mysqli_query($con, $DeleteRegistro);
?>