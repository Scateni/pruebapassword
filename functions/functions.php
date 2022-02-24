<?php 
date_default_timezone_set('America/Bogota');
class empleados{
	public $id;
	public $nombre;
	public $email;
	public $sexo;
	public $area;
	public $boletin;
	public $descripcion;
}
class areas {
	public $id;
	public $nombre;
}
class roles {
	public $id;
	public $nombre;
}
function listaEmpleados(){
	$connection = connectDB();
	$empleados = [];	
	try {
		$query = $connection->query("SELECT * FROM empleados");
		while ($row = mysqli_fetch_row($query)) {
			$usuario = new empleados();
			$usuario->id = $row[0];
			$usuario->nombre =  $row[1];
			$usuario->email =  $row[2];
			$usuario->sexo = $row[3];
			$usuario->area = $row[4];
			$usuario->boletin = $row[5];
			$usuario->descripcion = $row[6];
			array_push($empleados, $usuario);
		}
		return $empleados;
	} catch (Exception $e) {
		return [];
	}
}
function listaAreas(){
	$connection = connectDB();
	$areas = [];
	try {
		$query = $connection->query("SELECT * FROM areas");
		while ($row = mysqli_fetch_row($query)) {
			$area = new areas();
			$area->id = $row[0];
			$area->nombre =  $row[1];
			array_push($areas, $area);
		}
		return $areas;
	} catch (Exception $e) {
		
	}
}
function listaRoles(){
	$connection = connectDB();
	$areas = [];
	try {
		$query = $connection->query("SELECT * FROM roles");
		while ($row = mysqli_fetch_row($query)) {
			$area = new roles();
			$area->id = $row[0];
			$area->nombre =  $row[1];
			array_push($areas, $area);
		}
		return $areas;
	} catch (Exception $e) {
		
	}
}
function isValid($nombre){
    $pattern = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
    return preg_match($pattern, $nombre);
}
function nuevoEmpleado($data){
	$connection = connectDB();
	try {
		//buscamos si existe
		$querySelect = $connection->query("SELECT id FROM empleados WHERE nombre = '$data[0]' OR email = '$data[1]'");
		if (!empty($querySelect) && mysqli_num_rows($querySelect)>0) {
			return 3;
		} else {
			$queryInsert = $connection->query("INSERT INTO empleados (nombre, email, sexo, area_id, boletin, descripcion) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]')");
			if (!empty($queryInsert)) {
				$querySelect = $connection->query("SELECT id FROM empleados WHERE nombre = '$data[0]' AND (email = '$data[1]' AND sexo = '$data[2]')");
				if ($querySelect->num_rows > 0) {
					$row = mysqli_fetch_row($querySelect);
					$idEmpleado = $row[0];
					foreach ($data[6] as $key => $valueRol) {
						$rolId = $valueRol;
						$queryInsertRol = $connection->query("INSERT INTO empleado_rol (empleado_id, rol_id) VALUES ('$idEmpleado', '$rolId')");
					}
					return 1;
				}
			} else {
				return 0;
			}
		}
	} catch (Exception $e) {
		return [];
	}
}
function getEmpleado($id){
	$connection = connectDB();
	try {
		$queryEmpleado = $connection->query("SELECT * FROM empleados WHERE id = '$id'");
		$info = mysqli_fetch_row($queryEmpleado);
		$data = array(
			'id'  => $info[0],
            'nombre' => $info[1],
            'email' => $info[2],
            'sexo' => $info[3],
            'area_id' => $info[4],
            'boletin' => $info[5],	
            'descripcion' => $info[6]	
		);
		return $data;
	} catch (Exception $e) {
		return [];
	}
}
function updateEmpleado($data){
	$connection = connectDB();
	try {
		if ($data[4] == "") {
			$queryUpdate = $connection->query("UPDATE empleados SET nombre = '$data[0]', email = '$data[1]', sexo = '$data[2]', area_id = '$data[3]', descripcion = '$data[5]' WHERE id = '$data[7]'");
		} else {
			$queryUpdate = $connection->query("UPDATE empleados SET nombre = '$data[0]', email = '$data[1]', sexo = '$data[2]', area_id = '$data[3]', boletin = $data[4], descripcion = '$data[5]' WHERE id = '$data[7]'");
		}
		return $queryUpdate;
	} catch (Exception $e) {
		return [];
	}
}
function deleteEmpleado($id){
	$connection = connectDB();
	try {
		$queryDelete = $connection->query("DELETE FROM empleados WHERE id = '$id'");
		$queryDeleteRolE = $connection->query("DELETE FROM empleado_rol WHERE empleado_id = '$id'");
		return $queryDelete;		
	} catch (Exception $e) {
		return [];		
	}	
}
?>