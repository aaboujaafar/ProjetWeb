<div id="joinGame">
	<div class="pageTitle">
			<h1>Les differentes parties possibles</h1>
	</div>
	<div class="row">
	<?php
		echo '<ul class="list-group col-md-4">
			<li class="list-group-item title titrePB" >Les parties publiques</li>';
		if($publicGame != NULL){
			$i =0;
			foreach ($publicGame as $pg){
				echo'<li class="list-group-item top15gamer joinGame">
				<a href="index.php?action=acceptGame&game='.$pg->NOMPARTIE.'"><span id="pseudoTop">'.$pg->NOMPARTIE.'</span><span class="badge monBadgeRP pull-right" data-toggle="tooltip" title="Nombre de participants" data-placement="bottom">'.$nbrPublicGame[$i].'</span>
				 </a></li>';
				 $i+=1;
			}
		}
		echo '</ul>';
		echo '<ul class="list-group col-md-4">
			<li class="list-group-item title titrePB" >Les parties en tant que participant</li>';
		if($userGame != NULL){
			$i =0;
			foreach ($userGame as $ug){
				echo'<li class="list-group-item top15gamer joinGame">
				<a href="index.php?action=goWaitingRoom&gameName='.$ug->NOMPARTIE.'"><span id="pseudoTop">'.$ug->NOMPARTIE.'</span><span class="badge monBadgeRP pull-right" data-toggle="tooltip" title="Nombre de participants">'.$nbrUserGame[$i].'</span>
				 </a></li>';
				 $i+=1;
			}
		}
		echo '</ul>';
		echo '<ul class="list-group col-md-4">
			<li class="list-group-item title titrePB" >Les parties en tant que createur</li>';
		if($ownerGame != NULL){
			$i =0;
			foreach ($ownerGame as $og){
				echo'<li class="list-group-item top15gamer joinGame">
				<a href="index.php?action=goWaitingRoom&gameName='.$og->NOMPARTIE.'"><span id="pseudoTop">'.$og->NOMPARTIE.'</span><span class="badge monBadgeRP pull-right" data-toggle="tooltip" title="Nombre de participants">'.$nbrOwnerGame[$i].'</span>
				 </a></li>';
				 $i+=1;
			}
		}
		echo '</ul><br>';
	?>
</div>

</div>
