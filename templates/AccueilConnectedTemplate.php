<div id="JoueurMenu">
	<?php
		if(isset($inscErrorFull)){
			echo '<div class="alert alert-warning" role="alert">
					<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorFull . '</span></div></br>';
		}
		if($evenementFriend != NULL){
			echo '<div class="chgt"><form role="form" data-toggle="validator" class="pull-left leTruc form-horizontal" action="index.php" method="post">
				<fieldset>
					<input type="hidden" name="action" value="evenementFriend" />
					<div class="form-group">
						<button class="boutonMenu pull-left bouton hvr-grow" id="bouton" type="submit" >
							Demande(s) dami(s) en Attente
						</Button>
					</div>
				</fieldset>
			</form>';
		}
		if($evenementGame != NULL){
			echo '<form role="form" data-toggle="validator" class="pull-right leTruc form-horizontal" action="index.php" method="post">
				<fieldset>
					<input type="hidden" name="action" value="evenementGame" />
					<div class="form-group">
						<button class="boutonMenu bouton hvr-grow pull-right" id="bouton" type="submit" >
							Vous avez ete invite dans une partie
						</Button>
					</div>
				</fieldset>
			</form></div>';
		}
	?></div>
	
</div>
	<div class="lesTroisBoutonsdeJimmy">
		<div class="row">
			<a href="index.php?action=creatGame" class="hvr-grow bouton boutonA col-lg-2 col-sm-3">Creer partie</a>
			<a href="index.php?action=joinGame" class="hvr-grow bouton boutonA col-lg-2 col-sm-3">Rejoindre partie</a>
			<a href="index.php?action=continueGame" class="hvr-grow bouton boutonA col-lg-2 col-sm-3">Continuer partie</a>
		</div>