<?php
include 'login.php';  
$opcions=$_GET['ops'];
$am=$_GET['ams'];
switch ($opcions) {
  case 1:
 
          $s="select * from rel_analisis where folio='$am' and descuento=0 and cortesia=0;";
          $p=pg_query($conn, $s);
              if(!$p){ echo $s; }
      
          echo "<form name='descuen' id='descuen'>";
          echo"<strong>DESCUENTOS</a></strong></em><br>ID:<select name='chan' id='selecion'>"; 
              while ($x = pg_fetch_assoc($p)) {
                          $idscost=$x['id_anal'];
                          echo '<option  name="desco"  value="'.$idscost.'">'.$idscost.'</option>';
              }
                echo "</select>";
?>
      <input type="hidden" name="folio" id="fol_io" value="<?echo $am;?>"/>
      <input type="text"   size="2" name="descontar" />% 
      <input type="button" onClick="desconta2()"   name="descuento" value="Descontar"  /> 
      </form>
<?php
$am=$_GET['ams'];
        $lis="select * from rel_analisis where folio='$am' and descuento!=0 and cortesia=0;";
        $listado=pg_query($conn, $lis)or die("fallo query:".$lis);
            if(pg_num_rows($listado)>0){
                  echo "<table width='100%'>";
                     while ($li=pg_fetch_assoc($listado)) {
                                $id_an=$li['id_anal'];
                                $nom_an =$li['nombre_anal'];
                                $des_an=$li['descuento'];
                                $costo =$li['precio'];
                                $fols=$li['folio'];
                                $total=$costo*$des_an/100;

                            echo'<tr><td>'.$nom_an.'</td><td>'.$des_an.'%</td><td> descuento: $'.$total.'</td>
                            <td onClick="eliminadesc(\''.$id_an.','.$fols.'\')">X</td></tr>';
                        }echo"</table>";
            }
?><hr>
<strong>CORTESIA</a></strong></em>      

 <?php                     
      $s3="select * from rel_analisis where folio='$am' and descuento=0 and cortesia=0;";
      $p3=pg_query($conn, $s3);
      echo "<form name='cortesi' id='cortesias'>";
      echo "ID:<select name='chan2'>";
            while ($x3 = pg_fetch_assoc($p3)) {
                    $idscost3=$x3['id_anal'];     
                    echo '<option  name="desco2" value="'.$idscost3.'">'.$idscost3.'</option>';
            } 
      echo "</select>";
?>
<input type="hidden" name="folio" id="fol_io" value="<?echo $am;?>"/>
<input type="button"  name="cortesia" onClick="cortesia1()"  value="Dar Cortesia"/>
<input type="button"  name="cortodas" onClick="cortesia2()"  value="! Dar todas !"/>
<br>
<?php
$am=$_GET['ams'];
        $lis="select * from rel_analisis where folio='$am' and descuento=0 and cortesia!=0;";
        $listado=pg_query($conn, $lis)or die("fallo query:".$lis);
            if(pg_num_rows($listado)>0){
                  echo "<table  width='100%'>";
                     while ($li=pg_fetch_assoc($listado)) {
                                $id_an=$li['id_anal'];
                                $nom_an =$li['nombre_anal'];
                                $cortesia=$li['cortesia'];
                                $fols=$li['folio'];
                           echo'<tr><td>'.$nom_an.'</td><td onClick="eliminacortes(\''.$id_an.','.$fols.'\')">X</td></tr>';
                        }echo"</table>";
            }
?><?php
    break;
  case 2:
        $folio =$_POST['folio'];
        $id_an =$_POST['chan'];
        $des   =$_POST['descontar'];
              $ds="update rel_analisis set descuento=$des where folio='$folio' and id_anal=$id_an;";
              $desc=pg_query($conn, $ds) or die("fallo query".$des);
              if(pg_num_rows($desc)>0){
                  echo "Exito";
              }else{
                  echo  $ds;
              }

    break;
  case 3:
        $folio =$_POST['folio'];
        $id_an =$_POST['chan2'];
        $cor  =1;
              $ds="update rel_analisis set cortesia=$cor where folio='$folio' and id_anal=$id_an;";
              $desc=pg_query($conn, $ds) or die("fallo query".$des);
              if(pg_num_rows($desc)>0){
                  echo "Exito";
              }else{
                  echo  $ds;
              }
    break;
   case 4:
        $folio =$_POST['folio'];
        $id_an =$_POST['chan2'];
        $cor  =1;
              $ds="update rel_analisis set cortesia=$cor where folio='$folio' and descuento=0";
              $desc=pg_query($conn, $ds) or die("fallo query".$des);
              if(pg_num_rows($desc)>0){
                  echo "Exito";
              }else{
                  echo  $ds;
              }
    break; 
   case 5:
          $id_an=$_POST['id'];
          $fol =$_POST['fol'];

          $elm="update  rel_analisis set descuento=0 where id_anal=$id_an and folio='$fol';";
          $elms=pg_query($conn, $elm)or die("Fallo query".$elm); 
          if(pg_num_rows($elms)>0){
                  echo "Exito";
              }else{
                  echo  $elm;
              }

    break; 
      case 6:
          $id_an=$_POST['id'];
          $fol =$_POST['fol'];

          $elm="update  rel_analisis set cortesia=0 where id_anal=$id_an and folio='$fol';";
          $elms=pg_query($conn, $elm)or die("Fallo query".$elm); 
          if(pg_num_rows($elms)>0){
                  echo "Exito";
              }else{
                  echo  $elm;
              }

    break; 
}
?>
