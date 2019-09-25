<?php
  require_once("header.php");
  $pagina = "producto";
?>
<body>
  <div class="container">
    <header>
      <?php include_once("menu.php"); ?>
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
