<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["idcurso"]) && strlen($_GET["idcurso"])){
	$idcurso=$_GET["idcurso"];
	$docente_id_docente=$_GET["docente_id_docente"];
	$sql = "select * from curso where idcurso=:idcurso";
	$result = $con->prepare($sql);
	$result->bindParam(":idcurso", $idcurso);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from docente";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$persona = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");

	$sql3 = "select * from estudiante";
	$result3 = $con->prepare($sql3);
	$result3->execute();
	$persona2 = $result3->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_cursoDB.php" method="POST">
				<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
				<table>
					<tr>
						<td>Id curso</td>
						<td><input type="number" name="idcurso" value="<?=$p->idcurso;?>" readonly/></td>
					</tr>
					<tr>
						<td>Nombre</td>
						<td><input type="text" name="nom_curso" value="<?=$p->nom_curso;?>"/></td>
					</tr>
					<tr>
						<td>Docente</td>
						<td><select name="docente_id_docente">
							<?php
							foreach($persona as $p2){
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
							?>
						</select>							
						</td>
					</tr>
					<tr>
						<td>Estudiantes</td>
						<td><select name="docente_id_docente">
							<?php
							foreach($persona2 as $p3){
									?>
									<input type="checkbox" name="estudiantes[]" value="<?=$p3->id_alumno;?>"><?=$p3->nom_alumno;?></option>
									<?php
							}
							?>
						</select>							
						</td>
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
	echo "<script>alert('El id curso no es valido');
	window.location.href='ListarCursosDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
