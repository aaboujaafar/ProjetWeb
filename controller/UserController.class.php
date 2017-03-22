<?php
	class UserController extends Controller
	{	
		public function __construct($req) {
			
		}
		
		public function defaultAction($arg) {
			$view = new UserView($this,"profilHaut");
			
			$oldRequest = Request::getCurrentRequest();
			$view->setArg("Pseudo", $oldRequest->read('user'));
			$view->setArg("photoC", $oldRequest->read('photoC'));
			$view->setArg("photoP", $oldRequest->read('photoP'));
			$view->setArg("partieT", $oldRequest->read('partieT'));
			$view->setArg("partieG", $oldRequest->read('partieG'));
			$view->setArg("partieP", $oldRequest->read('partieP'));
			$view->setArg("averageWin", $oldRequest->read('averageWin'));
			
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
			
			$view = new AnonymousView($this,"home");
			$view->render();
		}
		
		public function showProfil($arg) {
			$view = new UserProfilView($this,"profilHaut");
			
			$oldRequest = Request::getCurrentRequest();
			$view->setArg("Pseudo", $oldRequest->read('user'));
			$view->setArg("photoC", $oldRequest->read('photoC'));
			$view->setArg("photoP", $oldRequest->read('photoP'));
			$view->setArg("partieT", $oldRequest->read('partieT'));
			$view->setArg("partieG", $oldRequest->read('partieG'));
			$view->setArg("partieP", $oldRequest->read('partieP'));
			$view->setArg("averageWin", $oldRequest->read('averageWin'));
			
			$view->render();
		}
		
		public function showFriends($arg) {
			$view = new UserFriendsView($this,"profilHaut");
			$oldRequest = Request::getCurrentRequest();
			$friends = Friends::getFriends($oldRequest->read('id'));
			$view->setArg("friends", $friends);

			$oldRequest = Request::getCurrentRequest();
			$view->setArg("Pseudo", $oldRequest->read('user'));
			$view->setArg("photoC", $oldRequest->read('photoC'));
			$view->setArg("photoP", $oldRequest->read('photoP'));
			$view->setArg("partieT", $oldRequest->read('partieT'));
			$view->setArg("partieG", $oldRequest->read('partieG'));
			$view->setArg("partieP", $oldRequest->read('partieP'));
			$view->setArg("averageWin", $oldRequest->read('averageWin'));
			
			$view->render();
		}
		
		public function creatGame($arg) {
			$view = new CreatGameView($this,"creatGame");
			
			$view->render();
		}
		
		public function joinGame($arg) {
			$view = new JoinGameView($this,"joinGame");
			
			$partiePublic = ListePartie::getPartiePublic();
			$view->setArg("partiesPublic", $partiePublic);
			
			$view->render();
		}
		
		public function continueGame($arg) {
			$view = new ContinueGameView($this,"continueGame");
			
			$view->render();
		}
		public function execute(){
			$request = Request::getCurrentRequest();
			$action = $request->getActionName();
			if($action === "Anonymous"){
				$this->defaultAction($request);
			}
			else if($action === "logout"){
				$this->logout($request);
			}
			else if($action === "profil"){
				$this->showProfil($request);
			}
			else if($action === "friends"){
				$this->showFriends($request);
			}
			else if($action === "creatGame"){
				$this->creatGame($request);
			}
			else if($action === "joinGame"){
				$this->joinGame($request);
			}
			else if($action === "continueGame"){
				$this->continueGame($request);
			}
		}
		
	}
?>