<?php

class CItems
{
    private $items = null;
    
    public function __construct($jsonFile)
    {
        $this->items = json_decode($jsonFile,true); 
    }
    public function __destruct() 
    {
        
    }
    public function getItems()
    {
        return $this->items; 
    }
    public function draw() 
    {
        $table = null; 
        $table .= "<table>
        <tr>
            <th>Art Nr</th>
            <th>Namn</th>
            <th>Moms</th>
            <th>Pris inkl moms</th>
            <th>Antal</th>
            <th>Köp</th>
        </tr>"; 
        foreach ($this->items as $key => $obj) 
        {
            $vat = ($obj['vat'] / 100)*$obj['price']; 
            $fullPrice = $obj['price'] + $vat; 
            $table .=
           "<tr>
            <td>" .         $obj['code'] ."</td>
            <td>" .         $obj['name'] ."</td>
            <td><center>" . round($vat)         ."</center></td>   
            <td><center>" . round($fullPrice)   ."</center></td>
            <td><center><input type='number' name='nrOfProd' min='1' max='99'></center></td>
            <td><center><button id='$key' class='purchase'>Lägg i korg</button></center></td>
            </tr>";
        }
        $table .= "</table>"; 
        echo $table; 
    }
}
