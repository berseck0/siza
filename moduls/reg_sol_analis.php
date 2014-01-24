<?php
include 'funciones.php';
$nombre_analisis =formateo($_POST['nombre']);
$costo			=$_POST['costo'];
$id_analisis 	=$_POST['id'];
$folio 			=$_POST['solis'];
$ac				=$_POST['ac'];
$nombre_cliente =formateo($_POST['nomcl']);
$id_cl			=$_POST['idcl'];
$doc 			=formateo($_POST['doc']);
$hora 			=date("h:i:s");
$status			=0;
$descuento 		=0;
$cortesia 		=0;

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
/*
$seldesc="select * from descuentos where id_analisis='$id_analisis' and id_factura='$folio';";
	$seldesc2=pg_query($conn, $$seldesc);
if(pg_num_rows($seldesc2)>0){
	echo "ya se encunetra registrado";
}else{*/
	$desc="insert into descuentos(id_factura,id_analisis,costo,descuento,cortesia)values('$folio','$id_analisis','$costo','$descuento','$cortesia')";
	$desc2=pg_query($conn, $desc);
	if(!$desc2) {
		echo "error con la sintaxis 2";
	}
//}

//registro de datos en la tabla factura
/*$selfac="select * from factura where id_analisis='$id_analisis' and id_factura='$dolio';";
$selfac2=pg_query($conn, $selfac);
if(pg_num_rows($selfac2)>0)
	{}else{*/
		$fac="insert into factura(id_factura,id_cli,id_doc,id_analisis)values('$folio','$id_cl','$doc','$id_analisis')";
		$fact=pg_query($conn, $fac);
		if(!$fact){
			echo "error con la sintaxis 3";
		}
	//}
}
?>