<?php
	class Friends extends Model
	{				
		public static function getFriends($id) {
			$sql = "SELECT joueur.PSEUDO FROM joueur, amis WHERE amis.IDAMIS = joueur.IDJOUEUR and amis.IDJOUEUR ='".$login."'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u;
			}
			else{
				return NULL;;
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