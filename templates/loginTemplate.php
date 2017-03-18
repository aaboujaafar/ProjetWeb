<h2>Connexion</h2>
	<?php
		if(isset($inscErrorText))
		echo '<span class="error">' . $inscErrorText . '</span>';
	?>
	<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
	<fieldset>
		<input type="hidden" name="action" value="validateConnexion" />
		<div class="form-group">
			<label class="col-sm-2 control-label ">Pseudo <span>*</span></label>
			<div class="col-sm-10">
			  <input type="text" name="connexionLogin" id="test"  placeholder="maitreJedi" required/>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Mot de passe <span>*</span></label>
			<div class="col-sm-10">
			  <input type="password" name="connexionPassword" placeholder="Votre mot de passe" required/>
			</div>
		</div>
		
		<div class="form-group">
			<button class="boutonMenu btn btn-danger col-sm-offset-5" id="bouton" type="submit" >S'inscrire</Button>
		</div>
		</fieldset>
	</form>
	