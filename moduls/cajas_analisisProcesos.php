<?php
include 'login.php';
$id=$_POST['id'];
$fol=$_POST['fol'];

//funciones para los analisisi
switch ($id) {
    case 60:
        include "funciones/formulaB.php";
 echo '<div style="margin-top:238px;margin-left:350px;position:absolute;" ><input type="numeric" size="3" name="rs" onFocus="Sumar();" onBlur="NoSumar();" />%</div>' ;
     break;
    case '61':
  include "funciones/formularoja.php";
        break;
    case '29':
    case 30:
    if($analisis=='FORMULA BLANCA'){
         include "funciones/formulaB.php";
          echo '<div style="margin-top:238px;margin-left:450px;position:absolute;" ><input type="numeric" size="3" name="rs" onFocus="Sumar();" onBlur="NoSumar();" />%</div>' ;
        }
        elseif($analisis=='FORMULA ROJA'){
            include "funciones/formularoja.php";
            }
        break;
    case 101:
    include "funciones/perfillip.php";
        break;
        case 99:
    include "funciones/biliruby.php";
        break;
        case 95:
    include "funciones/prot.php";
        break;
}

$com="select h.idfactura,h.id_clientes,c.titulo,c.edad from historial h,clientes c  where h.id_clientes=c.id_cli and h.idfactura='$fol';";
$conv=pg_query($conn, $com);
    if(pg_num_rows($conv)>0){
	   $k=pg_fetch_assoc($conv);
		  $titulo=$k['titulo'];
		  $eda=$k['edad'];
	   }
$an34="select nombre_ana from precios where id_analis=$id";
$an35=pg_query($conn, $an34);
    $jk=pg_fetch_assoc($an35);
    echo "<label>".$nomans=$jk['nombre_ana']."</label><br>";
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
    switch ($id){
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
echo $idNombre."<br>";
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
echo "<label>nota</label><br><textarea name='comentario'></textarea><br>";
echo"<input type='button' value='Registar'></form>";

////////////////////////////////////////////////////////////////////////////////////////////////////////
///                     AREA DE REGISTRO EN LA  TABLA                                           ////////
///                                                                                             ////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['registro']))
{

$idcl=$_POST['id'];
$folio=$_POST['folio'];
$nom_an=$_POST['nomal'];
$comen=$_POST['comentario'];
$idana=$_POST['idana'];
$portotal=$_POST['portotal'];
$idana = $_POST['idana'];
$eda=$_POST['edad'];
$titulo=$_POST['titulo'];
$ti2=$_POST['tipo'];

switch ($ti2) {
     case 1:
     $ti=" ";
     break;
    case 2:
    $ti="promocion"; 
}
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
$kmb="select * from procesados where folio='$folio' and nom_anal='$nom_an'ORDER BY indice ASC";
$rep=pg_query($conn, $kmb);
if(pg_num_rows($rep)>0){
    
    }
else {
/////////////////////registro nomarl////////
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
switch ($idana) {
    case 1:
    if($eda>='35' && $eda<='44')
            {
            $chk="select nombre,unidades,$v1,$v2,edmax,edmin,indice,indianal,indigral,id from analisis where id='$idana' and edmax!='100' and edmax!='34' ORDER BY indice ASC";
            }
        elseif($eda>='45' && $eda<='100'){
            $chk="select nombre,unidades,$v1,$v2,edmax,edmin,indice,indianal,indigral,id from analisis where id='$idana' and edmax!='34' and edmax!='44' ORDER BY indice ASC ";
            }
        else{
            $chk="select nombre,unidades,$v1,$v2,edmax,edmin,indice,indianal,indigral,id from analisis where id='$idana' and edmax!='44'and edmax!='100' ORDER BY indice ASC";
            }
    break;
         case 29:
         case 30:
         case 56:
         case 53:
        $chk="select nombre,unidades,$v1,$v2,indice,indianal,indigral,id from analisis where id='$idana' and nom_anal='$nom_an' ORDER BY indice ASC,indianal ASC ";
        break;
        case 94:
        case 189:
        case 193:
        case 192:
        case 191:
        case 132:
        case 194:
        case 190:
        case 73:
        case 74:
        $chk= "select nom_anal,unidades,$v1,$v2,indice,indianal,indigral,id from analisis where id='$idana' ORDER BY indice ASC limit 1";
        break;
    case 106:
        if($eda>='35' && $eda<='44')
                {
            $chk="select nombre,unidades,$v1,$v2,edmax,edmin,indice,indianal,indigral,id from analisis where id='$idana' and edmax!='99' and edmax!='34' ORDER BY indice ASC";
                    }
        elseif($eda>='45' && $eda<='99')
                {
            $chk="select nombre,unidades,$v1,$v2,edmax,edmin,indice,indianal,indigral,id from analisis where id='$idana and edmax!='34' and edmax!='44' ORDER BY indice ASC";
                }
        else{
            $chk="select nombre,unidades,$v1,$v2,edmax,edmin,indice,indianal,indigral,id from analisis where id='$idana' and edmax!='44'and edmax!='99' ORDER BY indice ASC";
                }
         break;
    default:
       $chk="select nombre,unidades,$v1,$v2,indice,indianal,indigral,id from analisis where id='$idana' ORDER BY indice ASC";
}
$ask=pg_query($conn, $chk);

for($i=1;$i<=pg_num_rows($ask);$i++){
    $row=pg_fetch_assoc($ask);

    $indianal=$_POST["indianal$i"];
    $indiglobal=$_POST["indiglobla$i"];
    $indice=$_POST["indice$i"];
    $resul=$_POST["Text$i"];
    $res=round($resul,2);
    $no=$row['nombre'];
    $un=$row['unidades'];
    $max=$row[$v1];
    $min=$row[$v2];
$top="insert into procesados(idcl,folio,resultado,vref,nom_anal,comentarios,unidades,max,min,idana,indice,indianal,indiglobal,tipo) values('$idcl','$folio','$res','$no','$nom_an','$comen','$un','$max','$min','$idana','$indice','$indianal','$indiglobal','$ti')";
$re=pg_query($conn, $top);
}
if(!$re){

echo $top;  

    }
        else {
echo '<script language="javascript" type="text/javascript">
                alert("ANALISIS AGREGADO '.$vref.'");
                
            </script>'; 
        
}}
}
?>
