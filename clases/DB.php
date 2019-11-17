<?php
	abstract class DB {
		private static $dsn = 'mysql:host=localhost;dbname=ecommerce';
		private static $user = 'root';
		private static $password = '';
		private static $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

		static function open(){
			try {
				$db = new PDO(self::$dsn,self::$user,self::$password,self::$options);
				return $db;
			} catch (PDOException $e){
				header("Location: error.php");
			}
		}
	}
