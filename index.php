<?php
  require_once("header.php");
?>
<body>
<div class="container">
  <header>
    <?php include_once("menu.php"); ?>
  </header>
  <main>
    <section class="articulos">
      <article class="articulo">
        <a href="producto.php">
          <div class="articulo-imagen">
            <img src="img/beacon-kelsey-wroten.jpg" alt="" class="img-article">
            <div class="cart">
               <a href="cart.php">+ Carrito</a>
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
