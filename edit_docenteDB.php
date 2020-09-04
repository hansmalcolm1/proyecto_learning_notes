<?php
require "conexion.php";
require "Persona.php";
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
		</head>
		<body>
			<form action="salvar_docenteDB.php" method="POST">
				<table>
					<tr>
						<td>Id docente</td>
						<td><input type="text" name="id_docente" value="<?=$p->id_docente;?>"/></td>
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
?>
