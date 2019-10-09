<?php
  require_once("header.php");
  $pagina = "faq";
?>
<body>
  <div class="container">
    <header>
      <?php include_once("menu.php"); ?>
    </header>
    <main>
      <div class="faq-background">
        <h4 class="faq">Frequently Asked Questions</h4>
        <dl class="ask">
          <dt onclick="answer('id-1')" class="faq-titulo">Who we are?</dt>
          <dd class="answer" id="id-1" style="display: none">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
          </dd>
        </dl>
        <dl class="ask">
          <dt onclick="answer('id-2')" class="faq-titulo">How to buy?</dt>
          <dd class="answer" id="id-2" style="display: none">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </dd>
        </dl>
        <dl class="ask">
          <dt onclick="answer('id-3')" class="faq-titulo">What credit cards do we accept?</dt>
          <dd class="answer" id="id-3" style="display: none">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </dd>
        </dl>
        <div class="boton edit-faq">
          <a href=""><button class="boton1" type="button" name="button">Edit</button></a>
        </div>
      </div>

      </main>
<?php require_once("./footer.php"); ?>
