<?php 
include 'login.php';
$fo=$_GET['fol'];

$bus=" select * from rel_analisis where folio='$fo'";
$asi=pg_query($conn, $bus);



?>