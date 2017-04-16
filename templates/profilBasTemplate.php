<div id="profilBas">
	<ul class="list-group col-md-5">
		<li class="list-group-item title titrePB" >Les 15 meilleurs joueurs du jeu</li>
			 <?php
				if($rank != NULL){
			 		foreach ($rank as $r){
						echo'<li class="list-group-item top15gamer">
						<img src="'.$r->PHOTOPROFIL.'"/><span id="pseudoTop">'.$r->PSEUDO.'</span><span class="badge monBadgePB" data-toggle="tooltip" title="Score">'.$r->NBRPARTIEGAGNEE.'</span>
						 </li>';
					}
				}
			?>
	</p>
</div>
