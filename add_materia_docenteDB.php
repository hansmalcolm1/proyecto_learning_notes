<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
$sql = "select * from curso, docente, usuarios where docente_id_docente=id_docente and id_usuario1=id_us and usuario='".$_GET['sesion']."'";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");

$sql2 = "select * from docente, usuarios where id_usuario1=id_us and usuario='".$_GET['sesion']."'";
$result2 = $con->prepare($sql2);
$result2->execute();
$p2 = $result2->fetchObject("Persona");

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
		<form action="guardar_materiaDB.php" method="POST">
			<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
			<input type="hidden" name="docente_id_docente" value="<?=$p2->id_docente;?>"/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        	<a href="ListarMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a>
            <div class="card">
			<table>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nom_materia" /></td>
				</tr>
				<tr>
					<td>Curso</td>
					<td><select name="curso_idcurso">
						<?php
					foreach($personas as $p){
						?>
						<option value="<?=$p->idcurso;?>"><?=$p->nom_curso;?></option>
						<?php
					}
					?></select></td>
				</tr>
				<tr>
					<td>Docente</td>
					<td><input type="text" name="docente_id_docente1" value="<?=$p2->nom_docente;?>" readonly/></td>
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