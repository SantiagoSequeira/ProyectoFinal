<?php
	abstract class Validador {

		static function nuevoUsuario(Array $usuario){

		    $nombre = trim($usuario["nombre"]);
		    $apellido = trim($usuario["apellido"]);
		    $email = trim($usuario["email"]);
		    $password = $usuario["password"];
		    $passwordconfirm = $usuario["confirmpassword"];
		    $tyc = isset($usuario["tyc"]);
		    $error = false;
		    $errorNombre= "";
		    $errorEmail = "";
		    $errorPassword = "";
		    $errorTyC = "";
				$errorAvatar = "";
				$file = "default.png";
		    if (strlen($nombre)<3){
		      $errorNombre = "The name is very short!";
		      $error = true;
		    }
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		      $errorEmail = "The email is incorrect!";
		      $error = true;
		    }
	      if(strlen($password) < 8){
	        $errorPassword = "The password is very short! (+8 characters)";
	        $error = $error + 1;
	        } else if ($password != $passwordconfirm){
	        $errorPassword = "Passwords do not match";
	        $error = true;
	      } else {
					$password = password_hash($password,PASSWORD_DEFAULT);
				}
	      if (!$tyc){
	       $errorTyC = "You must accept the terms and conditions for registration";
	       $error = true;
	      }
		      if (!$_FILES["avatar"]["error"]){
		        $nameFile = $_FILES["avatar"]["name"];
		        $ext = pathinfo($nameFile,PATHINFO_EXTENSION);
		        $rand = rand(0,50000);
		        $tmpName = "$rand".str_replace(' ', '', $nombre);
		        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
		          move_uploaded_file($_FILES["avatar"]["tmp_name"], "img/avatares/". $tmpName . "." . $ext);
		          $file = "$tmpName.$ext";
		        } else {
							$errorAvatar = "Tipo de archivo no admitido!";
							$error = true;
						}
		      }
					if (!$error){
						$db = DB::open();

						try {
							$db->beginTransaction();
							$Query = $db->prepare("INSERT INTO clientes (nombre,apellido,email,password,avatar) VALUES (:nombre, :apellido, :email, :password, :avatar)");
							$Query->bindValue("nombre", $nombre);
							$Query->bindValue("apellido", $apellido);
							$Query->bindValue("email", $email);
							$Query->bindValue("password", $password);
							$Query->bindValue("avatar", $file);
							$Query->execute();
							$db->commit();
							return true;
						} catch (PDOException $e) {
							$db->rollback();
							$error = $Query->errorInfo()[0];
							if($error==23000){
								if($file != "default.png"){
									unlink("img/avatares/$file");
								}
								$errorEmail = "El usuario ya existe!";
							}
							$result = [
			 		      "email" => $errorEmail,
			 		      "nombre" => $errorNombre,
			 		      "password" => $errorPassword,
			 		      "tyc" => $errorTyC,
			 					"avatar" => $errorAvatar
			 		    ];
			 		    return $result;
						}
		    	} else {
						$result = [
							"email" => $errorEmail,
							"nombre" => $errorNombre,
							"password" => $errorPassword,
							"tyc" => $errorTyC,
							"avatar" => $errorAvatar
						];
						return $result;
					}



				/////////////////////


			// $Query = DB::open()->prepare("INSERT INTO clientes (nombre,apellido,email,password,avatar) VALUES (:nombre, :apellido, :email, :password, :avatar)");
			// $Query->bindValue("nombre", $nombre);
			// $Query->bindValue("apellido", $nombre);
			// $Query->bindValue("email", $email);
			// $Query->bindValue("password", $password);
			// $Query->bindValue("avatar",$avatar);

		}
		static function logOut(){
			session_destroy();
			header("Location: index.php");
		}
		static function login(Array $usuario,$redir=true){
			$email = $usuario["email"];
			$password = $usuario["password"];
			$query = DB::open()->prepare("SELECT * FROM clientes WHERE email = :email");
			$query->bindValue("email", $email);
			$query->execute();
			$res = $query->fetch(PDO::FETCH_ASSOC);
			$check = password_verify($password,$res["password"]);
			if($check){
				if(isset($res["tipo"])){
					$query = DB::open()->prepare("SELECT * FROM clientes WHERE email = :email");
					$query->bindValue("email", $email);
					$query->execute();
					if($res["tipo"]== 1 ){
						$res = $query->fetchObject("Administrador");
						$_SESSION["Administrador"] = serialize($res);
						if($redir){Core::redir();}
					} else {
						$res = $query->fetchObject("Cliente");
						$_SESSION["Usuario"] = serialize($res);
						if($redir){Core::redir();}
					}
				}
			} else {
				return false;
			}


		}
		static function modificarUsuario(Array $usuario){
			$nombre = trim($usuario["nombre"]);
			$apellido = trim($usuario["apellido"]);
			$email = trim($usuario["email"]);
			$id = trim($usuario["id"]);
			$password = $usuario["password"];
			$file = trim($usuario["lastAvatar"]);
			$lastAvatar = trim($usuario["lastAvatar"]);
			$db = DB::open();
			$error = false;
			$errorNombre= "";
			$errorEmail = "";
			$errorPassword = "";
			$errorAvatar = "";

			$query = $db->prepare("SELECT * FROM clientes WHERE id= :id");
			$query->bindValue("id", $id);
			$query->execute();
			$res = $query->fetch(PDO::FETCH_ASSOC);
			$check = password_verify($password,$res["password"]);
			if(!$check){
				$errorPassword = "La contraseña no coincide!";
				$error = true;
			}
			if (strlen($nombre)<3){
				$errorNombre = "The name is very short!";
				$error = true;
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errorEmail = "The email is incorrect!";
				$error = true;
			}
				if (!$_FILES["avatar"]["error"]){
					$nameFile = $_FILES["avatar"]["name"];
					$ext = pathinfo($nameFile,PATHINFO_EXTENSION);
					$rand = rand(0,50000);
					$tmpName = "$rand".str_replace(' ', '', $nombre);
					if ($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
						move_uploaded_file($_FILES["avatar"]["tmp_name"], "img/avatares/". $tmpName . "." . $ext);
						$file = "$tmpName.$ext";
					} else {
						$errorAvatar = "Tipo de archivo no admitido!";
						$error = true;
					}
				}
				if (!$error){
					try {
						$db->beginTransaction();
						$Query = $db->prepare("UPDATE clientes SET nombre = :nombre, apellido = :apellido, email = :email, avatar = :avatar WHERE id = :id");
						$Query->bindValue("nombre", $nombre);
						$Query->bindValue("apellido", $apellido);
						$Query->bindValue("email", $email);
						$Query->bindValue("avatar", $file);
						$Query->bindValue("id", $id);
						$Query->execute();
						$db->commit();
						$usr = ["email" => $email, "password" => $password];
						self::login($usr,false);
						if($file != $lastAvatar){
							unlink("img/avatares/$lastAvatar");
						}
						return true;
					} catch (PDOException $e) {
						$db->rollback();
						if($file != "default.png"){
							unlink("img/avatares/$file");
						}
						$result = [
							"email" => $errorEmail,
							"nombre" => $errorNombre,
							"password" => $errorPassword,
							"avatar" => $errorAvatar
						];
						return $result;
					}
				} else {
					if($file != "default.png"){
						unlink("img/avatares/$file");
					}
					$result = [
						"email" => $errorEmail,
						"nombre" => $errorNombre,
						"password" => $errorPassword,
						"avatar" => $errorAvatar
					];
					 return $result;
		}
	}
}
