<div id="JoueurMenu">
<ul class="list-group col-md-7 col-md-offset-2">
		<li class="list-group-item title titrePB" >Ils vous ont demande en amis</li>
			 <?php
	 		foreach ($friendsAsking as $friend){
				  echo'<li class="list-group-item top15gamer">
						 <img width="15%" class="img-thumbnail" src="'.$friend->PHOTOPROFIL.'">
						 <label class="friendName">'.$friend->PSEUDO.'<br></label>
						 <label class="pull-right">
						 <a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=acceptFriend&friend='.$friend->PSEUDO.'" title="Accept"></a>
						 <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="index.php?action=refuseFriend&friend='.$friend->PSEUDO.'" title="Refuse"></a>
				 </label>
			 </li>'; }?>
	 	</ul>
 	</div>
 </div>
