<div id="JoueurMenu">
	<div class="pageTitle">
			<h1>Continuer Partie</h1>
	</div></br>
	<div class="row">
		<?php
		echo '<ul class="list-group col-md-6 col-md-offset-3">
			<li class="list-group-item title titrePB" >Les parties en cours</li>';
			if($startGame != NULL){
				$i =0;
				foreach ($startGame as $sg){
					 echo'<li class="list-group-item top15gamer joinGame">
				<a href="index.php?action=startGame&gameName='.$sg->NOMPARTIE.'"><span id="pseudoTop">'.$sg->NOMPARTIE.'</span><span class="badge monBadgeRP pull-right" data-toggle="tooltip" title="Nombre de participants" data-placement="bottom">'.$nbrUserGame[$i].'</span>
				 </a></li>';
					  $i+=1;
				}
			}
			echo '</ul>';
		?>
	</div>
</div>

