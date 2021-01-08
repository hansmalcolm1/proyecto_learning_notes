<?php
require "conexion.php";
require "Persona.php";
session_start();
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if($rol==1){
$sql = "select * from estudiante_has_curso, estudiante, curso where estudiante_id_alumno=id_alumno and curso_idcurso=idcurso";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
}
else{
$sql = "select * from curso, docente, estudiante_has_curso, estudiante, usuario where docente_id_docente=id_docente and curso_idcurso=idcurso and estudiante_id_alumno=id_alumno and id_usuario=id and usuario='".$_GET['sesion']."'";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
}
if(!($sesion==null) && !($sesion==null)){
?>
<DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>
	
<br>
    
    <style type="text/css">
    table th {
        text-align: center;
        background-color:yellow;
    }
    .table  {
        text-align: center;
        background-color:lightgreen;
    }
    .container-fluid{
        background-color:lightblue;
		background-size: cover;
    }
 </style>

<div class="container-fluid">
	<center>
		<?php
	if($rol==1){
		?>
		<button><a href="inicioAdmin.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
		<?php
	}
	if($rol==2){
		?>
		<button><a href="inicio.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
		<?php
	}
	?>
	<?php
	if($rol==1){
		?>
		<button><a href="add_estudiante_has_cursoDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar estudiante has curso</a></button>
		<?php
	}
	?>
	
</center>
	<table  border="2" align="center" class="table table-striped">
		<tr>
			<th>Estudiante</th>
			<th>Curso</th>
			<th>Nota</th>
			<th>Observación</th>
			<?php
	if($rol==1){
		?>
		<th>Opciones</th>
		<?php
	}
	?>
			
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->estudiante_id_alumno;?></td>
				<td><?=$p->curso_idcurso;?></td>
				<td><?=$p->nota;?></td>
				<td><?=$p->observacion;?></td>
				<?php
	if($rol==1){
		?>
		<td><button><a href="edit_estudiante_has_cursoDB.php?estudiante_id_alumno=<?=$p->estudiante_id_alumno;?>&docente_id_docente=<?=$p->docente_id_docente;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar estudiante has curso</a></button><br><button><a href="eliminar_estudiante_has_cursoDB.php?estudiante_id_alumno=<?=$p->estudiante_id_alumno;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
		<?php
	}
	?>
				
			</tr>
			<?php
		}
		?>
	</table>
	</div>
</body>
</html>
<?php
}
else{
	session_unset();

	session_destroy();
	echo "<script>alert('No tiene permisos');
	window.location.href='index.php'</script>";

}
?>