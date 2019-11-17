<?php
   	require_once("header.php");
	$pagina = "login";
	if(Core::isLogIn()){
		header("Location: index.php");
	}


	if($_POST){
		$usuario = Validador::login($_POST);
		if(!$usuario){
			$error = "Usuario o contraseña incorrecta!";
		}
	}
?>
  <body>
    <div class="container">
      <header>
        <?php include_once("menu.php"); ?>
      </header>
      <main>
        <div class="form-login">
          <h4>Log In</h4>
          <form class="" action="" method="post">
            <input class="controls" type="email" autofocus name="email" placeholder="Email" value="<?php echo (isset($_POST["email"])) ? $_POST["email"] : "" ?>" required>
            <input class="controls" type="password" name="password" placeholder="Password" required>
            <div> <?php echo (isset($error)) ? $error : "" ?> </div>
            <!-- <div class="ph">
              <input type="checkbox" name="keep" id="keep">
              <label for="keep">Keep me connected</label>
            </div> -->
            <input class="botons" type="submit" value="Log In">
          </form>
          <p><a href="register.php"> You don't have an account?</a></p>
        </div>
        </main>
<?php require_once("footer.php"); ?>
