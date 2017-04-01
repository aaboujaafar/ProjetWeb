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
</div>