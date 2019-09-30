        <nav>
          <h1 class="titulo"><a href="index.php">My e-commerce</a></h1>
          <ul class="header-nav">
            <?php if (!($pagina == "faq")) {?>
              <li><a href="faq.php">F.A.Q</a></li>
              <?php }
               if (!(issetUser()) && !($pagina == "login")) {?>
              <li><a href="login.php">Login</a></li>
              <?php }
              if (!(issetUser()) && !($pagina == "contact")) {?>
                <li><a href="contact.php">Contact</a></li>
           <?php }?>

           <div class="log-profile">
            <?php if (issetUser() && $pagina != "profile") {?>
              <li><a href="profile.php"><img src="img/fotoperfil.png" alt="" class="img-user"></a></li>
              <?php } if (issetUser()) {?>
              <li><a href="functions.php?k=logout">Log-out</a></li>

            <?php }?>
          </div>
          </ul>
          <div class="hamb">
            <a id="hamb" onclick="show()"><ion-icon name="menu"></ion-icon></a>
          </div>
            <div class="botonera" id="menu" style="display: none;">
            <?php if (!(issetUser()) && !($pagina == "login")) {?>
              <a href="login.php"><ion-icon name="person"></ion-icon></a>
            <?php } else if (issetUser()){?>
                <a href="profile.php"><ion-icon name="person"></ion-icon></a>
              <?php  }; ?>
            <a href="faq.php"><ion-icon name="help"></ion-icon></a>
          </div>
        </nav>
