<?php
	class Controller extends MyObject
	{	
		public $request;
		public function __construct($req) {
		}
		
		public function defaultAction($arg) {
		 
		}
		
		public function execute(){
			$request = Request::getCurrentRequest();
			$action = $request->getActionName();
			if($action === "Anonymous"){
				$this->defaultAction($request);
			}
			else if($action === "showProfile"){
				
			}
			else{
			
			}
		}
		
	}
?>