<?php
   require_once("functions.php");
   $pagina = "login";
   if (issetUser()){
     redir();
}
   if($_POST){
     $_SESSION["user"] = [
       "email" => "san@g.c",
       "name" => "Santy",
       "surname" => "Sequeira",
       "avatar" => "default.png"
     ];
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
          <form class="" action="index.php" method="post">
            <input class="controls" type="email" name="email" placeholder="Email" value="">
            <input class="controls" type="password" name="password" placeholder="Password">
            <input class="botons" type="submit" value="Log In">
          </form>
          <p><a href="register.php"> You don't have an account?</a></p>
        </div>
    </main>
<?php require_once("./footer.php"); ?>
