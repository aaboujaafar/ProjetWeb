<h2>Créer une partie</h2>
	<?php
		if(isset($inscErrorText))
		echo '<div class="alert alert-danger" role="alert">

				<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorText . '</span></div></br>';
	?>
	<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
	<fieldset>
		<input type="hidden" name="action" value="validateGameCreation" />
		<div class="row">
		<div class="form-group">
			<label class="col-md-3 control-label ">Nom de la partie <span>*</span></label>
			<div class="col-md-9">
			  <input type="text" name="name" id="test"  placeholder="FunFunGame" required/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label">Partie public</label>
			<div class="col-md-9 checkbox">
			 <input type="checkbox" id="big-checkbox" name="public" value="public" />
			</div>
		</div>
		</div>
	</br>
			<button class="boutonMenu btn btn-creation hvr-bob col-sm-offset-5" id="bouton" type="submit" >Créer la partie</Button>
		</fieldset>
	</form>
