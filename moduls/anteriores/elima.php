 <?php
 	include '../tables/tableX.php';

$ids=$_GET['idcl'];
$foli=$_GET['fol'];
$nomb=$_GET['nom'];
$noms=$_GET['nomcl'];	
$doc=$_GET['doc'];
$proce=$_GET['pro'];
$tit=$_GET['ti'];
$tie=$_GET['tie'];
$eda=$_GET['ed'];
$fur=$_GET['fur'];

//	echo "<font  color='#094AB4'>AGREGADO:&nbsp; $nom</font>";

$ins = "DELETE FROM  re_analisis_swap where nombre='$nomb' and folio='$foli'";			
$resu = pg_query($conn ,$ins);
         
if(!$resu)
  {
echo '<script language="javascript" type="text/javascript">
				alert("FALLASTE TIO");
				
			</script>';
				} 
		else 
			{
				$ins2 = "DELETE FROM  descuentos where nombre_ana='$nomb' and folio='$foli'";			
$resu2 = pg_query($conn ,$ins2);
         
		echo '<script language="javascript" type="text/javascript">
				alert("ANALISIS AGREGADO '.$nomb.'");
				
			</script>';
				header("Location:../tables/tablareg/tableh.php?nom=$noms&&id=$ids&&fol=$foli&&doc=$doc&&pro=$proce&&ti=$tit&&fur=$fur&&ed=$eda&&tie=$tie");
				/* echo $noms;
				 echo $foli;
				 echo $id2;*/
			}
		echo "mias ajskasjkasjaksjaksjk";	
  
  ?>        
  
