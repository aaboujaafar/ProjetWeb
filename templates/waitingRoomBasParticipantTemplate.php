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