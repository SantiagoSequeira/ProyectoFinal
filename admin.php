<?php
  include_once("header.php");
	$pagina = "admin";
  if (isset($_SESSION["Administrador"])) {
      $base = 0;
      $p = 1;
      $like = "";
      if(isset($_GET["p"])){
        $p = ($_GET["p"] >= 1 ) ? $_GET["p"] : 1;
        $base = ($p - 1) * 6;

        }

      if(isset($_GET["s"])){
        $like = $_GET["s"];
      }
      $arr = Core::getProductos($base,6,$like);
      $cant = Core::getCantidadDeProductos($like);
    $prom = ceil( $cant / 6);
  } else {
    Core::redir();
  }

?>
<body>
<div class="container">
  <header>
    <?php include_once("menu.php"); ?>
  </header>
  <main>
    <div class="form-cont">
      <div class="admin-agregar">
        <a href="agregar.php" class="">Agregar nuevo</a>
      </div>
      <div class="header-listado">
        <form class="buscador-listado" action="" method="GET">
          <div class="">
            <input type="text" name="s" value="<?=$like?>">
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
      <section class="seccion-listado">
          <?php foreach ($arr as $producto) { ?>
          <article class="listado-productos">
            <div class="producto-lista">
              <div class="producto-detalle">
                <i>ID</i>: <?=$producto->getID()?> <br>
                <i>Nombre</i>: <?=$producto->getNombre()?> <br>
                <i>Precio</i>: $<?=$producto->getPrecio()?> <br>
              </div>
              <div class="producto-imagen">
                <a href="producto.php?id=<?=$producto->getID()?>">
                  <img src="img/productos/<?=$producto->getImagen()?>" alt="">
                </a>
              </div>
            </div>
            <div class="producto-botones">
              <a href="editar.php?id=<?=$producto->getID()?>"><i class="material-icons">edit</i></a>
              <a href="borrar.php?id=<?=$producto->getID()?>"><i class="material-icons">delete_forever</i></a>
            </div>
          </article>
        <?php }?>
      </section>
    </div>

  </main>
</div>
  <?php require_once("footer.php"); ?>
