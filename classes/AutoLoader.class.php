<?php
	// Load my root class
	require_once(__ROOT_DIR . '/classes/MyObject.class.php');
	
	class AutoLoader extends MyObject {
		
		public function __construct() {
			spl_autoload_register(array($this, 'load'));
		}
		
		// This method will be automatically executed by PHP whenever it encounters
		// an unknown class name in the source code
		private function load($className) {
			$name = ucfirst($className).'.class.php';
			if (is_readable(__ROOT_DIR.'/classes/'.$name)) {
				require_once (__ROOT_DIR.'/classes/'.$name);
			} 
			else if (is_readable(__ROOT_DIR.'/model/'.$name)) {
				require_once (__ROOT_DIR.'/model/'.$name);
			} 
			else if (is_readable(__ROOT_DIR.'/controller/'.$name)) {
				require_once (__ROOT_DIR.'/controller/'.$name);
			} 
			else if (is_readable(__ROOT_DIR.'/view/'.$name)) {
				require_once (__ROOT_DIR.'/view/'.$name);
				
			} 
			else{
				echo 'The file is not readable!!!!!';
			}
			
			/*TODO
			boucle avec do/while, pour parcourir les dossier au lieu des if
			si on a une view, charger les .sql lié
			*/
		}
	}
	$__LOADER = new AutoLoader();
?>