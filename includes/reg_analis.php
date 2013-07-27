<?php
$selc= $_POST['opcion'];
if ($selc =="numerico") {
	$nom=$_POST['nom_anal'];
	$vref=$_POST['vref'];
	$maxh=$_POST['maxh'];
	$minh=$_POST['minh'];
	$maxm=$_POST['maxm'];
	$minm=$_POST['minm'];
	$maxn=$_POST['maxn'];
	$minn=$_POST['minn'];
	$maxb=$_POST['maxb'];
	$minb=$_POST['minb'];
	$unida=$_POST['unidades'];
	$metod=$_POST['metodo'];
	$edmax=$_POST['edmax'];
	$edmin=$_POST['edmin'];
	$edad=$_POST['edad'];
	$id=$_POST['id'];
	$nom2 = strtoupper($nom);
	$metod=strtoupper($metod);
  	$vref=strtoupper($vref);
 	$nom2=utf8_encode($nom2);
 	$metod=strtoupper($metod);
 }elseif ($selc =="texto") {
 	$nom=$_POST['nom_anal'];
	$vref=$_POST['vref'];
	$maxh=0;
	$minh=0;
	$maxm=0;
	$minm=0;
	$maxn=0;
	$minn=0;
	$maxb=0;
	$minb=0;
	$unida=0;
	$metod=$_POST['metodo'];
	$edmax=0;
	$edmin=0;
	$edad=0;
	$id=$_POST['id'];
	$nota = $_POST['nota'];
	$nom2 = strtoupper($nom);
	$nota = strtoupper($nota);
	$metod=strtoupper($metod);
  	$vref=strtoupper($vref);
 	$nom2=utf8_encode($nom2);
 	$metod=strtoupper($metod);
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