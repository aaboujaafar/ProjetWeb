<?php
	class UserController extends Controller
	{	
		public function __construct($req) {
			
		}
		
		public function defaultAction($arg) {
			$view = new UserView($this,"homeConnecte");
			$request = Request::getCurrentRequest();
			$user = User::getUser($request->read("user"));
			$view->setArg("Pseudo", $user->PSEUDO);
			$view->render();
		}
		
		public function execute(){
			$request = Request::getCurrentRequest();
			$action = $request->getActionName();
			if($action === "Anonymous"){
				$this->defaultAction($request);
			}
		}
		
	}
?>