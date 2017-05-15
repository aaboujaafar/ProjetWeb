<div class="pageTitle">
	<h1>Inscription</h1>
</div>
	<?php
		if(isset($inscErrorText))
		echo '<div class="alert alert-danger" role="alert">
	
				<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorText . '</span></div></br>';
	?>
	<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
	<fieldset>
		<input type="hidden" name="action" value="validateInscription" />
		<div class="form-group">
			<label class="col-sm-2 control-label ">Pseudo <span>*</span></label>
			<div class="col-sm-10">
			  <input type="text" name="inscLogin" id="test"  placeholder="maitreJedi" required/>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Mot de passe <span>*</span></label>
			<div class="col-sm-10">
			  <input type="password" name="inscPassword" placeholder="Votre mot de passe" required/>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Mail <span>*</span></label>
			<div class="col-sm-10">
			  <input  type="email" name="mail" placeholder="exemple@exemple.com" required/>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nom <span>*</span></label>
			<div class="col-sm-10">
			  <input  type="text" name="nom" placeholder="Dupont" required/>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Prénom <span>*</span></label>
			<div class="col-sm-10">
			  <input type="text" name="prenom" placeholder="Dupont" required/>
			</div>
		</div>
		
		<div class="form-group">
			<button class="boutonMenu bouton hvr-grow col-sm-offset-4" id="bouton" type="submit" >S'inscrire</Button>
		</div>
		</fieldset>
	</form>
	