<?php 

include_once "Database/Database.php";

/**
 * 
 */
class Persona
{
	//Attributos
	private $identificacion;
	private $nombres;
	private $apellidos;
	private $email;
	private $celular;

	// Info Database
	private $conexion;
	const   NOMBRE_TABLA = 'usuario';


	public  function __construct()
	{
		$this->conexion = new Database();
	}



	// Getters - Sirven para que el objeto acceda algunas propiedades que necesita

	public function get($attr) {
		return $this->$attr;
	}

	// Setters
	public function set($attr, $value) {
		$this->$attr = $value;
	}

	// CRUD
	// Creamos una function que guarda el usuario

	//C: Create - Crear
	public function create() {
		$conexion = $this->conexion->conectar();
		$camposYValores = [
				"numero_identificacion" => "'" . $this->identificacion .  "'" ,
				"nombres" =>  "'" . $this->nombres . "'",
				"apellidos" =>  "'" . $this->apellidos . "'",
				"celular" =>  "'" . $this->celular . "'",
				"email" => "'" . $this->email . "'"
		];

		$query = $this->conexion->prepararConsultaCreate(self::NOMBRE_TABLA, $camposYValores);
		if (mysqli_query($conexion, $query)) {
			$resultado['msj'] = "Usuario Creado Exitosamente";
			$resultado['clase'] = "exito";
 
		} else {
			 $resultado['msj'] = mysqli_error($conexion);
	   		 $resultado['clase'] = "error";
		}
		
		return $resultado;
	}

	// R: Read - Leer - Consultar
	public function read() {
		$conexion = $this->conexion->conectar();
        $query =  $this->conexion->prepararConsultaRead(self::NOMBRE_TABLA);
        $resultado = $conexion->query($query);
        $resultado->fetch_all(MYSQLI_ASSOC);
        mysqli_close($conexion);
        return $resultado;
	}

	// R: Read por id - Leer - Consultar
	public function readById() {
		$conexion = $this->conexion->conectar();

	}

    // U: Update por id - Actualizar 
	public function update() {
		$conexion = $this->conexion->conectar();

	}

    // D: Boorar por id - Borrar 
	public function delete() {
		$conexion = $this->conexion->conectar();

	}

}

 ?>