<?php
	class Model extends MyObject
	{			
		protected static function db(){
			return DatabasePDO::singleton();
		}
		
		protected static function query($sql){
			$st = static::db()->query($sql) or die("sql query error ! request : " . $sql);
			$st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
			return $st; 
		}
		
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//  TODO tableau de propriété
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		protected $props;
		public function __construct($props = array()) {
		$this->props = $props;
		}
		public function __get($prop) {
		return $this->props[$prop];
		}
		public function __set($prop, $val) {
		$this->props[$prop] = $val;
		}
	}
?>