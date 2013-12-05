<?php
$ask=pg_query($conn, $chk);

for($i=1;$i<=pg_num_rows($ask);$i++){
	$row=pg_fetch_assoc($ask);
	
	$no=$row['nom_anal'];
	$un=$row['unidades'];
	$resul=$_POST["Text$i"];
	
	
$top="insert into procesados(idcl,folio,resultado,vref,nom_anal,comentarios,unidades) values('$idcl','$folio','$resul','$no','$nom_an','$comen','$un')";
$re=pg_query($conn, $top);
}
if(!$re){
	
echo "fayo $top";	

	}
		else {
echo '<script language="javascript" type="text/javascript">
				alert("ANALISIS AGREGADO '.$vref.'");
				
			</script>';	
		
}
}
