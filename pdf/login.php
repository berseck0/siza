<?php
	$host = '127.0.0.1';
	$user = 'postgres';
	$dbname = 'sizas';
	//$password = "";
	
	$conn = pg_connect("host=".$host." user=".$user." dbname=".$dbname." ");
	if (!$conn)
	{
		echo "<hr>";
		echo "Hay un error en la conexion";
		exit();
	}
?>
