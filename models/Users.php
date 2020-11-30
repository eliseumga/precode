<?php

class Users extends Model {

	public function getUsers() {
		$array	= array();
		$wsql   = "SELECT ";
		$wsql  .= " iduser, name, email, password, image";
		$wsql  .= " FROM users ";
		$stmt		= $this->db->prepare($wsql);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			$array = $stmt->fetchAll();
		}
		return $array;
	}

	public function getUser($id) {
		$array	= array();
		$wsql   = "SELECT ";
		$wsql  .= " iduser, name, email, password, image";
		$wsql  .= " FROM users ";
		$wsql  .= " WHERE iduser = :iduser";
		$stmt		= $this->db->prepare($wsql);
		$stmt->bindValue(":iduser", $id, \PDO::PARAM_INT);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			$array = $stmt->fetchAll();
		}
		return $array;
	}

	public function addUser($dados) {
		$email = $dados['email'];

		$mensage = array();

		$wsql   = "SELECT ";
		$wsql  .= " iduser, name, email, password, image";
		$wsql  .= " FROM users ";
		$wsql  .= " WHERE email = :email";
		$stmt		= $this->db->prepare($wsql);
		$stmt->bindValue(":email", $email, \PDO::PARAM_STR);
		$stmt->execute();

		if($stmt->rowCount() <= 0) {
			try {
				$wsql   = "INSERT INTO users ";
				$wsql  .= "(name, email, password, image)";
				$wsql  .= "values (:name, :email, :password, :image)";
				$stmt		= $this->db->prepare($wsql);
				$stmt->bindValue(":name", $dados['name'], \PDO::PARAM_STR);
				$stmt->bindValue(":email", $dados['email'], \PDO::PARAM_STR);
				$stmt->bindValue(":password", $dados['password'], \PDO::PARAM_STR);
				$stmt->bindValue(":image", $dados['image'], \PDO::PARAM_STR);
				$stmt->execute();
				$mensage[] = array(
					"tipo" => "success",
					"msg" => "Cadastro efetuado com Sucesso!"
				);	
				echo json_encode($mensage);
			} catch (PDOException $e) {
				$mensage[] = array(
					"tipo" => "error",
					"msg" => $e->getMessage()
				);	
				echo json_encode($mensage);
			}	
		} else {
			$mensage[] = array(
				"tipo" => "warning",
				"msg" => "O e-mail informado já está em uso!"
			);
			echo json_encode($mensage);
		}	
	}

	public function edtUser($dados) {
		$iduser= $dados['iduser'];
		$name  = $dados['name'];
		$email = $dados['email'];
		$mensage = array();
		try {
			$wsql   = "UPDATE users SET";
			$wsql  .= "  name = :name, email = :email";
			$wsql  .= " WHERE iduser = :iduser";
			$stmt		= $this->db->prepare($wsql);
			$stmt->bindValue(":name", $name, \PDO::PARAM_STR);
			$stmt->bindValue(":email", $email, \PDO::PARAM_STR);
			$stmt->bindValue(":iduser", $iduser, \PDO::PARAM_INT);
			$stmt->execute();
			$mensage[] = array(
				"tipo" => "success",
				"msg" => "Dados alterados com Sucesso!"
			);	
			echo json_encode($mensage);
		} catch (PDOException $e) {
			$mensage[] = array(
				"tipo" => "error",
				"msg" => $e->getMessage()
			);	
			echo json_encode($mensage);
		}	
	}

	public function deleteUser($id) {
		$iduser = $id;
		$mensage = array();
		try {
			$wsql   = "DELETE FROM users WHERE iduser = :iduser";
			$stmt		= $this->db->prepare($wsql);
			$stmt->bindValue(":iduser", $iduser, \PDO::PARAM_INT);
			$stmt->execute();
			$mensage[] = array(
				"tipo" => "success",
				"msg" => "Registro excluído com Sucesso!"
			);	
			echo json_encode($mensage);
		} catch (PDOException $e) {
			$mensage[] = array(
				"tipo" => "error",
				"msg" => $e->getMessage()
			);	
			echo json_encode($mensage);
		}	
	}

}