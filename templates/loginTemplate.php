<div class="pageTitle">
	<h1>Connexion</h1>
</div>
	<?php
		if(isset($inscErrorText))
		echo '<div class="alert alert-danger" role="alert">
	
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorText . '</span></div></br>';
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
			<button class="boutonMenu bouton hvr-grow col-sm-offset-5" id="bouton" type="submit" >Se connecter</Button>
		</div>
		</fieldset>
	</form>
	