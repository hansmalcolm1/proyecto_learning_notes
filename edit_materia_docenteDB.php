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

	$sql2 = "select * from curso, docente, usuarios where docente_id_docente=id_docente and id_usuario1=id_us and usuario='".$_GET['sesion']."'";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

	$sql3 = "select * from docente, usuarios where id_usuario1=id_us and usuario='".$_GET['sesion']."'";
	$result3 = $con->prepare($sql3);
	$result3->execute();
	$p3 = $result3->fetchObject("Persona");
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
			<input type="hidden" name="docente_id_docente" value="<?=$p3->id_docente;?>"/>
				<table>
					<tr>
						<td><a href="ListarMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></td>
					</tr>
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
						<td><input type="text" name="docente_id_docente1" value="<?=$p3->nom_docente;?>" readonly/></td>
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
