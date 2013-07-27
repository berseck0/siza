<?php
$analisis=$_GET['anal'];
$idcl=$_GET['idcl'];
$folio=$_GET['fol'];
/*
echo $analisis;
echo $folio;
echo $idcl;*/
include 'login.php';

$busc="select * from procesados where folio='$folio' and nom_anal='$analisis';";
$busco=pg_query($conn, $busc);

if(pg_num_rows($busco)>0) {
	 echo $analisis."<br /><br />";
	while($row = pg_fetch_assoc($busco)) {
		$resultado=$row['resultado'];
		$vrf=$row['vref'];
		$nom_anali=$row['nom_anal'];
		$comen=$row['comentarios'];
		$unid=$row['unidades'];	
		
			
		?>
		
	
	<input type="text" value="<? echo $vrf;?>" name="nomal" onfocus='this.blur()'>
	<br>resultados:
	<input type="text" value="<? echo $resultado;?>" name="nomal" onfocus='this.blur()'>
	<input type="text" value="<? echo $unid;?>" name="nomal" onfocus='this.blur()'>

	<br> 

<br />
Notas:<font color="red"><?echo $comen;?></font><br />
<hr color="blue">
		<?
		}
		
		}
		else{
			
echo "no hay dados de alta resultados de este analisis";			
			}

?>
