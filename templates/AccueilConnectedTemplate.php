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
						<button class="boutonMenu boutonEventFriend hvr-grow col-sm-offset-0" id="bouton" type="submit" >
							<img src="img/DemandeAmi.png"> 
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
						<button class="boutonMenu boutonEventGame hvr-grow col-sm-offset-8" id="bouton" type="submit" >
							<img src="img/play.png"> 
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