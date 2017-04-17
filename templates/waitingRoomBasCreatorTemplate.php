<div class="row">
	<?php
		if(isset($inscErrorFull)){
			echo '<div class="alert alert-warning" role="alert">
					<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorFull . '</span></div>';
		}
		if(isset($inscOKFull)){
			echo '<div class="alert alert-success" role="alert">
					<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscOKFull . '</span></div>';
		}
	?>
	<div class="col-md-6">
		<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
			<fieldset>
				<input type="hidden" name="action" value="changePublic" />
				<input type="hidden" name="gameName" value= <?php echo '"'. $gameName .'"'?> />
				<div class="form-group">
					<button class="boutonMenu bouton hvr-grow col-sm-offset-0" id="bouton" type="submit" >
					<?php
					if($public){
						echo 'Rendre Privee';
					}
					else{
						echo 'Rendre Publique';
					} ?>
					</Button>
				</div>
			</fieldset>
		</form>
	</div>
	
	<?php
		if($number < 10){
			echo '<div class="col-md-6"><form role="form" data-toggle="validator" class="col-md-6 form-horizontal" action="index.php" method="post">
				<fieldset>
					<input type="hidden" name="action" value="addFriendInGame" />
					<input type="hidden" name="gameName" value= "'. $gameName .'"/>
						<div class="form-group">
						<button class="boutonMenu bouton hvr-grow col-sm-offset-6" id="bouton" type="submit" >Ajouter un ami
						</Button>
					</div>
				</fieldset>
			</form></div>';
		}
		if($number < 11 && $number > 1){
			echo '<div class="col-md-12"><form role="form" data-toggle="validator" class="col-md-12 form-horizontal" action="index.php" method="post">
				<fieldset>
					<input type="hidden" name="action" value="lauchGame" />
					<input type="hidden" name="gameName" value= "'. $gameName .'"/>
						<div class="form-group">
						<button class="boutonMenu bouton hvr-grow col-sm-offset-4" id="bouton" type="submit" >Lancer la partie
						</Button>
					</div>
				</fieldset>
			</form></div>';
		}
	?>
</div>
