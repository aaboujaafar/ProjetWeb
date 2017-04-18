<?php
	class GameController extends Controller
	{
		public function __construct($req) {

		}

		public function defaultAction($arg) {
			$handCard = Game::getHandCard($arg->read("id"),$arg->read("gameName"));
			$participant = Game::getParticipant($arg->read("gameName"));

			$gameOver = TRUE;
			$pHand = NULL;
			if($handCard == NULL){
				foreach ($participant as $p) {
					$pHand = Game::getHandCard($p->IDJOUEUR,$arg->read("gameName"));
					if($pHand != NULL){
						$gameOver = FALSE;
					}
				}
			}
			else{
				$gameOver = FALSE;
			}
			if(!$gameOver){ //le jeu n'est pas terminé (il reste au moins 1 carte dans la main d'un joueur)
				$hadPlayed = FALSE;
				$cardPut = Game::getCardPut($arg->read("gameName"));
				$cardPil1 = Game::getCardOnPil(1,$arg->read("gameName"));
				$cardPil2 = Game::getCardOnPil(2,$arg->read("gameName"));
				$cardPil3 = Game::getCardOnPil(3,$arg->read("gameName"));
				$cardPil4 = Game::getCardOnPil(4,$arg->read("gameName"));
				
				if($cardPut != NULL){
					foreach ($cardPut as $cp) {
						if($cp->IDJOUEUR == $arg->read("id")){
							$hadPlayed = TRUE;
						}
					}
				}
				if($hadPlayed){ //le joueur a déjà joué sa carte ce tour-ci (on vérifie dans la pile si une carte dans la colonne 5 appartient à ce joueur)
					$view = new GameView($this,"gamePlayed");
					$view->setArg("participant", $participant);
					$view->setArg("cardPut", $cardPut);
					$view->setArg("handCard", $handCard);
					$view->setArg("cardPil1", $cardPil1);
					$view->setArg("cardPil2", $cardPil2);
					$view->setArg("cardPil3", $cardPil3);
					$view->setArg("cardPil4", $cardPil4);
					$view->setArg("name", $arg->read("gameName"));
					$view->render();
				}
				else{// le joueur n'a pas joué ce tour-ci
					$view = new GameView($this,"game");
					$view->setArg("participant", $participant);
					$view->setArg("cardPut", $cardPut);
					$view->setArg("handCard", $handCard);
					$view->setArg("cardPil1", $cardPil1);
					$view->setArg("cardPil2", $cardPil2);
					$view->setArg("cardPil3", $cardPil3);
					$view->setArg("cardPil4", $cardPil4);
					$view->setArg("name", $arg->read("gameName"));

					$view->render();
				}				
			}
			else{
				//plus aucun joueur n'a de carte en main, toute les cartes ont été posé, la partie est donc terminé : Affichage du vainqueur.
				//Tant que les joueurs n'ont pas appauyé sur un bouton (telle que Terminé), ils peuvent accèder à cet écran de fin. Dès qu'un joueur appuy sur ce bouton, il sort de la liste des participant (et ne peux plus accéder à la partie)
				//Dés que tout les joueurs ont appuyés sur le bouton Terminé, la partie est supprimé de la base de donnée
				$view = new GameView($this,"gameEnd");

				$participant = Game::getParticipant($arg->read("gameName"));
				$view->setArg("participant", $participant);

				$sc = 10000;
				$winer = NULL;
				foreach ($participant as $p){
					if($p->SCORE < $sc){
						$winer = $p;
						$sc = $p->SCORE;
					}
				}
				if($arg->read("id") == $winer->IDJOUEUR){
					$sc = "vous avez gagné";
				}
				else{
					$sc = 'le gagnant est <span class="winnerFin">'. $winer->PSEUDO.'</span>';
				}

				$view->setArg("resultat", $sc);

				$view->render();
			}
		}
		public function quit($arg) {
			setcookie("controller","user", time()+ 3600*24);

			//mets à jour le score du joueur
			$user = User::getUserOnly($arg->read('user'));
			setcookie("partieG",$user->NBRPARTIEGAGNEE, time()+ 3600*24);
			setcookie("partieP",($user->NBRPARTIEJOUEE - $user->NBRPARTIEGAGNEE), time()+ 3600*24);
			setcookie("partieT",$user->NBRPARTIEJOUEE, time()+ 3600*24);
			if($user->NBRPARTIEJOUEE ==0){
				setcookie("averageWin",0, time()+ 3600*24);
			}
			else{
				setcookie("averageWin",($user->NBRPARTIEGAGNEE/$user->NBRPARTIEJOUEE), time()+ 3600*24);
			}


			$view = new UserView($this,"AccueilConnected");

			//----------------------------------------
			// demande d'amis + demande joindre partie
			//-----------------------------------------
			$evenementFriend = Friends::Evenement_FriendAdding($arg->read('id'));
			$evenementGame = WaitingRoom::Evenement_FriendAddingInGame($arg->read('id'));

			$view->setArg("Pseudo", $arg->read('user'));
			$view->setArg("photoP", $arg->read('photoP'));
			$view->setArg("evenementFriend", $evenementFriend);
			$view->setArg("evenementGame", $evenementGame);

			$view->render();
		}

		public function logout($arg) {
			//unset($_COOKIE["user"]);
			setcookie ("user", "", time() - 3600);
			setcookie ("partieG", "", time() - 3600);
			setcookie ("partieP", "", time() - 3600);
			setcookie ("partieT", "", time() - 3600);
			setcookie ("averageWin", "", time() - 3600);
			setcookie ("photoP", "", time() - 3600);
			setcookie ("photoC", "", time() - 3600);
			setcookie ("afficheAmis", "", time() - 3600);
			setcookie ("id", "", time() - 3600);
			setcookie("gameName",time() - 3600);
			setcookie("controller","Anonymous", time()+ 3600*24);

			$view = new AnonymousView($this,"home");
			$view->render();
		}

		public function playCard($arg) {
			$cardPut = Game::getCardPut($arg->read("gameName"));
			$card = $arg->read("card");
			$gameName = $arg->read("gameName");

			$nbCardPut = Game::numberCardPut($gameName);
			$nbParticipant = Game::NumberOfParticipant($gameName);
			$handCard = Game::getHandCard($arg->read("id"), $gameName);

			if($nbCardPut < $nbParticipant-1){ //je ne suis pas le dernier pour ce tour de jeu
				Game::removeCardFromHand($card, $gameName, $arg->read("id"));     	//retiere la carte de la main
				Game::addCardOnPil($card, $gameName, $arg->read("id"));      	//pose la carte
				$this->defaultAction($arg);
			}
			else{ // je suis le dernier à joueur pour ce tour de jeu
				
				if(count($handCard) == 1){ //dernier à jouer, dernier tour de jeu
					Game::removeCardFromHand($card, $gameName, $arg->read("id"));     	//retiere la carte de la main
					Game::addCardOnPil($card, $gameName, $arg->read("id"));      		//pose la carte
					$this->displayCard($arg);      										//fait le placemnt des cartes posées
					$this->endWait($arg);                             	
					$this->defaultAction($arg);
				}
				else{ //dernier à joueur, PAS dernier tour de jeu
					Game::removeCardFromHand($card, $gameName, $arg->read("id"));     	//retiere la carte de la main
					Game::addCardOnPil($card, $gameName, $arg->read("id"));      		//pose la carte
					$this->displayCard($arg);											//fait le placement des cartes posées
					$this->defaultAction($arg);
				}
			}
		}

		public function displayCard($arg) {
			//préparation des données nécessaire au calcul des points/placement des cartes...
			$gameName = $arg->read("gameName");
			$cardPut = Game::getCardPut($gameName);
			

			foreach ($cardPut as $cPlayed) { //placement une à une des cartes, calcul des points si la carte atteint le maximum
				//données actualisée entre chaque placement de carte
				//précaution, mais aucune colonne ne peut être vide dans ce jeu, il y a toujours des cartes dans chaque colonne
				$last1 = NULL;
				$cardPil1 = Game::getCardOnPil(1,$arg->read("gameName"));
				if(count($cardPil1) != 0){
					$last1 = $cardPil1[count($cardPil1)-1]->NUMERO; 
				}

				$last2 = NULL;
				$cardPil2 = Game::getCardOnPil(2,$arg->read("gameName"));
				if(count($cardPil2) != 0){
					$last2 = $cardPil2[count($cardPil2)-1]->NUMERO;
				}
				
				$last3 = NULL;
				$cardPil3 = Game::getCardOnPil(3,$arg->read("gameName"));
				if(count($cardPil3) != 0){
					$last3 = $cardPil3[count($cardPil3)-1]->NUMERO;
				}
				
				$last4 = NULL;
				$cardPil4 = Game::getCardOnPil(4,$arg->read("gameName"));
				if(count($cardPil4) != 0){
					$last4 = $cardPil4[count($cardPil4)-1]->NUMERO;
				}
				if($cPlayed->NUMERO <  min($last1, $last2, $last3, $last4) ){ // si les 4 colonnes sont remplie, et que notre carte est inférieur à toutes les autres : la carte se pose la ou il y a le minimum de point
					$point1 = 0; //point dans la colonne 1
					foreach ($cardPil1 as $p) {
						$point1 = $point1 + Game::getPointCard($p->NUMERO);
					}
					$point2 = 0; //point dans la colonne 2
					foreach ($cardPil2 as $p) {
						$point2 = $point2 + Game::getPointCard($p->NUMERO);
					}	
					$point3 = 0; //point dans la colonne 3
					foreach ($cardPil3 as $p) {
						$point3 = $point3 + Game::getPointCard($p->NUMERO);
					}	
					$point4 = 0; //point dans la colonne 4
					foreach ($cardPil4 as $p) {
						$point4 = $point4 + Game::getPointCard($p->NUMERO);
					}
					$num = NULL;
					$temp = 0;
					if($temp < $point1){
						$num = 1;
						$temp = $point1;
					}
					if($temp > $point2){
						$num = 2;
						$temp = $point2;
					}
					if($temp > $point3){
						$num = 3;
						$temp = $point3;
					}
					if($temp > $point4){
						$num = 4;
						$temp = $point4;
					}
					//$num contient la colonne avec le minimum de point, et $temp les points associès à cette colonne
					$sc = Game::getScore($gameName, $cPlayed->IDJOUEUR);
					$sc = $sc + $temp;
					Game::setScore($gameName, $cPlayed->IDJOUEUR ,$sc);
						
					//on supprime les cartes de la pille
					Game::removeCardsFromGame($gameName, $num);

					//on met la carte en 1ere position
					Game::removeCardFromPile($cPlayed->NUMERO, $gameName);
					Game::addCardOnGame($cPlayed->NUMERO, $num, $gameName, 1 );
				}


				else{  // il existe une colonne dans laquelle notre carte peut se poser (supérieur).
					$temp = 0;
					$pil = NULL;
					$col = NULL;		
					if($cPlayed->NUMERO > $last1){
						$temp = $last1;
						$pil = $cardPil1;
						$col =1;
					}
					if($cPlayed->NUMERO > $last2 && $last2 > $temp){
						$temp = $last2;
						$pil = $cardPil2;
						$col =2;
					}
					if($cPlayed->NUMERO > $last3 && $last3 > $temp){
						$temp = $last3;
						$pil = $cardPil3;
						$col =3;
					}
					if($cPlayed->NUMERO > $last4 && $last4 > $temp){
						$temp = $last4;
						$pil = $cardPil4;
						$col =4;
					}
					// $pil contient la pile dans laquelle on doit joueur la carte $cPlayed
					if(count($pil) < 5){  //on peut poser la carte sans problème

						Game::removeCardFromPile($cPlayed->NUMERO, $gameName); //on supprime la carte de la pile
						Game::addCardOnGame($cPlayed->NUMERO, $col, $gameName, count($pil)+1 );	//on pose la carte sur l'empacement suivant
					}
					else{ //on atteint la 6eme carte

						//on ajoute au score du joueur de la carte le score de chaque carte de la pile
						$point = 0;
						foreach ($pil as $p) {
							$point = $point + Game::getPointCard($p->NUMERO);
						}
						$sc = Game::getScore($gameName, $cPlayed->IDJOUEUR);
						$sc = $sc + $point;
						Game::setScore($gameName, $cPlayed->IDJOUEUR ,$sc);
						
						//on supprime les cartes de la pille
						Game::removeCardsFromGame($gameName, $col);

						//on met la carte en 1ere position
						Game::removeCardFromPile($cPlayed->NUMERO, $gameName);
						Game::addCardOnGame($cPlayed->NUMERO, $col, $gameName, 1 );
					}
				}
			}
		}

		public function endWait($arg) {
			$gameName = $arg->read("gameName");
			$participant = Game::getParticipant($gameName);

			$sc = 10000;
			$winer = NULL;
			foreach ($participant as $p){
				if($p->SCORE < $sc){
					$winer = $p;
					$sc = $p->SCORE;
				}
			}
			// $winer contient le gagnant de la partie

			//ajout d'une partie gagnée pour le vainqueur et une partie joué en plus pour tout le monde
			$gagne = NULL;
			$tot = NULL;
			foreach ($participant as $p) {
				$gagne = Game::getTotPlay($p->IDJOUEUR);
				$gagne = $gagne + 1;
				Game::setTotPlay($p->IDJOUEUR, $gagne);

				if($p->IDJOUEUR == $winer->IDJOUEUR){
					$tot = Game::getWin($p->IDJOUEUR);
					$tot = $tot + 1;
					Game::setWin($p->IDJOUEUR, $tot);
				}
			}	

			//supprime toutes les cartes restantes sur le plateau
			Game::removeAllCardsFromGame($gameName);

			//supprime les mains (mains déjà vides)
			Game::removeHand($gameName);
		}


		public function lastEnd($arg) {
			$gameName = $arg->read("gameName");
			$nbParticipant = Game::NumberOfParticipant($gameName);

			if($nbParticipant > 1){   //je ne suis pas le dernier joueur en jeu : quitte la partie
				Game::removeParticipation( $gameName, $arg->read("id") );
			}
			else{ //je suis le dernier joueur en jeu : quitte la partie et supprime la partie de la bdd
				Game::removeParticipation( $gameName, $arg->read("id") );
				Game::removePartie($gameName);
			}
			$this->quit($arg);
		}
		


		//--------------------------------------------------------
		//Repere l'action et appelle la méthode adéquate
		//--------------------------------------------------------
		public function execute(){
			$request = Request::getCurrentRequest();
			$action = $request->getActionName();
			if($action === "Anonymous"){
				$this->defaultAction($request);
			}
			else if($action === "logout"){
				$this->logout($request);
			}
			else if($action === "quit"){
				$this->quit($request);
			}
			else if($action === "playCard"){
				$this->playCard($request);
			}
			else if($action === "lastEnd"){
				$this->lastEnd($request);
			}
			else{
				$this->defaultAction($request);
			}
		}

	}
?>
