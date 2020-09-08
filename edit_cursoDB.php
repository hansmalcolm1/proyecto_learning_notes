<?php
require "conexion.php";
require "Persona.php";
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
	?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
		</head>
		<body>
			<form action="salvar_cursoDB.php" method="POST">
				<table>
					<tr>
						<td>Id curso</td>
						<td><input type="text" name="idcurso" value="<?=$p->idcurso;?>" readonly/></td>
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
?>
