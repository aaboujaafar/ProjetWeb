<?php
	class ListePartie extends Model
	{				
		public static function getPartiePublic() {
			$sql = "SELECT NOMPARTIE FROM partie where `PUBLIQUE` = true ORDER BY NOMPARTIE";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;;
			}
		}
	} 	 	 	 		
?>