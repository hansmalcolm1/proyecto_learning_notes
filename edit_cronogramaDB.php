<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idcronograma"]) && strlen($_GET["idcronograma"])){
	$docente_id_docente=$_GET["docente_id_docente"];
	$idcronograma=$_GET["idcronograma"];
	$sql = "select * from cronograma where idcronograma=:idcronograma";
	$result = $con->prepare($sql);
	$result->bindParam(":idcronograma", $idcronograma);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from docente";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_cronogramaDB.php" method="POST">
				<table>
					<tr>
						<td>Id cronograma</td>
						<td><input type="number" name="idcronograma" value="<?=$p->idcronograma;?>" readonly/></td>
					</tr>
					<tr>
						<td>Actividad</td>
						<td><input type="text" name="actividad" value="<?=$p->actividad;?>"/></td>
					</tr>
					<tr>
						<td>Responsable</td>
						<td><input type="text" name="responsable" value="<?=$p->responsable;?>"/></td>
					</tr>
					<tr>
						<td>Fecha de la actividad</td>
						<td><input type="date" name="fecha_actividad" value="<?=$p->fecha_actividad;?>"/></td>
					</tr>
					<tr>
						<td>Docente</td>
						<td><select name="docente_id_docente">
							<?php
							foreach($personas as $p2){
								if($docente_id_docente==$p2->id_docente){
									?>
									<option value="<?=$p2->id_docente;?>" selected><?=$p2->nom_docente;?></option>
									<?php
								}
								
								else{
									?>
									<option value="<?=$p2->id_docente;?>"><?=$p2->nom_docente;?></option>
									<?php
								}
							}
						?></select></td>
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
	echo "<script>alert('El id cronograma no es valido');
	window.location.href='ListarCronogramasDB.php'</script>";
}
?>
