<?php
require "conexion.php";
require "Persona.php";
session_start();
$sql = "select * from acudientes";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
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
	
	<button><a href="inicio.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
</center>
	<table  border="2" align="center" class="table table-striped">
		<tr>
			<th>Id acudiente</th>
			<th>Documento</th>
			<th>Nombre del acudiente</th>
			<th>Parentesco</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Id alumno</th>
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->id;?></td>
				<td><?=$p->documento;?></td>
				<td><?=$p->nombre;?></td>
				<td><?=$p->parentesco;?></td>
				<td><?=$p->direccion;?></td>
				<td><?=$p->telefono;?></td>
				<td><?=$p->estudiante_id_alumno;?></td>
			</tr>
			<?php
		}
		?>
	</table>
	</div><br>
    
    
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