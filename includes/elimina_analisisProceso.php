<?php

$id_anal=$_POST['id_1'];
$folio=$_POST['id_2'];
include 'inset.php';
$drp="delete from rel_analisis where id_anal=$id_anal and folio='$folio';";
$drop=pg_query($conn,$drp);
if(!$drop){
	echo $drp;
}else {
	echo "Exito";}

?>