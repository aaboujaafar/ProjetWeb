<div id="cartePlateau">
	<FONT color="white"><b>
		<?php 
		echo "plateau :<br>";
			if($cardPil1 != NULL){
				foreach ($cardPil1 as $p1) {
					echo "carte: ".$p1->NUMERO." | point: ".$p1->POINT." ---------- ";
				}
			}	
			echo "<br>";
			if($cardPil2 != NULL){
				foreach ($cardPil2 as $p2) {
					echo "carte: ".$p2->NUMERO." | point: ".$p2->POINT." ---------- ";
				}
			}	
			echo "<br>";
			if($cardPil3 != NULL){
				foreach ($cardPil3 as $p3) {
					echo "carte: ".$p3->NUMERO." | point: ".$p3->POINT." ---------- ";
				}
			}	
			echo "<br>";
			if($cardPil4 != NULL){
				foreach ($cardPil4 as $p4) {
					echo "carte: ".$p4->NUMERO." | point: ".$p4->POINT." ---------- ";
				}
			}	
			echo "<br>";
		?>
		<br> Ayoub : replacer ca par des images (faire/trouver les images, les stoker, mettre leurs path dans la base de données (je m'en occupe une fois qu'on a les images) et afficher tout ca). Pour l'instant, prépare des images vierge pour tester <br><br>
	</b></FONT>
</div>

<div id="main">
	<FONT color="red"><b>
		<?php 
			echo "Ma main :<br>";
			if($handCard != NULL){
				foreach ($handCard as $hc) {
					echo "carte: ".$hc->NUMERO." | point: ".$hc->POINT." ---------- ";
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