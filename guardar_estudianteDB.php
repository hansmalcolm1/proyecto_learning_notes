<?php
include("conexion.php");
include("Persona.php");
$sesion=$_POST['sesion'];
$rol=$_POST['rol'];
if(!($sesion==null) && !($sesion==null)){
if(isset($_POST["nom_alumno"]) && strlen($_POST["nom_alumno"])>0 &&
isset($_POST["documento"]) && strlen($_POST["documento"])>0 &&
isset($_POST["celular"]) && strlen($_POST["celular"])>0 &&
isset($_POST["email"]) && strlen($_POST["email"])>0 &&
isset($_POST["fecha_nacimiento"]) && strlen($_POST["fecha_nacimiento"])>0 &&
isset($_POST["direccion"]) && strlen($_POST["direccion"])>0 &&
isset($_POST["telefono_fijo"]) && strlen($_POST["telefono_fijo"])>0){
	$nom_alumno=$_POST["nom_alumno"];
	$documento=$_POST["documento"];
	$celular=$_POST["celular"];
	$email=$_POST["email"];
	$fecha_nacimiento=$_POST["fecha_nacimiento"];
	$direccion=$_POST["direccion"];
	$telefono_fijo=$_POST["telefono_fijo"];
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
	$user = substr(str_shuffle($permitted_chars), 0, 10);
	$password = md5($user);
	$sql = "insert into usuarios (usuario, password, rol_id) values (:usuario, :password, 2)";
	$result = $con->prepare($sql);
	$result->bindParam(":usuario", $user);
	$result->bindParam(":password", $password);
	$result->execute();
	$sql2 = "select * from usuarios order by id_us desc limit 1";
	$result2 = $con->prepare($sql2);
	$result2->execute();
	$result3 = $result2->fetchObject("Persona");
	$id_usuario = $result3->id_us;
	$sql3 = "insert into estudiante (nom_alumno, documento, celular, email, fecha_nacimiento, direccion, telefono_fijo, id_usuario) values (:nom_alumno, :documento, :celular, :email, :fecha_nacimiento, :direccion, :telefono_fijo, :id_usuario)";
	$result3 = $con->prepare($sql3);
	$result3->bindParam(":nom_alumno", $nom_alumno);
	$result3->bindParam(":documento", $documento);
	$result3->bindParam(":celular", $celular);
	$result3->bindParam(":email", $email);
	$result3->bindParam(":fecha_nacimiento", $fecha_nacimiento);
	$result3->bindParam(":direccion", $direccion);
	$result3->bindParam(":telefono_fijo", $telefono_fijo);
	$result3->bindParam(":id_usuario", $id_usuario);
	$result3->execute();
	$con=NULL;
	echo "<script>alert('Estudiante creado exitosamente');
	window.location.href='ListarEstudiantesDB.php?sesion=$sesion&rol=$rol'</script>";
}
else{
	echo "<script>alert('El nombre del alumno, el documento, el celular, el email, la fecha de nacimiento, la dirección, el teléfono fijo, el usuario y el curso son requeridos');
	window.location.href='ListarEstudiantesDB.php?sesion=$sesion&rol=$rol'</script>";
}
}
else{
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>