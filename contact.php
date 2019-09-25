<?php
  require_once("header.php");
  $pagina = "contact";
?>
<body>
  <div class="container">
    <header>
      <?php include_once("menu.php"); ?>
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
