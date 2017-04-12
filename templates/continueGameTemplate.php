<div id="JoueurMenu">
	<p>game en cours</p><br>
	<?php
		echo "<br>Jeu:<br>";
		if($startGame != NULL){
			foreach ($startGame as $sg){
				echo $sg->NOMPARTIE; echo "<br>";
			}
		}
	?>
	<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
	<fieldset>
		<input type="hidden" name="action" value="startGame" />
		<input type="hidden" name="gameName" value="BestGameEver" />
		<div class="form-group">
			<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >
				rejoindre la partie
			</Button>
		</div>
	</fieldset>
</form>
</div>