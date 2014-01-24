<?php
$fole=$_GET['fol'];
$nomcl=$_GET['nom'];
$idcl=$_GET['idcl'];


include 'login.php';

$bu="select * from rel_analisis where folio='$fole' and tipo='NORMAL'";
$mas=pg_query($conn, $bu);

if(pg_num_rows($mas) >0) {
	while($row= pg_fetch_assoc($mas)) {
		$analis=$row['nombre'];
		
		
	echo '	<br />
<a  id="example2"  href="puropop2.php?anal='.$analis.'&&idcl='.$idcl.'&&fol='.$fole.'&&nomcl='.$nomcl.'">'.$analis.'</a>
	<br />';


	}}
	else
	{
		echo 'no ahy nada';
		} 
 echo "<hr color='blue'><br />";
  
 ?>
 
 <?php 
$folio=$_GET['fol'];
$idcl=$_GET['idcl'];
$nomcl=$_GET['nom'];

include 'login/login.php';
$bu="select * from rel_analisis where folio='$folio'and tipo='ESPECIAL' ";
$mas=pg_query($conn, $bu);

if(pg_num_rows($mas) >0) {
	while($row= pg_fetch_assoc($mas)) {
		$analis=$row['nombre'];
		$precio=$row['precio'];
		
		
		echo $analis;
		echo '<br>';

$bu2="select * from analisis_especial where nombre='$analis'";	
$mas2=pg_query($conn, $bu2);
 while($row2= pg_fetch_assoc($mas2)) {
		$subsname=$row2['subanalisis'];
		
		//echo $subsname; }
		
		
?> 
<br />
<a  id="example2"  href="puropop2.php?anal=<?echo $subsname;?>&&id=<?echo $idcl;?>&&folio=<? echo $folio;?>&&nomcl=<?echo $nomcl;?>" ><?php echo $subsname;?><br></a>


<?php 
 }echo "<hr color='blue'><br />";
}}

?>
