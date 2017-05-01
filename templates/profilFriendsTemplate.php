<div id="JoueurMenu">
<!--ajout d'un amis -->
	<?php
		if(isset($inscErrorText)){
		echo '<div class="alert alert-warning list-group col-md-4 col-md-offset-4" role="alert">
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign col-md-offset-3">&nbsp</span>' . $inscErrorText . '</span></div></br>';}
		if(isset($inscOKText)){
		echo '<div class="alert alert-success col-md-4 col-md-offset-4" role="alert">
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign col-md-offset-3">&nbsp</span>' . $inscOKText . '</span></div></br>';}
	?>
	<br>
	<br>
		 <form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
			<fieldset>
				<input type="hidden" name="action" value="addFriend" />
				<div class="form-group">
					<div class="col-sm-8 col-md-offset-2">
						 <input type="text" name="friendName" id="test"  placeholder="      insérer le nom de votre ami" required/>
					</div>
				</div>

				<div class="form-group">
					<button class="boutonMenu boutonB bouton hvr-grow" id="bouton" type="submit" >Ajouter un ami</Button>
				</div>
			</fieldset>
		</form>

	 <ul class="list-group col-md-6 col-md-offset-3">
		<li class="list-group-item title titrePB" >Liste des amis</li>
			 <?php
				if($friends != NULL){
			 		foreach ($friends as $friend){
						 echo'<li class="list-group-item top15gamer">
						 <img width="15%" class="img-thumbnail" src="'.$friend->PHOTOPROFIL.'">
						 <label class="friendName">'.$friend->PSEUDO.'<br></label>
						 <label class="pull-right">
								 <a  class="btn btn-success btn-xs glyphicon glyphicon-user monBadgeF" href="index.php?action=FriendProfil&friend='.$friend->PSEUDO.'" title="View Profil"></a>
								 <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash monBadgeF" href="index.php?action=deleteFriend&friend='.$friend->PSEUDO.'" title="Delete"></a>
						 </label>
					 </li>';
					}
				}
			?>
	 	</ul>
 	</div>
 </div>
