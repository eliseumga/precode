<?php

class Product extends Model {

	public function getProducts() {
		$array	= array();
		$wsql   = "SELECT p.id, p.name, p.price, p.description, ";
		$wsql  .= " i.url, p.preco_promocao, p.nota, p.qtde_vendida, ";
		$wsql  .= "	i.image_main FROM product p ";
		$wsql  .= "LEFT JOIN product_images i ON (p.id = i.id_product) ";
		$wsql  .= " AND i.image_main = 'S' ";
		$stmt		= $this->db->prepare($wsql);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			$array = $stmt->fetchAll();
		}
		return $array;
	}

	public function getProduct($id) {
		$array	= array();
		$wsql   = "SELECT p.id, p.name, p.price, p.description, ";
		$wsql  .= " i.url, p.preco_promocao, p.nota, p.qtde_vendida, ";
		$wsql  .= " i.image_main FROM product p ";
		$wsql  .= "LEFT JOIN product_images i ON (p.id = i.id_product) ";
		$wsql  .= " WHERE i.id_product = :id";
		$wsql  .= " AND i.image_main = 'S' ";
		$stmt = $this->db->prepare($wsql);
		$stmt->bindValue(":id", $id, \PDO::PARAM_INT);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			$array = $stmt->fetchAll();
		}
		return $array;
	}

	public function getLikeProducts($string) {
		$array	= array();
		$wsql   = "SELECT p.id, p.name, p.price, p.description, ";
		$wsql  .= " i.url, p.preco_promocao, p.nota, p.qtde_vendida, ";
		$wsql  .= " i.image_main FROM product p ";
		$wsql  .= "LEFT JOIN product_images i ON (p.id = i.id_product) ";
		$wsql  .= " WHERE p.name like :string";
		$wsql  .= " AND i.image_main = 'S' ";
		$stmt = $this->db->prepare($wsql);
		$stmt->bindValue(":string", '%'.$string.'%', \PDO::PARAM_STR);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			$array = $stmt->fetchAll();
		}
		return $array;
	}

	public function getProductImgs($id) {
		$array	= array();
		$wsql   = "SELECT p.id, p.name, p.price, p.description, ";
		$wsql  .= " i.url, p.preco_promocao, p.nota, p.qtde_vendida FROM product p ";
		$wsql  .= "LEFT JOIN product_images i ON (p.id = i.id_product) ";
		$wsql  .= " WHERE i.id_product = :id";
		$stmt = $this->db->prepare($wsql);
		$stmt->bindValue(":id", $id, \PDO::PARAM_INT);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			$array = $stmt->fetchAll();
		}
		return $array;
	}

	public function getImagesProducts($id) {
		$array	= array();
		$wsql = "SELECT * FROM product_images WHERE id_product = :id";
		$stmt = $this->db->prepare($wsql);
		$stmt->bindValue(":id", $id, \PDO::PARAM_INT);
		$stmt->execute();

		if($stmt->rowCount() > 0) {
			$array = $stmt->fetchAll();
		}
		return $array;
	}

}