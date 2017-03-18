<div id="cssmenu">
<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">6 Qui prend !</a>
    </div>
	<a class="lienMenu pull-right" href="index.php?action=inscription">Inscription</a>
	<a class="lienMenu pull-right" href="index.php?action=connexion">Connexion</a>
	<a class="lienMenu pull-right" href="index.php<?php  
	$request = Request::getCurrentRequest();
	if($request->getControllerName()!="anonymous"){
		echo "?controller=".$request->getControllerName();
		if($request->read("user")!=""){
			echo "&user=".$request->read("user");
		}
	}
	?>">Accueil</a>
  </div>
</nav>
</div>
