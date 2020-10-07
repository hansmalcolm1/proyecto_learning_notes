<?php

class Usuario {
	private $id;
	private $usuario;
	private $password;
	private $rol_id;
	private $nombre;
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