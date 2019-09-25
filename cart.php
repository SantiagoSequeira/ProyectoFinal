<?php require_once("./header.php"); ?>
<body>
  <div class="container" id="cart">
    <header>
      <nav>
        <h1 class="titulo"><a href="index.html">My e-commerce</a></h1>
        <ul class="header-nav">
          <li><a href="faq.html">F.A.Q</a></li>
          <li><a href="login.html">Login</a></li>
          <li><a href="register.html">Register</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="profile.html"><img src="img/fotoperfil.png" alt="" class="img-user"></a></li>
        </ul>
        <div class="botonera">
          <a href=""><ion-icon name="menu"></ion-icon></a>
          <a href="profile.html"><ion-icon name="person"></ion-icon></a>
          <a href="faq.html"><ion-icon name="help"></ion-icon></a>
        </div>
      </nav>
    </header>
    <main>
      <ul class="item-cart-ul">
        <li class="item-cart" onclick="//show()">
          <div class="item-cart">
            <img src="img/IX.jpg" alt="" class="item-cart-img">
            <div>
              <h3>Product title</h3>
              <h5>$70.000,00</h5>
            </div>
          </div>
        </li>
        <hr class="line">
        <ul class="item-cart-ul">
          <li class="item-cart" onclick="//show()">
            <div class="item-cart">
              <img src="img/IX.jpg" alt="" class="item-cart-img">
              <div>
                <h3>Product title</h3>
                <h5>$70.000,00</h5>
              </div>
            </div>
          </li>
          <hr class="line">
          <ul class="item-cart-ul">
            <li class="item-cart" onclick="//show()">
              <div class="item-cart">
                <img src="img/IX.jpg" alt="" class="item-cart-img">
                <div>
                  <h3>Product title</h3>
                  <h5>$70.000,00</h5>
                </div>
              </div>
            </li>
            <hr class="line">
            <ul class="item-cart-ul">
              <li class="item-cart" onclick="//show()">
                <div class="item-cart">
                  <img src="img/IX.jpg" alt="" class="item-cart-img">
                  <div>
                    <h3>Product title</h3>
                    <h5>$70.000,00</h5>
                  </div>
                </div>
              </li>
          </ul>
          <h5 class="add-cart finish-cart">
            Checkout
          </h5>
        </main>
    </div>
<?php require_once("./footer.php"); ?>
