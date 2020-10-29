<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["idmateria"]) && strlen($_GET["idmateria"])){
	$idmateria=$_GET["idmateria"];
	$curso_idcurso=$_GET["curso_idcurso"];
	$docente_id_docente=$_GET["docente_id_docente"];
	$sql = "select * from materia where idmateria=:idmateria";
	$result = $con->prepare($sql);
	$result->bindParam(":idmateria", $idmateria);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from curso";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

	$sql3 = "select * from docente";
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
			<form action="salvar_materiaDB.php" method="POST">
				<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
				<table>
					<tr>
						<td>Id materia</td>
						<td><input type="number" name="idmateria" value="<?=$p->idmateria;?>" readonly/></td>
					</tr>
					<tr>
						<td>Nombre</td>
						<td><input type="text" name="nom_materia" value="<?=$p->nom_materia;?>"/></td>
					</tr>
					<tr>
						<td>Curso</td>
						<td><select name="curso_idcurso">
							<?php
						foreach($personas as $p2){
							if($curso_idcurso==$p2->idcurso){
								?>
								<option value="<?=$p2->idcurso;?>" selected><?=$p2->nom_curso;?></option>
								<?php
							}
							
							else{
								?>
								<option value="<?=$p2->idcurso;?>"><?=$p2->nom_curso;?></option>
								<?php
							}
						}
						?></select></td>
					</tr>
					<tr>
						<td>Docente</td>
						<td><select name="docente_id_docente">
							<?php
							foreach($personas2 as $p3){
								if($docente_id_docente==$p3->id_docente){
									?>
									<option value="<?=$p3->id_docente;?>" selected><?=$p3->nom_docente;?></option>
									<?php
								}
								
								else{
									?>
									<option value="<?=$p3->id_docente;?>"><?=$p3->nom_docente;?></option>
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
	echo "<script>alert('El id materia no es valido');
	window.location.href='ListarMateriasDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
