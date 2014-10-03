<?php

class CShoppingcart
{
    private $items = null; 
    
    public function __construct()
    {
        error_reporting(-1);
        session_name('shoppingcart');
        session_start();
    }
    public function __destruct() 
    {    
    } 
    public function clear()
    {
        //$_SESSION['cart'] = array('sum'=>0, 'numitems' => 0, 'items'=>array()); 
    }
    public function addItem()
    {
        $item = $_POST['itemid']; 
    }
    
    public function drawCart()
    {
        

        $currentItems = $_SESSION['cart']['content'] = <<<EOD
        <table>
        <tr><th>Item</th><th>Quantity</th><th>Sum</th></tr>
        </table>

EOD;
        echo json_encode($_SESSION['cart']);
    }
}

