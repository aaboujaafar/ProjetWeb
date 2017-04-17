<div id="joinGame">
	<div class="joinGameTitle">
			<h1>Les différentes parties possibles</h1>
	</div>
	<div class="row">
	<?php
		echo '<ul class="list-group col-md-4">
			<li class="list-group-item title titrePB" >Les parties publiques</li>';
		if($publicGame != NULL){
			$i =0;
			foreach ($publicGame as $pg){
				echo'<li class="list-group-item top15gamer">
				<span id="pseudoTop">'.$pg->NOMPARTIE.'</span><span class="badge monBadgeRP" data-toggle="tooltip" title="Nombre de participants" data-placement="bottom">'.$nbrPublicGame[$i].'</span>
				 </li>';
				 $i+=1;
			}
		}
		echo '</ul>';
		echo '<ul class="list-group col-md-4">
			<li class="list-group-item title titrePB" >Les parties en tant que participant</li>';
		if($userGame != NULL){
			$i =0;
			foreach ($userGame as $ug){
				echo'<a href="index.php?action=goWaitingRoom&gameName='.$ug->NOMPARTIE.'"><li class="list-group-item top15gamer">
				<span id="pseudoTop">'.$ug->NOMPARTIE.'</span><span class="badge monBadgeRP" data-toggle="tooltip" title="Nombre de participants">'.$nbrUserGame[$i].'</span>
				 </a></li>';
				 $i+=1;
			}
		}
		echo '</ul>';
		echo '<ul class="list-group col-md-4">
			<li class="list-group-item title titrePB" >Les parties en tant que créateur</li>';
		if($ownerGame != NULL){
			$i =0;
			foreach ($ownerGame as $og){
				echo'<li class="list-group-item top15gamer">
				<span id="pseudoTop">'.$og->NOMPARTIE.'</span><span class="badge monBadgeRP" data-toggle="tooltip" title="Nombre de participants">'.$nbrOwnerGame[$i].'</span>
				 </li>';
				 $i+=1;
			}
		}
		echo '</ul><br>';
	?>
</div>
	<br><form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="get">
	<fieldset>
		<input type="hidden" name="action" value="goWaitingRoom" />
		<input type="hidden" name="gameName" value="tan" />
		<div class="row">

		</div>
		<div class="form-group col-md-5">
			<button class="boutonMenu hvr-grow bouton" id="bouton" type="submit" >Rejoindre creator</Button>
		</div>
		</fieldset>
	</form>
</div>
