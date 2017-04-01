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
</div>