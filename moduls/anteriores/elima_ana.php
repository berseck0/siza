 <?php
 	include '../tables/tableX.php';

$ids=$_GET['idcl'];
$foli=$_GET['fol'];
$nomb=$_GET['nom'];
$noms=$_GET['nomcl'];	
$doc=$_GET['doc'];
$proce=$_GET['pro'];
$z=$_GET['z'];
$w=$_GET['w'];
$tit=$_GET['ti'];
$eda=$_GET['ed'];
$fur=$_GET['fur'];
//	echo "<font  color='#094AB4'>AGREGADO:&nbsp; $nom</font>";
if($w=="1"){
$ins = "DELETE FROM descuentos where nombre_ana='$z' and folio='$foli'";			
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
				header("Location:../tables/tablareg/tableh.php?nom=$noms&&id=$ids&&fol=$foli&&doc=$doc&&pro=$proce&&ti=$tit&&fur=$fur&&ed=$eda");
				/* echo $noms;
				 echo $foli;
				 echo $id2;*/
			}
			
  }
  
  
  
  elseif($w=="2") {
  	$nombron3=$_GET['nombron3'];
  	$ins3 = "DELETE FROM descuentos where nombre_ana='$nombron3' and folio='$foli'";			
$resu3 = pg_query($conn ,$ins3);
         
if(!$resu3)
  {
echo '<script language="javascript" type="text/javascript">
				alert("FALLASTE TIO");
				
			</script>';
				} 
		else 
			{
				$ins4 = "DELETE FROM  descuentos where nombre_ana='$nombron3' and folio='$foli'";			
$resu4 = pg_query($conn ,$ins4);
         
		echo '<script language="javascript" type="text/javascript">
				alert("ANALISIS AGREGADO '.$nomb.'");
				
			</script>';
				header("Location:../tables/tablareg/tableh.php?nom=$noms&&id=$ids&&fol=$foli&&doc=$doc&&pro=$proce&&ti=$tit&&fur=$fur&&ed=$eda");
				/* echo $noms;
				 echo $foli;
				 echo $id2;*/
			}}
  	
  ?>        
  
