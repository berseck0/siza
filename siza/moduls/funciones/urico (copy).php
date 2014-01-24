
 <?php  ?>
folio:<?
if( isset($_POST['folio']))
                 $folio = $_POST['folio'];?>
<input type="text" name="folio" value="<?echo $folio;?>" size="10" onfocus='this.blur()'>
id cliente:
<?if( isset($_POST['id']))
                 $idcl = $_POST['id'];?>
<input type="text"name="id" value="<? echo $idcl;?>" size="1" onfocus='this.blur()'>
nombre cliente:
<?if( isset($_POST['nomcl']))
                 $nomcl = $_POST['nomcl'];?>
<input type="text"name="nomcl" value="<? echo $nomcl;?>" onfocus='this.blur()'><br><br />

<hr color="blue" size="3">
nombre del analisis:
<?if( isset($_POST['nomal']))
                 $analisis = $_POST['nomal'];?>
<input type="text" value="<? echo $analisis;?>" name="nomal" onfocus='this.blur()'><br>
<?php 


require 'login.php';
$sel2="select (edad) from historial where folio='$folio'";
   
$res2 = pg_query($conn, $sel2) or die ("Fallo query: $sel.<br/>");

       	while ($row4 = pg_fetch_assoc($res2)) {
       	$ed = $row4['edad'].""; 
echo '<div style="margin-top:-87px;margin-left:640px;position:absolute;" >Edad:<input type="numeric" size="5" name="edad" maxlength="3" value="'.$ed.'"/></div>' ;


$edad=$_POST['edad'];
$sel3="select * from analisis where nombre='$analisis' and edmax='34'";
   
$res3 = pg_query($conn, $sel3) or die ("Fallo query: $sel3.<br/>");

       	while ($row5 = pg_fetch_assoc($res3)) {
       	$edmax = $row5['edmax']."";
       	$edmin = $row5['edmin']."";
       	$unit=$row5['unidades'];
      
       if($ed <'35'&&$ed>'0') {	

   echo $edmax;
   echo $edmin;
 
   
    echo "<br><br><label>$analisis</label>";echo '<input type="text"  name="nomal">';
       echo "<label>$unit</label>";
   }    	
   
   
   
  }
}
?>
