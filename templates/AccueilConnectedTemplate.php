<div id="JoueurMenu">
	<br>
	<?php
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
	?>
	<div class="lesTroisBoutonsdeJimmy">
	<a href="index.php?action=creatGame" class="btn btn-secondary ">Créer partie</a>
	<a href="index.php?action=joinGame" class="btn btn-secondary">Rejoindre partie</a>
	<a href="index.php?action=continueGame" class="btn btn-secondary">Continuer partie</a>
	</div>
</div>