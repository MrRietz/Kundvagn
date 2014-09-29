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
  <table>
    <tr>
        <th>Art Nr</th>
        <th>Namn</th>
        <th>Moms</th>
        <th>Pris inkl moms</th>
        <th>Antal</th>
        <th>Köp</th>
    </tr>
    <?php
 
    $jsonstring = file_get_contents("exempelartiklar.json");
    $productsArray = json_decode($jsonstring, true); 
    foreach ($productsArray as $key => $obj) 
    {
        $vat = ($obj['vat'] / 100)*$obj['price']; 
        $fullPrice = $obj['price'] + $vat; 
        echo "<tr>
        <td>" .         $obj['code'] ."</td>
        <td>" .         $obj['name'] ."</td>
        <td><center>" . round($vat)         ."</center></td>   
        <td><center>" . round($fullPrice)   ."</center></td>
        <td><center><input type='number' name='nrOfProd' min='1' max='99'></center></td>
        <td><center><button id='book1' class='purchase'>Lägg i korg</button></center></td>
        </tr>";
    }?>
  </table>
  <?php
    $cart = new CShoppingcart(); 
    $cart->update(); 
    $cart->draw(); 
  ?>
</div>

<?php $path=__DIR__; include(__DIR__ . '/../structure/footer.php'); ?>
