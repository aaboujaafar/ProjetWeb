<div id="profilBas">
	<?php
		if($me){
			if(isset($inscErrorText)){
				echo '<div class="chgt col-md-7">
							<div class="alert alert-danger" role="alert ">
								<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscErrorText . '</span>
							</div>
						</div>
					</br>';
			}
			if(isset($inscOkText)){
				echo '<div class="chgt col-md-7">
							<div class="alert alert-success" role="alert ">
								<span class="error"><span class="glyphicon glyphicon-exclamation-sign">&nbsp</span>' . $inscOkText . '</span>
							</div>
						</div>
						</br>';
			}
		}
		if($history != NULL){
			foreach ($history as $h) {
				echo '<ul>' .$h->GAGNE .'</ul>';
			}
		}
	?>
</div>