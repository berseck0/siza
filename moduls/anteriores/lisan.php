<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
	<head>
		<title>Plugin JQuery : Scroll Vertical</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<script type="text/javascript" src="scrol/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="scrol/js/ui.core-1.7.2.js"></script>
		<script type="text/javascript" src="scrol/js/ui.draggable-1.7.2.js"></script>
		<script type="text/javascript" src="scrol/js/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" src="scrol/js/plugin.scrollbar.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#contenu").scrollbar();
			});
		</script>
	</head>
	<body>
		
		<div id="contenu">

<?php
$cc=='';
include "login.php";

$lis="select * from precios where tipo is null  ";
$lista=pg_query($conn, $lis);

if(!$lista){
	echo "no hay nada";
	
	}
	if(pg_num_rows($lista)>0){
		
		while($ros=pg_fetch_assoc($lista)){
		$nom=$ros['nombre'];
		$id=$ros['id'];
	echo $id;
	echo "<a href='../modules/reg_analis.php?n=$nom&&id=$id'>".$nom."</a>";
	echo "<br>";}
		}

?>

		</div>
	</body>
</html>
