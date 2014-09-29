<?php

class CShoppingcart
{
    private $action = null; 
    private $items = null; 
    
    public function __construct()
    {
        error_reporting(-1);
        session_name('shoppingcart');
        session_start();
        $jsonFile = file_get_contents("exempelartiklar.json");
        $this->items = json_decode($jsonFile,true); 
    }
    public function __destruct() 
    {
        
    } 
    private function clear()
    {
         if ($this->action == 'clear' || !isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array('sum'=>0, 'numitems' => 0, 'items'=>array()); 
        }
    }
    private function addItem()
    {
        if($this->action == 'add' && !empty($_POST['itemid'])) {
            $itemid = $_POST['itemid'];  
            $price = $items[$itemid]['price'];
            $title = $items[$itemid]['title'];
            
            if(isset($_SESSION['cart']['items'][$itemid])) {
                $_SESSION['cart']['items'][$itemid]['nrOfItems']++;
                $_SESSION['cart']['items'][$itemid]['sum'] += $price;
             } else {
                $_SESSION['cart']['items'][$itemid] = array('nrOfItems' => 1, 'sum' => $price, 'title' => $title);
             }

            $_SESSION['cart']['nrOfItems']++;
            $_SESSION['cart']['sum'] += $price;   
        }
    }
    private function getAction()
    {
        // Get the action that controlls what will happen
        $action = empty($_GET['action']) ? null : $_GET['action'];
    }
    public function update()
    {
        $this->getAction(); 
        $this->addItem(); 
        $this->clear(); 
    }
    public function draw()
    {
        // Draw html table of items  by using a view/template file
        $items = $_SESSION['cart']['items'];

        $rows = null;
        foreach($items as $key => $val) {
          $rows .= "<tr><td>{$val['title']}</td><td>{$val['numitems']}</td><td>{$val['sum']}</td></tr>\n";
        }

        $items = $_SESSION['cart']['content'] = <<<EOD
        <table>
        <tr><th>Item</th><th>Quantity</th><th>Sum</th></tr>
        {$rows}
        </table>

EOD;
        echo json_encode($_SESSION['cart']);
    }
    
    
}
