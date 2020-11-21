<?php 
include_once "../Modelos/Persona.php";
$persona = new Persona();
$personas = $persona->read();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Página Persona</title>
	<link rel="stylesheet" type="text/css" href="../Estilos/persona.css">
</head>
<body>
	
<center><h1>Personas</h1><form action="../Controladores/PersonaController.php" method="post">
	<table>
		<tr>
			<td>
				<label>Identificación</label>
			</td>
			<td>
				<input type="text" name="numero_identificacion">
			</td>
		</tr>
		<tr>
			<td>
				<label>Nombres</label> 
			</td>
			<td>
				<input type="text" name="nombres">
			</td>
		</tr>
		<tr>
			<td>
				<label>Apellidos</label>
			</td>
			<td>
				<input type="text" name="apellidos">
			</td>
		</tr>
		<tr>
			<td>
				<label>Celular</label>
			</td>
			<td>
				<input type="text" name="celular">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="" value="enviar">
			</td>
		</tr>
	</table>
</form>

<h3>
	<span class="<?= @$_GET['clase']; ?>"><?= @$_GET['error']; ?></span>
</h3>
	<table>
		<tr>
			<thead>
				<tr>
					<th>Identificación</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Celular</th>
				</tr>
			</thead>
		</tr>
		<tbody>
			<?php 
			foreach($personas as $persona) {
				echo "<tr>";
					echo "<td>" . $persona['numero_identificacion'] . "</td>";
					echo "<td>" . $persona['nombres'] ."</td>";
					echo "<td>" . $persona['apellidos'] ."</td>"; 
					echo "<td>" . $persona['celular'] . "</td>";
				echo "</tr>"; 
			}

			?>
		</tbody>
	</table>
</center>

</body>
</html>