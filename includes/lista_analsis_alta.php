<?php

include_once 'inset.php';
 $sid  = $_POST['sid'];
 $tipo = $_POST['tip'];
 $nom  = $_POST['nom'];

 if($tipo == 1 ){

    $sele  = "select * from analisis where id=$sid";
    $seleccion =  pg_query($conn, $sele);

      if (pg_num_rows($seleccion)>0) {
          
            echo "<div class='lis'>";
            echo "<table>
             <th>valor de ref.</th><th>hombre</th><th>mujer</th><th>niños</th><th>RN</th><th>unidad</th><th>Metodo</th><th>edad</th><th>edades</th>";
             while($s=pg_fetch_assoc($ana)){
                    $nombree=$s['nombre'];
                    $vf=$s['vref'];
                    $maxh=$s['maxh'];
                    $minh=$s['minh'];
                    $maxm=$s['maxm'];
                    $minm=$s['minm'];
                    $maxn=$s['maxn'];
                    $minn=$s['minn'];
                    $maxrn=$s['maxrn'];
                    $minrn=$s['minrn'];
                    $unidades=$s['unidades'];
                    $metodo=$s['metodo'];
                    $edamax=$s['edamx'];
                    $edamin=$s['edamin'];
                    $edad=$s['edad'];
            
                echo '<tr><td>'.$vf.'</td><td>'.$maxh.' - '.$minh.'</td><td>'.$maxm.' - '.$minm.'</td><td>'.$maxn.' - '.$minn.'</td><td>'.$maxrn.' -'.$minrn.'</td><td>'.$unidades.'</td><td>'.$metodo.'</td><td>'.$edamax.'-'.$edamin.'</td><td>'.$edad.'</td></tr>';
              }
            echo "</table></div>";
         }  

 }if($tipo == 2){

    $sele  = "select * from estudios where id_analis=$sid";
    $seleccion =  pg_query($conn, $sele);

      if(pg_num_rows($seleccion)>0){

         echo "<div class='lis'>";
         echo $nom;

         echo "<table><th>valor de ref.</th><th>Parametro</th><th>Unidad</th><th>Metodo</th><th>Nota</th>";

         while ($l=pg_fetch_assoc($seleccion)) {
              $campo    =   $l['campo'];
              $unidades =   $l['unidades'];
              $metodo   =   $l['metodo'];
              $nota     =   $l['nota'];
              $valor    =   $l['valor'];

               echo '<tr><td>'.$campo.'</td><td>'.$valor.'</td><td>'.$unidades.'</td><td>'.$metodo.'</td><td>'.$nota.'</td>'; 
         }


          echo "</table></div>";
      }
 }

if($tipo == 3){

  $grp="select g.*,p.nombre_ana from grupos g,precios p where g.id_grup='$sid' and p.id_analis=g.id_analisis;";
  $pg_grp=pg_query($conn, $grp);
  
    if(pg_num_rows($pg_grp)>0){
            echo "<div class='lis'>";
            echo $nom;
            echo "<table ><th>sub-analisis</th>";
        while ($sb=pg_fetch_assoc($pg_grp)) {
                      $nombre=$sb['nombre_ana'];
                      echo '<tr><td>'.$nombre.'</td><td>X</td>';
        }
            echo "</table></div>";
    }
}
  if($tipo ==""){
  echo "<h4><label>Aun no tiene registros visibles</label></h4>";
 }
?>