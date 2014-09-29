<?php

class CShoppingcart
{
    private $action = null; 
    private $items = null; 
    
    public function __construct()
    {
        session_name('shoppingcart');
        session_start();
        $jsonFile = file_get_contents("exempelartiklar.json");
        $this->items = json_decode($jsonFile,true); 
    }
    public function __destruct() 
    {
        
    } 
    public function addItem()
    {
        if($this->action == 'add' && !empty($_POST['itemid'])) {
            
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
        if ($action == 'clear' || !isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array('sum'=>0, 'numitems' => 0, 'items'=>array()); 
        }
    }
    public function draw()
    {
        
    }
    
    
}
