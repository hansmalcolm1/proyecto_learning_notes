<?php
include("conexion.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["id_alumno"]) && strlen($_POST["id_alumno"])>0 &&
isset($_POST["nom_alumno"]) && strlen($_POST["nom_alumno"])>0 &&
isset($_POST["documento"]) && strlen($_POST["documento"])>0 &&
isset($_POST["celular"]) && strlen($_POST["celular"])>0 &&
isset($_POST["email"]) && strlen($_POST["email"])>0 &&
isset($_POST["fecha_nacimiento"]) && strlen($_POST["fecha_nacimiento"])>0 &&
isset($_POST["direccion"]) && strlen($_POST["direccion"])>0 &&
isset($_POST["telefono_fijo"]) && strlen($_POST["telefono_fijo"])>0 &&
isset($_POST["id_usuario"]) && strlen($_POST["id_usuario"])>0){
	$id_alumno=$_POST["id_alumno"];
	$nom_alumno=$_POST["nom_alumno"];
	$documento=$_POST["documento"];
	$celular=$_POST["celular"];
	$email=$_POST["email"];
	$fecha_nacimiento=$_POST["fecha_nacimiento"];
	$direccion=$_POST["direccion"];
	$telefono_fijo=$_POST["telefono_fijo"];
	$id_usuario=$_POST["id_usuario"];
	$sql = "update estudiante set id_alumno=:id_alumno, nom_alumno=:nom_alumno, documento=:documento, celular=:celular, email=:email, fecha_nacimiento=:fecha_nacimiento, direccion=:direccion, telefono_fijo=:telefono_fijo, id_usuario=:id_usuario where id_alumno=:id_alumno";
	$result = $con->prepare($sql);
	$result->bindParam(":id_alumno", $id_alumno);
	$result->bindParam(":nom_alumno", $nom_alumno);
	$result->bindParam(":documento", $documento);
	$result->bindParam(":celular", $celular);
	$result->bindParam(":email", $email);
	$result->bindParam(":fecha_nacimiento", $fecha_nacimiento);
	$result->bindParam(":direccion", $direccion);
	$result->bindParam(":telefono_fijo", $telefono_fijo);
	$result->bindParam(":id_usuario", $id_usuario);
	$result->execute();
	$con=NULL;
	echo "<script>alert('Estudiante actualizado exitosamente');
	window.location.href='ListarEstudiantesDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El id alumno, el nombre del alumno, el documento, el celular, el email, la fecha de nacimiento, la dirección, el teléfono fijo y el usuario son requeridos');
	window.location.href='ListarEstudiantesDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>