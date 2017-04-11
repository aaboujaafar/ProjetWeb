<div id="JoueurMenu">
	<p>game</p><br>
	<?php
		echo "<br>partie public:<br>";
		if($publicGame != NULL){
			foreach ($publicGame as $pg){
				echo $pg->NOMPARTIE; echo "<br>";
			}
		}
		echo "<br>partie en tant que participant:<br>";
		if($userGame != NULL){
			foreach ($userGame as $ug){
				echo $ug->NOMPARTIE; echo "<br>";
			}
		}
		echo "<br>partie en tant que créateur:<br>";
		if($ownerGame != NULL){
			foreach ($ownerGame as $og){
				echo $og->NOMPARTIE; echo "<br>";
			}
		}
	?>
	<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="get">
	<fieldset>
		<input type="hidden" name="action" value="goWaitingRoom" />
		<input type="hidden" name="gameName" value="tan" />
		<div class="form-group">
			<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >TEST : rejoindre creator</Button>
		</div>
		</fieldset>
	</form>
</div>