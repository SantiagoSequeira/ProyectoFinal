<?php
    session_start();
    $pagina = "";
    if (isset($_GET["k"])){
      log_out();
      redir();
    }
  function Issetuser(){
    if(isset($_SESSION["usuario"])){
      return true;
    }
    }
    function redir ($location="index") {
      header("Location:  " . $location . ".php");
    }
    function log_out(){
      $_SESSION["usuario"]= null;
    }
    function NewUser($user){
      $jsonFile = file_get_contents("users.json");
    }
?>
