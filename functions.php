<?php
    session_start();
    $pagina = "";
    if (isset($_GET["k"])){
      log_out();
      redir();
    }
  function Issetuser(){
    if(isset($_SESSION["user"])){
      return true;
    }
    }
    function redir ($location="index") {
      header("Location:  " . $location . ".php");
    }
    function log_out(){
      $_SESSION["user"]= null;
    }
    function NewUser($user){
      $file = file_get_contents("users.json");
      $array = json_decode($file,true);
      $array [] = $user;
      $json = json_encode($array);
      file_put_contents("users.json",$json);
      $_SESSION["user"] = $user;
      redir("profile");
    }
?>
