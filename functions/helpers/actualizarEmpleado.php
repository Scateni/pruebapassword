<?php 
require_once '../../config/db.php';
require_once '../functions.php';
$nombre  = trim(ucwords(strtolower($_POST['nombreU'])));
if (isValid($nombre) == false) {
	echo 2;
	die;
}
$boletin = "";
if (array_key_exists('boletinU', $_POST)){
	$boletin = 1;
}
$data = array(
	$nombre,
	$_POST['emailU'],
	$_POST['sexoU'],
	$_POST['areaU'],
	$boletin,
	$_POST['descripcionU'],
	$_POST['rolesU'],
	$_POST['idU']
);
echo updateEmpleado($data);
?>