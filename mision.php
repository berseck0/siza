<!DOCTYPE html>
<html>
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
    <div id="dates">hora y fecha</div><div id="brd">as</div>
     <hgroup>
       <img  id="logo" />
       <h1>SIZA</h1>
       <span>Laboratorio SIZA Cd. Valles S.L.P.</span>
     </hgroup>
  <nav>
   <?php
   include 'includes/menus.php';
   ?>
  </nav>  
	</header>
<div id="section">
<content>
  <p>bienvenidos a laboratorios zisa</p><br>
  <p>Laboratorios SIZA su salud es nuestra prioridad trabajando para servirle mejor generando resultados<br> de alta calidad con presicion para su correcta atencion .</p>
<p>una empresa de prestigio con personal altamente calificado atendiendolos desde 1970 con una gran trayectoria<br> al servicio de Cd. Valles y la region consolidandonos como uno de los mejores laboratorios clinicos de analisis. </p>
  
  <img  src="images/LOGOS/nuevo-8.png"  alt="Laboratorio SIZA"/>
  </content>  
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
       <h3>Contacto Rapido</h3>           
           <form action=" " method="POST">          
              <input type="text" id="nombrec"  name="name" size="10" class="inputfield" title="name" placeholder="su nombre" />
               <br>
              <input type="text" id="emailc" placeholder="su correo electronico" name="email" size="10" class="inputfield" title="email" />
               <br>
              <textarea id="message" rows="5" cols="" ></textarea>
               <br>
             <input type="button" onClick="contacto();" class="boton" value="enviar" id="btn" />                 
         </form>
  </div>
<?php } 
else {
include 'includes/perf.php';
}?>

</div>
<footer>pies</footer>	
</body>
</html>
