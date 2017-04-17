<div id="JoueurMenu">
	<br>
	<?php
		if(isset($inscErrorFull)){
			echo '<div class="alert alert-warning" role="alert">
					<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorFull . '</span></div></br>';
		}
		if($evenementFriend != NULL){
			echo '<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
				<fieldset>
					<input type="hidden" name="action" value="evenementFriend" />
					<div class="form-group">
						<button class="boutonMenu btn btn-Secondary col-sm-offset-5" id="bouton" type="submit" >
							Demande(s) dami(s) en Attente
						</Button>
					</div>
				</fieldset>
			</form>';
		}
		if($evenementGame != NULL){
			echo '<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
				<fieldset>
					<input type="hidden" name="action" value="evenementGame" />
					<div class="form-group">
						<button class="boutonMenu btn btn-Secondary col-sm-offset-5" id="bouton" type="submit" >
							Vous avez été invité dans une partie
						</Button>
					</div>
				</fieldset>
			</form>';
		}
	?>
	<div class="lesTroisBoutonsdeJimmy">
		<div class="row">
			<a href="index.php?action=creatGame" class="hvr-grow bouton col-lg-2">Créer partie</a>
			<a href="index.php?action=joinGame" class="hvr-grow bouton col-lg-2">Rejoindre partie</a>
			<a href="index.php?action=continueGame" class="hvr-grow bouton col-lg-2">Continuer partie</a>
		</div>
	</div>
</div>
