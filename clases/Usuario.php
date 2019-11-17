<?php
	abstract class Usuario {
		protected $id;
		protected $nombre;
		protected $apellido;
		protected $email;
		protected $password;
		protected $avatar;
		protected $tipo;
		
		
		public function getId(){
			return $this->id;
		}
		public function getTipo(){
			return $this->tipo;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public function getApellido(){
			return $this->apellido;
		}

		public function setApellido($apellido){
			$this->apellido = $apellido;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getAvatar(){
			return $this->avatar;
		}

		public function setAvatar($avatar){
			$this->avatar = $avatar;
		}

		
	}