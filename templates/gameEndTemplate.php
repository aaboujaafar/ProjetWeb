<div id="cartePlateau">
<FONT color="white"><b><p align="center">
	OVER (à mettre en forme) <br>
	Resultat : <?php echo $resultat; ?>
	<br><br>
	</p></b></FONT>
	
	<?php
	echo '<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
			<fieldset>
				<input type="hidden" name="action" value="lastEnd" />					
					<div class="form-group">
					<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >Terminer
					</Button>
				</div>
			</fieldset>
		</form>';
	?>

</div>