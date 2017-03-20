<?php
	class Request extends MyObject
	{	
		private static $instance;
		
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//Retourne l'instance unique.
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		public static function getCurrentRequest()
		{
			if (self::$instance === null) {
				self::$instance = new Request();
			}
			
			return self::$instance;
		}
		
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//Retourne le controler s'il est précisée
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		public function getControllerName(){
			if(isset($_GET["controller"])) {
				return $_GET["controller"];
			}
			else if(isset($_POST["controller"])) {
				return $_POST["controller"];
			}
			else if(isset($_COOKIE["controller"])) {
				return $_COOKIE["controller"];
			}
			else if(isset($_SESSION["controller"])) {
				return $_SESSION["controller"];
			}
			else{
				return "anonymous";
			}
		}

		public function getActionName(){
			if(isset($_GET["action"])) {
				return $_GET["action"];
			}
			else if(isset($_POST["action"])) {
				return $_POST["action"];
			}
			else if(isset($_COOKIE["action"])) {
				return $_COOKIE["action"];
			}
			else if(isset($_SESSION["action"])) {
				return $_SESSION["action"];
			}
			else{
				return "Anonymous";
			}
		}
		
		public function read($name){
			if(isset($_GET[$name])) {
				return $_GET[$name];
			}
			else if(isset($_POST[$name])) {
				return $_POST[$name];
			}
			else if(isset($_COOKIE[$name])) {
				return $_COOKIE[$name];
			}
			else if(isset($_SESSION[$name])) {
				return $_SESSION[$name];
			}
			else{
				return "";
			}
		}
		public function write($name,$value){
			if(isset($_GET[$name])) {
				$_GET[$name] = $value;
			}
			else if(isset($_POST[$name])) {
				$_POST[$name] = $value;
			}
			else if(isset($_COOKIE[$name])) {
				$_COOKIE[$name] = $value;
			}
			else if(isset($_SESSION[$name])) {
				$_SESSION[$name] = $value;
			}
			else{
				$_POST[$name] = $value;
			}
		}
		
		
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//Constructeur en privé pour éviter leur utilisation.
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		private function __construct() {
		
		}
		private function __wakeup() {}
		private function __clone() {}
	}
?>