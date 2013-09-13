<!DOCTYPE html>
<?php session_start();?>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Laboratorio SIZA</title>
<link href="css/stylo.css" rel="stylesheet"/>
<link href="css/normalize.css" rel="stylesheet"/>
 <!--<link rel="stylesheet" href="css/font/pictonic.css">-->
 <link rel="stylesheet" type="text/css" href="css/font2/raphaelicons.css">

 <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
 <link rel="Shortcut Icon" type="image/x-icon" href="images/LOGOS/nuevo-8.png" />
  
  <link rel="stylesheet" href="js/themes/base/jquery.ui.all.css" />
  <script src="js/jquery-1.9.1.js"></script>
  <script src="js/ui/jquery.ui.core.js"></script>
  <script src="js/ui/jquery.ui.autocomplete.js"></script>

  <?php
  include 'includes/fancy.html';
  include 'js/scrips.js';
  ?>
</head>
<body>
	<header>
  <!-- <div id="dates">hora y fecha</div><div id="brd">as</div>-->
  	 <hgroup>
	     <img  id="logo" />
	     <h1>SIZA</h1>
	     <span>Laboratorio SIZA Cd. Valles S.L.P.</span> <div id="datetime"><span>Fecha:</span>
       <?php   $da=date("d/M/Y"); echo "<label id='hora'>".$da."</label>";?></div>
	   </hgroup>
  <nav>
	 <?php
	 include 'includes/menus.php';
	 ?>
  </nav>
</header>

<div id="contenedor">
<div id="section">
<?if($_SESSION['logged']==false){
  include 'includes/conten1.php';
} else{
  include 'includes/conten2.php';
  }
?>
</div>

<div id="SubMenus">

	<?php if($_SESSION['logged']==false){?>
<div  class="seccion">
	 <h3><span class="icon">K</span>Area de Acceso</h3>
<form id="inicio" action=" " method="post">
    <label>Username<span class="icon">L</span></label>
    <input id="user" type="text" name="user" placeholder="nombre de usuario">
    <label>Contraseña <span class="icon">t</span></label>
    <input id="pass" name="pass" type="password">
        <div id="error" class="erro"></div>
    <input id="btn" class="btn1" type="button" value="Entrar">
    <a id="btn_p" class="various" data-fancybox-type="iframe" href="moduls/registro.php">Registrate:</a>
</form>
</div>

<div class="box">
  		<h3>Popular Tops</h3>      
        <div class="seccion">
        <div class="title">
	         <a href="#">alguna liga de interes </a>  
           <p>dentro de un parrafo</p>
         </div>
            <p>un analisis nuevo </p>
        </div>
</div>
<div class="box">  
       <h3>Contacto Rapido <span class="icon">M</span></h3>           
           <form action=" " method="POST">  
           <label>nombre</label>        
              <input type="text" id="nombrec"  name="name" size="10" class="inputfield" title="name" placeholder="su nombre" />
               <label>Email</label>
              <input type="text" id="emailc" placeholder="su correo electronico" name="email" size="10" class="inputfield" title="email" />
               <label>mesaje</label>
              <textarea id="message" rows="5" cols="" ></textarea>
               <br>
             <input type="button"  class="boton" value="enviar" id="btn" />                 
         </form>
  </div>
<?php } 
else {
include 'includes/perf.php';
}?>
</div>
</div>
<footer><label>Esta pagina funciona bien en Google Chrome y Mozilla Firefox</label>
<label id="browser"><?php include 'includes/browser_clas_inc.php'; ?></label>
</footer>	
</body>
</html>
