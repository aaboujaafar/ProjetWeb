<?php
	class UserController extends Controller
	{
		public function __construct($req) {

		}

		public function defaultAction($arg) {
			$view = new UserView($this,"AccueilConnected");

			$view->setArg("Pseudo", $arg->read('user'));
			$view->setArg("photoP", $arg->read('photoP'));

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

			$view->setArg("Pseudo", $arg->read('user'));
			$view->setArg("photoC", $arg->read('photoC'));
			$view->setArg("photoP", $arg->read('photoP'));
			$view->setArg("partieT", $arg->read('partieT'));
			$view->setArg("partieG", $arg->read('partieG'));
			$view->setArg("partieP", $arg->read('partieP'));
			$view->setArg("averageWin", $arg->read('averageWin'));

			$view->render();
		}

		public function showFriendProfil($arg) {
			$friend = Friends::getAFriend($arg->read('friend'));

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
				$view->setArg("Pseudo", $arg->read('user'));
				$view->setArg("photoP", $arg->read('photoP'));
			}

			$view->render();
		}

		public function showFriends($arg) {
			$view = new UserFriendsView($this,"profilFriends");

			$friends = Friends::getFriends($arg->read('id'));
			$friendGame = ListePartie::getFriendGame($arg->read('id'));
			$view->setArg("friends", $friends);
			$view->setArg("friendGame", $friendGame);

			$view->setArg("Pseudo", $arg->read('user'));
			$view->setArg("photoP", $arg->read('photoP'));

			$view->render();
		}

		public function creatGame($arg) {
			$view = new CreatGameView($this,"creatGame");

			$view->render();
		}

		public function joinGame($arg) {
			$view = new JoinGameView($this,"joinGame");

			$publicGame = ListePartie::getPartiePublic($arg->read('id'));
			$userGame = ListePartie::getParticipantGame($arg->read('id'));
			$ownerGame = ListePartie::getOwnerGame($arg->read('id'));

			$view->setArg("publicGame", $publicGame);
			$view->setArg("userGame", $userGame);
			$view->setArg("ownerGame", $ownerGame);

			$view->render();

		}

		public function continueGame($arg) {
			$view = new ContinueGameView($this,"continueGame");

			$startGame = ListePartie::getPartieStarted($arg->read('id'));

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
			Friends::deleteFriend($args->read('friend'), $args->read('id'));
			$this->showFriends($args);
		}

		public function goWaitingRoom($arg) {
			$creator = WaitingRoom::getGameCreator("bestGameEver");
			$participants= WaitingRoom::getParticipant("bestGameEver");
			$isParticipant = false;
			foreach ($participants as $participant){
				if($participant->PSEUDO === $arg->read('user')){
					$isParticipant = true;
				}
			}

			if($creator->PSEUDO === $arg->read('user')){
				$view = new WaitingRoomView($this,"waitingRoomBasCreator");
			}
			else if($isParticipant){
				$view = new WaitingRoomView($this,"waitingRoomBasParticipant");
			}
			else{
				$this->defaultAction($arg);
			}

			$public= WaitingRoom::isPublic("bestGameEver");
			$view->setArg("creator", $creator);
			$view->setArg("participant", $participants);
			$view->setArg("public", $public);
			$view->render();
		}
		public function changePublic($args){
			$public = WaitingRoom::isPublic("bestGameEver");
			if($public){
				WaitingRoom::putPrivate("bestGameEver");
			}
			else{
				WaitingRoom::putPublic("bestGameEver");
			}		
			$this->goWaitingRoom($args);
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
			if($action === "goWaitingRoom"){
				$this->goWaitingRoom($request);
			}
			if($action === "changePublic"){
				$this->changePublic($request);
			}
		}

	}
?>
