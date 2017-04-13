<?php
	class Game extends Model
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
		public static function NumberOfParticipant($gameName) {
			$participant =  static::getParticipant($gameName);
			return count($participant);
		}

		//------------------------------------------
		//donne les cartes posées par les joueurs
		//------------------------------------------
		public static function getCardPut($gameName) {
			$sql = "SELECT DISTINCT poserpile.NUMERO, poserpile.PILE as IDJOUEUR FROM poserpile WHERE poserpile.COLONNE = 5 AND poserpile.IDPARTIE = (Select partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE  = '". $gameName ."') ORDER BY poserpile.NUMERO";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		public static function numberCardPut($gameName) {
			$participant =  static::getParticipant($gameName);
			return count($participant);
		}
	} 	 	 	 		
?>