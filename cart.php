<?php
  require_once("header.php");
  $pagina = "cart";
	if($_POST){
		$action = $_POST["button"];
		$id = $_POST["ID"];
		if($action == 'add'){
			$carrito->sumarProducto($id);
			$_SESSION["Carrito"] = serialize($carrito);
			unset($_POST);
			header("Location: ".$_SERVER['PHP_SELF']);
		} else if($action == 'substract'){
			$res = $carrito->restarProducto($id);
			$_SESSION["Carrito"] = serialize($carrito);
			unset($_POST);
			header("Location: ".$_SERVER['PHP_SELF']);
		} else if ($action == 'remove'){
			$carrito->quitarProducto($id);
			$_SESSION["Carrito"] = serialize($carrito);
			unset($_POST);
			header("Location: ".$_SERVER['PHP_SELF']);
		} else {

		}
	} else {
    if (isset($_GET["add"])){
      $id = $_GET["add"];
      if(is_numeric($id)){
        $producto = Core::getProductoPorID($id);
        if($producto){
          $carrito->agregarProducto($producto);
    			$_SESSION["Carrito"] = serialize($carrito);
    			header("Location: ".$_SERVER['PHP_SELF']);
        } else{
          header("Location: ".$_SERVER['PHP_SELF']);
        }
      } else {
        header("Location: ".$_SERVER['PHP_SELF']);
      }
    }
  }
?>
<body>
  <div class="container">
    <header>
      <?php include_once("menu.php"); ?>
    </header>
    <main>
      <ul class="item-cart-ul">
        <?php
		  if($carrito->cantidadProductos() > 0 ){
			  foreach ($carrito->getProductos() as $producto){?>
			   <li class="item-cart-li">
				  <div class="item-cart">
					  <a href="producto.php?id=<?=$producto["Producto"]->getID()?>">
					<img src="img/productos/<?=$producto["Producto"]->getImagen()?>" alt="" class="item-cart-img"></a>
					<div class="Cart-descripcion">
					  <h3><?=$producto["Producto"]->getNombre()?></h3>
					  <h5>$<?=$producto["Producto"]->getPrecio()?></h5>
						<form action="" method="post">
						<input value="<?=$producto["Producto"]->getID()?>" name="ID" style="display: none">
							<?php if($producto["Producto"]->getStock() > $producto["Cantidad"]){?>
				  				<button type="submit" name="button" value="add" class="cart-btn">+</button>
			  				<?php } else {?>
								<button type="submit" name="button" value="nothing" class="cart-btn disabled" disabled>+</button>
						<?php } ?>
						<input type="number" value="<?=$producto["Cantidad"]?>" class="cart-input" disabled>
							<?php if($producto["Cantidad"] > 1){?>
						<button type="submit" name="button" value="substract" class="cart-btn">-</button>
							<?php } else {?>
				  		<button type="submit" name="button" value="nothing" class="cart-btn disabled" disabled>-</button>
			 <?php } ?>
						<button type="submit" name="button" value="remove" class="cart-btn red">X</button>
						</form>




					</div>
				  </div>
				  <hr class="line">
				</li>
		  <?php	}?>
		  <h5 class="add-cart finish-cart">Checkout</h5>
		  <?php } else {?>
			  <div class="error">
				<h6>Aun no tienes productos en tu carrito! <b><a href="index.php">Redireccionando a Home (Click aqui si no eres redireccionado automaticamente)</a></b></h6>
			  </div>
		  <script>
		  	setTimeout(function(){
			  window.location = "index.php";
			}, 3000);
		  </script>
		  <?php }  ?>



		</ul>
      </main>
<?php require_once("footer.php"); ?>
