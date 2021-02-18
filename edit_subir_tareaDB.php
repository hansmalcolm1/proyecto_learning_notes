<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["idsubirtarea"]) && strlen($_GET["idsubirtarea"])){
	$idsubirtarea=$_GET["idsubirtarea"];
	$tarea_idtarea=$_GET["tarea_idtarea"];
	$sql = "select * from subir_tarea where idsubirtarea=:idsubirtarea";
	$result = $con->prepare($sql);
	$result->bindParam(":idsubirtarea", $idsubirtarea);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from tarea";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_subir_tareaDB.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
				<table>
					<tr>
						<td><a href="ListarSubirTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></td>
					</tr>
					<tr>
						<td>Id subir tarea</td>
						<td><input type="number" name="idsubirtarea" value="<?=$p->idsubirtarea;?>" readonly/></td>
					</tr>
					<tr>
						<td>Tarea</td>
						<td><select name="tarea_idtarea">
						<?php
						foreach($personas as $p2){
							if ($tarea_idtarea==$p2->idtarea){
								?>
								<option value="<?=$p2->idtarea;?>" selected><?=$p2->titulo_tarea;?></option>
								<?php
							}

							else{
								?>
								<option value="<?=$p2->idtarea;?>"><?=$p2->titulo_tarea;?></option>
								<?php
							}
						}
						?></select></td>
					</tr>
					<tr>
						<td>Entrega de la tarea</td>
						<td><input type="text" name="entrega_tarea" value="<?=$p->entrega_tarea;?>"/></td>
					</tr>
					<tr>
						<td>Usuario</td>
						<td><input type="text" name="usuario1" value="<?=$sesion;?>" readonly/></td>
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
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
