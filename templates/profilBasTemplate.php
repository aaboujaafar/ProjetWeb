<div id="profilBas">
	<ul class="list-group col-md-5">
		<li class="list-group-item title titrePB" >Les 15 meilleurs joueurs du jeu</li>
			<?php
				if($rank != NULL){
			 		foreach ($rank as $r){
						echo'<li class="list-group-item top15gamer">
						<img src="'.$r->PHOTOPROFIL.'"/><span id="pseudoTop">'.$r->PSEUDO.'</span><span class="badge monBadgePB" data-toggle="tooltip" title="Score">'.$r->NBRPARTIEGAGNEE.'</span>
						 </li>';
					}
				}
			?>
	</ul>
</div>
	<?php
		if($me){
			if(isset($inscErrorText)){
				echo '<div class="alert alert-danger" role="alert">
						<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorText . '</span>
						</div></br>';
			}
			echo 
				'<div class = "col-md-5"
					<form role="form" data-toggle="validator" class="form-horizontal" action="index.php" method="post">
						<fieldset>
							<input type="hidden" name="action" value="changePassword" />
							<div class="form-group">
								<label class="col-sm-6 control-label ">Ancien mot de passe <span>*</span></label>
								<div class="col-sm-6">
								  <input type="password" name="oldPassword" id="test"  placeholder="ancienMotDePasse" required/>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-6 control-label">Nouveau mot de passe <span>*</span></label>
								<div class="col-sm-6">
								  <input type="password" name="newPassword1" placeholder="nouveauMotDePasse" required/>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-6 control-label">Nouveau mot de passe <span>*</span></label>
								<div class="col-sm-6">
								  <input  type="password" name="newPassword2" placeholder="nouveauMotDePasse" required/>
								</div>
							</div>
							
							<div class="form-group">
								<button class="boutonMenu bouton hvr-grow col-sm-offset-5" id="bouton" type="submit" >Changer</Button>
							</div>
						</fieldset>
					</form>
				</div>';
		}
	?>
