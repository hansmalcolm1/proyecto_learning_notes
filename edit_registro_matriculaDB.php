<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id"]) && strlen($_GET["id"])){
	$id=$_GET["id"];
	$Matricula_idMatricula=$_GET["Matricula_idMatricula"];
	$estudiante_id_alumno=$_GET["estudiante_id_alumno"];
	$curso_idcurso=$_GET["curso_idcurso"];
	$sql = "select * from registro_matricula where id=:id";
	$result = $con->prepare($sql);
	$result->bindParam(":id", $id);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from matricula";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

	$sql3 = "select * from estudiante";
	$result3 = $con->prepare($sql3);
	$result3->execute();
	$personas2 = $result3->fetchAll(PDO::FETCH_CLASS, "Persona");

	$sql4 = "select * from curso";
	$result4 = $con->prepare($sql4);
	$result4->execute();
	$personas3 = $result4->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_registro_matriculaDB.php" method="POST">
				<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
				<table>
					<tr>
						<td><a href="ListarRegistrosMatriculasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></td>
					</tr>
					<tr>
						<td>Id registro matrícula</td>
						<td><input type="number" name="id" value="<?=$p->id;?>" readonly/></td>
					</tr>
					<tr>
						<td>Matrícula</td>
						<td><select name="Matricula_idMatricula">
							<?php
						foreach($personas as $p2){
							if($Matricula_idMatricula==$p2->idMatricula){
								?>
								<option value="<?=$p2->idMatricula;?>" selected><?=$p2->Condicion;?> <?=$p2->ano_lectivo;?> <?=$p2->calendario;?> <?=$p2->estado;?></option>
								<?php
							}

							else{
								?>
								<option value="<?=$p2->idMatricula;?>"><?=$p2->Condicion;?> <?=$p2->ano_lectivo;?> <?=$p2->calendario;?> <?=$p2->estado;?></option>
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
						<td>Curso</td>
						<td><select name="curso_idcurso">
							<?php
						foreach($personas3 as $p4){
							if($curso_idcurso==$p4->idcurso){
								?>
								<option value="<?=$p4->idcurso;?>" selected><?=$p4->nom_curso;?></option>
								<?php
							}

							else{
								?>
								<option value="<?=$p4->idcurso;?>"><?=$p4->nom_curso;?></option>
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
	echo "<script>alert('El id registro matrícula no es valido');
	window.location.href='ListarRegistrosMatriculasDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
