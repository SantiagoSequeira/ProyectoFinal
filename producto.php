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
          <li><a href="register.html">Register</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="profile.html"><img src="img/fotoperfil.png" alt="" class="img-user"></a></li>
        </ul>
        <div class="botonera">
          <a href=""><ion-icon name="menu"></ion-icon></a>
          <a href="profile.html"><ion-icon name="person"></ion-icon></a>
          <a href="cart.html"><ion-icon name="cart"></ion-icon></a>
          <a href="faq.html"><ion-icon name="help"></ion-icon></a>
        </div>
      </nav>
    </header>
    <main>
      <div class="product-container">
        <div class="producto">
          <img src="img/IX.jpg" alt="" class="img-producto">
        </div>
        <div class="descripcion-producto">
          <h2>Product title</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
          <h3 class="price">
            $70.000,00
          </h3>
          <a href="">
            <h5 class="add-cart">
              Add to cart
            </h5>
          </a>
        </div>

      </div>
    </main>
<?php require_once("./footer.php"); ?>
