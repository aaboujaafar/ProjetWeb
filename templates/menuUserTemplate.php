<div id="cssmenu">
<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">6 Qui prend !</a>
    </div>
	<a class="lienMenu pull-right " href="index.php?action=logout">Deconnexion</a>
	<a class="lienMenu pull-right" href="index.php?action=friends">Amis</a>
	<a class="lienMenu pull-right" href="index.php?action=profil">Profil</a>
	<a class="lienMenu pull-right" href="index.php?action=rank">Classement</a>
	<a class="lienMenu pull-right" href="index.php">Accueil</a>   <?php //$request = Request::getCurrentRequest();if($request->getControllerName()!="anonymous"){echo "?controller=".$request->getControllerName();if($request->read("user")!=""){echo "&user=".$request->read("user");}}?>
  </div>
</nav>
</div>
