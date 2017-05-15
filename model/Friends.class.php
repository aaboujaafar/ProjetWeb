<?php
	class Friends extends Model
	{		

		public static function getFriends($id) {
			$sql = "SELECT joueur.PSEUDO, joueur.PHOTOPROFIL from joueur, amis WHERE amis.IDAMIS = joueur.IDJOUEUR and amis.IDJOUEUR ='".$id."' AND amis.DEMANDE = 0 ORDER BY joueur.PSEUDO";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;;
			}
		}

		public static function userExist($name) {
			$sql = "select PSEUDO from joueur where pseudo='".$name."'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		public static function getAFriend($login) {
			$sql = "select IDJOUEUR, PSEUDO, NBRPARTIEJOUEE, NBRPARTIEGAGNEE, PHOTOPROFIL, PHOTOCOVER, NOM, PRENOM from joueur where pseudo='".$login."'";
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
			$sql = "UPDATE amis SET amis.DEMANDE =0 WHERE amis.IDAMIS = (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."') and amis.IDJOUEUR ='".$id."'";
			$st = self::query($sql);

			$sql2 = "INSERT INTO `amis`(`IDAMIS`, `IDJOUEUR`, `DEMANDE`) VALUES (".$id.", (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."'), 0)";
			$st2 = self::query($sql2);
		}

		public static function isFriend($id, $pseudo) {
			$sql = "SELECT DISTINCT amis.IDJOUEUR from joueur, amis WHERE amis.IDAMIS = (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."') and amis.IDJOUEUR ='".$id."' AND amis.DEMANDE = 0";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return 1;
			}
			else{
				return 0;
			}
		}

		public static function isFriendAsking($id, $pseudo) {
			$sql = "SELECT DISTINCT amis.IDJOUEUR from joueur, amis WHERE amis.IDJOUEUR = (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."') and amis.IDAMIS ='".$id."' AND amis.DEMANDE = 1";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return 1;
			}
			else{
				return 0;
			}
		}

		public static function AskFriend($id, $pseudo) {
			$isFriend =  static::isFriend($id, $pseudo) || static::isFriendAsking($id, $pseudo);
			if($isFriend){
				return 0;
			}
			$sql2 = "INSERT INTO `amis`(`IDAMIS`, `IDJOUEUR`, `DEMANDE`) VALUES (".$id.", (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."'), 1)";
			$st2 = self::query($sql2);
			return 1;
		}

		public static function Evenement_FriendAdding($id) {
			$sql = "SELECT joueur.PSEUDO, joueur.PHOTOPROFIL from joueur, amis WHERE amis.IDAMIS = joueur.IDJOUEUR and amis.IDJOUEUR ='".$id."' AND amis.DEMANDE = 1 ORDER BY joueur.PSEUDO";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;;
			}
		}

		public static function RemoveFriendP1($id, $pseudo) {
			$sql = "DELETE FROM `amis` WHERE amis.IDJOUEUR =".$id." and amis.IDAMIS = (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."')";
			$st = self::query($sql);
		}
		public static function RemoveFriendP2($id, $pseudo) {
			$sql = "DELETE FROM `amis` WHERE amis.IDAMIS =".$id." and amis.IDJOUEUR = (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$pseudo."')";
			$st = self::query($sql);
		}
	} 	 	 	 		
?>