<?php

class CShoppingcart
{
    private $items = null; 
    
    public function __construct($items)
    {
        error_reporting(-1);
        session_name('shoppingcart');
        session_start();
        $this->items = $items;
    }
    public function __destruct() 
    {    
    } 
    public function clear()
    {
        $_SESSION['cart'] = array('sum'=>0, 'nrOfItems' => 0, 'items'=>array()); 
    }
    public function addItem()
    {
        $itemid = $_POST['itemid'];
        $price = $items[$itemid]['price'];
        $title = $items[$itemid]['title'];

        if(isset($_SESSION['cart']['items'][$itemid])) {
          $_SESSION['cart']['items'][$itemid]['nrOfItems']++;
          $_SESSION['cart']['items'][$itemid]['sum'] += $price;
          echo "me gusta isset";
        } else {
            echo "else"; 
          $_SESSION['cart']['items'][$itemid] = array('nrOfItems' => 1, 'sum' => $price, 'title' => $title);
        }

        $_SESSION['cart']['nrOfItems']++;
        $_SESSION['cart']['sum'] += $price;
        //come back here to fix up this
       /* $itemid = $_POST['itemid'];  
        
        $vat = ($this->items[$itemid].vat / 100)*$this->items[$itemid].price; 
        $fullPrice = $this->items[$itemid].price + $vat; 
        
        $title = $this->items[$itemid].name; 
        if(isset($_SESSION['cart']['items'][$itemid])) {
            $_SESSION['cart']['items'][$itemid]['nrOfItems']++;
            $_SESSION['cart']['items'][$itemid]['sum'] += $fullPrice;
        } else {
            $_SESSION['cart']['items'][$itemid] = array('nrOfItems' => 1, 'sum' => $fullPrice, 'title' => $title);
        }
        $_SESSION['cart']['nrOfItems']++;
        $_SESSION['cart']['sum'] += $fullPrice;   */
    }
    
    public function drawCart()
    {
        // Draw html table of items  by using a view/template file
        $currentItems = $_SESSION['cart']['items'];

       $rows = null;
        foreach($currentItems as $key => $val) {
          $rows .= "<tr><td>{$val['title']}</td><td>{$val['nrOfItems']}</td><td>{$val['sum']}</td></tr>\n";
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
