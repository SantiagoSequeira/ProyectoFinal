<?php
	abstract class Core {
		static function getProductos(int $base, int $limit=3, string $search=""){
			$query = DB::open()->prepare("SELECT productos.id, productos.nombre, precio, marca, categoria, descripcion, stock, imagen FROM productos LEFT JOIN marcas ON productos.marca = marcas.id LEFT JOIN categorias ON productos.categoria = categorias.id WHERE productos.nombre LIKE :search OR marcas.nombre LIKE :search OR categorias.nombre LIKE :search LIMIT :max OFFSET :base");
			$query->bindValue("search","%$search%");
			$query->bindValue("max",(int) $limit, PDO::PARAM_INT);
			$query->bindValue("base", (int) $base, PDO::PARAM_INT);
			$query->execute();
			$res = $query->fetchAll(PDO::FETCH_CLASS, "Producto");
			return $res;
		}
		static function isLogIn (){
			if (isset($_SESSION["Usuario"])){
				return "usuario";
			} else if (isset($_SESSION["Administrador"])){
				return "administrador";
			} else {
				return false;
			}
		}
		static function redir($location = "index"){
			header("Location:  " . $location . ".php");
		}
		static function getProductoPorID(int $id){
			$query = DB::open()->prepare("SELECT * FROM productos WHERE id = :id");
			$query->bindValue("id", $id);
			$query->execute();
			$res = $query->fetchObject("Producto");
			return $res;
		}
		static function getCantidadDeProductos (string $search=""){
			$query = DB::open()->prepare("SELECT count(id) FROM productos WHERE nombre LIKE :search OR marca LIKE :search");
			$query->bindValue("search","%$search%");
			$query->execute();
			$res = $query->fetch();
			return (int) $res[0];
		}
		static function getCategorias(){
			$query = DB::open()->prepare("SELECT id,nombre FROM categorias ORDER BY nombre");
			$query->execute();
			$res = $query->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		static function getMarcas(){
			$query = DB::open()->prepare("SELECT id,nombre FROM marcas ORDER BY nombre");
			$query->execute();
			$res = $query->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}
		static function getMarca(int $id){
			$query = DB::open()->prepare("SELECT id,nombre FROM marcas WHERE id = :id");
			$query->bindValue("id", $id);
			$query->execute();
			$res = $query->fetch(PDO::FETCH_ASSOC);
			return $res["nombre"];
		}
	}
