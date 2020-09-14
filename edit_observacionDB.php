<?php
require "conexion.php";
require "Persona.php";
if(isset($_GET["id_observa"]) && strlen($_GET["id_observa"])){
	$id_observa=$_GET["id_observa"];
	$registro_matricula_id=$_GET["registro_matricula_id"];
	$sql = "select * from observacion where id_observa=:id_observa";
	$result = $con->prepare($sql);
	$result->bindParam(":id_observa", $id_observa);
	$result->execute();
	$p = $result->fetchObject("Persona");

	$sql2 = "select * from registro_matricula, matricula where Matricula_idMatricula=idMatricula";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$personas = $result2->fetchAll(PDO::FETCH_CLASS, "Persona");
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
		</head>
		<body>
			<form action="salvar_observacionDB.php" method="POST">
				<table>
					<tr>
						<td>Id observación</td>
						<td><input type="number" name="id_observa" value="<?=$p->id_observa;?>" readonly/></td>
					</tr>
					<tr>
						<td>Observación</td>
						<td><input type="text" name="observacion" value="<?=$p->observacion;?>"/></td>
					</tr>
					<tr>
						<td>Fecha de la observación</td>
						<td><input type="date" name="Fecha_observa" value="<?=$p->Fecha_observa;?>"/></td>
					</tr>
					<tr>
						<td>Registro de la matrícula</td>
						<td><select name="registro_matricula_id">
						<?php
						foreach($personas as $p2){
							if($registro_matricula_id==$p2->id){
								?>
								<option value="<?=$p2->id;?>" selected><?=$p2->idMatricula;?> <?=$p2->Condicion;?></option>
								<?php
							}
							
							else{
								?>
								<option value="<?=$p2->id;?>"><?=$p2->idMatricula;?> <?=$p2->Condicion;?></option>
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
	echo "<script>alert('El id observación no es valido');
	window.location.href='ListarObservacionesDB.php'</script>";
}
?>