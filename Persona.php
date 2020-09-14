<?php

class Persona {
	private $id_alumno;
	private $nom_alumno;
	private $documento;
	private $celular;
	private $email;
	private $fecha_nacimiento;
	private $direccion;
	private $telefono_fijo;
	private $id_docente;
	private $nom_docente;
	private $telefono;
	private $correo;
	private $idcurso;
	private $nom_curso;
	private $docente_id_docente;
	private $id;
	private $nombre;
	private $parentesco;
	private $estudiante_id_alumno;
	private $idmateria;
	private $nom_materia;
	private $curso_idcurso;
	private $idcronograma;
	private $actividad;
	private $responsable;
	private $fecha_actividad;
	private $idtarea;
	private $descripcion_tarea;
	private $titulo_tarea;
	private $fecha_entrega;
	private $materia_idmateria1;
	private $periodo;
	private $idMatricula;
	private $Condicion;
	private $ano_lectivo;
	private $calendario;
	private $estado;
	public function __construct(){

	}

	public function __get($name){
		if (property_exists($this, $name)){
			return $this->$name;
		}
	}

	public function __set($name, $value){
		if (property_exists($this, $name)){
			$this->$name=$value;
		}
	}

}

?>