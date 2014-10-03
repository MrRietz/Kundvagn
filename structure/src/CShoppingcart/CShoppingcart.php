<?php

class CShoppingcart
{
    private $items = null; 
    
    public function __construct($items)
    {
        error_reporting(-1);
        session_name('shoppingcart');
        session_start();

        $this->items = json_decode($items,true); 

    }
    public function __destruct() 
    {
        
    } 
    public function clear()
    {
        $_SESSION['cart'] = array('sum'=>0, 'numitems' => 0, 'items'=>array()); 
    }
    public function addItem()
    { 
        echo $_POST['itemid'];
        
        $itemid = $_POST['itemid'];  
        $price = $this->items[$itemid]['price'];
        $title = $this->items[$itemid]['title'];
            
        if(isset($_SESSION['cart']['items'][$itemid])) {
            $_SESSION['cart']['items'][$itemid]['nrOfItems']++;
            $_SESSION['cart']['items'][$itemid]['sum'] += $price;
        } else {
            $_SESSION['cart']['items'][$itemid] = array('nrOfItems' => 1, 'sum' => $price, 'title' => $title);
        }
        $_SESSION['cart']['nrOfItems']++;
        $_SESSION['cart']['sum'] += $price;   
    }
    public function drawCart()
    {
        // Draw html table of items  by using a view/template file
        $currentItems = $_SESSION['cart']['items'];

        $rows = null;
        foreach($currentItems as $key => $val) {

          $rows .= "<tr><td>{$val['name']}</td><td>{$val['numitems']}</td><td>{$val['sum']}</td></tr>\n";
        }

        $currentItems = $_SESSION['cart']['content'] = <<<EOD
        <table>
        <tr><th>Item</th><th>Quantity</th><th>Sum</th></tr>
        {$rows}
        </table>

EOD;
        echo json_encode($_SESSION['cart']);
    }
}
