<?php 

include_once "../Modelos/Persona.php";

/**
 * 
 */
class PersonaController
{

	function obtenerDatos() {
		$persona = new Persona();
		$persona->set('identificacion', $_POST['numero_identificacion']);
		$persona->set('nombres', $_POST['nombres']);
		$persona->set('apellidos', $_POST['apellidos']);
		$persona->set('email', $_POST['email']);
		$persona->set('celular', $_POST['celular']);
		$resultado = $persona->create();

		if($resultado) {
			header("Location: ../Vistas/Persona.php?error=" . $resultado['msj'] . "&clase=" . $resultado['clase']);
		}
	}
}


$PersonaController = new PersonaController();
$PersonaController->obtenerDatos();

?>