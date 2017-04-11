<div id="JoueurMenu">
 <div class="jumbotron list-content">
		 <ul class="list-group">
			 <li href="#" class="list-group-item title">
				Ils vous ont demandé en amis :
			 </li>
			 <?php
	 		foreach ($friendsAsking as $friend){
				 echo'<li href="#" class="list-group-item text-left">
				 <img class="img-thumbnail" src="'.$friend->PHOTOPROFIL.'">
				 <label class="friendName">'.$friend->PSEUDO.'<br></label>
				 <label class="pull-right">
						 <a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=acceptFriend&friend='.$friend->PSEUDO.'" title="Accept"></a>
						 <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="index.php?action=refuseFriend&friend='.$friend->PSEUDO.'" title="Refuse"></a>
				 </label>
				 <div class="break"></div>
			 </li>'; }?>
	 	</ul>
 	</div>
 </div>
