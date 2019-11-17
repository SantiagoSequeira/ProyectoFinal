<?php
	require_once("header.php");
	$pagina = "producto";
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$producto = Core::getProductoPorID($id);
		if(!$producto){

			Core::redir();
		}
	} else {
		Core::redir("cart");
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	unset($_POST);
		$carrito->agregarProducto($producto);
		$_SESSION["Carrito"] = serialize($carrito);
    	Core::redir("cart");
	}
?>
<body>
  <div class="container">
    <header>
      <?php include_once("menu.php"); ?>
    </header>
    <main>
      <div class="product-container">
        <div class="producto">
          <img src="img/productos/<?=$producto->getImagen()?>" alt="" class="img-producto">
        </div>
        <div class="descripcion-producto">
          <h2><?=$producto->getNombre()?> - <i><?=Core::getMarca($producto->getMarca())?></i></h2>

          <p class="">
            <?=$producto->getDescripcion()?>
          </p>
			<h4><i class="stock">Stock: <?php echo ($producto->getStock() > 0) ? "Disponible" : "No disponible";?></i></h4>
          <h3 class="price">
            $<?=$producto->getPrecio()?>
          </h3>

          <a href="">
			  <form action="" method="post">
				  <button type="submit" class="add-cart">
					  <!--<h5 class="add-cart">-->
              			Add to cart
            			<!--</h5>-->
				  </button>

			  </form>

          </a>
        </div>

      </div>
    </main>
<?php require_once("footer.php"); ?>
