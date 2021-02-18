<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if($rol==1){
$sql = "select * from materia";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from estudiante";
$result2 = $con->prepare($sql2);
$result2->execute();
$personas2 = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");
}
elseif($rol==3){
$sql = "select * from materia, curso, docente, usuarios where curso_idcurso=idcurso and materia.docente_id_docente=id_docente and id_usuario1=id_us and usuario='".$_GET['sesion']."'";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from estudiante, estudiante_has_curso, curso, docente, usuarios where estudiante_id_alumno=id_alumno and curso_idcurso=idcurso and docente_id_docente=id_docente and id_usuario1=id_us and usuario='".$_GET['sesion']."'";
$result2 = $con->prepare($sql2);
$result2->execute();
$personas2 = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");
}
if(!($sesion==null) && !($sesion==null)){

?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8" />

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	</head>
	<body>
	<br><br>
		<form action="guardar_definitivas_periodo_materiaDB.php" method="POST">
			<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        	<a href="ListarDefinitivasPeriodosMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a>
            <div class="card">
			<table>
				<tr>
					<td>Nota período 1</td>
					<td><input type="number" step="any" name="nota_periodo_1" /></td>
				</tr>
				<tr>
					<td>Nota 2</td>
					<td><input type="number" step="any" name="nota2" /></td>
				</tr>
				<tr>
					<td>Nota 3</td>
					<td><input type="number" step="any" name="nota3" /></td>
				</tr>
				<tr>
					<td>Nota 4</td>
					<td><input type="number" step="any" name="nota4" /></td>
				</tr>
				<tr>
					<td>Definitiva del período</td>
					<td><input type="number" step="any" name="def_periodo" /></td>
				</tr>
				<tr>
					<td>Materia</td>
					<td><select name="materia_idmateria">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->idmateria;?>"><?=$p->nom_materia;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Estudiante</td>
					<td><select name="estudiante_id_alumno">
						<?php
					foreach($personas2 as $p2){
						?>
						<option value="<?=$p2->id_alumno;?>"><?=$p2->nom_alumno;?></option>
						<?php
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
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>