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
$id_anal	=$_POST['ana'];//esta pendiente por enviar
$fur 		=$_POST['fur'];

 include 'login.php';

 $rev="select * from historial where idfactura='$folio';";
 $reves=pg_query($conn, $rev);
 if(pg_num_rows($reves)>0){
 	echo "Se Encunetra Registrado".$folio;
 }else{

 $regis="insert into historial(id_clientes,idfactura,fecha,id_doc,fur)values($idcl,'$folio','$fecha','$doc','$fur')";
 $entro=pg_query($conn, $regis);
 if(!$entro){
 	echo $regis;
 }else
 {
 	echo "Exito";
 }/*
$reg2="insert into factura(id_factura,id_cli,total,fecha,id_doc,id_analisis,anticipo,atendio)values
('$folio',$idcl,$costo_total,'$fecha','$doc','$id_anal','$cobro_total','$atendio')";
$rg=pg_query($conn, $rg);
if(!$rg){
	echo $reg2;
}*/
/// actualiso la factura los campos que quedaron pendientes (:
$reg="update factura set total='$costo_total',fecha='$fecha',id_doc='$doc',anticipo='$cobro_total',atendio='$atendio' where id_factura='$folio';";
$upda=pg_query($conn, $reg);
if(!$upda){
	echo $reg;
}

}
?>