<?php
	include 'login.php';
	$fo=$_POST['fl'];
	$sql ="delete from rel_analisis where folio='$fo';";
	$el=pg_query($conn, $sql);
	if(!$el){
	echo $sql;
	}else {
	echo "Exito";}
	#historial eliminacion
	$del="delete from historial where idfactura='$fo'";
	$dele=pg_query($conn, $del);
	#factura eliminacion
	$delfa="delete from factura where id_factura='$fo'";
	$facdel=pg_query($conn,$delfa);
	#descuento eliminacion
	$deldes="delete from descuentos where id_factura='$fo'";
	$descdel=pg_query($conn,$deldes);

?>