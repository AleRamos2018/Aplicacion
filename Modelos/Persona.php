<?php 

include_once "Database/Database.php";

/**
 * 
 */
class Persona
{
	
	private $identificacion;
	private $nombres;
	private $apellidos;
	private $celular;
	private $conexion;
	const   NOMBRE_TABLA = 'usuario';


	public  function __construct()
	{
		$this->conexion = new Database();
	}



	// Getters - Sirven para que el objeto acceda algunas propiedades que necesita
	public function getIdentificacion() {
		return $this->identificacion;
	}

	public function getNombres() {
		return $this->nombres;
	}

	public function getApellidos() {
		return $this->apellidos;
	}

	public function getCelular() {
		return $this->celular;
	}


	// Setters

	public function setIdentificacion($ident) {
		$this->identificacion = $ident;
	}

	public function setNombres($nomb) {
		$this->nombres = $nomb;
	}

	public function setApellidos($apell) {
		$this->apellidos = $apell;
	}

	public function setCelular($cel) {
		$this->celular = $cel;
	}

	// CRUD
	// Creamos una function que guarda el usuario

	//C: Create - Crear
	public function create() {
		$conexion = $this->conexion->conectar();
		$query =  $this->conexion->prepararConsultaCreate(self::NOMBRE_TABLA, "numero_identificacion, nombres, apellidos, celular", "?,?,?,?");
		$query->bind_param('ssss', $this->identificacion, $this->nombres, $this->apellidos, $this->celular);

		$resultado = [];
		if($query->execute()) {
			$resultado['msj'] = "Usuario Creado Exitosamente";
			$resultado['clase'] = "exito";
		}
	
		$resultado['msj'] = $query->error;
	    $resultado['clase'] = "error";
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