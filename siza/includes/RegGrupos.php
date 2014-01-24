<?php
$ana=$_POST['an'];
$op=$_POST['op'];
$id=$_POST['an2'];
include "inset.php";
$el="select id_analis from precios where nombre_ana='$ana';";
$chk=pg_query($conn, $el);
$r=pg_fetch_assoc($chk);
$id2=$r['id_analis'];

$rev="select * from grupos where id_grup='$id' and id_analisis='$id2'";
$rev2=pg_query($conn ,$rev);
if (pg_num_rows($rev2)>0) {
	echo "ya se encuentra registrado";
}else{
$reg="insert into grupos(id_grup,id_analisis)values('$id','$id2');";
$RG=pg_query($conn, $reg);
if(!$RG){
	echo $reg;
}else{
	echo "exito";
}
}
?>