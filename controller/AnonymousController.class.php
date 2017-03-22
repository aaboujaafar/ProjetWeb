<?php
	class AnonymousController extends Controller
	{			
		public function __construct($req) {
			
		}
		
		public function defaultAction($arg) {
			$view = new AnonymousView($this,"home");
			$view->render();
		}
		
		public function inscription($arg) {
			$view = new InscriptionView($this,"inscription");
			$view->render();
		}
		
		public function login($arg) {
			$view = new LoginView($this,"login");
			$view->render();
		}
		
		public function validateConnexion($args){
			$login = $args->read('connexionLogin');
			if(!User::isLoginUsed($login)) {
				$view = new LoginView($this,'login');
				$view->setArg('inscErrorText','Joueur inexistant');
				$view->render();
			} 
			else{
				$password = $args->read('connexionPassword');
				$user = User::getUser($login, $password);
				if($user == NULL ){
					$view = new LoginView($this,'login');
					$view->setArg('inscErrorText','Mot de passe incorrecte, veuillez insérer le bon mot de passe');
					$view->render();
				}
				else{
					$newRequest = Request::getCurrentRequest();
					$newRequest->write('controller','user');
					$newRequest->write('action','Anonymous');
					$newRequest->write('user',$user->PSEUDO);
					$newRequest->write('partieG',$user->NBRPARTIEGAGNEE);
					$newRequest->write('partieP',($user->NBRPARTIEJOUEE - $user->NBRPARTIEGAGNEE));
					$newRequest->write('partieT',$user->NBRPARTIEJOUEE);
					$newRequest->write('id',$user->IDJOUEUR);
					if($user->NBRPARTIEJOUEE ==0){
						$newRequest->write('averageWin',0);
					}
					else{
						$newRequest->write('averageWin',($user->NBRPARTIEGAGNEE/$user->NBRPARTIEJOUEE));
					}
					$newRequest->write('photoP',$user->PHOTOPROFIL);
					$newRequest->write('photoC',$user->PHOTOCOVER);
					
					setcookie("user",$user->PSEUDO, time()+ 3600*24);
					setcookie("partieG",$user->NBRPARTIEGAGNEE, time()+ 3600*24);
					setcookie("partieP",($user->NBRPARTIEJOUEE - $user->NBRPARTIEGAGNEE), time()+ 3600*24);
					setcookie("partieT",$user->NBRPARTIEJOUEE, time()+ 3600*24);
					if($user->NBRPARTIEJOUEE ==0){
						setcookie("averageWin",0, time()+ 3600*24);
					}
					else{
						setcookie("averageWin",($user->NBRPARTIEGAGNEE/$user->NBRPARTIEJOUEE), time()+ 3600*24);
					}
					setcookie("photoP",$user->PHOTOCOVER, time()+ 3600*24);
					setcookie("photoC",$user->PHOTOPROFIL, time()+ 3600*24);
					setcookie("id",$user->IDJOUEUR, time()+ 3600*24);
					
		
					try {
						// Instantiate the adequat controller according to the current request
						$controller = Dispatcher::dispatch($newRequest);
							
						// Execute the requested action
						$controller->execute();
					} catch (Exception $e) {
						echo 'Error : ' . $e->getMessage() . "\n";
					}
				}
			}
		}
		
		public function validateInscription($args) {
			$login = $args->read('inscLogin');
			if(User::isLoginUsed($login)) {
				$view = new InscriptionView($this,'inscription');
				$view->setArg('inscErrorText','This login is already used');
				$view->render();
			} 
			else {
				$password = $args->read('inscPassword');
				$nom = $args->read('nom');
				$prenom = $args->read('prenom');
				$mail = $args->read('mail');
				if($login=="") {
					$view = new AnonymousView($this,'inscription');
					$view->setArg('inscErrorText','You need to file in the Login');
					$view->render();
				} 
				else if($password=="") {
					$view = new AnonymousView($this,'inscription');
					$view->setArg('inscErrorText','You need to file in the passWord');
					$view->render();
				} 
				else if($mail=="") {
					$view = new AnonymousView($this,'inscription');
					$view->setArg('inscErrorText','You need to file in the mail');
					$view->render();
				} 
				else{
					$user = User::creatPlayer($login, $password,$mail,$nom,$prenom);
					
					if(!isset($user)) {
						$view = new AnonymousView($this,'inscription');
						$view->setArg('inscErrorText', 'Cannot complete inscription');
						$view->render();
					} 
					else {
						$newRequest = Request::getCurrentRequest();
						$newRequest->write('controller','user');
						$newRequest->write('action','Anonymous');
						$newRequest->write('user',$user->PSEUDO);
						$newRequest->write('partieG',$user->NBRPARTIEGAGNEE);
						$newRequest->write('partieP',($user->NBRPARTIEJOUEE - $user->NBRPARTIEGAGNEE));
						$newRequest->write('partieT',$user->NBRPARTIEJOUEE);
						$newRequest->write('id',$user->IDJOUEUR);
						if($user->NBRPARTIEJOUEE ==0){
							$newRequest->write('averageWin',0);
						}
						else{
							$newRequest->write('averageWin',($user->NBRPARTIEGAGNEE/$user->NBRPARTIEJOUEE));
						}
						$newRequest->write('photoP',$user->PHOTOPROFIL);
						$newRequest->write('photoC',$user->PHOTOCOVER);
						
						setcookie("user",$user->PSEUDO, time()+ 3600*24);
						setcookie("partieG",$user->NBRPARTIEGAGNEE, time()+ 3600*24);
						setcookie("partieP",($user->NBRPARTIEJOUEE - $user->NBRPARTIEGAGNEE), time()+ 3600*24);
						setcookie("partieT",$user->NBRPARTIEJOUEE, time()+ 3600*24);
						if($user->NBRPARTIEJOUEE ==0){
							setcookie("averageWin",0, time()+ 3600*24);
						}
						else{
							setcookie("averageWin",($user->NBRPARTIEGAGNEE/$user->NBRPARTIEJOUEE), time()+ 3600*24);
						}
						setcookie("photoP",$user->PHOTOCOVER, time()+ 3600*24);
						setcookie("photoC",$user->PHOTOPROFIL, time()+ 3600*24);
						setcookie("id",$user->IDJOUEUR, time()+ 3600*24);
						
						try {
							// Instantiate the adequat controller according to the current request
							$controller = Dispatcher::dispatch($newRequest);
							
							// Execute the requested action
							$controller->execute();
						} catch (Exception $e) {
							echo 'Error : ' . $e->getMessage() . "\n";
						}
					}
				}
			}
		}
		
		
		public function execute(){
			$request = Request::getCurrentRequest();
			$action = $request->getActionName();
			if($action === "Anonymous"){
				$this->defaultAction($request);
			}
			else if($action === "inscription"){
				$this->inscription($request);
			}
			else if($action === "validateInscription"){
				$this->validateInscription($request);
			}
			else if($action === "connexion"){
				$this->login($request);
			}
			else if($action === "validateConnexion"){
				$this->validateConnexion($request);
			}
		}
		
	}
?>