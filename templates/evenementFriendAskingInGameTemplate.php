<div id="event1">

		  <ul class="list-group col-md-7 col-md-offset-2">
		<li class="list-group-item title titrePB" >Liste des amis</li>
			 <?php
	 		foreach ($joinedGame as $j){
				 echo'<li class="list-group-item top15gamer">
						 <span>'.$j->NOMPARTIE.'</span>
						 <label class="pull-right">
						 <a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=acceptGame&game='.$j->NOMPARTIE.'" title="Accept"></a>
						 <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="index.php?action=refuseGame&game='.$j->NOMPARTIE.'" title="Refuse"></a>
				 </label>
			 </li>'; }?>
	 	</ul>
 	</div>
 </div>
