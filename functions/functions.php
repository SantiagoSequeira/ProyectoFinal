<?php
  session_start();
  $pagina = "";
  function issetUser(){
    if(isset($_SESSION["user"])){
      return true;
    } else if (isset($_COOKIE["user"])){
      $_SESSION["user"] = json_decode($_COOKIE["user"],true);
      return true;
    }
    return false;
  }
  function redir ($location="index") {
    header("Location:  " . $location . ".php");
  }
  function logOut(){
    session_destroy();
    setcookie("user","",time()-1);
    redir();
  }
  function getUsersArray(){
    $file = file_get_contents("json/users.json");
    if (!$file){
      return false;
    }
    return $array = json_decode($file,true);
  }
  function checkUserLogin($user){
    $usuarios = getUsersArray();
    if($usuarios) {
      foreach ($usuarios as $usuario) {
        if (strtolower($usuario["email"]) == strtolower($user["email"]) && password_verify($user["password"],$usuario["password"])){
          $usr = [
            "id" => $usuario["id"],
            "email" => $usuario["email"],
            "name" => $usuario["name"],
            "surname" => $usuario["surname"],
            "avatar" => $usuario["avatar"]
          ];
          if($user["keep"]){
            setcookie("user",json_encode($usr), time()+ 60*60*24*30);
          }
          $_SESSION["user"] = $usr;
          redir();
        }
        return "User or password wrong!";
      }
    }
    return "Username does not exist!";
    }
  function checkUser ($user,$modify=false){
    $nombre = trim($user["nombre"]);
    $apellido = trim($user["apellido"]);
    $email = trim($user["email"]);
    $password = $user["password"];
    $passwordconfirm = $user["passwordconfirm"];
    $tyc = $user["tyc"];
    $file = ($modify)? $_SESSION["user"]["avatar"] : "default.jpg";
    $error = false;
    $errorNombre= "";
    $errorEmail = "";
    $errorPassword = "";
    $errorTyC = "";
    $array = getUsersArray();
    if (strlen($nombre)<3){
      $errorNombre = "The name is very short!";
      $error = true;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errorEmail = "The email is incorrect!";
      $error = true;
    }
    if (!$modify) {
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
    }
    if ($array){
      if(!$modify){
        foreach ($array as $usuario) {
          if ($email == $usuario["email"]){
            $errorEmail = "The email is already register!";
            $error = true;
          }
        }
      }
      $id = count($array);
    } else {
      $id = 0;
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
        "id" => $id,
        "name" => $nombre,
        "surname" => $apellido,
        "email" => $email,
        "password" => (!$modify) ? password_hash($password,PASSWORD_DEFAULT) : $password,
        "avatar" => $file
       ];

    }
   $result = [
     "error" => $error,
     "errors" => [
      "email" => $errorEmail,
      "nombre" => $errorNombre,
      "password" => $errorPassword,
      "tyc" => $errorTyC],
     "user" => $user
    ];
    return $result;
    }
  function checkNewUser ($pst){
    $usr = checkUser($pst);
    if (!$usr["error"]){
      $user = $usr["user"];
      $array = getUsersArray();
      $array [] = $user;
      $json = json_encode($array);
      file_put_contents("json/users.json",$json);
      $_SESSION["user"] = [
        "id" => $user["id"],
        "email" => $user["email"],
        "name" => $user["name"],
        "surname" => $user["surname"],
        "avatar" => $user["avatar"]
      ];
      redir("profile");
    }
  }
  function editUser($pst){
    $array = getUsersArray();
    $id = $_SESSION["user"]["id"];
    $usr = checkUser($pst,true);
    $user = $usr["user"];
    if(!($array[$id]["email"] == $user["email"])) {
      foreach ($array as  $usuario) {
        if($usuario["email"] == $user["email"]){
          $usr["errors"]["email"] = "The email is already register!";
          return $usr;
        }
      }
    }
    if (!$usr["error"] && password_verify($user["password"],$array[$id]["password"])){
      $usuario = [
        "id" => $_SESSION["user"]["id"],
        "name" => $user["name"],
        "surname" => $user["surname"],
        "email" => $user["email"],
        "password" => $array[$id]["password"],
        "avatar" => $user["avatar"]
        ];
      $array[$id] = $usuario;
      $json = json_encode($array);
      file_put_contents("json/users.json",$json);
      $_SESSION["user"] = [
        "id" => $_SESSION["user"]["id"],
        "email" => $user["email"],
        "name" => $user["name"],
        "surname" => $user["surname"],
        "avatar" => $user["avatar"]
      ];
      redir("profile");

    } else {
      $usr["errors"]["password"] = "The password is needed for changes!";
    }
        return $usr;

    }
    //
    // var_dump($user,$array,$_SESSION,$usr);
    // exit;

  ?>
