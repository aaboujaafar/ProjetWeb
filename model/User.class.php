<?php
	class User extends Model
	{		

		public static function creatPlayer($login, $pwd, $mail, $nom, $prenom) {
			$sql = "INSERT INTO `joueur`(`PSEUDO`, `MDP`, `ADRESSEMAIL`,`NOM`, `PRENOM`) VALUES ("."'".$login."'".", "."'".$pwd."'".", "."'".$mail."'".", "."'".$nom."'".", "."'".$prenom."'".")";
			$request = self::query($sql);
			return static::getUser($login);
		}
		
		
		public static function isLoginUsed($login) {
			$u = static::getUser($login);
			return ($u!=NULL) && $u->PSEUDO==$login;
		}
		
		public static function getUser($login) {
			$sql = "select * from joueur where pseudo='".$login."'";
			$st = self::query($sql);
			$u = $st->fetch();
			if(isset($u->props)){
				return $u;
			}
			else{
				return NULL;;
			}
		}
	} 	 	 	 		
?>