<?php
  require_once("functions.php");
  if (!issetUser()){
    redir("login");
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
        <h2 >Mi Perfil</h1>
        <div class="perfilBasico">
          <img src="img/fotoperfil.png" alt="foto de perfil">
          <h2 class="NombreC">Nombre Usuario</h2>
          <h4 class="emailU">EmailUsuario@gmail.com</h4>
          <div class="boton">
          <button class="boton1" type="button" name="button">Editar</button>
          </div>
        </div>
        <div class="tarjetas">
          <h2 class="tarjetaCred">Tarjetas de Crédito</h2>
          <img src="img/tarjeta.jpg" alt="">
          <p>Guardá de manera segura los datos de tu tarjeta y agilizá el pago de tu próxima compra.</p>
          <button class="boton2" type="button" name="button">Agregar</button>
        </div>
        <div class="facturacion">
          <h2 class="factura">Facturación</h2>
          <img src="img/factura.jpeg" alt="factura">
          <p>Completá tus datos de facturación y agilizá el pago de tu próxima compra.</p>
          <button class="boton3" type="button" name="button">Agregar</button>
        </div>
      </div>
<?php require_once("./footer.php"); ?>
