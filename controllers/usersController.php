<?php

class usersController extends Controller{
	
	public function index() {

		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}

		$dados = array();

		$user  = new Users;
		$dados['users'] = $user->getUsers();

		$this->loadTemplate('user', $dados);
	}

	public function addUser() {
		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}
		$name	= filter_input(
            INPUT_POST,'inputName',FILTER_SANITIZE_SPECIAL_CHARS);
		$email	= filter_input(
            INPUT_POST,'inputEmail',FILTER_SANITIZE_SPECIAL_CHARS);
		$password	= filter_input(
            INPUT_POST,'inputPassword',FILTER_SANITIZE_SPECIAL_CHARS);

		$dados = array();

		$dados['name'] = $name;
		$dados['email'] = $email;
		$dados['password'] = $password;
		$dados['image'] = '';

		$user = new Users();
		$resp = $user->addUser($dados); 
	}

	public function select($id){
		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}
		$dados = array();

		if(isset($_POST['iduser']) && preg_match("/^[0-9]+/", $_POST['iduser'])) {
			$iduser = intval($_POST['iduser']);

			$user = new Users;
			$dados['users'] = $user->getUser($iduser);
		}	
		$this->loadTemplate('user', $dados);
	}


	public function edtuser() {
		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}

		$iduser	= filter_input(
            INPUT_POST,'iduserE',FILTER_SANITIZE_SPECIAL_CHARS);
		$name	  = filter_input(
            INPUT_POST,'inputNameE',FILTER_SANITIZE_SPECIAL_CHARS);
		$email	= filter_input(
            INPUT_POST,'inputEmailE',FILTER_SANITIZE_SPECIAL_CHARS);
		$dados = array();

		$dados['iduser'] = $iduser;
		$dados['name']   = $name;
		$dados['email']  = $email;

		$user = new Users();
		$resp = $user->edtUser($dados); 
	}


	public function delete($id) {
		if(!isset($_SESSION['carrinho'])){
			$_SESSION['carrinho'] = array();
		}
		$dados = array();

		if(isset($id) && preg_match("/^[0-9]+/", $id)) {
			$iduser = intval($id);

			$user = new Users;
			$user->deleteUser($iduser);
		}	
		header("Location: ". BASE_URL."users/index");
	}
}