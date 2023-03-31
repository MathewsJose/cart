<?php
namespace App\Controllers;

use App\Core\Init;
Class ProductController
  {
	
	private $model;
  	function __construct( $tile )
  	{
  		$this->model = new $tile;
  	}

  	public function index()
  	{
		$products = $this->model->listItems();
		Init::view('index', ['products' => $products]);
  	}
}
?>
