<?php
	class User extends Model
	{		

		public static function creatPlayer($login, $pwd, $mail, $nom, $prenom) {
			$sql = "INSERT INTO `joueur`(`PSEUDO`, `MDP`, `ADRESSEMAIL`,`NOM`, `PRENOM`) VALUES ("."'".$login."'".", "."'".$pwd."'".", "."'".$mail."'".", "."'".$nom."'".", "."'".$prenom."'".")";
			$request = self::query($sql);
			return static::getUser($login, $pwd);
		}
		
		
		public static function isLoginUsed($login) {
			$u = static::getUserOnly($login);
			return ($u!=NULL) && $u->PSEUDO==$login;
		}
		
		public static function getUser($login, $pwd) {
			$sql = "select * from joueur where pseudo='".$login."' and mdp='".$pwd."'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u;
			}
			else{
				return NULL;
			}
		}
		public static function getUserOnly($login) {
			$sql = "select * from joueur where pseudo='".$login."'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u;
			}
			else{
				return NULL;
			}
		}

		//----------------------------------------------
		//donne la liste des joueurs classé dans l'orde
		//----------------------------------------------
		public static function getPlayerRanked() {
			$sql = "SELECT joueur.PSEUDO, joueur.NBRPARTIEGAGNEE, joueur.PHOTOPROFIL FROM joueur ORDER BY joueur.NBRPARTIEGAGNEE DESC LIMIT 10";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		//----------------------------------------------
		//change la photo de cover
		//----------------------------------------------
		public static function setPhotoCover($id, $name) {
			$sql = "UPDATE `joueur` SET `PHOTOCOVER`= '". $name ."' WHERE joueur.IDJOUEUR = " . $id;
			$st = self::query($sql);
		}

		//----------------------------------------------
		//change la photo de Profil
		//----------------------------------------------
		public static function setPhotoProfil($id, $name) {
			$sql = "UPDATE `joueur` SET `PHOTOPROFIL`= '". $name ."' WHERE joueur.IDJOUEUR = " . $id;
			$st = self::query($sql);
		}

		//----------------------------------------------
		//change le mot de passe d'un joueur (besoin de l'ancien mot de passe)
		//----------------------------------------------
		public static function changePassword($id, $oldPass, $newPass) {
			$sql = "UPDATE `joueur` SET `MDP`= '". $newPass ."' WHERE joueur.IDJOUEUR = " . $id . " AND joueur.MDP ='". $oldPass . "'";
			$st = self::query($sql);
		}
		



		//----------------------------------------------
		//pour l'historique des 10 dernières partie jouées
		//----------------------------------------------
		public static function getHistorique($id) {
			$sql = "SELECT * FROM `historique` WHERE historique.IDJOUEUR = " . $id . " ORDER BY historique.NBPARTIE";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;
			}
		}

		public static function UpdateHistorique($idJoueur, $NbPartie, $gagne) {
			$sql = "UPDATE `historique` SET `IDJOUEUR`= " . $idJoueur . ",`NBPARTIE`= " . $NbPartie . ",`GAGNE`= " . $gagne . " WHERE historique.IDJOUEUR = " . $idJoueur . " AND historique.NBPARTIE = " . $NbPartie;
			$st = self::query($sql);
		}

		public static function addHistory($idJoueur, $NbPartie, $gagne) {
			$sql = "INSERT INTO `historique`(`IDJOUEUR`, `NBPARTIE`, `GAGNE`) VALUES (" . $idJoueur . "," . $NbPartie . "," . $gagne . ")";
			$st = self::query($sql);
		}

		public static function getHistoriqueSize($id) {
			$historique =  static::getHistorique($id);
			if($historique == NULL){
				return 0;
			}
			else{
				return count($historique);
			}
		}
	} 	 	 	 		
?>