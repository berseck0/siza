<?php
	include 'login.php';
	$fo=$_POST['fl'];
	$sql ="delete from rel_analisis where folio='$fo';";
	$el=pg_query($conn, $sql);
	if(!$el){
	echo $sql;
	}else {
	echo "Exito";}

?>