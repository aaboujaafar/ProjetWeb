<?php
	class Game extends Model
	{				

		//------------------------------------------
		//donne la liste des participant de la game
		//------------------------------------------
		public static function getParticipant($gameName) {
			$sql = "SELECT DISTINCT joueur.PSEUDO, joueur.PHOTOPROFIL, joueur.IDJOUEUR, participe.SCORE FROM joueur, participe, partie WHERE joueur.IDJOUEUR = participe.IDJOUEUR AND participe.IDPARTIE = (SELECT partie.IDPARTIE FROM partie where partie.NOMPARTIE = '". $gameName ."')";
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




		//--------------------------------------------------
		//donne les cartes posées par les joueurs ce tour ci
		//--------------------------------------------------
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
			$participant =  static::getCardPut($gameName);
			return count($participant);
		}



		//------------------------------------------
		//donne la main d'un joueur
		//------------------------------------------
		public static function getHandCard($id, $gameName) {
			$sql = "SELECT DISTINCT carte.NUMERO, carte.POINT FROM carte, contient, main WHERE contient.IDMAIN = main.IDMAIN AND main.IDJOUEUR = ". $id ." AND main.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."') AND contient.NUMERO = carte.NUMERO ORDER BY contient.NUMERO";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		//----------------------------------------------------------------------
		//donne les cartes posées sur le plateau à la colonne i (i entre 1 et 4).
		//----------------------------------------------------------------------
		public static function getCardOnPil($i, $gameName) {
			$sql = "SELECT carte.NUMERO, carte.POINT FROM carte,poserpile WHERE poserpile.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."') AND poserpile.COLONNE = ". $i ." AND poserpile.NUMERO = carte.NUMERO ORDER BY poserpile.PILE ";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		//----------------------------------------------------------------------
		//joue la carte sur la pile(colone 5, par le joueur d'id)
		//----------------------------------------------------------------------
		public static function addCardOnPil($card, $gameName, $id) {
			$sql = "INSERT INTO `poserpile`(`NUMERO`, `IDPARTIE`, `COLONNE`, `PILE`) VALUES (". $card .",(SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."'), 5, ". $id .")";
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//supprime une carte d'une main d'un joueur
		//----------------------------------------------------------------------
		public static function removeCardFromHand($card, $gameName, $id) {
			$sql = "DELETE FROM `contient` WHERE contient.IDMAIN = (SELECT main.IDMAIN FROM main WHERE main.IDJOUEUR = ". $id ." AND main.IDPARTIE =(SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."')) AND contient.NUMERO = ". $card;
			$st = self::query($sql);
		}	
	} 	 	 	 		
?>