<?php
  require_once("functions.php");
  if (!issetUser()){
    redir("login");
  }
  if($_POST){
    var_dump($_POST,$_SESSION);
    exit;
  }
  require_once("header.php");
  $pagina = "profile";
?>
<body>
  <div class="container">
    <header>
      <?php include_once("menu.php"); ?>
    </header>
      <div class="profile">
        <h2 >Editar Mi Perfil</h2>
        <div class="perfilBasico">
          <form method="post" enctype="multipart/form-data">
            <div class="">
              <label for="avatar"><img src="img/avatares/<?=$_SESSION["user"]["avatar"]?>" alt="foto de perfil"></label>
              <input type="file" name="avatar" id="avatar">
            </div>
            <div class="">
              <label for="nombre">Nombre:</label>
              <input type="text" name="nombre" placeholder="<?=$_SESSION["user"]["name"]?>" id="nombre">
            </div>
            <div class="">
              <label for="apellido">Apellido:</label>
              <input type="text" name="" placeholder="<?=$_SESSION["user"]["surname"]?>">
            </div>
            <div class="">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" placeholder="<?=$_SESSION["user"]["email"]?>">
            </div>
            <div class="">
              <button class="boton1" name="submit" value="Enviar">Guardar</button>
            </div>
          </form>
        </div>
      </div>
<?php require_once("./footer.php"); ?>
