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
    <section class="articulos">
      <article class="articulo">
        <a href="producto.html">
          <div class="articulo-imagen">
            <img src="img/beacon-kelsey-wroten.jpg" alt="" class="img-article">
            <div class="cart">
               <a href="cart.html">+ Carrito</a>
            </div>
          </div>
          <div class="article-footer">
            <h4>TITULO DEL PRODUCTO</h4>
            <h4>$20.00</h4>
          </div>
        </a>
      </article>
      <article class="articulo">
        <a href="producto.html">
          <div class="articulo-imagen">
            <img src="img/beacon-kelsey-wroten.jpg" alt="" class="img-article">
            <div class="cart">
               <a href="cart.html">+ Carrito</a>
            </div>
          </div>
          <div class="article-footer">
            <h4>TITULO DEL PRODUCTO</h4>
            <h4>$20.00</h4>
          </div>
        </a>
      </article>
      <article class="articulo">
        <a href="producto.html">
          <div class="articulo-imagen">
            <img src="img/beacon-kelsey-wroten.jpg" alt="" class="img-article">
            <div class="cart">
               <a href="cart.html">+ Carrito</a>
            </div>
          </div>
          <div class="article-footer">
            <h4>TITULO DEL PRODUCTO</h4>
            <h4>$20.00</h4>
          </div>
        </a>
      </article>
      <article class="articulo">
        <a href="producto.html">
          <div class="articulo-imagen">
            <img src="img/beacon-kelsey-wroten.jpg" alt="" class="img-article">
            <div class="cart">
               <a href="cart.html">+ Carrito</a>
            </div>
          </div>
          <div class="article-footer">
            <h4>TITULO DEL PRODUCTO</h4>
            <h4>$20.00</h4>
          </div>
        </a>
      </article>
    </section>
    <div class="desc">
      <h2>Descripción general del proyecto</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </main>
</div>
  <?php require_once("./footer.php"); ?>
