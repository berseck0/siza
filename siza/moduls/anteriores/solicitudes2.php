<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Pimp your tables with CSS3" />
        <meta name="keywords" content="table, css3, style, beautiful, fancy, css"/>
     <link rel="stylesheet" href="inclu/css/styletab.css" type="text/css" media="screen"/> 
    </head>
    <style>
        body{
            font-family: Georgia, serif;
            font-size: 20px;
            font-style: italic;
            font-weight: normal;
            letter-spacing: normal;
                  
        }
        
        #content{
             padding:5px;
            margin:0 auto;
                  
            
        }
        
      
    </style>
    <body>
        <div id="content">
           
            <span class="scroll"></span>
            
            
            <h2>Análisis de clientes a procesar</h2>

 <?php 
include 'inclu/login.php';

$dsl="SELECT DISTINCT ON (folio) nombre, id_cl, precio, hora, estatus, nomcl, folio FROM rel_analisis WHERE estatus = 'a procesar' ORDER BY folio DESC, nomcl DESC, hora DESC, id_cl DESC, nombre DESC;";
//SELECT DISTINCT ON (id) posticon, tema, fecha, cerrado, pin, temaid, autor FROM foros WHERE sala = 'todo' ORDER BY id DESC, pin DESC, fecha DESC
$rel=pg_query($conn, $dsl);

if(!$rel) {
echo "nop ay solicitudes pendientes";	
	
	}
	
if (pg_num_rows($rel) > 0) {
    echo '<table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">ID</th>
                        <th scope="col" abbr="Medium">Folio</th>
                        <th scope="col" abbr="Business">Hora</th>
                         <th scope="col" abbr="Business">Nombre</th>
                         <th scope="col" abbr="Business">Factura</th>
                         <th scope="col" abbr="Business">Finalizado</th>
                                           </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                       
                    </tr>
                </tfoot>';
     
	while ($row2 = pg_fetch_assoc($rel)) {
		$idcl=$row2['id_cl'];
		$folio=$row2['folio'];
		$hora=$row2['hora'];
		$nomcl=$row2['nomcl'];
   echo "<tbody>
                    <tr>
                        <th scope='row'>solicitud&nbsp;&nbsp;</th>
                        <td>&nbsp;&nbsp;".$idcl."&nbsp;&nbsp;&nbsp;</td>
                        <td><a href='modules/alta_analisis.php?folio=".$folio."&id=".$idcl."&nocl=".$nomcl."'>".$folio."</a></td>
                        <td>&nbsp;&nbsp;&nbsp;".$hora."&nbsp;&nbsp;</td>
                     <td>&nbsp;&nbsp;".$nomcl."&nbsp;&nbsp;</td>
                     <td><a href='modules/factura.php?f=".$folio."&&id=".$idcl."'>si</a></td>
                     <td><a href='modules/finalizado.php?y=".$folio."&id=".$idcl."'><img src='images/accepted_48.png' width='48' height='48' alt='' /></a></td>
                    </tr>";
   
   
}
}
echo" </tbody>
            </table>"


?>
   
        </div>

    </body>
</html>

