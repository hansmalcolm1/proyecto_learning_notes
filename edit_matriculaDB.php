<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
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

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_matriculaDB.php" method="POST">
				<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
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
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
