<?php
	class UserController extends Controller
	{	
		public function __construct($req) {
			
		}
		
		public function defaultAction($arg) {
			$view = new UserView($this,"homeConnecte");
			if(isset($_COOKIE["user"])) {
				$view->setArg("Pseudo", $_COOKIE["user"]);
			}
			else{
				$oldRequest = Request::getCurrentRequest();
				$view->setArg("Pseudo", $oldRequest->read('user'));
			}
			$view->render();
		}
		
		public function logout($arg) {
			//unset($_COOKIE["user"]);
			setcookie ("user", "", time() - 3600);

			$view = new AnonymousView($this,"home");
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
		}
		
	}
?>