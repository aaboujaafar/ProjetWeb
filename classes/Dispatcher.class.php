<?php
	class Dispatcher extends MyObject
	{	
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//TODO
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		public static function dispatch($request)
		{
			$controllerName = $request->getControllerName();
			if(isset($_COOKIE["user"])) {
				$controllerName = "user";
			}
			$controllerNameFormated = ucfirst($controllerName)."Controller";
			if(class_exists($controllerNameFormated)){
				return new $controllerNameFormated($request);
			}
			else{
				//TODO retourne erreur
			}
		}
	}
?>