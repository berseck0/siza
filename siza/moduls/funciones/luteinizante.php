<?php 
require 'login.php';
$com="select * from historial where folio='$folio'";
$conv=pg_query($conn, $com);

if(pg_num_rows($conv)>0){
	$k=pg_fetch_assoc($conv);
		$titulo=$k['titulo'];
		
	}
switch ($titulo) {
    case 'Sra.':
    case 'Srita.':
        $v1="maxm";
        $v2="minm";        
        break;
    case 'joven':
    case 'Sr.':
        $v1="maxh";
        $v2="minh"; 
        break;
    case 'niño':
    case 'niña':
		$v1="maxh";
        $v2="minh";
        break;
    
}

$sel2="select nom_anal,unidades,$v1,$v2 from analisis where id='$idana' limit 1";
   
$res2 = pg_query($conn, $sel2) or die ("Fallo query: $sel.<br/>");
if(pg_num_rows($res2)>0) {
       	while ($row4 = pg_fetch_assoc($res2)) {
       	$nom = $row4['nom_anal']."";
       	$uni = $row4['unidades']."";
       	$max=$row4[$v1];
       	$min=$row4[$v2];  
       	echo $nom.'&nbsp;';
       	
echo '<input type="numeric" size="10" name="Text1" maxlength="6"/>&nbsp;' ;
echo $uni;
echo $min.' '.$max;

}
}else { echo 'nada';}
?>
