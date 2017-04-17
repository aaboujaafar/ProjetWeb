<div class="row">
	<div class="col-md-4">
		<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
			<fieldset>
				<input type="hidden" name="action" value="changePublic" />
				<input type="hidden" name="gameName" value= <?php echo '"'. $gameName .'"'?> />
				<div class="form-group">
					<button class="boutonMenu bouton col-sm-offset-5" id="bouton" type="submit" >
					<?php
					if($public){
						echo 'Rendre Privee';
					}
					else{
						echo 'Rendre Publique';
					}?>
					</Button>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="col-md-4">
		<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
			<fieldset>
				<input type="hidden" name="action" value="goWaitingRoom" />
				<input type="hidden" name="gameName" value= <?php echo '"'. $gameName .'"'?> />
				<div class="form-group">
					<button class="boutonMenu bouton col-sm-offset-5" id="bouton" type="submit" >Annuler
					</Button>
				</div>
			</fieldset>
		</form>
	</div>
</div>
		<div class="list-content" id="ajoutAmis">
			<?php echo '<ul class="list-group col-md-5 col-md-offset-3">
				<li class="list-group-item titrePB" >Ajoute un ami</li>';
						if($friends != NULL){
					 		foreach ($friends as $friend){
								echo'<li class="list-group-item top15gamer">
								<img width="15%" class="img-thumbnail" src="'.$friend->PHOTOPROFIL.'">
								<label class="friendName">'.$friend->PSEUDO.'<br></label>
								 <label class="pull-right">
								 		<a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="index.php?action=addInGame&friend='.$friend->PSEUDO.'&gameName='. $gameName .'" title="View"></a>
								</label>
							</li>';
							}
						}
					?>
			 	</ul>
		 	</div>
