<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
}
-->
</style> 
<page backcolor="#FEFEFE" backimgx="center" backimgy="bottom" backimgw="100%" backtop="40mm" backbottom="30mm" footer="date;heure;page" style="font-size: 10pt;color:blue;">
   <img style="position:relative;left:0px;top:-130;width: 100%;"  src="./res/LOGO.jpg" alt="Logo">
     <page_header>
<table  border="0" style="position:relative;left:0px;top:0;width: 100%;font-family:Courier, Helvetica, sans-serif;font-size: 9pt;color:blue;"  >
<tr >
<td>CED. PROF.16027</td><td>&nbsp;&nbsp;</td>
<td>Negrete No.610 Tel. 38 2-10-76 &nbsp;Fax.38 1-69-39</td>
</tr><tr>
<td>REG. S.S.A. 3421</td><td></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CP.79000 Cd. Valles, S.L.P.</td>
</tr>
</table>
 <hr style="color:blue;"><br clear="all" />
    
<?php
$idcl=$_GET['idcl'];
$fol=$_GET['fol'];
include 'login.php';
$hi="select * from historial where folio='$fol';"; 
$hist=pg_query($conn, $hi);

if(!$hist) {
echo $hi;	
	}
	if (pg_num_rows($hist) > 0) {
		while ($ro = pg_fetch_assoc($hist)) {
	$nomb=$ro['nomcli'];
	$doctor=$ro['doctor'];
	$fecha=$ro['fecha'];


}
}else {
echo "no hay nada";	
	}?>  
<br>
   <table border="0" style="position:relative;left:0px;width:100%;top:-25;font-family: Courier, Helvetica, sans-serif;font-size: 10pt;color:blue;" >
<tr>
<td width="350">PACIENTE:&nbsp;<?php echo $nomb;?></td><td width="150">&nbsp;</td><td width="250">PROCEDENCIA:</td></tr>
<tr>
<td><?php echo $doctor;?></td><td width="150"></td><td width="250">FECHA:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fecha;?></td>
</tr>
</table>
  <hr style="color:blue;">
    <br>
    <table style="position:relative;left:0px;top:-15;width: 100%; text-align: left;font-family: Courier;font-size: 10pt;color:blue;border-color: 660033; border-width: 1px; " >
       <tr> <td WIDTH="250" ALIGN="center">
            EXAMEN</td>
            <td WIDTH="250" HEIGHT="15" ALIGN="center" >RESULTADOS
            </td> <td WIDTH="250" ALIGN="center" >VALORES DE REFERENCIA
         </td>        
         </tr>
    </table>
    <hr style="position:relative;left:0px;top:-10;width: 100%; color:blue;">
    <br>
    <br> 
    </page_header>

    <page_footer>
		<?php
		$c='[[page_nb]]';
		$c1='[[page_cu]]';
		if($c1==$c){
		
		?>
       <div style="width:35%;text-align:right;position:absolute;left:500px;top:970;color:blue;"><hr>
            <br>Q.F.B.&nbsp;LUIS&nbsp;SIFUENTES&nbsp;MARTINEZ</div>
                <div style="text-align:left;position:absolute;left:10px;top:970;color:red;">
					resulados fuera de valores de referencia</div>
        <?}else{
			
			}?>
        <table style="width: 100%; border: solid 0px black;color:blue;">
            <tr>
                <td style="text-align: left;    width: 50%">LABORATORIO_SIZA</td>
                <td style="text-align: right;    width: 50%">pagina [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
		
    <br>
       <br>
<table border="0"  style="position:relative;left:0px;top:230;width: 100%; text-align: left;font-family: Courier;font-size: 9pt;">
<?php

include 'login.php';

$idcl=$_GET['idcl'];
$fol=$_GET['fol'];
$hi="select * from rel_analisis where folio='$fol';"; 
$hist= pg_query($conn, $hi);

while($nok=pg_fetch_assoc($hist)){  
		$nomkk=$nok['nombre'];
		$idan=$nok['id'];		
		$vrf="select  DISTINCT ON(nom_anal,indianal) nom_anal,idana,folio,vref,unidades,comentarios,resultado,max,min,indianal from procesados where idana='$idan' and folio='$fol' order by indianal ASC;";
		$vr=pg_query($conn, $vrf);
echo "<tr><td WIDTH='300' Aling='right' colspan='6'><strong>".$nomkk."</strong></td></tr><br>";
		while($no= pg_fetch_assoc($vr)) {
		$nom_an=$no['nom_anal'];
		
		
if($nom_an==$nomkk){}else{
echo '<tr><td WIDTH="300" Align="left">&nbsp;&nbsp;&nbsp;&nbsp;<strong>'.$nom_an.'</strong></td></tr>';}
//$be="select DISTINCT ON (nom_anal) anal_gral,nom_anal, id FROM analisis WHERE id= '$idana';"; 
//	$vrf="select  DISTINCT ON(nom_anal) nom_anal,idana,folio,vref,unidades,comentarios,resultado,max,min from procesados where idana='$idan' and folio='$fol';";
$rf="select * from procesados where idana='$idan' and nom_anal='$nom_an' and folio='$fol' ORDER BY indianal ASC";
 $vrfko=pg_query($conn, $rf); 
while($nok=pg_fetch_assoc($vrfko)){
		
	$vrd=$nok['vref'];
	$unid=$nok['unidades'];
	$com=$nok['comentarios'];
	$resu=$nok['resultado'];
	$max=$nok['max'];
	$min=$nok['min'];
	$indice=$nok['indice'];
	
	$res2=number_format($resu, 2, '.', ' ');
	$max1=number_format($max, 1, '.', ' ');
	$min1=number_format($min, 1, '.', ' ');
	
	if(preg_match('`[^0-9a-zA-Z_-]`',$resu)){
		$fon='<font  style="color:blue;">';
		$fon2='</font>';
		}else{
	if($res2>$max1||$res2<$min1){
		$fon='<font  style="color:red;">';
		$fon2='</font>';
		}else{
			$fon='<font  style="color:blue;">';
		$fon2='</font>';
			}}
			
switch($idan){
	case 57:
	if($indice=='2'){	
		echo '<tr><td WIDTH="300" Align="left">&nbsp;<strong>CON DIFERENCIAL DE:</strong></td></tr>';	
	echo '<tr><td WIDTH="300" Align="left">&nbsp;&nbsp;&nbsp;&nbsp;'.$vrd.'</td>';
			
	}
	else
	{
		echo '<tr><td WIDTH="300" Align="left">&nbsp;&nbsp;&nbsp;&nbsp;'.$vrd.'</td>';
		}
		break;
default:
echo '<tr><td WIDTH="300" Align="left">&nbsp;&nbsp;&nbsp;&nbsp;'.$vrd.'</td>';
break;
}
if(preg_match('`[^0-9a-zA-Z_-]`',$resu)){
echo '<td WIDTH="100" align="right">'.$fon.$resu.$fon2.'</td>';}else{
echo '<td WIDTH="100" align="right">'.$fon.$res2.$fon2.'</td>';}
echo '<td WIDTH="30" align="left">'.$unid.'</td>';
if($min=='0'&& $max=='0'){
echo'<td WIDTH="170" align="right"></td><td WIDTH="40" ></td><td WIDTH="30" align="left"></td></tr><br/>';

}
else {
	switch($idan){
		case 101:
		if($vrd=='FACTOR DE RIESGO'){
echo'<td WIDTH="150" align="right">(PROMEDIO</td><td WIDTH="80" >'.$max1.')</td></tr><br/>';
}else{
	
echo'<td WIDTH="150" align="right">'.$min.' -</td><td WIDTH="80" >'.$max1.'</td></tr><br/>';
	}
break;
case 57:
echo'<td WIDTH="150" align="right"></td><td WIDTH="40" ></td><td WIDTH="60" align="left"></td></tr><br/>';
break;
default:
echo'<td WIDTH="150" align="right">'.$min.' -</td><td WIDTH="80" >'.$max1.'</td></tr><br/>';
break;
}
}
}	
		echo "<tr><td WIDTH='340' align='left' colspan='3'><div style='margin-left:50px;position:fixed;'>";if($com==''){echo "&nbsp;";}else{ echo "Nota: $com";} echo "</div></td></tr>";
}}
?>  
  </table>
 
   
            
</page>
