<div id="JoueurMenu">
	<br>
	<p>FriendsConected    
	<?php 
		foreach ($friends as $friend){
			echo $friend->PSEUDO; echo "<br>";
		}
	?> </p>
</div>