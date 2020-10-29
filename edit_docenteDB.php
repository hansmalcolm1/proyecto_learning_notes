<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id_docente"]) && strlen($_GET["id_docente"])){
	$id_docente=$_GET["id_docente"];
	$sql = "select * from docente where id_docente=:id_docente";
	$result = $con->prepare($sql);
	$result->bindParam(":id_docente", $id_docente);
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
			<form action="salvar_docenteDB.php" method="POST">
				<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
				<table>
					<tr>
						<td>Id docente</td>
						<td><input type="number" name="id_docente" value="<?=$p->id_docente;?>" readonly/></td>
					</tr>
					<tr>
						<td>Nombre</td>
						<td><input type="text" name="nom_docente" value="<?=$p->nom_docente;?>"/></td>
					</tr>
					<tr>
						<td>Dirección</td>
						<td><input type="text" name="direccion" value="<?=$p->direccion;?>"/></td>
					</tr>
					<tr>
						<td>Teléfono</td>
						<td><input type="number" name="telefono" value="<?=$p->telefono;?>"/></td>
					</tr>
					<tr>
						<td>Correo</td>
						<td><input type="email" name="correo" value="<?=$p->correo;?>"/></td>
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
	echo "<script>alert('El id docente no es valido');
	window.location.href='ListarDocentesDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
