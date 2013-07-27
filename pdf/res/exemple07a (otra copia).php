<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
}
-->
</style>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 10pt;color:blue;">
    <bookmark title="Lettre" level="0" ></bookmark>
     <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 33%">html2pdf</td>
                <td style="text-align: center;    width: 34%">Test d'header</td>
                <td style="text-align: right;    width: 33%"><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 50%">LABORATORIO_SIZA</td>
                <td style="text-align: right;    width: 50%">pagina [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
		
                <img style="width: 100%;"  src="./res/LOGO.jpg" alt="Logo">
<i>
        
<table  border="0" style="position:relative;left:0px;top:-55;width: 100%;font-family:Courier, Helvetica, sans-serif;font-size: 9pt;"  >
<tr >
<td>CED. PROF.16027</td><td>&nbsp;&nbsp;</td>
<td>Negrete No.610 Tel. 38 2-10-76 &nbsp;Fax.38 1-69-39</td>
</tr><tr>
<td>REG. S.S.A. 3421</td><td></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CP.79000 Cd. Valles, S.L.P.</td>
</tr>
</table>        

    </i> <hr style="color:blue;"><br clear="all" />
    
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

   <table border="0" style="position:relative;left:0px;width:100%;top:-25;font-family: Courier, Helvetica, sans-serif;font-size: 10pt;" >
<tr>
<td width="350">PACIENTE:&nbsp;<?php echo $nomb;?></td><td width="150">&nbsp;</td><td width="250">PROCEDENCIA:</td></tr>
<tr>
<td><?php echo $doctor;?></td><td width="150"></td><td width="250">FECHA:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fecha;?></td>
</tr>
</table>
 
      <hr style="color:blue;">
    <br>
    <table border="1" style="position:relative;left:0px;top:-10;width: 100%; text-align: left;font-family: Courier;font-size: 10pt;" >
       <tr> <td WIDTH="250" ALIGN="center">
            EXAMEN</td>
            <td WIDTH="250" HEIGHT="15" ALIGN="center" >RESULTADOS
            </td> <td WIDTH="250" ALIGN="center" >VALORES DE REFERENCIA
         </td>        
         </tr>
    </table> 
    <br>
       <br>
    <table border="1" style="position:relative;left:0px;top:-10;width: 100%; text-align: left;font-family: Courier;font-size: 9pt;">
<?php

include 'login.php';

$idcl=$_GET['idcl'];
$fol=$_GET['fol'];
$hi="select * from rel_analisis where folio='$fol';"; 
$hist= pg_query($conn, $hi);

	if (pg_num_rows($hist) > 0) {

while($nok=pg_fetch_assoc($hist)){  
		$nomkk=$nok['nombre'];
		$idan=$nok['id'];		
		$vrf="select  DISTINCT ON(nom_anal) nom_anal,idana,folio,vref,unidades,comentarios,resultado,max,min from procesados where idana='$idan' and folio='$fol'";
		$vr=pg_query($conn, $vrf);
echo "<tr><td WIDTH='300' Aling='right' colspan='6'><strong>".$nomkk."efwsf</strong></td></tr><br>";
		while($no= pg_fetch_assoc($vr)) {
		$nom_an=$no['nom_anal'];
		
		
if($nom_an==$nomkk){}else{
echo '<tr><td WIDTH="300" Align="left">&nbsp;&nbsp;&nbsp;&nbsp;<strong>'.$nom_an.'</strong></td></tr>';}
//$be="select DISTINCT ON (nom_anal) anal_gral,nom_anal, id FROM analisis WHERE id= '$idana';"; 
//	$vrf="select  DISTINCT ON(nom_anal) nom_anal,idana,folio,vref,unidades,comentarios,resultado,max,min from procesados where idana='$idan' and folio='$fol';";

$hid="select * from precios where id='$idan';"; 
$histd=pg_query($conn, $hid);


	if (pg_num_rows($histd) > 0) {
		while ($rod = pg_fetch_assoc($histd)) {
	$pro=$rod['tipo'];
$nom1=$rod['nombre'];
$act=$rod['activo'];	

//if($pro==''){

//$rf="select * from procesados inner join promo_rel on procesados.idana=promo_rel.id where folio='$fol'";//}
//elseif($pro=='promocion') {
	
	
	$rf="select * from procesados where idana='$idan' and nom_anal='$nom_an' order by indice ASC";//}

 
 $vrfko=pg_query($conn, $rf); 
while($nok=pg_fetch_assoc($vrfko)){
		
	$vrd=$nok['vref'];
	$unid=$nok['unidades'];
	$com=$nok['comentarios'];
	$resu=$nok['resultado'];
	$max=$nok['max'];
	$min=$nok['min'];
	
	$res2=number_format($resu, 2, '.', ' ');
	$max1=number_format($max, 2, '.', ' ');
	$min1=number_format($min, 2, '.', ' ');
	
	if($res2>$max1||$res2<$min1){
		$fon='<font  style="color:red;">';
		$fon2='</font>';
		}else{
			$fon='<font  style="color:blue;">';
		$fon2='</font>';
			}
			

echo '<tr><td WIDTH="300" Align="left">&nbsp;&nbsp;&nbsp;&nbsp;'.$vrd.'</td>';
if(preg_match('`[a-z]`',$resu)){
echo '<td WIDTH="70" align="right">'.$fon.$resu.$fon2.'</td>';}else{
echo '<td WIDTH="70" align="right">'.$fon.$res2.$fon2.'</td>';}
echo '<td WIDTH="30" align="left">'.$unid.'</td>';
if($min=='0'&& $max=='0'){
echo'<td WIDTH="170" align="right"></td><td WIDTH="40" ></td><td WIDTH="30" align="left"></td></tr><br/>';

}
else {
echo'<td WIDTH="170" align="right">'.$min.' -</td><td WIDTH="40" >'.$max.'</td><td WIDTH="30" align="left">'.$unid.'</td></tr><br/>';

}
}	
		echo "<tr><td WIDTH='340' align='left' colspan='3'><div style='margin-left:50px;position:fixed;'>";if($com==''){echo "&nbsp;";}else{ echo "Nota: $com";} echo "</div></td></tr>";

}}}}}
//////////replica promocion

$rf="select * from procesados inner join promo_rel on procesados.idana=promo_rel.id where folio='$fol'";
 
 $vrfko=pg_query($conn, $rf); 
while($nok=pg_fetch_assoc($vrfko)){
		$nom=$nok['nom_anal'];
	$vrd=$nok['vref'];
	$unid=$nok['unidades'];
	$com=$nok['comentarios'];
	$resu=$nok['resultado'];
	$max=$nok['max'];
	$min=$nok['min'];
	
	$res2=number_format($resu, 2, '.', ' ');
	$max1=number_format($max, 2, '.', ' ');
	$min1=number_format($min, 2, '.', ' ');
	
	if($res2>$max1||$res2<$min1){
		$fon='<font  style="color:red;">';
		$fon2='</font>';
		}else{
			$fon='<font  style="color:blue;">';
		$fon2='</font>';
			}
			
echo '<tr><td WIDTH="300" Align="left">&nbsp;&nbsp;&nbsp;&nbsp;<strong>'.$nom.'</strong></td></tr>';
echo '<tr><td WIDTH="300" Align="left">&nbsp;&nbsp;&nbsp;&nbsp;'.$vrd.'</td>';
if(preg_match('`[a-z]`',$resu)){
echo '<td WIDTH="70" align="right">'.$fon.$resu.$fon2.'</td>';}else{
echo '<td WIDTH="70" align="right">'.$fon.$res2.$fon2.'</td>';}
echo '<td WIDTH="30" align="left">'.$unid.'</td>';
if($min=='0'&& $max=='0'){
echo'<td WIDTH="170" align="right"></td><td WIDTH="40" ></td><td WIDTH="30" align="left"></td></tr><br/>';

}
else {
echo'<td WIDTH="170" align="right">'.$min.' -</td><td WIDTH="40" >'.$max.'</td><td WIDTH="30" align="left">'.$unid.'</td></tr><br/>';


		echo "<tr><td WIDTH='340' align='left' colspan='3'><div style='margin-left:50px;position:fixed;'>";if($com==''){echo "&nbsp;";}else{ echo "Nota: $com";} echo "</div></td></tr>";

}
}	
?>  
  </table>
 
       <div style="width:35%;text-align:right;position:relative;left:500px;top:100;"><hr>
            <br>Q.F.B.&nbsp;LUIS&nbsp;SIFUENTES&nbsp;MARTINEZ</div>
                 
            
</page>
