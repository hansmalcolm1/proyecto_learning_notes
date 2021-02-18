<?php
require "conexion.php";
require "Persona.php";
session_start();
$sesion=$_GET['sesion'];
$rol=$_GET['rol'];
if($rol==1){
$sql = "select * from subir_tarea, tarea, usuarios, estudiante where tarea_idtarea=idtarea and usuario1=usuario and id_us=id_usuario";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
}
elseif($rol==2){
$sql = "select * from subir_tarea, tarea, usuarios, estudiante where tarea_idtarea=idtarea and usuario1=usuario and id_us=id_usuario and usuario='".$_GET['sesion']."'";
$result = $con->prepare($sql);
$result->execute();
$personas = $result->fetchAll(PDO::FETCH_CLASS, "Persona");
}
elseif($rol==3){
$sql = "select * from subir_tarea, tarea, materia, curso, docente, usuarios where tarea_idtarea=idtarea and materia_idmateria1=idmateria and curso_idcurso=idcurso and curso.docente_id_docente=id_docente and id_us=id_usuario1 and usuario='".$_GET['sesion']."'";
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
    .sidenav {
			float: left;
  height: 100%;
  width: 250px;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 6px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
}
.sidenav table{
	background-color:black;
}
.sidenav h4, .sidenav th{
  color: white;
  background-color:black;
}
.sidenav a:hover {
  text-decoration: underline;
}

.container {
  margin-left: 300px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
 </style>
<div class="sidenav">
<h4><?=$sesion;?></h4>
<button><a href="index.php?cerrar_session=1" style="color:red" onclick="cerrar()">Cerrar Sesión</a></button><br><br>

  <table class="table table-striped"  border="2" align="center">
<thead>
<tr>
  <th>Módulo Docente</th>
</tr>
</thead>
<tbody>
<tr>
  <td><button><a href="ListarDocentesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Docentes</a></button></td>
 </tr>
 
  <tr>
  <td><button><a href="ListarCursosDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Cursos</a></button></td>
  </tr>
 <tr>
  <td><button><a href="ListarMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Materias</a></button></td>
</tr>

<tr>
<td><button><a href="ListarCronogramasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Cronogramas</a></button></td>
</tr>

<tr>
  <td><button><a href="ListarObservacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Observaciones</a></button></td>
</tr>

<tr>
  <td><button><a href="ListarDefinitivasPeriodosMateriasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Definitivas periodos materias</a></button></td>
</tr>



</tbody>
</table>
<br>

<table class="table table-striped"  border="2" align="center">
<thead>
<tr>
  <th>Módulo Estudiante</th>
</tr>
</thead>
<tbody>
<tr>
  <td><button><a href="ListarEstudiantesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiantes</a></button></td>
 </tr>
 <tr>
  <td><button><a href="ListarEstudianteHasCursoDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene curso</a></button></td>
  </tr>
  <tr>
  <td><button><a href="ListarEstudiantesHasEvaluacionDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene evaluación</a></button></td>
  </tr>
 <tr>
  <td><button><a href="ListarEstudiantesHasTareaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Estudiante tiene tarea</a></button></td>
</tr>

<tr>
<td><button><a href="ListarEvaluacionesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Evaluaciones</a></button></td>
</tr>

<tr>
<td><button><a href="ListarTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Tareas</a></button></td>
</tr>

<tr>
<td><button><a href="ListarSubirTareasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Subir tareas</a></button></td>
</tr>

<tr>
  <td><button><a href="ListarMatriculasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Matrículas</a></button></td>
</tr>

<tr>
  <td><button><a href="ListarRegistrosMatriculasDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Registros matrículas</a></button></td>
</tr>

<tr>
<td><button><a href="ListarAcudientesDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Acudientes</a></button></td>
</tr>

</tbody>
</table>
</div>
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
  if($rol==3){
    ?>
    <button><a href="inicioDocente.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Volver</a></button>
    <?php
  }
	?>
		<button><a style="color:green;" href="add_subir_tareaDB.php?sesion=<?=$sesion?>&rol=<?=$rol?>">Agregar subir tarea</a></button>
	
</center>
	<table   border="2" align="center" class="table table-striped" style="margin-left:250px; width:84.27%">
		<tr>
			<th>Id subir tarea</th>
			<th>Tarea</th>
			<th>Entrega tarea</th>
			<th>Estudiante</th>
			<th>Opciones</th>
			
		</tr>
		<?php
		foreach($personas as $p){
			?>
			<tr>
				<td><?=$p->idsubirtarea;?></td>
				<td><?=$p->titulo_tarea;?></td>
				<td><a href="<?=$p->entrega_tarea;?>"><?=$p->entrega_tarea;?></a></td>
				<td><?=$p->nom_alumno;?></td>
				<td><button><a style="color:yellow; background-color:black" href="edit_subir_tareaDB.php?idsubirtarea=<?=$p->idsubirtarea;?>&tarea_idtarea=<?=$p->tarea_idtarea;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Editar subir tarea</a></button><br><button><a style="color:red;" href="eliminar_subir_tareaDB.php?idsubirtarea=<?=$p->idsubirtarea;?>&sesion=<?=$sesion?>&rol=<?=$rol?>">Eliminar</a></button></td>
				
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