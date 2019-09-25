<?php require_once("./header.php"); ?>
<body>
  <div class="container">
    <header>
      <nav>
        <h1 class="titulo"><a href="index.html">My e-commerce</a></h1>
        <ul class="header-nav">
          <li><a href="cart.html">Carrito</a></li>
          <li><a href="faq.html">F.A.Q</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li><a href="">Logout</a></li>
        </ul>
        <div class="botonera">
          <a href=""><ion-icon name="menu"></ion-icon></a>
          <a href="cart.html"><ion-icon name="cart"></ion-icon></a>
          <a href="index.html"><ion-icon name="home"></ion-icon></a>
        </div>
        </nav>
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
