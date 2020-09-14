<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idtarea"]) && strlen($_GET["idtarea"])){
	$idtarea=$_GET["idtarea"];
	$materia_idmateria1=$_GET["materia_idmateria1"];
	$sql = "select * from tarea where idtarea=:idtarea";
	$result = $con->prepare($sql);
	$result->bindParam(":idtarea", $idtarea);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from materia";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
		</head>
		<body>
			<form action="salvar_tareaDB.php" method="POST">
				<table>
					<tr>
						<td>Id tarea</td>
						<td><input type="number" name="idtarea" value="<?=$p->idtarea;?>" readonly/></td>
					</tr>
					<tr>
						<td>Descripción de la tarea</td>
						<td><input type="text" name="descripcion_tarea" value="<?=$p->descripcion_tarea;?>"/></td>
					</tr>
					<tr>
						<td>Título de la tarea</td>
						<td><input type="text" name="titulo_tarea" value="<?=$p->titulo_tarea;?>"/></td>
					</tr>
					<tr>
						<td>Fecha de entrega</td>
						<td><input type="date" name="fecha_entrega" value="<?=$p->fecha_entrega;?>"/></td>
					</tr>
					<tr>
						<td>Materia</td>
						<td><select name="materia_idmateria1">
						<?php
						foreach($personas as $p2){
							if ($materia_idmateria1==$p2->idmateria){
								?>
								<option value="<?=$p2->idmateria;?>" selected><?=$p2->nom_materia;?></option>
								<?php
							}

							else{
								?>
								<option value="<?=$p2->idmateria;?>"><?=$p2->nom_materia;?></option>
								<?php
							}
						}
						?></select></td>
					</tr>
					<tr>
						<td>Periodo</td>
						<td><input type="number" name="periodo" value="<?=$p->periodo;?>"/></td>
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
	echo "<script>alert('El id tarea no es valido');
	window.location.href='ListarTareasDB.php'</script>";
}
?>
