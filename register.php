<?php require_once("./header.php"); ?>
  <body>
    <div class="container">
      <header>
        <nav>
          <h1 class="titulo"><a href="index.html">My e-commerce</a></h1>
          <ul class="header-nav">
            <li><a href="cart.html">Carrito</a></li>
            <li><a href="faq.html">F.A.Q</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
          <div class="botonera">
            <a href="index.html"><ion-icon name="home"></ion-icon></a>
          </div>
        </nav>
      </header>
      <main>
        <div class="form-register">
          <h4>Registration Form</h4>
          <input class="controls" type="text" name="nombres" id="nombres" placeholder="Name">
          <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Surname">
          <input class="controls" type="email" name="email" id="correo" placeholder="Email">
          <input class="controls" type="password" name="email" id="email" placeholder="Password">
          <p><input type="checkbox" name="tyc" id="tyc"> <label for="tyc"> I agree <a href="#"></label>Terms and conditions</a>
        </p>  <input  class="botons" type="submit" value="Sing In">
          <p>
            <a href="login.html">You already have an account?</a></p>
        </div>
      </main>
<?php require_once("./footer.php"); ?>
