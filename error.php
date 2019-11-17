<?php
  require_once("header.php");
  $pagina = "error";
?>
<body>
<div class="container">
  <header>
    <?php include_once("menu.php"); ?>
  </header>
  <main>
    <div class="error">
      <h1>Lamentablemente tenemos problemas al conectar con nuestra base de datos!</h1>
    </div>
  </main>
</div>
  <?php require_once("footer.php"); ?>
