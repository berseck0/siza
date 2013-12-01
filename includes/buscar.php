<?php
$op=$_POST['l'];
if($op==1){
$user='postgres';
  try{
    $d = $_POST["trm"];
    $d = strtoupper($d);
$conn = new PDO('pgsql:host=localhost;dbname=sizas', $user,$pass);
$sql = "select nombre,id_cli from clientes where nombre like '%$d%' limit 10;";

foreach ($conn->query($sql) as $val) {
  $resp = $val['nombre'];
  $ids 	= $val['id_cli'];
echo '<li onClick="fill(\''.$resp.'\');datosClienteProcesar(\''.$ids.'\')">'.$resp.'</li>';
}

}

catch(PDOException $e){
  echo $e->getMessage();
}
}//senguda busqueda listado de analisis
elseif ($op==2) {
	try{
	$an=$_POST['analisis'];
	$an=strtoupper($an);
	$usuario="postgres";
	$conn = new PDO('pgsql:host=127.0.0.1;dbname=sizas;',$usuario,$pass);
	$sql ="select * from precios where nombre_ana like '%$an%' limit 7";
	echo "<table width='100%'>
	<th>id</th><th>nombre</th><th>precio</th>";
	foreach ($conn->query($sql) as $an) {
		$anal = $an['nombre_ana'];
		$cos  = $an['precio'];
		$idan = $an['id_analis'];
		echo "<tr class='L_a_P'>";
		echo "<td>$idan</td>";
		echo '<td><label onClick="Registro22(\''.$anal.','.$cos.','.$idan.'\');return false;">'.$anal.'</label></td>';
		echo "<td>$ $cos</td>";
		echo "</tr>";
			}
			echo "</table>";
	}
catch (PDOException $e){
	echo $e->getMessage();

}// tercer busqueda de doctores
}elseif ($op==3) {
	try{
		$doc=$_POST['dc'];
		$doc=strtoupper($doc);
		$usuario="postgres";
		$conn = new PDO('pgsql:host=127.0.0.1;dbname=sizas;',$usuario,$pass);
		$sql ="select * from doctores where nombre like '%$doc%' limit 5";
		foreach ($conn->query($sql) as $d) {
			if(pg_fetch_array($d)>0){}else{
				$nom=$d['nombre'];
				$tit=$d['titulo'];
				$iddc=$d['id_doc'];
				$as=$tit." ".$nom;
				echo '<li onClick="flip(\''.$as.'\');">'.$as.'</li>';
			}
		} 

	}
	catch (PDOException $e){
		echo $e->getMessage();
	}

}elseif ($op==4) {
	try{
		$ana=$_POST['an'];
		$ana=strtoupper($ana);
		$usuario="postgres";
		$conn=new PDO('pgsql:host=127.0.0.1;dbname=sizas;',$usuario,$pass);
		$sql="select nombre_ana,id_analis from precios where nombre_ana like '%$ana%' limit 3;";
		foreach ($conn ->query($sql) as $d) {
			if(pg_fetch_array($d)>0){}else{
			$nombre=$d['nombre_ana'];
			$id=$d['id_analis'];
			echo '<li onClick="fly(\''.$id.','.$nombre.'\');">'.$nombre.'</li>';
			}
		}
	}
	catch (PDOException $e){
		echo $e->getMessage();
	}
}

?>
