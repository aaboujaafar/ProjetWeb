<?php
	class GameController extends Controller
	{
		public function __construct($req) {

		}

		public function defaultAction($arg) {
			$view = new GameView($this,"game");
			//print_r($arg->read('gameName'));
			/*$view->setArg("photoP", $arg->read('photoP'));
			$view->setArg("evenementFriend", $evenementFriend);
			$view->setArg("evenementGame", $evenementGame);*/

			$view->render();
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
		}

	}
?>
