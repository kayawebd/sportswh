<?php
require_once("DBAccess.php");
class Product
{
	private $_productName;
	private $_productId;
	private $_price;
	private $_salePrice;
	private $_productPhoto;
	private $_db;

	public function __construct()
	{
		include "settings/db.php";
		try {
			$this->_db = new DBAccess($dsn, $username, $password);
		} catch (PDOException $e) {
			die("Unable to connect to database, " . $e->getMessage());
		}
	}

	//get product ID, there is no set as the primary key should not be changed
	public function getProductID()
	{
		return $this->_productId;
	}
	public function getProductName()
	{
		return $this->_productName;
	}
	public function getPrice()
	{
		return $this->_price;
	}
	public function getSalePrice()
	{
		return $this->_salePrice;
	}
	public function getProductPhoto()
	{
		return $this->_productPhoto;
	}

	//get a product from the database for the id supplied
	public function getProduct($id)
	{
		try {
			$pdo = $this->_db->connect();
			$sql = "select itemId, itemName, price, salePrice, photo from item where itemId = :itemId";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':itemId', $id, PDO::PARAM_INT);
			$rows = $this->_db->executeSQL($stmt);

			//get the first row as it is a primary key there will only be one row
			$row = $rows[0];

			//populate the private properties with the retreived values
			$this->_productId = $row["itemId"];
			$this->_productName = $row["itemName"];
			$this->_price = $row["price"];
			$this->_salePrice = $row["salePrice"];
			$this->_productPhoto = $row["photo"];
		} catch (PDOException $e) {
			throw $e;
		}
	}

	// get all products 
	public function getProducts()
	{
		try {
			//connect to db
			$pdo = $this->_db->connect();

			//set up SQL
			$sql = "SELECT itemId, itemName, photo, price, salePrice, description FROM item";
			$stmt = $pdo->prepare($sql);

			//execute SQL
			$rows = $this->_db->executeSQL($stmt);

			return $rows;
		} catch (PDOException $e) {
			throw $e;
		}
	}
}
