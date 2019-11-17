        <nav>
          <h1 class="titulo"><a href="index.php">My e-commerce</a></h1>
          <ul class="header-nav">
            <?php if (!($pagina == "faq")) {?>
              <li><a href="faq.php">F.A.Q</a></li>
            <?php }
            if (!($pagina == "contact")) {?>
              <li><a href="contact.php">Contact</a></li>
            <?php }
            if(!($pagina == "cart")) {?>
              <li><a href="cart.php">Cart</a></li>
            <?php  }
            if (!(Core::isLogIn()) && !($pagina == "login") && !($pagina == "register")) {?>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
            <?php }
            if ($pagina == "login" && !(Core::isLogIn())) {?>
              <li><a href="register.php">Register</a></li>
            <?php }
            if ($pagina == "register" && !(Core::isLogIn())) {?>
             <li><a href="login.php">Login</a></li>
            <?php } ?>
           <div class="log-profile">
             <?php if (Core::isLogIn()) {
                if(isset($admin) && !($pagina == "admin")){?>
                  <li>
                    <a href="admin.php">Admin</a>
                  </li>
                <?php } ?>
               <li>
                 <form class="" action="logout.php" method="post">
                   <input type="submit" name="logout" value="Log out" class="log-out">
                 </form>
               </li>

             <?php }
            if (Core::isLogIn() && ($pagina != "profile")) {?>
              <li><a href="profile.php"><img src="img/avatares/<?php if(isset($usuario)){echo $usuario->getAvatar();} else if(isset($admin)){echo $admin->getAvatar();}?>" alt="" class="img-user"></a></li>
              <?php }?>
            </div>
          </ul>
          <div class="hamb">
            <a id="hamb" onclick="show()"><ion-icon name="menu"></ion-icon></a>
          </div>
          <div class="botonera" id="menu" style="display: none;">
            <?php if (!(Core::isLogIn()) && !($pagina == "login")) {?>
              <a href="login.php"><ion-icon name="log-in"></ion-icon></a>
              <?php } else if (Core::isLogIn() && !($pagina == "profile")){?>
                <a href="profile.php"><ion-icon name="person"></ion-icon></a>
              <?php }
            if(Core::isLogIn()){ ?>
              <a href="logout.php"><ion-icon name="log-out"></ion-icon></a>
            <?php }
            if(!($pagina == "faq")) { ?>
              <a href="faq.php"><ion-icon name="help"></ion-icon></a>
              <?php }
            if(!($pagina == "contact")) { ?>
              <a href="contact.php" class="footer-boton"><ion-icon name="paper-plane"></ion-icon></a>
              <?php }
            if(!($pagina == "cart")) { ?>
              <a href="cart.php" class="footer-boton"><ion-icon name="cart"></ion-icon></a>
            <?php } ?>
          </div>
        </nav>
