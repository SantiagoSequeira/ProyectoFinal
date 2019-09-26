<?php
  echo phpversion();
  die;
  require_once("functions.php");
  if (issetUser()){
    redir();
  }
  $nombre = "";
  $apellido = "";
  $email = "";
  $errorNombre= "";
  $errorEmail = "";
  $errorPassword = "";
  $errorTyC = "";
  if ($_POST){
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $passwordconfirm = $_POST["passwordconfirm"];
    $tyc = $_POST["tyc"];
    if (strlen($nombre)<3){
      $errorNombre = "The name is very short!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errorEmail = "The email is incorrect!";
    }
    if(strlen($password) < 8){
      $errorPassword = "The password is very short! (+8 characters)";
    } else if ($password != $passwordconfirm){
      $errorPassword = "Passwords do not match";
    }
     if (!$tyc){
       $errorTyC = "You must accept the terms and conditions for registration";
     }
  }
  if ($errorTyC = "" && $errorEmail = "" && $errorNombre = "" && $errorPassword = ""){
    // $user = [
    //   "name" => $nombre,
    //   "surname" => $apellido,
    //   "email" => $email,
    //   "password" => password_hash($password,PASSWORD_DEFAULT)
    // ];
    NewUser($usuario);
  }
  require_once("header.php");
  $pagina = "register";
?>
  <body>
    <div class="container">
      <header>
        <?php include_once("menu.php"); ?>
      </header>
      <main>
        <div class="form-register">
          <h4>Registration Form</h4>
          <form class="" action="" method="post">
            <div> <?php echo $errorNombre;?> </div>
            <input class="controls" type="text" name="nombre" placeholder="Name" value="<?=$nombre ?>">
            <input class="controls" type="text" name="apellido" placeholder="Surname" value="<?=$apellido ?>">
            <div> <?php echo $errorEmail;?> </div>
            <input class="controls" type="email" name="email" placeholder="Email" value="<?=$email ?>">
            <div> <?php echo $errorPassword;?> </div>
            <input class="controls" type="password" name="password" placeholder="Password">
            <input class="controls" type="password" name="passwordconfirm" placeholder="Confirm password">
            <div class="ph">
              <input type="checkbox" name="tyc" id="tyc">
              <label for="tyc"> I agree <a href="#"></label>Terms and conditions</a>
            </div>
            <div> <?php echo $errorTyC;?> </div>
            <input  class="botons" type="submit" value="Sing In">
          </form>
          <div class="ph">
            <a href="login.php">You already have an account?</a>
          </div>
        </div>
      </main>
<?php require_once("./footer.php"); ?>
