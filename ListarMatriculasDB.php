<?php
require "conexion.php";
require "Persona.php";
session_start();
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if($rol==1){
$sql = "select * from matricula";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
}
else{
$sql = "select * from matricula, registro_matricula, estudiante, usuario where Matricula_idMatricula=idMatricula and estudiante_id_alumno=id_alumno and id_usuario=id and usuario='".$_GET['sesion']."'";
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
		<button><a href="add_matriculaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar matrícula</a></button>
		<?php
	}
	?>
	
</center>
	<table  border="2" align="center" class="table table-striped">
		<tr>
			<th>Id matrícula</th>
			<th>Condición</th>
			<th>Año lectivo</th>
			<th>Calendario</th>
			<th>Estado</th>
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
				<td><?=$p->idMatricula;?></td>
				<td><?=$p->Condicion;?></td>
				<td><?=$p->ano_lectivo;?></td>
				<td><?=$p->calendario;?></td>
				<td><?=$p->estado;?></td>
				<?php
	if($rol==1){
		?>
		<td><button><a href="edit_matriculaDB.php?idMatricula=<?=$p->idMatricula;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar matrícula</a></button><br><button><a href="eliminar_matriculaDB.php?idMatricula=<?=$p->idMatricula;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
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