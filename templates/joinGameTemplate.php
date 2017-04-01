<div id="JoueurMenu">
	<p>game</p><br>
	<?php
		echo "<br>partie public:<br>";
		foreach ($publicGame as $pg){
			echo $pg->NOMPARTIE; echo "<br>";
		}
		echo "<br>partie en tant que participant:<br>";
		foreach ($userGame as $ug){
			echo $ug->NOMPARTIE; echo "<br>";
		}
		echo "<br>partie en tant que créateur:<br>";
		foreach ($ownerGame as $og){
			echo $og->NOMPARTIE; echo "<br>";
		}
	?>
</div>