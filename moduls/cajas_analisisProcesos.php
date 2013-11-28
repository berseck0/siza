<?php
include 'login.php';
$id=$_POST['id'];
$fol=$_POST['fol'];

$com="select h.idfactura,h.id_clientes,c.titulo,c.edad from historial h,clientes c  where h.id_clientes=c.id_cli and h.idfactura='$fol';";
$conv=pg_query($conn, $com);
    if(pg_num_rows($conv)>0){
	   $k=pg_fetch_assoc($conv);
		  $titulo=$k['titulo'];
		  $eda=$k['edad'];
	   }
$an34="select nombre_anal from rel_analisis where folio='$fol' and id_anal=$id";
$an35=pg_query($conn, $an34);
    $jk=pg_fetch_assoc($an35);
        echo "<label>".$nomans=$jk['nombre_anal']."</label><br>";
switch ($titulo) {
    case 'Sra.':
    case 'Srita.':
    case 'SRA.':
    case 'SRITA.':
        $v1="maxm";
        $v2="minm";
        break;
    case 'joven':
    case 'Sr.':
    case 'JOVEN':
    case 'SR.':
        $v1="maxh";
        $v2="minh";
        break;
    case 'niño':
    case 'niña':
    case 'NIÑO':
    case 'NIÑA':
		$v1="maxh";
        $v2="minh";
        break;
}
switch ($id) {
    case 1:
		if($eda>='35' && $eda<='44'){
			$bus="select nombre,unidades,$v1,$v2,edamax,edamin,id,vref from analisis where id='$id' and edmax!='100' and edmax!='34';"; //ORDER BY indice ASC";	
			}
		elseif($eda>='45' && $eda<='100'){
			$chk="select nombre,unidades,$v1,$v2,edamax,edamin,id,vref from analisis where id='$id' and edmax!='34' and edmax!='44';";// ORDER BY indice ASC ";			
			}
		else{
			$bus="select nombre,unidades,$v1,$v2,edamax,edamin,id,vref from analisis where id='$id' and edmax!='44'and edmax!='100';";// ORDER BY indice ASC";	
			}
    	break;
    case 29:
    case 30:
    case 56:
	case 53:
        $bus="select nombre,unidades,$v1,$v2,id,vref from analisis where id='$id' and nom_anal='$analisis';";//" ORDER BY indice ASC,indianal ASC ";
        break;
    case 73:
    case 74:
        include "funciones/luteinizante.php";
        break;
    case 106:
		if($eda>='35'&& $eda<='44'){
			$bus="select nombre,unidades,$v1,$v2,edamax,edamin,id,vref from analisis where id='$id' and edmax!='99' and edmax!='34';";//" ORDER BY indice ASC";
					}
		elseif($eda>='45' && $eda<='99'){
			$bus="select nombre,unidades,$v1,$v2,edmax,edmin,id,vref from analisis where id='$id' and edmax!='34' and edmax!='44';";//" ORDER BY indice ASC";
			}
		else{
			$bus="select nombre,unidades,$v1,$v2,edmax,edmin,id,vref from analisis where id='$id' and edmax!='44'and edmax!='99';";//" ORDER BY indice ASC";
			}
        break;
    case 94:
    case 189:
    case 193:
    case 192:
    case 191:
    case 132:
    case 194:
    case 190:
       		$chk="select nombre,unidades,$v1,$v2,id,vref from analisis where id='$id' limit 1  ORDER BY indice ASC";
        break;
    default:
       $bus="select nombre,unidades,$v1,$v2,id,vref from analisis where id='$id';";//"  ORDER BY indice ASC";
}
$buscas=pg_query($conn, $bus);
echo "<form class='analResul'>";
for($i=1;$i<=pg_num_rows($buscas);$i++){
	$row=pg_fetch_assoc($buscas);
	$no        =$row['nombre'];
    $valoref   =$row['vref'];
	$un        =$row['unidades'];
	$max       =$row[$v1];
	$min       =$row[$v2];
?>

<label><?echo $valoref;?></label>
<input type="text" name="Text<? echo $i;?>" maxlength="40">
<?php
if($min=='0'&& $max=='0'){
 echo "<span id='vrfs'>$un</span><span>$min - $max</span><hr>";}
else{
 echo "<span id='vrfs'>$un</span><span>$min - $max</span><hr>";
}
}
echo"<input type='button' value='Registar'></form>";
?>