<?php
	class Dispatcher extends MyObject
	{	
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		//TODO
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		public static function dispatch($request)
		{
			$controllerName = $request->getControllerName();
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