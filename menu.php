<header>
  <nav>
    <h1 class="titulo"><a href="index.php">My e-commerce</a></h1>
    <ul class="header-nav">
      <li><a href="faq.php">F.A.Q</a></li>
      <?php if (!issetUser() || $pagina != "login") {?>
        <li><a href="login.php">Login</a></li>
        <?php } ?>
      <li><a href="contact.php">Contact</a></li>
      <?php if (issetUser()) {?>
        <li><a href="functions.php?k=logout"><img src="img/fotoperfil.png" alt="" class="img-user"></a></li>
      <?php }?>
    </ul>
    <div class="botonera">
      <a href=""><ion-icon name="menu"></ion-icon></a>
      <a href="login.php"><ion-icon name="person"></ion-icon></a>
      <a href="faq.php"><ion-icon name="help"></ion-icon></a>
    </div>
  </nav>
</header>
