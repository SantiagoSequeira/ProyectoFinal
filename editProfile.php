<?php
  require_once("functions/functions.php");

   if (!issetUser()){
     redir("login");
   }
   if($_POST){
     $check = editUser($_POST);
     $user = $check["user"];
     $errors = $check["errors"];
     $errorNombre= $errors["nombre"];
     $errorEmail = $errors["email"];
     $errorPassword = $errors["password"];
     $errorTyC = $errors["tyc"];

   }
   require_once("header.php");
   $pagina = "profile";
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
            <label for="avatar"><img class="round-img" src="img/avatares/<?=$_SESSION["user"]["avatar"]?>" alt="foto de perfil" ></label>
            <input type="file" name="avatar" id="avatar">
          </div>
          <div class="inputsForm">
            <div> <?php echo (isset($errorNombre)) ? $errorNombre : "" ?> </div>
            <input class="controls" type="text"   name="nombre" placeholder="Name *" value="<?php echo (isset($user["nombre"]))? $user["nombre"]: $_SESSION["user"]["name"] ?>">
            <input class="controls" type="text" name="apellido" placeholder="Surname" value="<?php echo (isset($user["apellido"]))? $user["surname"]: $_SESSION["user"]["surname"] ?>">
            <div> <?php echo (isset($errorEmail))? $errorEmail: "" ?> </div>
            <input class="controls"   type="email" name="email" placeholder="Email *" value="<?php echo (isset($user["email"]))? $user["email"]: $_SESSION["user"]["email"]?>">
            <div> <?php echo (isset($errorPassword))? $errorPassword: "";?> </div>
            <input class="controls" type="password" name="password" placeholder="Password for save changes">
            <div> <?php echo (isset($errorTyC))? $errorTyC: "";?> </div>

          </div>
          <input  class="botons" type="submit" value="Save">
        </form>
      </div>
      </main>
<?php require_once("./footer.php"); ?>
