<?php
  require_once("functions/functions.php");
  if (issetUser()){
    redir();
  }
  if ($_POST){
    $check = CheckNewUser($_POST);
    $errors = $check["errors"];
    $errorNombre= $errors["nombre"];
    $errorEmail = $errors["email"];
    $errorPassword = $errors["password"];
    $errorTyC = $errors["tyc"];
    $user = $check["user"];
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
          <form class="" action="" method="post" enctype="multipart/form-data">
            <div> <?php echo (isset($errorNombre)) ? $errorNombre : "" ?> </div>
            <input class="controls" type="text" required name="nombre" placeholder="Name *" value="<?php echo (isset($user["nombre"]))? $user["nombre"]: "" ?>">
            <input class="controls" type="text" name="apellido" placeholder="Surname" value="<?php echo (isset($user["apellido"]))? $user["apellido"]: ""?>">
            <div> <?php echo (isset($errorEmail))? $errorEmail: "" ?> </div>
            <input class="controls" required type="email" name="email" placeholder="Email *" value="<?php echo (isset($user["email"]))? $user["email"]: ""?>">
            <div> <?php echo (isset($errorPassword))? $errorPassword: "";?> </div>
            <input class="controls" type="password" name="password" placeholder="Password *">
            <input class="controls" type="password" name="passwordconfirm" placeholder="Confirm password *" required>
            <div> <label for="avatar">Avatar (opcional)</label> </div>
            <input class="controls" type="file" name="avatar" id="avatar" accept="image/jpeg,image/jpg,image/png">
            <div class="ph">
              <input type="checkbox" name="tyc" id="tyc" required>
              <label for="tyc"> I agree <a href="#"></label>Terms and conditions</a>
            </div>
            <div> <?php echo (isset($errorTyC))? $errorTyC: "";?> </div>
            <input  class="botons" type="submit" value="Sing In">
          </form>
          <div class="ph">
            <a href="login.php">You already have an account?</a>
          </div>
        </div>
        </main>
<?php require_once("./footer.php"); ?>
