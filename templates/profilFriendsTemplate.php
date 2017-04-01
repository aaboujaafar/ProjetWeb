<div id="JoueurMenu">   
	<ul class="list-group">
		<br><br>Amis:<br><br>
		<?php 
		foreach ($friends as $friend){
			echo $friend->PSEUDO; echo "<br>";
		}
		echo "<br><br>Partie créé par mes amis --> possibilités de les rejoindre sans invitation s'il reste une place, comme pour les jeux steam<br><br>";
		//print_r($friendGame);
		foreach ($friendGame as $game){
			echo $game->NOMPARTIE; echo "<br>";
		}
	?>
	</ul>
	<a href="index.php?action=FriendProfil&friend=a" class="btn btn-secondary">voir le profil</a>
</div>