<?php

include 'login.php';

$N=$_GET['n'];

for($i=1;$i<=$N;$i++){
	
$pr="insert into procesados(resultado,vref) values('$i','$i')";	
$sal=pg_query($conn, $pr);
 if(!$sal){
	 echo "fayaste";
	 }	
	}



?>
