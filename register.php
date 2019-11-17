<?php
	require_once("header.php");
	if (Core::isLogIn()){
		Core::redir();
	}
	$pagina = "register";
	$complete = false;
	if ($_POST){
		$error = Validador::nuevoUsuario($_POST);
		if($error === true){
			$complete = true;
		} else {
			$errorNombre= $error["nombre"];
			$errorEmail = $error["email"];
			$errorPassword = $error["password"];
			$errorTyC = $error["tyc"];
			$errorAvatar = $error["avatar"];
		}
	}


?>
  <body>
    <div class="container">
      <header>
        <?php include_once("menu.php"); ?>
      </header>
      <main>
        <div class="form-register">
					<?php if(!$complete){ ?>
          <h4>Registration Form</h4>
          <form class="" action="" method="post" enctype="multipart/form-data" autocomplete="nope">
            <div class="error-reg"> <?php echo (isset($errorNombre)) ? $errorNombre : "" ?> </div>
            <input class="controls" type="text" required name="nombre" placeholder="Name *" value="<?php echo (isset($_POST["nombre"]))? $_POST["nombre"]: "" ?>">
            <input class="controls" type="text" name="apellido" placeholder="Surname" value="<?php echo (isset($_POST["apellido"]))? $_POST["apellido"]: ""?>">
            <div class="error-reg"> <?php echo (isset($errorEmail))? $errorEmail: "" ?> </div>
            <input class="controls" required type="email" name="email" placeholder="Email *" value="<?php echo (isset($_POST["email"]))? $_POST["email"]: ""?>">
            <div class="error-reg"> <?php echo (isset($errorPassword))? $errorPassword: "";?> </div>
            <input class="controls" type="password" name="password" placeholder="Password *" required>
            <input class="controls" type="password" name="confirmpassword" placeholder="Confirm password *" required>
            <div> <label for="avatar">Avatar (opcional)</label> </div>
            <input class="controls" type="file" name="avatar" id="avatar" accept="image/jpeg,image/jpg,image/png">
            <div class="ph">
              <input type="checkbox" name="tyc" id="tyc" required>
              <label for="tyc"> I agree <a href="#"></label>Terms and conditions</a>
            </div>
            <div class="error-reg"> <?php echo (isset($errorTyC))? $errorTyC: "";?> </div>
            <input  class="botons" type="submit" value="Sign In">
          </form>
					<div class="ph">
						<a href="login.php">You already have an account?</a>
					</div>
				<?php } else {?>
					<h4>Registration has been completed successfully!</h4>
					<div class="ph">
						<a href="login.php">Login here!</a>
					</div>
		<?php		} ?>
        </div>
        </main>
<?php require_once("./footer.php"); ?>
