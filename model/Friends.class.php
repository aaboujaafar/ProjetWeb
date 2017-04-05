<?php
	class Friends extends Model
	{				
		public static function getFriends($id) {
			$sql = "SELECT joueur.PSEUDO, joueur.PHOTOPROFIL from joueur, amis WHERE amis.IDAMIS = joueur.IDJOUEUR and amis.IDJOUEUR ='".$id."' ORDER BY joueur.PSEUDO";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;;
			}
		}

		public static function deleteFriend($namef, $idPlayer) {
			$sql = "DELETE FROM `amis` WHERE `IDJOUEUR` ='". $idPlayer ."' AND `IDAMIS` = (SELECT joueur.IDJOUEUR FROM joueur Where joueur.PSEUDO = '". $namef ."')";
			$st = self::query($sql);
		}
		public static function getAFriend($login) {
			$sql = "select PSEUDO, NBRPARTIEJOUEE, NBRPARTIEGAGNEE, PHOTOPROFIL, PHOTOCOVER, NOM, PRENOM from joueur where pseudo='".$login."'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u;
			}
			else{
				return NULL;
			}
		}

		public static function AddFriend($id, $pseudo) {
			$sql = "INSERT INTO `amis`(`IDJOUEUR`, `IDAMIS`) VALUES (".$id.", (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."'))";
			$st = self::query($sql);
		}

		public static function RemoveFriend($id, $pseudo) {
			$sql = "DELETE FROM `amis` WHERE amis.IDJOUEUR =".$id." and amis.IDAMIS = (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."')";
			$st = self::query($sql);
		}
	} 	 	 	 		
?>