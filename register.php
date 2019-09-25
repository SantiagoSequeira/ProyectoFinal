<?php
  require_once("functions.php");
  if (issetUser()){
    redir();
  }
  $errornombre= "";
  if ($_POST){
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $passwordconfirm = $_POST["passwordconfirm"];
    if (strlen($nombre)<3){
      $errornombre = "The name is very short!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errorEmail = "The email is incorrect!";
    }
    if($password < 8){
      $errorPassword = "The password is very short! (+8 characters)";
    } else if ($password =! $passwordconfirm){
      $errorPassword = "Passwords do not match";
    }
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
            <div> <?php echo $errornombre;?> </div>
            <input class="controls" type="text" name="nombre" placeholder="Name" value="">
            <input class="controls" type="text" name="apellido" placeholder="Surname">
            <input class="controls" type="email" name="email" placeholder="Email">
            <input class="controls" type="password" name="password" placeholder="Password">
            <input class="controls" type="password" name="passwordconfirm" placeholder="Confirm password">
            <div class="ph">
              <input type="checkbox" name="tyc" id="tyc">
              <label for="tyc"> I agree <a href="#"></label>Terms and conditions</a>
            </div>
            <input  class="botons" type="submit" value="Sing In">
          </form>
          <div class="ph">
            <a href="login.php">You already have an account?</a>
          </div>
        </div>
      </main>
<?php require_once("./footer.php"); ?>
