<div id="JoueurMenu">
 <div class="jumbotron list-content">
		 <ul class="list-group">
			 <li href="#" class="list-group-item title">
				Vous avez été invité dans les parties suivantes
			 </li>
			 <?php
	 		foreach ($joinedGame as $j){
				 echo'<li href="#" class="list-group-item text-left">
				 <label class="friendName">'.$j->NOMPARTIE.'<br></label>
				 <label class="pull-right">
						 <a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=acceptGame&game='.$j->NOMPARTIE.'" title="Accept"></a>
						 <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="index.php?action=refuseGame&game='.$j->NOMPARTIE.'" title="Refuse"></a>
				 </label>
				 <div class="break"></div>
			 </li>'; }?>
	 	</ul>
 	</div>
 </div>
