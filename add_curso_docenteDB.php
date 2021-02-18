<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
$sql = "select * from docente, usuarios where id_usuario1=id_us and usuario='".$_GET['sesion']."'";
$result = $con->prepare($sql);
$result->execute();
$p = $result->fetchObject("Persona");


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
		<form action="guardar_cursoDB.php" method="POST">
			<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
			<input type="hidden" name="docente_id_docente" value="<?=$p->id_docente;?>"/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        	<a href="ListarCursosDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a>
            <div class="card">
			<table>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="nom_curso" /></td>
				</tr>
				<tr>
					<td>Docente</td>
					<td><input type="text" name="docente_id_docente1" value="<?=$p->nom_docente;?>" readonly/></td>
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