<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idMatricula"]) && strlen($_GET["idMatricula"])){
	$idMatricula=$_GET["idMatricula"];
	$sql = "select * from matricula where idMatricula=:idMatricula";
	$result = $con->prepare($sql);
	$result->bindParam(":idMatricula", $idMatricula);
	$result->execute();
	$p = $result->fetchObject("Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
		</head>
		<body>
			<form action="salvar_matriculaDB.php" method="POST">
				<table>
					<tr>
						<td>Id matrícula</td>
						<td><input type="number" name="idMatricula" value="<?=$p->idMatricula;?>" readonly/></td>
					</tr>
					<tr>
						<td>Condición</td>
						<td><input type="text" name="Condicion" value="<?=$p->Condicion;?>"/></td>
					</tr>
					<tr>
						<td>Año lectivo</td>
						<td><input type="number" name="ano_lectivo" value="<?=$p->ano_lectivo;?>"/></td>
					</tr>
					<tr>
						<td>Calendario</td>
						<td><input type="text" name="calendario" value="<?=$p->calendario;?>"/></td>
					</tr>
					<tr>
						<td>Estado</td>
						<td><input type="text" name="estado" value="<?=$p->estado;?>"/></td>
					</tr>
					<tr>
						<td><input type="submit" value="Guardar" /></td>
					</tr>
				</table>
			</form>
		</body>
		</html>
		<?php

}
else{
	echo "<script>alert('El id matrícula no es valido');
	window.location.href='ListarMatriculasDB.php'</script>";
}
?>
