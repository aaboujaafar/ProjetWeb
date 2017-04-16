<div id="JoueurMenu">
	<div class="row">
	<?php
	echo '<ul class="list-group col-md-12">
		<li class="list-group-item title titrePB" >Les parties en cours</li>';
		if($startGame != NULL){
			foreach ($startGame as $sg){
				echo'<li class="list-group-item top15gamer">
				<span id="pseudoTop">'.$sg->NOMPARTIE.'</span>
				 </li>';
			}
		}
		echo '</ul>';
	?>
</div>
	<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
	<fieldset>
		<input type="hidden" name="action" value="startGame" />
		<input type="hidden" name="gameName" value="BestGameEver" />
		<div class="form-group">
			<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >
				Rejoindre la partie
			</Button>
		</div>
	</fieldset>
</form>
</div>
