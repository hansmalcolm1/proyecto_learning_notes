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
	private $id_usuario;
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
	private $id_observa;
	private $observacion;
	private $Fecha_observa;
	private $registro_matricula_id;
	private $Matricula_idMatricula;
	private $promedio;
	private $idevaluacion;
	private $descripcion_evaluacion;
	private $titulo_evaluacion;
	private $fecha_evaluacion;
	private $idcalificacion;
	private $nota_periodo_1;
	private $nota2;
	private $nota3;
	private $nota4;
	private $def_periodo;
	private $materia_idmateria;
	private $id_est_tarea;
	private $tarea_idtarea;
	private $nota;
	private $id_est_evalua;
	private $evaluacion_idevaluacion;
	private $id_us;
	private $usuario;
	private $password;
	private $rol_id;
	private $idsubirtarea;
	private $entrega_tarea;
	private $idcontenidotarea;
	private $tipo;
	private $tamaño;
	private $contenido;
	private $identrega_tarea;
	private $usuario1;
	private $id_usuario1;
	private $numero_documento;
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