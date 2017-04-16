<br><br>
<FONT color="white"><b><p align="center">Partie 
<?php
	if($public){
		echo 'Public';
	}
	else{
		echo 'Privé';
	}
?> 
</p></b></FONT>
<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
	<fieldset>
		<input type="hidden" name="action" value="changePublic" />
		<input type="hidden" name="gameName" value= <?php echo '"'. $gameName .'"'?> />
		<div class="form-group">
			<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >
			<?php 
			if($public){
				echo 'Rendre Privée';
			}
			else{
				echo 'Rendre Publique';
			}
			echo ' (seul le créateur voit ce bouton)'; ?>
			</Button>
		</div>
	</fieldset>
</form>

<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
	<fieldset>
		<input type="hidden" name="action" value="goWaitingRoom" />	
		<input type="hidden" name="gameName" value= <?php echo '"'. $gameName .'"'?> />				
		<div class="form-group">
			<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >Annuler
			</Button>
		</div>
	</fieldset>
</form>

<div class="jumbotron list-content">
		 <ul class="list-group">
			<!--liste des amis -->

			<li href="#" class="list-group-item title">
				Ajoute un ami :
			 </li>
			 <?php
				if($friends != NULL){
			 		foreach ($friends as $friend){
						 echo'<li href="#" class="list-group-item text-left">
						 <img class="img-thumbnail" src="'.$friend->PHOTOPROFIL.'">
						 <label class="friendName">'.$friend->PSEUDO.'<br></label>
						 <label class="pull-right">
								 <a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=addInGame&friend='.$friend->PSEUDO.'&gameName='. $gameName .'" title="View"></a>
						 </label>
						 <div class="break"></div>
					 </li>'; 
					}
				}
			?>
	 	</ul>
 	</div>