<?php
  require_once("header.php");
  $pagina = "profile";
 if($_POST){
   $res = Validador::modificarUsuario($_POST);
   if($res === true){
     Core::redir("profile");
   } else {
     $errors = $res;
     $errorNombre= $errors["nombre"];
     $errorEmail = $errors["email"];
     $errorPassword = $errors["password"];
   }
 }

?>
<body>
  <div class="container">
    <header>
      <?php include_once("menu.php"); ?>
    </header>
    <main>
      <div class="form-register">
        <h4>Edit my profile</h4>
        <form class="editForm" action="" method="post" enctype="multipart/form-data">
          <div class="avatarForm">
            <label for="avatar"><img class="round-img" src="img/avatares/<?=$usuario->getAvatar()?>" alt="foto de perfil" ></label>
            <input type="file" name="avatar" id="avatar">
          </div>
          <div class="inputsForm">
            <input type="text" name="id" value="<?=$usuario->getId()?>" hidden style="display=none">
            <input type="text" name="lastAvatar" value="<?=$usuario->getAvatar()?>" hidden style="display=none">
            <div class="error-reg"> <?php echo (isset($errorNombre)) ? $errorNombre : "" ?> </div>
            <input class="controls" type="text"   name="nombre" placeholder="Name *" value="<?=$usuario->getNombre()?>">
            <input class="controls" type="text" name="apellido" placeholder="Surname" value="<?=$usuario->getApellido()?>">
            <div class="error-reg"> <?php echo (isset($errorEmail))? $errorEmail: "" ?> </div>
            <input class="controls"   type="email" name="email" placeholder="Email *" value="<?=$usuario->getEmail()?>">
            <div class="error-reg"> <?php echo (isset($errorPassword))? $errorPassword: "";?> </div>
            <input class="controls" type="password" name="password" placeholder="Password for save changes">
          </div>
          <input  class="botons" type="submit" value="Save">
        </form>
      </div>
      </main>
<?php require_once("./footer.php"); ?>
