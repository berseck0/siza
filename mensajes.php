<?php

include 'includes/inset.php';
if(isset($_POST['nombrec']) && $_POST['nombrec']!= ""){
	echo "con tiene informacion ".$_POST['nombrec'];
	
	} else {
		echo "No puedes acceder directamente";
		}
	

?>
