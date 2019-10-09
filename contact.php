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
       <div class="form-cont">
         <h4>Contact Form</h4>
         <form class="" action="" method="post">
           <input class="controls" type="text" name="name" placeholder="Enter your name">
           <input class="controls" type="email" name="email" placeholder="Enter your email">
           <textarea rows="3" class="form-control" placeholder="Leave here you comment and we contact with you."></textarea>
           <button type="submit" class="botons" >Submit</button>
         </form>
       </div>
    </main>
  <?php require_once("./footer.php"); ?>
