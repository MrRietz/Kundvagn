<?php 
$title='A shopping cart using jQuery and ajax'; 
include(__DIR__ . '/../structure/header.php'); 
include(__DIR__ . '/../structure/src/bootstrap.php');
?>

<div id='flash'>
  <h1>Kundkorg</h1>
  <div id='cart'>
    <h2><img src="/img/cart.png" width="40px">Shopping cart</h2>
    <div id='content'></div>
    <p>
      Antal varor: <span id="numitems">0</span><br/>
      Totalpris inkl moms: <span id="sum">0kr</span><br/><br/>
      <input id="clear" type="button" value="Clear" />  <span id="status">Köp något.</span>
    </p>
  </div>
  <?php
      $jsonFile = file_get_contents("exempelartiklar.json");
      $items = new CItems($jsonFile);
      $items->draw(); 
  ?>
</div>

<?php $path=__DIR__; include(__DIR__ . '/../structure/footer.php'); ?>
