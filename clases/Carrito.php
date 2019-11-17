<?php 
	class Carrito {
		private $productos;
		
		public function agregarProducto (Producto $prod){
			if(count($this->productos)){
				foreach($this->productos as $key => $producto){
					if($producto["Producto"]->getId() == $prod->getId()){
						$cant = $producto["Cantidad"] + 1;
						if($cant <= $prod->getStock()){
							$this->productos [$key] = ["Producto" => $prod,"Cantidad" => $cant];
							return;
						} else {
							return "No hay stock";
						}
					}
				}
				if($prod->getStock() > 0){
					$this->productos [] = ["Producto" => $prod,"Cantidad" =>1];
					return;
				} else {
					return "No hay stock!";
				}
				
				
			} else {
				if($prod->getStock() > 0){
					$this->productos [] = ["Producto" => $prod,"Cantidad" =>1];
					return;
				} else {
					return "No hay stock!";
				}
			} 
		}
		public function sumarProducto (int $prod){
			if(count($this->productos)){
				foreach($this->productos as $key => $producto){
					if($producto["Producto"]->getId() == $prod){
						if($producto["Producto"]->getStock() > $producto["Cantidad"]){
							$cant = $producto["Cantidad"] + 1;
							$this->productos[$key] = ["Producto" => $producto["Producto"],"Cantidad" => $cant];
						}
					}
				}		
			} else {
				return false;
			}
			
		}
		public function quitarProducto (int $prod){
			if(count($this->productos)){
				foreach($this->productos as $key => $producto){
					if($producto["Producto"]->getId() == $prod){
						array_splice($this->productos, $key, 1);
					}
				}		
			} else {
				return false;
			}
			
		}
		public function restarProducto (int $prod){
			if(count($this->productos)){
				foreach($this->productos as $key => $producto){
					if($producto["Producto"]->getId() == $prod){
						if($producto["Cantidad"] > 1){
							$cant = $producto["Cantidad"] - 1;
							$this->productos [$key] = ["Producto" => $producto["Producto"],"Cantidad" => $cant];
						}
					}
				}		
			} else {
				return false;
			}
			
		}
		public function obtenerTotal(){
			$total = 0;
			if(count($this->productos)){
				foreach($this->productos as $producto){
					$total += $producto["Producto"]->getPrecio() * $producto["Cantidad"];
				}
				return $total;
			}
			
		}
		public function cantidadProductos (){
			return count($this->productos);
		}
		public function getProductos () {
			return $this->productos;
		}
	}