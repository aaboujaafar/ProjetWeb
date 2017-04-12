<?php
	class Dispatcher extends MyObject
	{	
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//TODO
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		public static function dispatch($request)
		{
			$controllerName = $request->getControllerName();
			//print_r($controllerName);
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