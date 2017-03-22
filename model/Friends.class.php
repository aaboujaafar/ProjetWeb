<?php
	class Friends extends Model
	{				
		public static function getFriends($id) {
			$sql = "SELECT joueur.PSEUDO from joueur, amis WHERE amis.IDAMIS = joueur.IDJOUEUR and amis.IDJOUEUR ='".$id."'";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
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