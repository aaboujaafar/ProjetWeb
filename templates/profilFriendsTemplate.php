<div id="JoueurMenu">
<!--ajout d'un amis -->
	<?php
		if(isset($inscErrorText)){
		echo '<div class="alert alert-warning" role="alert">
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorText . '</span></div></br>';}
		if(isset($inscOKText)){
		echo '<div class="alert alert-success" role="alert">
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscOKText . '</span></div></br>';}		
	?>
		 <form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
			<fieldset>
				<input type="hidden" name="action" value="addFriend" />
				<div class="form-group">
					<div class="col-sm-10">
						 <input type="text" name="friendName" id="test"  placeholder="insérer le nom de votre ami" required/>
					</div>
				</div>
					
				<div class="form-group">
					<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >Ajouter un ami
					</Button>
				</div>
			</fieldset>
		</form>

 <div class="jumbotron list-content">
		 <ul class="list-group">
			<!--liste des amis -->
			<li href="#" class="list-group-item title">
				 Tes Amis :
			 </li>
			 <?php
				if($friends != NULL){
			 		foreach ($friends as $friend){
						 echo'<li href="#" class="list-group-item text-left">
						 <img class="img-thumbnail" src="'.$friend->PHOTOPROFIL.'">
						 <label class="friendName">'.$friend->PSEUDO.'<br></label>
						 <label class="pull-right">
								 <a  class="btn btn-success btn-xs glyphicon glyphicon-user" href="index.php?action=FriendProfil&friend='.$friend->PSEUDO.'" title="View Profil"></a>
								 <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="index.php?action=deleteFriend&friend='.$friend->PSEUDO.'" title="Delete"></a>
						 </label>
						 <div class="break"></div>
					 </li>'; 
					}
				}
			?>
	 	</ul>
 	</div>
 </div>
