<?php
namespace App\Models;

class ProductModel
{
    function __construct(){
      
    }
    public function listItems(){
        $products = [
            ["name" => "TT Shoe", "price" => "50", "qty" => 100, "description" => 'Quality shoe from pure leather.'],
            ["name" => "Runner Shoe", "price" => "60", "qty" => 100, "Suited for sport."]
            ];
        return $products;
    }
}
 ?>
