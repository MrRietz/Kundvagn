<?php

include(__DIR__ . '/../structure/src/bootstrap.php');

$jsonFile = file_get_contents("exempelartiklar.json");
$cart = new CShoppingcart($jsonFile); 

$action= empty($_GET['action']) ? null : $_GET['action'];

if ($action == 'clear' || !isset($_SESSION['cart'])) {
    $cart->clear(); 
}
// Action to add item in shopping cart
if ($action == 'add' && !empty($_POST['itemid'])) {
    $cart->addItem();
}
$cart->drawCart(); 
