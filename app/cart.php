<?php

include(__DIR__ . '/../structure/src/bootstrap.php');

$cart = new CShoppingcart(); 

$cart->getAction(); 
$cart->clear(); 
$cart->addItem();
$cart->drawCart(); 


