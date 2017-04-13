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
			if(!$gameOver){
				$cardPut = Game::getCardPut($arg->read("gameName"));
				$cardPil1 = Game::getCardOnPil(1,$arg->read("gameName"));
				$cardPil2 = Game::getCardOnPil(2,$arg->read("gameName"));
				$cardPil3 = Game::getCardOnPil(3,$arg->read("gameName"));
				$cardPil4 = Game::getCardOnPil(4,$arg->read("gameName"));

				$view = new GameView($this,"game");
				$view->setArg("participant", $participant);
				$view->setArg("cardPut", $cardPut);
				$view->setArg("handCard", $handCard);
				$view->setArg("cardPil1", $cardPil1);
				$view->setArg("cardPil2", $cardPil2);
				$view->setArg("cardPil3", $cardPil3);
				$view->setArg("cardPil4", $cardPil4);

				$view->render();
			}
			else{
				//plus aucun joueur n'a de carte en main, toute les cartes ont été posé, la partie est donc terminé : Affichage du vainqueur.
				//Tant que les joueurs n'ont pas appauyé sur un bouton (telle que Terminé), ils peuvent accèder à cet écran de fin. Dès qu'un joueur appuy sur ce bouton, il sort de la liste des participant (et ne peux plus accéder à la partie)
				//Dés que tout les joueurs ont appuyés sur le bouton Terminé, la partie est supprimé de la base de donnée
				$view = new GameView($this,"gameEnd");

				$view->render();
			}
		}
		public function quit($arg) {
			setcookie("controller","user", time()+ 3600*24);

			$view = new UserView($this,"AccueilConnected");

			//------------------
			// demande d'amis + demande joindre partie
			//------------------
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
			else{
				$this->defaultAction($request);
			}
		}

	}
?>
