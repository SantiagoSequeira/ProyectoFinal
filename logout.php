<?php
	require_once("launcher.php");
if(Core::isLogIn()){
	Validador::logOut();
} else {
	header("Location: index.php");
}

 ?>
