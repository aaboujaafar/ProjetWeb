<?php
	class WaitingRoom extends Model
	{				

		//------------------------------------------
		//donne la liste des participant de la game
		//------------------------------------------
		public static function getParticipant($gameName) {
			$sql = "SELECT DISTINCT joueur.PSEUDO, joueur.PHOTOPROFIL FROM joueur, participe, partie WHERE joueur.IDJOUEUR = participe.IDJOUEUR AND participe.IDPARTIE = (SELECT partie.IDPARTIE FROM partie where partie.NOMPARTIE = '". $gameName ."')";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		

		//------------------------------------------
		//donne le nom du créateur de la partie
		//------------------------------------------
		public static function getGameCreator($gameName) {
			$sql = "SELECT joueur.PSEUDO, joueur.PHOTOPROFIL FROM joueur, partie WHERE joueur.IDJOUEUR = partie.IDJOUEUR AND partie.NOMPARTIE = '". $gameName ."'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u;
			}
			else{
				return NULL;
			}
		}

		//------------------------------------------
		//Verifier si la partie est publique ou non
		//------------------------------------------
		public static function isPublic($gameName) {

			$sql = "SELECT partie.PUBLIQUE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				$temp = $u->PUBLIQUE;
				return  $temp;
			}
			else{
				return NULL;
			}
			
		}

		//------------------------------------------
		//rend la partie public
		//------------------------------------------
		public static function putPublic($gameName) {
			$sql = "UPDATE partie SET partie.PUBLIQUE = '1'  WHERE partie.NOMPARTIE = '". $gameName ."'";
			$st = self::query($sql);
		}

		//------------------------------------------
		//rend la partie privé
		//------------------------------------------
		public static function putPrivate($gameName) {
			$sql = "UPDATE partie SET partie.PUBLIQUE = '0'  WHERE partie.NOMPARTIE = '". $gameName ."'";
			$st = self::query($sql);
		}

	} 	 	 	 		
?>