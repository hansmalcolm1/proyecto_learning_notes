<?php
require "conexion.php";
require "Persona.php";
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_GET["id"]) && strlen($_GET["id"])){
	$id=$_GET["id"];
	$estudiante_id_alumno=$_GET["estudiante_id_alumno"];
	$sql = "select * from acudientes where id=:id";
	$result = $con->prepare($sql);
	$result->bindParam(":id", $id);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from estudiante";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$persona = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8"/>

			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

		</head>
		<body>
			<form action="salvar_acudienteDB.php" method="POST">
				<input type="hidden" name="sesion" value="<?=$sesion?>"/>
			<input type="hidden" name="rol" value="<?=$rol?>"/>
				<table>
					<tr>
						<td>Id acudiente</td>
						<td><input type="number" name="id" value="<?=$p->id;?>" readonly/></td>
					</tr>
					<tr>
						<td>Documento</td>
						<td><input type="number" name="documento" value="<?=$p->documento;?>"/></td>
					</tr>
					<tr>
						<td>Nombre</td>
						<td><input type="text" name="nombre" value="<?=$p->nombre;?>"/></td>
					</tr>
					<tr>
						<td>Parentesco</td>
						<td><input type="text" name="parentesco" value="<?=$p->parentesco;?>"/></td>
					</tr>
					<tr>
						<td>Dirección</td>
						<td><input type="text" name="direccion" value="<?=$p->direccion;?>"/></td>
					</tr>
					<tr>
						<td>Teléfono</td>
						<td><input type="number" name="telefono" value="<?=$p->telefono;?>"/></td>
					</tr>
					<tr>
						<td>Estudiante</td>
						<td>
							<select name="estudiante_id_alumno">
							<?php
							foreach($persona as $p2){
								if($estudiante_id_alumno==$p2->id_alumno){
									?>
									<option value="<?=$p2->id_alumno;?>" selected><?=$p2->nom_alumno;?></option>
									<?php
								}
								
								else{
									?>
									<option value="<?=$p2->id_alumno;?>"><?=$p2->nom_alumno;?></option>
									<?php
								}
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
	echo "<script>alert('El id acudiente no es valido');
	window.location.href='ListarAcudientesDB.php'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";
}
?>
