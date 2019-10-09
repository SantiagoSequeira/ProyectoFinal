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
      <div class="faqtitulo">
       <h2> Frequently Asked Questions</h2>
     </div>
     <div class="faqmenu">
       <a href="#Q1">Question1?</a>
       <a href="#Q2">Question2?</a>
       <a href="#Q3">Question3?</a>
       <a href="#Q4">Question4?</a>
       <a href="#Q5">Question5?</a>
       <a href="#Q6">Question6?</a>
       <a href="#Q7">Question7?</a>
       <a href="#Q8">Question8?</a>
     </div>
     <div class="hquestions">
       <div class="row1">
        <h3 id="Q1" >Question1?</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
       <h3 id="Q2">Question2?</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
       <h3 id="Q3">Question3?</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
       <h3 id="Q4">Question4?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
    <div class="row2">
      <h3 id="Q5">Question5?</h3>
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
     <h3 id="Q6">Question6?</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
     <h3 id="Q7">Question7?</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
     <h3 id="Q8">Question8?</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
   </div>
 </main>
<?php require_once("./footer.php"); ?>
