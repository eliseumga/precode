<?php 

class homeController extends Controller {

	public function index() {

		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}

		$product = new Product();
		$pro = $product->getProducts();
		$data = array();
		$data['produtos'] = $pro;

		$this->loadTemplate('home', $data);
	}

	public function productdetails($id) {
		$product = new Product();
		$prod = $product->getProductImgs($id);
		$data = array();
		$data['produtos'] = $prod;

		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		} else {
			$data['carrinho'][$id] = 0;			
		}

		$this->loadTemplate('productdetails', $data);
	}

	public function add() {
		if(isset($_POST['id']) && preg_match("/^[0-9]+/", $_POST['id'])) {
			$idProduto = intval($_POST['id']);
			if(!isset($_SESSION['carrinho'][$idProduto])){
				$_SESSION['carrinho'][$idProduto] = 1;
			} else {
				$_SESSION['carrinho'][$idProduto] += 1;
			}
			header("Location: ../../");
		} 
	}

	public function carrinho() {
		$data = array();
		$product = new Product();

		if(count($_SESSION['carrinho']) == 0){
			header("Location: ".BASE_URL."");
		} else {
			foreach ($_SESSION['carrinho'] as $id => $qtd){
				$prod = $product->getProduct($id);

				$data[] = array(
					'id'  	=> $id,
					'name'  => $prod[0]['name'], 
					'qtde'	=> $qtd,
					'price' => $prod[0]['price'], 
					'total' => ($prod[0]['price'] * $qtd)
				);
			}	
		}
		$this->loadTemplate('carrinho', $data);
	}

	public function delete($id) {
		if(isset($id) && preg_match("/^[0-9]+/", $id)) {
			if(!isset($_SESSION['carrinho'][$id])){
				unset($_SESSION['carrinho'][$id]);
			} else {
				$qtde = (int)$_SESSION['carrinho'][$id];

				if($qtde > 1) {
					$_SESSION['carrinho'][$id] -= 1;
				} else {
					unset($_SESSION['carrinho'][$id]);
					header("Location: ".BASE_URL."");
				}
			}
			header("Location: ".BASE_URL."home/carrinho");
		} 
	}

	public function search() {
		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}

		$str = anti_injection($_POST['search']);
		$data = array();
		if(isset($str)) {
			$product = new Product();
			$pro = $product->getLikeProducts($str); 
			$data['produtos'] = $pro;
			$this->loadTemplate('home', $data);
		}
	}

	public function getTotalCarrinho() {
		return 0;
		if(count($_SESSION['carrinho']) > 0){
			return count($_SESSION['carrinho']);
		}
	}	

	public function set($key, $value) {
		$this->data[$key] = $value;
	}	
}
