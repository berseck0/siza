<?php

$id_anal=$_POST['id_1'];
$folio=$_POST['id_2'];
include 'inset.php';

$drp="delete from rel_analisis where id_anal=$id_anal and folio='$folio' and id_anal='$id_anal';";
$drop=pg_query($conn,$drp);
	if(!$drop){
		echo $drp;
	}else {
	echo "Exito";
	}

$deldescue="delete from descuentos where id_factura='$folio' and id_analisis='$id_anal';";
$dropdesc=pg_query($conn,$deldescue);
	if(!$dropdesc){
		echo $deldescue;
	}else {
		echo "Exito";
	}

$facdell = "delete from factura where id_analisis='$id_anal' and id_factura='$folio';";

$factura = pg_query($conn, $facdell);
	if(!$factura){
		echo $facdell;
	}else {
		echo "Exito";
	}
?>