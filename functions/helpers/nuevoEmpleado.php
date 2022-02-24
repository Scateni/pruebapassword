<?php 
require_once '../../config/db.php';
require_once '../functions.php';
$nombre  = trim(ucwords(strtolower($_POST['nombre'])));
if (isValid($nombre) == false) {
	echo 2;
	die;
}
$boletin = 0;
if (array_key_exists('boletin', $_POST)){
	$boletin = 1;
}
$data = array(
	$nombre,
	$_POST['email'],
	$_POST['sexo'],
	$_POST['area'],
	$boletin,
	$_POST['descripcion'],
	$_POST['roles']
);
echo nuevoEmpleado($data);
?>