<?php
 include '../moduls/funciones.php';
 require 'inset.php';

$selc= $_POST['plantilla'];

if ($selc ==1) {
	$vref	=	formateo($_POST['vref']);
	$maxh	=	$_POST['maxh'];
	$minh	=	$_POST['minh'];
	$maxm	=	$_POST['maxm'];
	$minm	=	$_POST['minm'];
	$maxn 	=	$_POST['maxn'];
	$minn 	=	$_POST['minn'];
	$maxb 	=	$_POST['maxb'];
	$minb 	=	$_POST['minb'];
	$unida 	=	$_POST['unidades'];
	$metod 	=	formateo($_POST['metodo']);
	$edmax 	=	$_POST['edmax'];
	$edmin 	=	$_POST['edmin'];
	$edad 	=	$_POST['edad'];
	$id 	=	$_POST['id'];
	$nom2 	=	formateo($_POST['nom_anal']);

	$chek	=	"select id,vref from analisis where id=$id and vref='$vref'";
	$point	=	pg_query($conn, $chek);

	if(pg_num_rows($point)>0){
		echo "El valor de referencia '".$vref."' ya fue agregado al analisis ".$nom2;
	}else{
			$ins = "INSERT into analisis(id,nombre,vref,maxh,minh,maxm,minm,maxn,minn,maxrn,minrn,unidades,metodo,edamx,edamin,edad,nota,plantillas)
			values('$id','$nom2','$vref','$maxh','$minh','$maxm','$minm','$maxn','$minn','$maxb','$minb','$unida','$metod','$edmax','$edmin','$edad','$nota','$selc')";
	}


 }elseif ($selc ==2) {
 	$vref		=	formateo($_POST['vref']);
	$metod 		=	formateo($_POST['metodo']);
	$id 		=	$_POST['id'];
	$nota 		= 	formatup($_POST['nota']);
	$valor		=	formateo($_POST['parametro']);
	$unidad 	=	$_POST['unidad'];
	$nom 		=	$_POST["nom_anal"];

	$chek	=	"select id_analis,campo from estudios where id_analis=$id and campo='$vref'";
	$point	=	pg_query($conn, $chek);

	if(pg_num_rows($point)>0){
		echo "El valor de referencia '".$vref."'' ya fue agregado al estudio ".$nom;
	}else{
		$ins = "INSERT into estudios(id_analis,campo,unidades,metodo,nota,valor,plantillas) 
		values('$id', '$vref','$unidad','$metod','$nota','$valor','$selc')";
	}

	}

$result = pg_query($conn,$ins);
if(!$result)
  {
echo "Fallo en el registro de los valores de los analisis";
	}else {
	echo "exito";
	}
?>