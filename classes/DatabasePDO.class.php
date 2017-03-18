<?php
	class DatabasePDO extends PDO
	{	
		private static $instance;
		
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//Retourne l'instance unique.
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		public static function singleton()
		{
			if (self::$instance === null) {
				self::$instance = new DatabasePDO();
			}
			return self::$instance;
		}
		
		
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//Constructeur en privé pour éviter leur utilisation.
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		public function __construct() {
			$mysql_dbname = "sixquiprend";
			$mysql_user = "root";
			$mysql_password = "root";
			
			$dsn = "mysql:host=localhost;dbname=$mysql_dbname";
			$user = $mysql_user;
			$password = $mysql_password;
			
			parent::__construct($dsn,$user,$password);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
		//private function __wakeup() {}
		//private function __clone() {}
	}
?>