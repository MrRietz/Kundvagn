<?php

include(__DIR__ . '/../structure/src/bootstrap.php');



$action= empty($_GET['action']) ? null : $_GET['action'];

$cart = new CShoppingcart($action); 


if ($this->action == 'clear' || !isset($_SESSION['cart'])) {
    $cart->clear(); 
}

$cart->addItem();
$cart->drawCart(); 


