<div id="JoueurMenu">
	<br>
	<p>ProfilConected
	<br>
		Rank : les 15 meilleurs joueur du jeu
			 </li>
			 <?php
				if($rank != NULL){
			 		foreach ($rank as $r){
						 echo'<li href="#" ">
						 <img width="15%" class="img-thumbnail" src="'.$r->PHOTOPROFIL.'">
						 <label class="friendName">'.$r->PSEUDO.'<br></label>
						 <label class="friendName">'."-----".$r->NBRPARTIEGAGNEE.'<br></label>
						 <div class="break"></div>
					 </li>';
					}
				}
			?>
	</p>
</div>
