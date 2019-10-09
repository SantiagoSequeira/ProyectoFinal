<?php
  require_once("header.php");
  $pagina = "cart";
?>
<body>
  <div class="container">
    <header>
      <?php include_once("menu.php"); ?>
    </header>
    <main>
      <ul class="item-cart-ul">
        <li class="item-cart-li">
          <div class="item-cart">
            <img src="img/IX.jpg" alt="" class="item-cart-img">
            <div>
              <h3>Product title</h3>
              <h5>$70.000,00</h5>
              <button type="button" name="button" class="cart-btn">+</button>
              <input type="number" name="" value="1" class="cart-input">
              <button type="button" name="button" class="cart-btn">-</button>
              <button type="button" name="button" class="cart-btn red">X</button>
            </div>
          </div>
          <hr class="line">
        </li>
        <li class="item-cart-li">
          <div class="item-cart">
            <img src="img/IX.jpg" alt="" class="item-cart-img">
            <div>
              <h3>Product title</h3>
              <h5>$70.000,00</h5>
              <button type="button" name="button" class="cart-btn">+</button>
              <input type="number" name="" value="1" class="cart-input">
              <button type="button" name="button" class="cart-btn">-</button>
              <button type="button" name="button" class="cart-btn red">X</button>
            </div>
          </div>
          <hr class="line">
        </li>
        <h5 class="add-cart finish-cart">
            Checkout
          </h5>
      </main>
<?php require_once("./footer.php"); ?>
