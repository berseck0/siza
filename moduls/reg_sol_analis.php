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
	$sql="insert into rel_analisis(id_cli,nombre_cli,folio,hora,precio,id_anal,nombre_anal,estatus,descuento,cortesia)
	values($id_cl,'$nombre_cliente','$folio','$hora',$costo,$id_analisis,'$nombre_analisis',$status,$descuento,$cortesia);";
	$in=pg_query($conn,$sql);
	if(!$in){
		echo "Error con la sintaxis";
	}else{
		echo $folio;
	}

}
?>