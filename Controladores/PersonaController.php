<?php 

include_once "../Modelos/Persona.php";

/**
 * 
 */
class PersonaController
{

	function obtenerDatos() {
		$persona = new Persona();
		$persona->setIdentificacion($_POST['numero_identificacion']);
		$persona->setNombres($_POST['nombres']);
		$persona->setApellidos($_POST['apellidos']);
		$persona->setCelular($_POST['celular']);
		$resultado = $persona->create();

		if($resultado) {
			header("Location: ../Vistas/Persona.php?error=" . $resultado['msj'] . "&clase=" . $resultado['clase']);
		}
	}
}


$PersonaController = new PersonaController();
$PersonaController->obtenerDatos();

?>