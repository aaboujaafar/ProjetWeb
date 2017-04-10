<?php
echo '<FONT color="white"> Participant :</FONT>';
foreach($participant as $p){
	if($creator->PSEUDO !== $p->PSEUDO){
		echo '<img class="img-thumbnail" src="'.$p->PHOTOPROFIL.'"  style="width: 8%" >';
	}
}
echo '<br><br> <p align="center"><FONT color="white">Createur : </FONT><img class="img-thumbnail" src="'.$creator->PHOTOPROFIL.'"  style="width: 8%" align="center"></p>';
echo '<FONT color="white"> IL faut mettre les noms en dessous des photos si possible et les centrer! Merci Ayoub ;DDDD </FONT>'
?>
