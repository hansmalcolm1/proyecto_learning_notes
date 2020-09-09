<?php
require "conexion.php";
require "Persona.php";
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
		</head>
		<body>
			<form action="salvar_acudienteDB.php" method="POST">
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
?>
