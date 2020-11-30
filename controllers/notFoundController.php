<?php

class notFoundController extends Controller{
	
	public function index() {

		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}

		$this->loadTemplate('404');
	}
}