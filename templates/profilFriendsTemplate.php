<div id="JoueurMenu">
 <div class="jumbotron list-content">
		 <ul class="list-group">
			 <li href="#" class="list-group-item title">
				 Tes Amis :
			 </li>
			 <?php
	 		foreach ($friends as $friend){
				 echo'<li href="#" class="list-group-item text-left">
				 <img class="img-thumbnail" src="'.$friend->photoP.'">
				 <label class="friendName">'.$friend->PSEUDO.'<br></label>
				 <label class="pull-right">
						 <a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=FriendProfil&friend='.$friend->PSEUDO.'" title="View"></a>
						 <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete"></a>
				 </label>
				 <div class="break"></div>
			 </li>'; }?>
	 	</ul>
 	</div>
 </div>

	<ul class="list-group">
		<br><br>Amis:<br><br>
		<?php
		foreach ($friends as $friend){
			echo $friend->PSEUDO; echo "<br>";echo $friend->photoC;
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
