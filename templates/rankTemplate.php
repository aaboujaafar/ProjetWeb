<div id="event1">

		<ul class="list-group col-md-7 col-md-offset-2">
			<li class="list-group-item title titrePB" >Top 10</li>
				<?php
	 				foreach ($rank as $r){
				 		echo'<li class="list-group-item top15gamer">
				 			<img width="15%" class="img-thumbnail" src="'.$r->PHOTOPROFIL.'">
							 <span>'.$r->PSEUDO.'</span>
							 <label class="pull-right">
							 <span class="badge monBadgeRP pull-right" data-toggle="tooltip" title="Nombre de partie gagnée">'.$r->NBRPARTIEGAGNEE.'</span>
					 		</label>
			 			</li>';
					}
			 	?>
	 	</ul>
 	</div>
 </div>
