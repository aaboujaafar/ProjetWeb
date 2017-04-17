<div id="salleAttenteH" class="row">
	<div id="partieInfos" class="col-md-6 col-md-offset-5">
		<h1><?php echo $gameName; ?></h1> <br>
		<span> Partie publique :
		<?php
			if($public){
				echo 'Oui';
			}
			else{
				echo 'Non';
			}
		?>
		</span>
	</br>
	</div>
	<?php
	echo '<ul class="listeParticipants list-group col-md-7 col-md-offset-2">
		<li class="list-group-item title titrePB" >Participants</li>';
		echo'<li class="list-group-item top15gamer">
		<img id="pseudoTop" src="'.$creator->PHOTOPROFIL.'"/><span id="photoW">'.$creator->PSEUDO.'</span><span class="badge monBadgePB" data-toggle="tooltip" title="Créateur" aria-hidden="true"><span class="glyphicon glyphicon-flag"></span></span> </li>';
	foreach($participant as $p){
		if($creator->PSEUDO !== $p->PSEUDO){
			echo'<li class="list-group-item top15gamer">
			<img id="pseudoTop" src="'.$p->PHOTOPROFIL.'"/> <span id="photoW">'.$p->PSEUDO.'</span></li>';
		}
	}
	echo ('</ul>');
	?>
</div>
