<?php
session_start();
$folio		=$_POST['fl'];
$nombre_cli	=$_POST['nc'];
$idcl 		=$_POST['icl'];
$fecha 		=$_POST['fc'];
$doc 		=$_POST['dc'];
$costo_total=$_POST['cstal'];
$cobro_total=$_POST['cbtal'];
$atendio 	=$_SESSION['usuario'];
 include 'login.php';
 

 $rev="select * from historial where folio='$folio';";
 $reves=pg_query($conn, $rev);
 if(pg_num_rows($reves)>0){
 	echo "Se Encunetra Registrado".$folio;
 }else{

 $regis="insert into historial(id_cl,nombre_cl,folio,fecha,doctor,total,pago,atendio)values($idcl,'$nombre_cli','$folio','$fecha','$doc',$costo_total,$cobro_total,'$atendio')";
 $entro=pg_query($conn, $regis);
 if(!$entro){
 	echo $regis;
 }else
 {
 	echo "Exito";
 }
}
?>