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
<?php
	if(isset($inscErrorFull)){
		echo '<div class="alert alert-warning" role="alert">
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorFull . '</span></div></br>';
	}
	if(isset($inscOKFull)){
		echo '<div class="alert alert-success" role="alert">
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscOKFull . '</span></div></br>';
	}
	if($number<10){
		echo '<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
			<fieldset>
				<input type="hidden" name="action" value="addFriendInGame" />					
					<div class="form-group">
					<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >Ajouter un ami
					</Button>
				</div>
			</fieldset>
		</form>';
	}

?>

		 