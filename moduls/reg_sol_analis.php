<?php

$nombre_analisis =utf8_encode($nombre_analisis = $_POST['nombre']);
$costo			=$_POST['costo'];
$id_analisis 	=$_POST['id'];
$folio = utf8_decode($folio =$_POST['solis']);
$ac				=$_POST['ac'];
$nombre_cliente =utf8_encode($nombre_cliente =$_POST['nomcl']);
$id_cl			=$_POST['idcl'];
//$fecha			=$_POST['fecha'];
$hora 	=date("h:i:s");
$status=0;
$descuento=0;
$cortesia=0;

 include 'login.php';
	$sh="select * from rel_analisis where nombre_anal='$nombre_analisis' and folio='$folio';";
	$sh2=pg_query($conn, $sh);
if(pg_num_rows($sh2)>0){
 echo "El Analisis: ".$nombre_analisis.",Ya Esta Registrado";
}else{
	$sql="insert into rel_analisis(id_cli,folio,hora,nombre_cli,id_anal,nombre_anal,estatus)values('$id_cl','$folio','$hora','$nombre_cliente','$id_analisis','$nombre_analisis','$status');";
	$in=pg_query($conn,$sql);
	if(!$in){
		echo "Error con la sintaxis";
	}else{
		echo $folio;
	}
}
$seldesc="select * from descuentos where id_analisis='$id_analisis' and id_factura='$folio';";
	$$seldesc2=pg_query($conn, $$seldesc);
if(pg_num_rows($$seldesc2)>0){}
	else{
	$desc="insert into descuentos(id_factura,id_analisis,costo,descuento,cortesia)values('$folio','$id_analisis','$costo','$descuento','$cortesia')";
	$desc2=pg_query($conn, $desc);
	if (!$desc2) {
		echo "error con la sintaxis 2";
	}
}
?>