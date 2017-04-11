<?php
	class UserController extends Controller
	{
		public function __construct($req) {

		}

		public function defaultAction($arg) {
			$view = new UserView($this,"AccueilConnected");

			//------------------
			// demande d'amis + demande joindre partie
			//------------------
			$evenementFriend = Friends::Evenement_FriendAdding($arg->read('id'));
			//$evenementPartie = ...

			$view->setArg("Pseudo", $arg->read('user'));
			$view->setArg("photoP", $arg->read('photoP'));
			$view->setArg("evenementFriend", $evenementFriend);

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
				$evenementFriend = Friends::Evenement_FriendAdding($arg->read('id'));
				$view->setArg("evenementFriend", $evenementFriend);
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
				$this->defaultAction($args); // TODO : modifier en redirection vers la partie concernée.

			}
		}
		public function deleteFriend($args){
			Friends::RemoveFriendP1($args->read('id'), $args->read('friend'));
			Friends::RemoveFriendP2($args->read('id'), $args->read('friend'));
			$this->showFriends($args);
		}

		public function goWaitingRoom($arg) {
			$arg->write('gameName',$arg->read('gameName'));
			setcookie("gameName",$arg->read('gameName'), time()+ 3600*24);
			$gameName = $arg->read('gameName');

			$creator = WaitingRoom::getGameCreator($gameName);
			$participants= WaitingRoom::getParticipant($gameName);
			$isParticipant = false;
			foreach ($participants as $participant){
				if($participant->PSEUDO === $arg->read('user')){
					$isParticipant = true;
				}
			}

			if($creator->PSEUDO === $arg->read('user')){
				$view = new WaitingRoomView($this,"waitingRoomBasCreator");
				$public= WaitingRoom::isPublic($gameName);

				$view->setArg("creator", $creator);
				$view->setArg("gameName", $gameName);
				$view->setArg("participant", $participants);
				$view->setArg("public", $public);

				$view->render();
			}
			else if($isParticipant){
				$view = new WaitingRoomView($this,"waitingRoomBasParticipant");
				$public= WaitingRoom::isPublic($gameName);

				$view->setArg("creator", $creator);
				$view->setArg("gameName", $gameName);
				$view->setArg("participant", $participants);
				$view->setArg("public", $public);
				
				$view->render();
			}
			else{
				$this->defaultAction($arg);
			}
		}

		public function changePublic($arg){
			$isPublic = WaitingRoom::isPublic($arg->read('gameName'));
			if($isPublic){
				WaitingRoom::putPrivate($arg->read('gameName'));
			}
			else{
				WaitingRoom::putPublic($arg->read('gameName'));
			}		
			$this->goWaitingRoom($arg);
		}

		public function showFriendAsking($arg){
			$view = new UserFriendsView($this,"evenementFriendAsking");

			$friendsAsking = Friends::Evenement_FriendAdding($arg->read('id'));
			
			$view->setArg("friendsAsking", $friendsAsking);

			$view->setArg("Pseudo", $arg->read('user'));
			$view->setArg("photoP", $arg->read('photoP'));

			$view->render();
		}

		public function accepetFriend($arg){
			Friends::AddFriend($arg->read('id'), $arg->read('friend'));
			$this->defaultAction($arg);
		}

		public function refuseFriend($args){
			Friends::RemoveFriendP1($args->read('id'), $args->read('friend'));
			Friends::RemoveFriendP2($args->read('id'), $args->read('friend'));
			$this->defaultAction($arg);
		}

		public function addFriend($arg){
			$view = new UserFriendsView($this,"profilFriends");

			$friends = Friends::getFriends($arg->read('id'));
			$friendGame = ListePartie::getFriendGame($arg->read('id'));
			$view->setArg("friends", $friends);
			$view->setArg("friendGame", $friendGame);

			$view->setArg("Pseudo", $arg->read('user'));
			$view->setArg("photoP", $arg->read('photoP'));

			if($arg->read('user') === $arg->read('friendName')){
				$view->setArg('inscErrorText',"Vous ne pouvez pas vous ajouter en ami");
			}
			else{
				$try = Friends::AskFriend($arg->read('id'), $arg->read('friendName'));
				if($try){
					$view->setArg('inscOKText',"demande d'ami envoyé");
				}

				else{
					if(Friends::isFriend($arg->read('id'), $arg->read('friendName'))){
						$view->setArg('inscErrorText',"Vous êtes déjà ami avec ". $arg->read('friendName'));
					}
					else{
						$view->setArg('inscErrorText',"demande d'ami déjà envoyé à ce joueur");
					}
				}
			}

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
			if($action === "evenementFriend"){
				$this->showFriendAsking($request);
			}
			if($action === "acceptFriend"){
				$this->accepetFriend($request);
			}
			if($action === "refuseFriend"){
				$this->refuseFriend($request);
			}
			if($action === "addFriend"){
				$this->addFriend($request);
			}
		}

	}
?>
