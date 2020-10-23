<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["idcalificacion"]) && strlen($_GET["idcalificacion"])){
	$idcalificacion=$_GET["idcalificacion"];
	$materia_idmateria=$_GET["materia_idmateria"];
	$estudiante_id_alumno=$_GET["estudiante_id_alumno"];
	$sql = "select * from definitivas_periodo_materia where idcalificacion=:idcalificacion";
	$result = $con->prepare($sql);
	$result->bindParam(":idcalificacion", $idcalificacion);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from materia";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

	$sql3 = "select * from estudiante";
	$result3 = $con->prepare($sql3);
	$result3->execute();
	$personas2 = $result3->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_definitivas_periodo_materiaDB.php" method="POST">
				<table>
					<tr>
						<td>Id calificación</td>
						<td><input type="number" name="idcalificacion" value="<?=$p->idcalificacion;?>" readonly/></td>
					</tr>
					<tr>
						<td>Nota del periodo 1</td>
						<td><input type="number" step="any" name="nota_periodo_1" value="<?=$p->nota_periodo_1;?>"/></td>
					</tr>
					<tr>
						<td>Nota 2</td>
						<td><input type="number" step="any" name="nota2" value="<?=$p->nota2;?>"/></td>
					</tr>
					<tr>
						<td>Nota 3</td>
						<td><input type="number" step="any" name="nota3" value="<?=$p->nota3;?>"/></td>
					</tr>
					<tr>
						<td>Nota 4</td>
						<td><input type="number" step="any" name="nota4" value="<?=$p->nota4;?>"/></td>
					</tr>
					<tr>
						<td>Definitiva del periodo</td>
						<td><input type="number" step="any" name="def_periodo" value="<?=$p->def_periodo;?>"/></td>
					</tr>
					<tr>
						<td>Materia</td>
						<td><select name="materia_idmateria">
							<?php
						foreach($personas as $p2){
							if($materia_idmateria==$p2->idmateria){
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
						<td>Estudiante</td>
						<td><select name="estudiante_id_alumno">
							<?php
						foreach($personas2 as $p3){
							if($estudiante_id_alumno==$p3->id_alumno){
								?>
								<option value="<?=$p3->id_alumno;?>" selected><?=$p3->nom_alumno;?></option>
								<?php
							}

							else{
								?>
								<option value="<?=$p3->id_alumno;?>"><?=$p3->nom_alumno;?></option>
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
	echo "<script>alert('El id calificación no es valido');
	window.location.href='ListarDefinitivasPeriodosMateriasDB.php'</script>";
}
?>
