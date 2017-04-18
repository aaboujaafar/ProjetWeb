<div id="cartePlateau">
		<?php
			if($cardPil1 != NULL){
				foreach ($cardPil1 as $p1) {
					echo '<img src="img/cartes/'.$p1->NUMERO.'.png"/>';
				}
			}
			$c=count($cardPil1);
			for ($i = $c; $i < 5; $i++) {
    			echo '<img src="img/cartes/vide.png"/>';
			}	
			
			if($cardPil2 != NULL){
				foreach ($cardPil2 as $p2) {
					echo '<img src="img/cartes/'.$p2->NUMERO.'.png"/>';
				}
			}
			$c=count($cardPil2);
			for ($i = $c; $i < 5; $i++) {
    			echo '<img src="img/cartes/vide.png"/>';
			}
			echo "<br>";

			if($cardPil3 != NULL){
				foreach ($cardPil3 as $p3) {
					echo '<img src="img/cartes/'.$p3->NUMERO.'.png"/>';
				}
			}
			$c=count($cardPil3);
			for ($i = $c; $i < 5; $i++) {
    			echo '<img src="img/cartes/vide.png"/>';
			}

			if($cardPil4 != NULL){
				foreach ($cardPil4 as $p4) {
					echo '<img src="img/cartes/'.$p4->NUMERO.'.png"/>';
				}
			}
			$c=count($cardPil4);
			for ($i = $c; $i < 5; $i++) {
    			echo '<img src="img/cartes/vide.png"/>';
			}
			echo "<br>";
		?>
</div>

<div id="main">
	<FONT color="red"><b>
		<?php
			echo "Ma main :<br>";
			if($handCard != NULL){
				foreach ($handCard as $hc) {
					echo '<img src="img/cartes/'.$hc->NUMERO.'.png"/>';
				}
			}
			echo "<br>";
			?>
	</b></FONT>
</div>

<div id="cardPut">
	<FONT color="blue"><b>
	<br><br>
		<?php
			echo "Nombre de carte posé par tout les joueurs pendant cette manche(soit compris) / nombre de joueur :<br>";
			if($cardPut != NULL){
				echo "carte posée: " . count($cardPut) . " / ". count($participant);
			}
			else{
				echo "carte posée: 0 / ". count($participant);
			}
			echo "<br>";
			?>
	</b></FONT>
</div>

<div id="participant">
	<FONT color="green"><b>
	<br><br>
		<?php
			echo "joueur et score<br>";
			foreach ($participant as $p) {
				echo "Joueur: ".$p->PSEUDO." | photoProfil: ".$p->PHOTOPROFIL." | score: ". $p->SCORE ." ---------- <br>";
			}
		?>
	</b></FONT>
</div>
<FONT color="white"><b><br>
NOus sommes dans la templat gamePlayedTemplate!!!<br>
La seul différence avec le gameTemplate est que le joueur qui est redirigé ici ne peut pas jouer une carte (il a déjà joué sa carte, donc le bouton pour joueur ne sera pas présent ici)
Cette page est lancé seulement pour les joueurs qui ont déjà joué dans leurs manches. Et l'autre page sera lancé quand tout les joueurs auront joué.
</b></FONT>