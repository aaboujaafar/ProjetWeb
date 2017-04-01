<h2>Créer une partie</h2>
	<?php
		if(isset($inscErrorText))
		echo '<div class="alert alert-danger" role="alert">
	
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorText . '</span></div></br>';
	?>
	<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
	<fieldset>
		<input type="hidden" name="action" value="validateGameCreation" />

		<div class="form-group">
			<label class="col-sm-2 control-label ">Nom de la partie <span>*</span></label>
			<div class="col-sm-10">
			  <input type="text" name="name" id="test"  placeholder="FunFunGame" required/>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Partie public <span>*</span></label>
			<div class="col-sm-10">
			 <input type="checkbox" name="public" value="public" />
			</div>
		</div>
		
		<div class="form-group">
			<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >Créer la partie</Button>
		</div>
		</fieldset>
	</form>
	