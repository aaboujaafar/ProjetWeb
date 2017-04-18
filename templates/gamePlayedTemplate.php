<div id="cartePlateau">
		<?php
			echo'<h1>'.$name.'</h1><br><div class="col-md-6 col-sm-6">';
			if($cardPil1 != NULL){
				foreach ($cardPil1 as $p1) {
					echo '<img src="img/cartes/'.$p1->NUMERO.'.png"/>';
				}
			}
			$c=count($cardPil1);
			for ($i = $c; $i < 5; $i++) {
    			echo '<img src="img/cartes/vide.png"/>';
			}	
			echo '</br>';
			if($cardPil2 != NULL){
				foreach ($cardPil2 as $p2) {
					echo '<img src="img/cartes/'.$p2->NUMERO.'.png"/>';
				}
			}
			$c=count($cardPil2);
			for ($i = $c; $i < 5; $i++) {
    			echo '<img src="img/cartes/vide.png"/>';
			}
			echo'</div>';
			echo'<div class="col-md-6 col-sm-6">';
			if($cardPil3 != NULL){
				foreach ($cardPil3 as $p3) {
					echo '<img src="img/cartes/'.$p3->NUMERO.'.png"/>';
				}
			}
			$c=count($cardPil3);
			for ($i = $c; $i < 5; $i++) {
    			echo '<img src="img/cartes/vide.png"/>';
			}
			echo '</br>';
			if($cardPil4 != NULL){
				foreach ($cardPil4 as $p4) {
					echo '<img src="img/cartes/'.$p4->NUMERO.'.png"/>';
				}
			}
			$c=count($cardPil4);
			for ($i = $c; $i < 5; $i++) {
    			echo '<img src="img/cartes/vide.png"/>';
			}
			echo'</div>';
		?>
</div><br>

<div id="main">
		<?php
			if($handCard != NULL){
				foreach ($handCard as $hc) {
					echo '<img src="img/cartes/'.$hc->NUMERO.'.png"/>';
				}
			}
			echo "<br>";
			?>
</div>

<div id="participant">
	<ol class="breadcrumb joueurs">
		<?php

			foreach ($participant as $p) {
				echo'<li class="top15gamer">
						<span id="pseudoTop">'.$p->PSEUDO.'</span><span class="badge monBadgePB" data-toggle="tooltip" title="Score">'.$p->SCORE.'</span>
						 </li>';
			}
		?>
		<?php
			if($cardPut != NULL){
				echo '<li class="top15gamer cartesJouee">
						<span id="pseudoTop">' . count($cardPut) . ' / '. count($participant).'</span>
						 </li>';
			}
			else{
				echo '<li class="top15gamer cartesJouee">
						<span id="pseudoTop">0 / '. count($participant).'</span>
						 </li>';
			}
			?></ol>
</div>
<div id="cardPut">
</div>
