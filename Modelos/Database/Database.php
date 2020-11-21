<?php 

/**
 * 
 */
class Database
{
	const HOST = 'localhost';
	const BASE_DE_DATOS = 'inventario';
	const USUARIO = 'root';
	const PASS = '';

	public function conectar() {
		$conexion = mysqli_connect(self::HOST, self::USUARIO, self::PASS, self::BASE_DE_DATOS);

		if($conexion) {
			return $conexion;
		} 
		return null;
	}

	//Camel Case  - Letras en camello

	// Crear
	public  function prepararConsultaCreate($nombreTabla, $camposYValores) {
		$query =  "INSERT INTO " . $nombreTabla;
		$columnas = "(" . implode(", ", array_keys($camposYValores)) . ")";
		$valores = " VALUES(" . implode(", ", array_values($camposYValores)) . ")";
		$query .= $columnas . $valores;
	 	return $query;
	}

	// Read - Leer - Traer la lista de registros
	public  function prepararConsultaRead($nombreTabla) {
		$query = "SELECT * FROM  " . $nombreTabla . ";";
		return $query;
	}

	// Read - leer - Leer por identificación
	public  function prepararConsultaReadById($nombreTabla, $campo, $id) {
		$conexion = $this->conectar();
		$query = $conexion->prepare("SELECT * FROM " . $nombreTabla . " WHERE " . $campo . " = '" . $id ."';");
		return $query;
	}

	// Update - Actualizar 
	public  function prepararConsultaUpdate($nombreTabla, $campos, $campoppal, $id) {
		$conexion = $this->conectar();
		$query = $conexion->prepare("UPDATE " . $nombreTabla . " SET " . $campos . " WHERE $campoppal = '". $id ."';");
		return $query;
	}

	// D - Delete - Borrar 
	public  function prepararConsultaDelete($nombreTabla, $campo, $id) {
		$conexion = $this->conectar();
		$query = $conexion->prepare("DELETE FROM " . $nombreTabla . " WHERE " . $campo . " = '" . $id . "';");
		return $query;
	}
}

 ?>