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