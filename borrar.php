<?php
  require_once("header.php");
	$pagina = "admin";
  if (isset($_SESSION["Administrador"])) {
      if($_GET["id"]){
        $id = $_GET["id"];
        if(is_numeric($id)){
          $producto = Core::getProductoPorID($id);
        } else {
          Core::redir();
        }
        if(!$producto){
          Core::redir("admin");
        } else {
          if($_POST){
            $admin->borrarProducto($id);
          }
        }
      } else {
        Core::redir();
      }
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
      <h4>Agregar producto</h4>
      <form class="" action="" method="post" enctype="multipart/form-data" id="form-borrar">
        <input type="text"  name="ID" value="<?=$producto->getID()?>" style="display:none" >
        <input type="text"  name="lastImagen" value="<?=$producto->getImagen()?>" style="display:none"  disabled >
        <input class="controls" type="text"  name="nombre" placeholder="Nombre *" value="<?=$producto->getNombre()?>"  disabled >
        <input class="controls" type="number" name="precio" placeholder="Precio *" value="<?=$producto->getPrecio()?>"  disabled >
        <div class="marca-categoria">
          <div class="">
            <div> <label for="marca">Marca:</label> </div>
            <select class="selector" name="marca"  disabled  >
              <?php foreach (Core::getMarcas() as $marca) { if($producto->getMarca() == $marca["id"]){?>
                <option value="<?=$marca["id"]?>" selected><?=$marca["nombre"]?></option>
          <?php  } else {?>
            <option value="<?=$marca["id"]?>"><?=$marca["nombre"]?></option>
          <?php }} ?>
              <option value="0">Agregar marca</option>
            </select>
            <input type="text" class="option-selector" name="addMarc" value="" placeholder="Selecciona agregar!" disabled >
          </div>
          <div class="">
            <div> <label for="categoria">Categoria:</label> </div>
            <select class="selector" name="categoria" disabled  >
              <?php foreach (Core::getCategorias() as $categoria) { if($producto->getCategoria() == $categoria["id"]) {?>
                <option value="<?=$categoria["id"]?>" selected><?=$categoria["nombre"]?></option>
          <?php  } else { ?>
                <option value="<?=$categoria["id"]?>"><?=$categoria["nombre"]?></option>
          <?php } } ?>
              <option value="0">Agregar categoria</option>
            </select>
            <input type="text" class="option-selector" name="addCat" value="" placeholder="Selecciona agregar!" disabled >
          </div>
        </div>
        <textarea class="controls" name="descripcion" rows="3" cols="20" disabled  placeholder="Descripción *"><?=$producto->getDescripcion()?></textarea>
        <input class="controls" type="text" name="stock" placeholder="Stock *" value="<?=$producto->getStock()?>" disabled  >
        <div> <label for="imagen">Imagen</label> </div>
        <input class="controls" type="file" name="imagen" id="avatar" accept="image/jpeg,image/jpg,image/png" disabled   >
        <input  class="botons" type="submit" value="Borrar">
      </form>
    </div>
<script type="text/javascript">
  let form = document.getElementById('form-borrar');
  form.addEventListener('submit',function(e){
    e.preventDefault();
    let opc = confirm('¿Estas seguro?');
    if(opc){
      form.submit();
    }
  })
</script>
  </main>
</div>
  <?php require_once("footer.php"); ?>
