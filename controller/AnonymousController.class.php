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
		
		public function validateInscription($args) {
			$login = $args->read('inscLogin');
			if(User::isLoginUsed($login)) {
				$view = new AnonymousView($this,'inscription');
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
		}
		
	}
?>