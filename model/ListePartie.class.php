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
				return NULL;
			}
		}

		public static function getParticipantGame($id) {
			$sql = "SELECT partie.NOMPARTIE FROM partie, participe WHERE partie.IDPARTIE = participe.IDPARTIE AND participe.IDJOUEUR ='". $id ."'  AND partie.IDJOUEUR !='". $id ."' ORDER BY partie.NOMPARTIE";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		public static function getOwnerGame($id) {
			$sql = "SELECT partie.NOMPARTIE FROM partie WHERE partie.IDJOUEUR = '". $id ."' ORDER BY partie.NOMPARTIE";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		public static function getFriendGame($id) {
			$sql = "SELECT partie.NOMPARTIE FROM partie,amis WHERE partie.IDJOUEUR = amis.IDAMIS AND amis.IDJOUEUR = '". $id ."' ORDER BY partie.NOMPARTIE";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}
	} 	 	 	 		
?>