<?php
	class UserController extends Controller
	{
		public function __construct($req) {

		}

		public function defaultAction($arg) {
			$view = new UserView($this,"AccueilConnected");

			$oldRequest = Request::getCurrentRequest();
			$view->setArg("Pseudo", $oldRequest->read('user'));
			$view->setArg("photoP", $oldRequest->read('photoP'));

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

		public function showFriendProfil($arg) {
			$oldRequest = Request::getCurrentRequest();
			$friend = Friends::getAFriend($oldRequest->read('friend'));

			$view = new FriendProfilView($this,"profilHaut");
			if($friend != NULL){
				$view->setArg("Pseudo", $friend->PSEUDO);
				$view->setArg("photoC",  $friend->PHOTOCOVER);
				$view->setArg("photoP",  $friend->PHOTOPROFIL);
				$view->setArg("partieT",  $friend->NBRPARTIEJOUEE);
				$view->setArg("partieG",  $friend->NBRPARTIEGAGNEE);
				$view->setArg("partieP",  $friend->NBRPARTIEJOUEE - $friend->NBRPARTIEGAGNEE);
				if($friend->NBRPARTIEJOUEE ==0){
						$view->setArg("averageWin",  0);
				}
				else{
						$view->setArg("averageWin",  $friend->NBRPARTIEGAGNEE/$friend->NBRPARTIEJOUEE);
				}
			}
			else{
				$view = new UserView($this,"AccueilConnected");
				$view->setArg("Pseudo", $oldRequest->read('user'));
				$view->setArg("photoP", $oldRequest->read('photoP'));
			}

			$view->render();
		}

		public function showFriends($arg) {
			$view = new UserFriendsView($this,"profilFriends");

			$oldRequest = Request::getCurrentRequest();
			$friends = Friends::getFriends($oldRequest->read('id'));
			$friendGame = ListePartie::getFriendGame($oldRequest->read('id'));
			$view->setArg("friends", $friends);
			$view->setArg("friendGame", $friendGame);

			$view->setArg("Pseudo", $oldRequest->read('user'));
			$view->setArg("photoP", $oldRequest->read('photoP'));

			$view->render();
		}

		public function creatGame($arg) {
			$view = new CreatGameView($this,"creatGame");

			$view->render();
		}

		public function joinGame($arg) {
			$view = new JoinGameView($this,"joinGame");
			$oldRequest = Request::getCurrentRequest();

			$publicGame = ListePartie::getPartiePublic($oldRequest->read('id'));
			$userGame = ListePartie::getParticipantGame($oldRequest->read('id'));
			$ownerGame = ListePartie::getOwnerGame($oldRequest->read('id'));

			$view->setArg("publicGame", $publicGame);
			$view->setArg("userGame", $userGame);
			$view->setArg("ownerGame", $ownerGame);

			$view->render();

		}

		public function continueGame($arg) {
			$view = new ContinueGameView($this,"continueGame");
			$oldRequest = Request::getCurrentRequest();

			$startGame = ListePartie::getPartieStarted($oldRequest->read('id'));

			$view->setArg("startGame", $startGame);

			$view->render();
		}

		public function validateGameCreation($args){
			$name = $args->read('name');
			if($name == NULL ){
				$view = new CreatGameView($this,"creatGame");
				$view->setArg('inscErrorText','Veuillez insérer un nom de partie');
				$view->render();
			}
			else if(ListePartie::isGameNameUsed($name) == true){
				$view = new CreatGameView($this,"creatGame");
				$view->setArg('inscErrorText','Nom de partie déjà utilisé');
				$view->render();
			}
			else{
				$isPublic = $args->read('public');
				if($isPublic == NULL){
					$isPublic = 0;
				}
				else{
					$isPublic = 1;
				}
				ListePartie::creatGame($args->read('id'), $isPublic , 0 , $name);
				ListePartie::AddPlayer($args->read('id'),$name);
				$this->defaultAction($args);

			}
		}
		public function deleteFriend($args){
			$oldRequest = Request::getCurrentRequest();
			Friends::deleteFriend($oldRequest->read('friend'), $oldRequest->read('id'));
			$this->showFriends($oldRequest);
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
			else if($action === "FriendProfil"){
				$this->showFriendProfil($request);
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
			else if($action === "validateGameCreation"){
				$this->validateGameCreation($request);
			}
			else if($action === "deleteFriend"){
				$this->deleteFriend($request);
			}
		}

	}
?>
