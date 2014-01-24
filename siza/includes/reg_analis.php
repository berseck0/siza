<?php
include '../moduls/funciones.php';
$selc= $_POST['opcion'];
if ($selc =="numerico") {
	$vref=formateo($_POST['vref']);
	$maxh=$_POST['maxh'];
	$minh=$_POST['minh'];
	$maxm=$_POST['maxm'];
	$minm=$_POST['minm'];
	$maxn=$_POST['maxn'];
	$minn=$_POST['minn'];
	$maxb=$_POST['maxb'];
	$minb=$_POST['minb'];
	$unida=$_POST['unidades'];
	$metod=formateo($_POST['metodo']);
	$edmax=$_POST['edmax'];
	$edmin=$_POST['edmin'];
	$edad=$_POST['edad'];
	$id=$_POST['id'];
	$nom2 = formateo($_POST['nom_anal']);
 }elseif ($selc =="texto") {
 	$vref=formateo($_POST['vref']);
	$maxh=0;
	$minh=0;
	$maxm=0;
	$minm=0;
	$maxn=0;
	$minn=0;
	$maxb=0;
	$minb=0;
	$unida=0;
	$metod=formateo($_POST['metodo']);
	$edmax=0;
	$edmin=0;
	$edad=0;
	$id=$_POST['id'];
	$nota = formatup($_POST['nota']);
	$nom2 = formateo($_POST['nom_anal']);
 }
require 'inset.php';
$ins = "INSERT into analisis(id,nombre,vref,maxh,minh,maxm,minm,maxn,minn,maxrn,minrn,unidades,metodo,edamx,edamin,edad,nota)
values('$id','$nom2','$vref','$maxh','$minh','$maxm','$minm','$maxn','$minn','$maxb','$minb','$unida','$metod','$edmax','$edmin','$edad','$nota')";
$result = pg_query($conn,$ins);
if(!$result)
  {
echo $ins;
	}else {
	echo "exito";
	}
?>