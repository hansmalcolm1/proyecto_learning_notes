<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idevaluacion"]) && strlen($_GET["idevaluacion"])){
	$idevaluacion=$_GET["idevaluacion"];
	$materia_idmateria1=$_GET["materia_idmateria1"];
	$sql = "select * from evaluacion where idevaluacion=:idevaluacion";
	$result = $con->prepare($sql);
	$result->bindParam(":idevaluacion", $idevaluacion);
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
			<form action="salvar_evaluacionDB.php" method="POST">
				<table>
					<tr>
						<td>Id evaluación</td>
						<td><input type="number" name="idevaluacion" value="<?=$p->idevaluacion;?>" readonly/></td>
					</tr>
					<tr>
						<td>Descripción de la evaluación</td>
						<td><input type="text" name="descripcion_evaluacion" value="<?=$p->descripcion_evaluacion;?>"/></td>
					</tr>
					<tr>
						<td>Título de la evaluación</td>
						<td><input type="text" name="titulo_evaluacion" value="<?=$p->titulo_evaluacion;?>"/></td>
					</tr>
					<tr>
						<td>Fecha de la evaluación</td>
						<td><input type="date" name="fecha_evaluacion" value="<?=$p->fecha_evaluacion;?>"/></td>
					</tr>
					<tr>
						<td>Materia</td>
						<td><select name="materia_idmateria1">
							<?php
						foreach($personas as $p2){
							if($materia_idmateria1==$p2->idmateria){
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
	echo "<script>alert('El id evaluación no es valido');
	window.location.href='ListarEvaluacionesDB.php'</script>";
}
?>
