<?php
	class Administrador extends Usuario{
		public function agregarProducto(Array $producto){
			$nombre = $producto["nombre"];
			$precio = $producto["precio"];
			$marca = $producto["marca"];
			$addMarca = $producto["addMarc"];
			$categoria = $producto["categoria"];
			$addCategoria = $producto["addCat"];
			$descripcion = $producto["descripcion"];
			$stock = $producto["stock"];
			$db = DB::open();
			$error = false;
			if(strlen($nombre)<2){
				$error = true;
			}
			if(!is_numeric($precio)){
				$error = true;
			}
			if($marca == 0){
				$query = $db->prepare("INSERT INTO marcas(nombre) VALUES (:nombre)");
				$query->bindValue("nombre", $addMarca);
				$query->execute();
				$marca = $db->lastInsertId();
			}
			if($categoria == 0){
				$query = $db->prepare("INSERT INTO categorias(nombre) VALUES (:nombre)");
				$query->bindValue("nombre", $addCategoria);
				$query->execute();
				$categoria = $db->lastInsertId();
			}
			if(strlen($descripcion)<10){
				$error = true;
			}
			if($stock == ""){
				$stock = 0;
			}
			if (!$_FILES["imagen"]["error"]){
				$nameFile = $_FILES["imagen"]["name"];
				$ext = pathinfo($nameFile,PATHINFO_EXTENSION);
				$rand = rand(0,500000);
				$tmpName = "$rand$nombre";
				if ($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "img/productos/". $tmpName . "." . $ext);
					$file = "$tmpName.$ext";
				} else {
					$error = true;
				}
			} else {
				$error = true;
			}
			if(!$error){
				$query = $db->prepare("INSERT INTO productos (nombre, precio, marca, categoria, descripcion, stock, imagen) VALUES
				(:nombre, :precio, :marca, :categoria, :descripcion, :stock, :file)");
				$query->bindValue("nombre", $nombre);
				$query->bindValue("precio", $precio);
				$query->bindValue("marca", $marca);
				$query->bindValue("categoria", $categoria);
				$query->bindValue("descripcion", $descripcion);
				$query->bindValue("stock", $stock);
				$query->bindValue("file", $file);
				$query->execute();
				Core::redir("admin");
			}
		}
		public function actualizarProducto(Array $producto){
			$nombre = $producto["nombre"];
			$precio = $producto["precio"];
			$marca = $producto["marca"];
			$addMarca = $producto["addMarc"];
			$categoria = $producto["categoria"];
			$addCategoria = $producto["addCat"];
			$descripcion = $producto["descripcion"];
			$stock = $producto["stock"];
			$file= $producto["lastImagen"];
			$id = $producto["ID"];
			$db = DB::open();
			$error = false;
			if(strlen($nombre)<2){
				$error = true;
			}
			if(!is_numeric($precio)){
				$error = true;
			}
			if($marca == 0){
				$query = $db->prepare("INSERT INTO marcas(nombre) VALUES (:nombre)");
				$query->bindValue("nombre", $addMarca);
				$query->execute();
				$marca = $db->lastInsertId();
			}
			if($categoria == 0){
				$query = $db->prepare("INSERT INTO categorias(nombre) VALUES (:nombre)");
				$query->bindValue("nombre", $addCategoria);
				$query->execute();
				$categoria = $db->lastInsertId();
			}
			if(strlen($descripcion)<10){
				$error = true;
			}
			if($stock == ""){
				$stock = 0;
			}
			if (!$_FILES["imagen"]["error"]){
				$nameFile = $_FILES["imagen"]["name"];
				$ext = pathinfo($nameFile,PATHINFO_EXTENSION);
				$rand = rand(0,500000);
				$tmpName = "$rand$nombre";
				if ($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "img/productos/". $tmpName . "." . $ext);
					$file = "$tmpName.$ext";
				}
			}
			var_dump($error);
			if(!$error){
				$query = $db->prepare("UPDATE productos SET nombre = :nombre, precio = :precio, marca = :marca, categoria = :categoria, descripcion = :descripcion, stock = :stock, imagen = :file WHERE id = :id");
				$query->bindValue("nombre", $nombre);
				$query->bindValue("precio", $precio);
				$query->bindValue("marca", $marca);
				$query->bindValue("categoria", $categoria);
				$query->bindValue("descripcion", $descripcion);
				$query->bindValue("stock", $stock);
				$query->bindValue("file", $file);
				$query->bindValue("id", (int) $id, PDO::PARAM_INT);
				$query->execute();
				Core::redir("admin");
			}
		}
		public function borrarProducto(int $id){
			$db = DB::open();
			$query = $db->prepare("DELETE FROM productos WHERE id = :id");
			$query->bindValue("id", (int) $id, PDO::PARAM_INT);
			$query->execute();
			Core::redir("admin");
		}
}
