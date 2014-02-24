<?php

include_once "inset.php";

$ana=$_POST['an'];
$op=$_POST['op'];
$id=$_POST['an2'];

if($op == 1){

	$rev="select * from grupos where id_grup='$ana' and id_analisis='$id' and paquete=0";
	$rev2=pg_query($conn, $rev);

		if(pg_num_rows($rev2)>0) {
			echo "ya se encuentra registrado";
		}
		else{
			$reg="insert into grupos(id_grup,id_analisis,paquete)values('$ana','$id',0);";
			$RG=pg_query($conn, $reg);
				if(!$RG){
					echo $reg;
				}else{
					echo "exito";
				  }
		}
}

if($op == 2){

	$rev="select * from grupos where id_grup='$ana' and id_analisis='$id' and paquete=1";
	$revi=pg_query($conn, $rev);

	if(pg_num_rows($revi)>0){
		echo "ya se encuentra registrado";
	}
	else{
		$regi="insert into grupos(id_grup,id_analisis,paquete)values('$ana','$id',1);";
		$regist=pg_query($conn, $regi);

		if(!$regist){
			echo $regist;
		}else{
			echo "exito 2";
		}
	}
}
?>