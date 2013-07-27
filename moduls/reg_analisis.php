<?php
 
$analisi 	= $_POST['analisis'];
$nota		= $_POST['nota'];
$precio		= $_POST['precio'];
$iva		= $_POST['iva'];
$aumento	= $_POST['aumento'];
$urgencia	= $_POST['urgencia'];
$chek		= $_POST['che'];
$analisi =	strtoupper($analisi);
$nota	 =	strtoupper($nota);
$chek	 = 	strtoupper($chek);

include_once 'login.php';
$d="select nombre_ana from precios where nombre_ana='$analisi';";
$d2=pg_query($conn,$d);
if(pg_num_rows($d2)>0){
	echo "Analisis Registardo anteriormente".$analisis;
}else{
$registro ="insert into precios(nombre_ana,nota,precio,iva,aumento,urgente,lugar)values('$analisi','$nota','$precio','$iva','$aumento','$urgencia','$chek');";
$inse=pg_query($conn,$registro);
if(!$inse){
	echo "Error no hay datos";
}else{

	echo "exito";
}}
?>