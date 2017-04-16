<div id="JoueurMenu">
	<div class="row">
		<h1>Les différentes parties possibles</h1>
	<?php
		echo '<ul class="list-group col-md-6">
			<li class="list-group-item title titrePB" >Les parties publiques</li>';
		if($publicGame != NULL){
			foreach ($publicGame as $pg){
				echo'<li class="list-group-item top15gamer">
				<span id="pseudoTop">'.$pg->NOMPARTIE.'</span>
				 </li>';
			}
		}
		echo '</ul>';
		echo '<ul class="list-group col-md-6">
			<li class="list-group-item title titrePB" >Les parties en tant que participant</li>';
		if($userGame != NULL){
			foreach ($userGame as $ug){
				echo'<li class="list-group-item top15gamer">
				<span id="pseudoTop">'.$ug->NOMPARTIE.'</span>
				 </li>';
			}
		}
		echo '</ul>';
		echo '<ul class="list-group col-md-6">
			<li class="list-group-item title titrePB" >Les parties en tant que créateur</li>';
		if($ownerGame != NULL){
			foreach ($ownerGame as $og){
				echo'<li class="list-group-item top15gamer">
				<span id="pseudoTop">'.$ug->NOMPARTIE.'</span>
				 </li>';
			}
		}
		echo '</ul><br>';
	?>
</div>
	<br><form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="get">
	<fieldset>
		<input type="hidden" name="action" value="goWaitingRoom" />
		<input type="hidden" name="gameName" value="tan" />
		<div class="form-group">
			<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >TEST : rejoindre creator</Button>
		</div>
		</fieldset>
	</form>
</div>
