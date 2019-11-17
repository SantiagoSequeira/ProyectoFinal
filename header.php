<?php
	require_once("launcher.php");
	if(Core::isLogIn() == "usuario"){
		$usuario = unserialize($_SESSION["Usuario"]);
	} else if(Core::isLogIn() == "administrador"){
		$usuario= unserialize($_SESSION["Administrador"]);
		$admin = unserialize($_SESSION["Administrador"]);
	}
	if(isset($_SESSION["Carrito"])){
		$carrito = unserialize($_SESSION["Carrito"]);
	} else {
		$carrito = new Carrito();
		$_SESSION["Carrito"] = serialize($carrito);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Manjari|Pacifico|Roboto+Slab&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="./css/styles.css">
  <title>MyEcommerce</title>
  <script type="text/javascript" src="js/functions.js"></script>
</head>
