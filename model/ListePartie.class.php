<?php
	class ListePartie extends Model
	{				

		//------------------------------------------
		//lister les parties
		//------------------------------------------
		public static function getPartiePublic($id) {
			$sql = "SELECT NOMPARTIE FROM partie where `PUBLIQUE` = true AND NOMPARTIE NOT IN (SELECT partie.NOMPARTIE FROM partie, participe WHERE partie.IDPARTIE = participe.IDPARTIE AND participe.IDJOUEUR ='". $id ."') ORDER BY partie.NOMPARTIE";
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
			$sql = "SELECT partie.NOMPARTIE FROM partie, participe WHERE partie.IDPARTIE = participe.IDPARTIE AND partie.ENCOURS = 0 AND participe.IDJOUEUR ='". $id ."'  AND partie.IDJOUEUR !='". $id ."' ORDER BY partie.NOMPARTIE";
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
			$sql = "SELECT partie.NOMPARTIE FROM partie WHERE partie.ENCOURS = 0 AND partie.IDJOUEUR = '". $id ."' ORDER BY partie.NOMPARTIE";
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

		public static function getPartieStarted($id) {
			$sql = "SELECT partie.NOMPARTIE FROM partie,participe where partie.ENCOURS = true AND partie.IDPARTIE = participe.IDPARTIE AND participe.IDJOUEUR = '". $id ."' ORDER BY partie.NOMPARTIE";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		public static function allGame() {
			$sql = "SELECT partie.NOMPARTIE FROM partie ORDER BY partie.NOMPARTIE";
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
		//Verifier si le nom d'une partie est déjà utilisé
		//------------------------------------------
		public static function isGameNameUsed($name) {
			$sql = "SELECT partie.NOMPARTIE FROM partie WHERE partie.NOMPARTIE ='" . $name . "'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return true;
			}
			else{
				return false;
			}
		}

		//------------------------------------------
		//créer une partie
		//------------------------------------------
		public static function creatGame($idJoueur, $publique, $enCours, $NomPartie) {
			$sql = "INSERT INTO `partie`(`IDJOUEUR`, `PUBLIQUE`, `ENCOURS`,`NOMPARTIE`) VALUES ("."'".$idJoueur."'".", "."'".$publique."'".", "."'".$enCours."'".", "."'".$NomPartie."'".")";
			$request = self::query($sql);
		}

		//------------------------------------------
		//modification de partie
		//------------------------------------------
		public static function AddPlayer($idPlayer,$gameName) {
			$sql = "INSERT INTO `participe`(`IDJOUEUR`, `IDPARTIE`, `SCORE`) VALUES (". $idPlayer .",(SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."'),0)";
			$request = self::query($sql);
		}

		public static function getNameFromId($id) {
			$sql = "SELECT partie.NOMPARTIE FROM partie WHERE partie.IDPARTIE ='" . $id . "'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u->IDPARTIE;
			}
			else{
				return NULL;
			}
		}
	} 	 	 	 		
?>