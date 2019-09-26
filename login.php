<?php
   require_once("functions.php");
   $pagina = "login";
   if (issetUser()){
     redir();
}
   if($_POST){
     $_SESSION["usuario"] = "Santy";
     redir();
 }
   require_once("header.php");
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
            <input class="controls" type="email" name="email" id="correo" placeholder="Email">
            <input class="controls" type="password" name="email" id="email" placeholder="Password">
            <input class="botons" type="submit" value="Log In">
          </form>
          <p><a href="register.php"> You don't have an account?</a></p>
        </div>
    </main>
<?php require_once("./footer.php"); ?>
