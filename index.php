<?php
  require_once("header.php");
	$pagina = "index";
  $base = 0;
  $p = 1;
  $like = "";
  if(isset($_GET["p"])){
    $p = ($_GET["p"] >= 1 ) ? $_GET["p"] : 1;
    $base = ($p - 1) * 12;

    }

  if(isset($_GET["s"])){
    $like = $_GET["s"];
  }
  $arr = Core::getProductos($base,12,$like);
  $cant = Core::getCantidadDeProductos($like);
$prom = ceil( $cant / 12);
?>
<body>
<div class="container">
  <header>
    <?php include_once("menu.php"); ?>
  </header>
  <main>
    <div class="header-listado margin-l-r">
      <form class="buscador-listado" action="" method="GET">
        <div class="">
          <input type="text" name="s" value="<?=$like?>" placeholder="Buscar">
          <button type="submit">Buscar</button>
        </div>
      </form>
      <div class="paginador">
        <ul>
          <?php if($base != 0 && $base != 1) {?>
            <li ><a href="?s=<?=$like?>&p=<?=$p-1?>"><i class="material-icons">chevron_left</i></a></li>
          <?php }  for($i = 1; $i<= $prom;$i++){
            if($i == $p){?>
              <li><a class="active" href="?s=<?=$like?>&p=<?=$i?>"><?=$i?></a></li>
            <?php } else {?>
              <li><a href="?s=<?=$like?>&p=<?=$i?>"><?=$i?></a></li>
            <?php } }  if($p < $prom) {?>
              <li ><a href="?s=<?=$like?>&p=<?=$p+1?>"><i class="material-icons">chevron_right</i></a></li>
            <?php } ?>
          </ul>
        </div>
    </div>
    <section class="articulos">
      <?php if(count($arr) < 1){?>
        <h2>No encontramos lo que estas buscando!</h2>
    <?php  } else {  foreach($arr as $producto){ ?>
      <article class="articulo">
        <a href="producto.php?id=<?=$producto->getID()?>">
          <div class="articulo-imagen">
            <img src="img/productos/<?=$producto->getImagen()?>" alt="" class="img-article">
            <div class="cart">
               <a href="cart.php?add=<?=$producto->getID()?>"><i class="material-icons">add_shopping_cart</i></a>
            </div>
          </div>
          <div class="article-footer">
            <h4><?=$producto->getNombre()?></h4>
            <h4>$<?=$producto->getPrecio()?></h4>
          </div>
        </a>
      </article>
    <?php } }?>
    </section>
    <div class="desc">
      <h2>Descripción general del proyecto</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </main>
</div>
  <?php require_once("footer.php"); ?>
