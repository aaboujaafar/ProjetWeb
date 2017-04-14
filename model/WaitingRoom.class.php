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


		//------------------------------------------
		//méthode pour l'ivnvitation et le suivi d'invitation de joueur
		//------------------------------------------
		public static function AskFriendInGame($gameName, $friendName) {
			$sql = "INSERT INTO `inviter`(`IDPARTIE`, `IDJOUEUR`) VALUES ((SELECT partie.IDPARTIE FROM partie where partie.NOMPARTIE ='".$gameName."'),(SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$friendName."'))";
			$st = self::query($sql);
		}

		public static function isFriendInGame($gameName, $friendName) {
			$participant = static::getParticipant($gameName);
			foreach ($participant as $p) {
				if($p->PSEUDO === $friendName){
					return 1;
				}
			}
			return 0;
		}

		public static function isFriendInGameAsking($gameName, $friendName) {
			$sql = "SELECT * FROM inviter WHERE inviter.IDPARTIE = (SELECT partie.IDPARTIE FROM partie where partie.NOMPARTIE ='".$gameName."') AND inviter.IDJOUEUR = (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$friendName."')";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return 1;
			}
			else{
				return 0;
			}
		}

		public static function AddInGame($gameName, $friendName) {
			$isFriend =  static::isFriendInGame($gameName, $friendName);
			if($isFriend){
				return 0;
			}

			static::removeInvit($gameName, $friendName);
			$sql = "INSERT INTO `participe`(`IDJOUEUR`, `IDPARTIE`, `SCORE`) VALUES ((SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$friendName."'),(SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE = '". $gameName ."'),0)";
			$request = self::query($sql);
			return 1;
		}

		public static function removeInvit($gameName, $friendName) {
			$sql = "DELETE FROM inviter WHERE inviter.IDPARTIE = (SELECT partie.IDPARTIE FROM partie where partie.NOMPARTIE ='".$gameName."') AND inviter.IDJOUEUR = (SELECT joueur.IDJOUEUR from joueur WHERE joueur.PSEUDO ='".$friendName."')";
			$st = self::query($sql);
		}

		public static function Evenement_FriendAddingInGame($id) {
			$sql = "SELECT DISTINCT partie.NOMPARTIE FROM partie, inviter WHERE inviter.IDJOUEUR = '".$id."' AND inviter.IDPARTIE = partie.IDPARTIE";
			$st = self::query($sql);
			$u = $st->fetchAll();
			if(isset($u[0])){
				return $u;
			}
			else{
				return NULL;;
			}
		}


		public static function NumberOfParticipant($gameName) {
			$participant =  static::getParticipant($gameName);
			return count($participant);
		}

		//------------------------------------------
		//rend la partie ENCOURS
		//------------------------------------------
		public static function putEnCours($gameName) {
			$sql = "UPDATE partie SET partie.ENCOURS = '1'  WHERE partie.NOMPARTIE = '". $gameName ."'";
			$st = self::query($sql);
		}

		//------------------------------------------
		//crée une main pour la partie
		//------------------------------------------
		public static function createHand($gameName, $friendName) {
			$sql = "INSERT INTO `main`(`IDJOUEUR`, `IDPARTIE`) VALUES ((SELECT joueur.IDJOUEUR FROM joueur WHERE joueur.PSEUDO ='".$friendName."') ,(SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE ='".$gameName."'))";
			$st = self::query($sql);
		}

		//------------------------------------------
		//supprime toutes les invitations pour une partie
		//------------------------------------------
		public static function deleteAllInvit($gameName) {
			$sql = "DELETE FROM `inviter` WHERE inviter.IDPARTIE = (SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE ='".$gameName."')";
			$st = self::query($sql);
		}
		
		//------------------------------------------
		//supprime toutes les invitations pour une partie
		//------------------------------------------
		public static function addCardOnHand($gameName, $friendName, $numero) {
			$sql = "INSERT INTO `contient`(`IDMAIN`, `NUMERO`) VALUES ((SELECT main.IDMAIN FROM main WHERE main.IDJOUEUR =(SELECT joueur.IDJOUEUR FROM joueur WHERE joueur.PSEUDO ='".$friendName."') AND main.IDPARTIE =(SELECT partie.IDPARTIE FROM partie WHERE partie.NOMPARTIE ='".$gameName."')), ". $numero .")";
			$st = self::query($sql);
		}

	} 	 	 	 		
?>