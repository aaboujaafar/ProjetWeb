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

		//----------------------------------------------------------------------
		//supprime la carte de la pile (collone = 5)
		//----------------------------------------------------------------------
		public static function removeCardFromPile($numeroC, $gameName) {
			$sql = "DELETE FROM `poserpile` WHERE poserpile.NUMERO = ". $numeroC ." AND poserpile.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."') AND poserpile.COLONNE = 5";
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//ajoute la carte en jeu à la position ...
		//----------------------------------------------------------------------
		public static function addCardOnGame($numeroC, $col, $gameName, $hauteur ) {
			$sql = "INSERT INTO `poserpile`(`NUMERO`, `IDPARTIE`, `COLONNE`, `PILE`) VALUES (". $numeroC .", (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."'), ". $col .", ".  $hauteur.")";
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//recupere les point associé à une carte
		//----------------------------------------------------------------------
		public static function getPointCard($numeroC) {
			$sql = "SELECT carte.POINT FROM carte WHERE carte.NUMERO = " . $numeroC;
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u->POINT;
			}
			else{
				return NULL;
			}
		}

		//----------------------------------------------------------------------
		//recupere les point du joueur dans la partie
		//----------------------------------------------------------------------
		public static function getScore($gameName, $idPlayer) {
			$sql = "SELECT participe.SCORE FROM participe WHERE participe.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."') AND participe.IDJOUEUR = ". $idPlayer;
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u->SCORE;
			}
			else{
				return NULL;
			}
		}
		
		//----------------------------------------------------------------------
		//mets à jour les points du joueur dans la partie
		//----------------------------------------------------------------------
		public static function setScore($gameName, $idPlayer, $sc) {
			$sql = "UPDATE `participe` SET `SCORE`= ". $sc ." WHERE participe.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."') AND participe.IDJOUEUR = ". $idPlayer;
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//supprime les cartes de la colonne $colonne
		//----------------------------------------------------------------------
		public static function removeCardsFromGame($gameName, $colone) {
			$sql = "DELETE FROM `poserpile` WHERE  poserpile.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."') AND poserpile.COLONNE = ". $colone;
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//supprime toutes les cartes restantes sur la plateau
		//----------------------------------------------------------------------
		public static function removeAllCardsFromGame($gameName) {
			$sql = "DELETE FROM `poserpile` WHERE  poserpile.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."')";
			$st = self::query($sql);
		}

		
		//----------------------------------------------------------------------
		//recupere le nombre de partie total joué par le joueur
		//----------------------------------------------------------------------
		public static function getTotPlay($idPlayer) {
			$sql = "SELECT joueur.NBRPARTIEJOUEE FROM joueur WHERE joueur.IDJOUEUR = ". $idPlayer;
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//mets à jour le nombre de partie total joué par le joueur 
		//----------------------------------------------------------------------
		public static function setTotPlay($idPlayer, $nbPartie) {
			$sql = "UPDATE `joueur` SET `NBRPARTIEJOUEE`=". $nbPartie ." WHERE joueur.IDJOUEUR = ". $idPlayer;
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//recupere le nombre de partie gagnée par le joueur
		//----------------------------------------------------------------------
		public static function getWin($idPlayer) {
			$sql = "SELECT joueur.NBRPARTIEGAGNEE FROM joueur WHERE joueur.IDJOUEUR = ". $idPlayer;
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//mets à jour le nombre de partie gagnée par le joueur 
		//----------------------------------------------------------------------
		public static function setWin($idPlayer, $nbPartie) {
			$sql = "UPDATE `joueur` SET `NBRPARTIEGAGNEE`=". $nbPartie ." WHERE joueur.IDJOUEUR = ". $idPlayer;
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//supprime toutes les cartes restantes sur la plateau
		//----------------------------------------------------------------------
		public static function removeHand($gameName) {
			$sql = "DELETE FROM `main` WHERE main.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."')";
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//supprime la participation d'un joueur à une partie
		//----------------------------------------------------------------------
		public static function removeParticipation($gameName, $idPlayer) {
			$sql = "DELETE FROM `participe` WHERE participe.IDJOUEUR = ". $idPlayer ." AND participe.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."')";
			$st = self::query($sql);
		}

		//----------------------------------------------------------------------
		//supprime la partie de la bdd
		//----------------------------------------------------------------------
		public static function removePartie($gameName) {
			$sql = "DELETE FROM `partie` WHERE partie.NOMPARTIE = '". $gameName."'";
			$st = self::query($sql);
		}
	} 	 	 	 		
?>