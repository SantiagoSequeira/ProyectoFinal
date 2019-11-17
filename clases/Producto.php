<?php

	class Producto {
		private $id;
		private $nombre;
		private $precio;
		private $marca;
		private $categoria;
		private $descripcion;
		private $stock;
		private $imagen;
		
		/*public function __construct ($nombre,$precio,$marca = "", $descripcion = "", $stock = 0, $categoria = 1){
			$this->setNombre($nombre);
			$this->setDescripcion($descripcion);
			$this->setMarca($marca);
			$this->setPrecio($precio);
			$this->setStock($stock);
			$this->setCategoria($categoria);
		}*/
		public function getId(){
			return $this->id;
		}

		public function setId(int $id){
			$this->id = $id;
		}

		public function getNombre(){
			return $this->nombre;
		}
				
		public function setImagen(string $imagen){
			$this->imagen = $imagen;
		}

		public function getImagen(){
			return $this->imagen;
		}
		
		public function setNombre(string $nombre){
			$this->nombre = $nombre;
		}

		public function getPrecio(){
			return $this->precio;
		}

		public function setPrecio(float $precio){
			$this->precio = $precio;
		}

		public function getMarca(){
			return $this->marca;
		}

		public function setMarca(string $marca){
			$this->marca = $marca;
		}

		public function getCategoria(){
			return $this->categoria;
		}

		public function setCategoria(int $categoria){
			$this->categoria = $categoria;
		}

		public function getDescripcion(){
			return $this->descripcion;
		}

		public function setDescripcion(string $descripcion){
			$this->descripcion = $descripcion;
		}

		public function getStock(){
			return $this->stock;
		}

		public function setStock(int $stock){
			$this->stock = $stock;
		}
	}