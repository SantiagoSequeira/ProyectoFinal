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
