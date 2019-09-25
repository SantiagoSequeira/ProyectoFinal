<?php require_once("./header.php"); ?>
<body>
  <div class="container">
    <header>
      <nav>
        <h1 class="titulo"><a href="index.html">My e-commerce</a></h1>
        <ul class="header-nav">
          <li><a href="cart.html">Carrito</a></li>
          <li><a href="faq.html">F.A.Q</a></li>
          <li><a href="login.html">Login</a></li>
          <li><a href="register.html">Register</a></li>
          <li><a href="profile.html"><img src="img/fotoperfil.png" alt="" class="img-user"></a></li>
        </ul>
        <div class="botonera">
          <a href=""><ion-icon name="menu"></ion-icon></a>
          <a href="profile.html"><ion-icon name="person"></ion-icon></a>
          <a href="cart.html"><ion-icon name="cart"></ion-icon></a>
          <a href="faq.html"><ion-icon name="help"></ion-icon></a>
        </div>
      </nav>
    </header>
    <main>
      <div class="contact-form">
        <h2>Contact form</h2>
        <form>
          <div class="form-group">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your name">
            </div>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <textarea rows="3" class="form-control" placeholder="Leave here you comment and we contact with you."></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </main>
  <?php require_once("./footer.php"); ?>
