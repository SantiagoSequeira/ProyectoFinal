<?php
  session_start();
  $pagina = "";
  if (isset($_GET["k"])){
    log_out();
  }
  function Issetuser(){
    if(isset($_SESSION["user"])){
      return true;
    }
    return false;
  }
  function redir ($location="index") {
    header("Location:  " . $location . ".php");
  }
  function log_out(){
    session_destroy();
    redir();
  }
  function getUsersArray(){
    $file = file_get_contents("users.json");
    if (!$file){
      return false;
    }
    return $array = json_decode($file,true);
  }
  function NewUser($user){
    $array = getUsersArray();
    $array [] = $user;
    $json = json_encode($array);
    file_put_contents("users.json",$json);
    $_SESSION["user"] = [
      "email" => $user["email"],
      "name" => $user["name"],
      "surname" => $user["surname"],
      "avatar" => $user["avatar"]
    ];
    redir("profile");
  }
  function CheckNewUser ($user){
    $nombre = trim($user["nombre"]);
    $apellido = trim($user["apellido"]);
    $email = trim($user["email"]);
    $password = $user["password"];
    $passwordconfirm = $user["passwordconfirm"];
    $tyc = $user["tyc"];
    $file ="default.png";
    $error = false;
    $errorNombre= "";
    $errorEmail = "";
    $errorPassword = "";
    $errorTyC = "";
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
    }
    if (!$tyc){
     $errorTyC = "You must accept the terms and conditions for registration";
     $error = true;
    }
    $array = getUsersArray();
    if ($array){
      foreach ($array as $usuario) {
       if ($email == $usuario["email"]){
         $errorEmail = "The email is already register!";
         $error = true;
        }
      }
    }
    if (!$error){
      if (!$_FILES["avatar"]["error"]){
        $nameFile = $_FILES["avatar"]["name"];
        $ext = pathinfo($nameFile,PATHINFO_EXTENSION);
        $rand = rand(0,50000);
        $tmpName = "$rand$nombre";
        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png"){
          move_uploaded_file($_FILES["avatar"]["tmp_name"], "img/avatares/". $tmpName . "." . $ext);
          $file = "$tmpName.$ext";
        }
      }
      $user = [
       "name" => $nombre,
       "surname" => $apellido,
       "email" => $email,
       "password" => password_hash($password,PASSWORD_DEFAULT),
       "avatar" => $file
      ];
      NewUser($user);
    }
   $result = [
     "error" => $error,
     "errors" => [
      "email" => $errorEmail,
      "nombre" => $errorNombre,
      "password" => $errorPassword,
      "tyc" => $errorTyC],
     "user" => [
     "nombre" => $nombre,
     "apellido" => $apellido,
     "email" => $email]
    ];
    return $result;
    }
  ?>
