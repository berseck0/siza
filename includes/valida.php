<?php
session_start();
    $usuario = $_POST['user'];
    $password = $_POST['pass'];
    $password = md5($password);
           if($usuario !="" && $password !=""){
		include 'inset.php';	   
    $sql = "select * from log where usuario='$usuario' and pass='$password'";
    $mensage="Tus datos no son correctos";
   
     $result = pg_query($conn, $sql);
    
     if (pg_num_rows($result) > 0) {
    	
        while ($row = pg_fetch_assoc($result)) {
            $_SESSION['tipo'] =$row['tipo'];
            $_SESSION['id'] =  $row['idus'];
            $_SESSION['usuario'] =  $row['usuario'];
            $_SESSION['logged'] = true;
            if($_SESSION['tipo'] == 1){
            $datos = "select * from usuariosn where idus='".$_SESSION['id']."';";
            $d=pg_query($conn , $datos);
            while($q=pg_fetch_assoc($d)){
					$_SESSION['nombre']=$q['nombre'];
					$_SESSION['apellido']=$q['apellido'];
					$_SESSION['curp']=$q['curp'];	
					$_SESSION['colonia']=$q['colonia'];
					$_SESSION['cp']=$q['cp'];
					$_SESSION['ciudad']=$q['ciudad'];
				    $_SESSION['imagen']=$q['imagen'];
					}
					}elseif($_SESSION['tipo'] == 2) {
          $datos = "select * from empleados where idus='".$_SESSION['id']."';";
            $d=pg_query($conn , $datos);
            while($q=pg_fetch_assoc($d)){
          $_SESSION['nombre']=$q['nombre'];
          $_SESSION['puesto']=$q['puesto'];
          $_SESSION['celular']=$q['celular']; 
          $_SESSION['colonia']=$q['colonia'];
          $_SESSION['email']=$q['email'];
          $_SESSION['ciudad']=$q['ciudad'];
            $_SESSION['imagen']=$q['imagen'];
					
				}}
			
		}echo "Exito session iniciada";
      					} else {
							  echo "Error de datos";
								}
								}
								      	 	
pg_close($connection); // Close this connection


?>
