<?php
require_once("DBAccess.php");
class Authentication
{
	const LoginPageURL = "./login.php";
	const AdminSuccessPageURL = "./admin/displayDashboard.php";
	const UserSuccessPageURL = "./admin/displayUserProfile.php";
	private static $_db;

	// CREATE USER
	public static function createUser($uname, $pword, $email)
	{
		$hash = password_hash($pword, PASSWORD_DEFAULT);
		include "settings/db.php";
		try {
			self::$_db = new DBAccess($dsn, $username, $password);
		} catch (PDOException $e) {
			die("Unable to connect to the database, " . $e->getMessage());
		}
		try {
			$pdo = self::$_db->connect();
			$sql = "INSERT INTO user(userName, password, email) VALUES(:username, :password, :email)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":username", $uname, PDO::PARAM_STR);
			$stmt->bindParam(":password", $hash, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$result = self::$_db->executeNonQuery($stmt);
		} catch (PDOException $e) {
			throw $e;
		}
		return "New user: " . $uname . " added";
	}

	//  LOGIN
	public static function login($identifier, $pword)
	{
		$hash = "";
		include "settings/db.php";
		try {
			self::$_db = new DBAccess($dsn, $username, $password);
		} catch (PDOException $e) {
			die("Unable to connect to the database, " . $e->getMessage());
		}
		try {
			$pdo = self::$_db->connect();

			$sql = "SELECT username, password, roles FROM user WHERE userName=:identifier OR email=:identifier";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":identifier", $identifier, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($result) {
				$uname = $result['username'];
				$hash = $result['password'];
				$roles = $result['roles'];
			} else {
				return false; // User not found
			}
		} catch (PDOException $e) {
			throw $e;
		}
		if (password_verify($pword, $hash)) {
			$_SESSION["username"] = $uname;
			$sql = "SELECT phone, email, `address`, roles FROM user WHERE username = :username";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(":username", $uname, PDO::PARAM_STR);
			$stmt->execute();
			$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION["phone"] = $userInfo["phone"];
			$_SESSION["email"] = $userInfo["email"];
			$_SESSION["address"] = $userInfo["address"];
			$_SESSION["roles"] = $userInfo["roles"];

			// if ($roles === 'admin') {
			// 	header("Location: " . self::AdminSuccessPageURL);
			// } else {
			// 	header("Location: " . self::UserSuccessPageURL);
			// }
			header("Location: " . self::AdminSuccessPageURL);
			exit;
		} else {
			return false;
		}
	}

	// LOG OUT 
	public static function logout()
	{
		unset($_SESSION["username"]);
		header("Location: " . self::LoginPageURL);
		exit;
	}

	// ADMIN ACESS CONTROL
	public static function protectAdmin()
	{
		if (!isset($_SESSION["username"])) {
			header("Location: " . self::LoginPageURL);
			exit;
		}
		if ($_SESSION["roles"] !== 'admin') {
			exit("Access denied. Only admins are allowed to access this page.");
		}
	}

	// USER ACESS CONTROL
	public static function protectUser()
	{
		if (!isset($_SESSION["username"])) {
			header("Location: " . self::LoginPageURL);
			exit;
		}
	}
}
