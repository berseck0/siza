<article class="main">
<div id="analisis">
<h3>Datos de los Paquetes</h3>
<form name="aki" action="" method="post">
      <fieldset class="valores"> 
      <div id="seccion_valores">
        <label>Crear Paquete</label>
        <input type="text" id="nompaq" name="nom_paquete" placeholder="nombre">
        <input type="text" id="precio" name="precio" size="10" placeholder="precio">
        <input type="button" name="reg_paquete" value="Registrar" id="reg_paq">
      </div><br><hr>
      <div id="seccion_valores"> 
           <label>Nombre del Paquete:</label>
                <div id="bs_txt1">
                  <input type='text' name='nom_paq' size="28" autocomplete="off" placeholder="Nombre del Paquete" id="bs_paq" onblur="NaPa(thisValue)"/>
                  
                  <div id="menulista" style="display:none;">
                     <div class="dropdown-caret" aria-hidden="true">
                          <div class="caret-outer"></div>
                          <div class="caret-inner"></div>
                      </div>
                       <ul class="bs_lis" id="bs_analis"></ul>
                   </div>

                   <input type="hidden" size="5" name="id" id="an_p">
                </div>
      </div>
      <div id="seccion_valores"> 
            <label>Añadir Analisis</label>
                <div id="bs_txt">
                    <input type="text" name="bs_analisis" id="bs_analisis" placeholder="Nombre del analisis" autocomplete="off" onblur="fly(thisValue)">
                     <div id="menulista" class="menulista2" style="display:none;">
                     <div class="dropdown-caret" aria-hidden="true">
                          <div class="caret-outer"></div>
                          <div class="caret-inner"></div>
                      </div>
                      <ul class="bs_lis" id="bs_analis_ul" ></ul>
                    </div>
                    <input type="button" id="btn_paq" name="ag_an_paq" value="añadir">
                </div>
       </div> 
      </fieldset>

          <div id="v">
              
          </div>
              Metodo: <input type='text' size='30' maxlength='60' name='metodo' />
              <input type="button" id="RegAnal" value="Enviar" name="enviar"/>

</form> 
    <div>
          <h3>Paquete registrado</h3>
        
          <div id="agregado">
                  <!--a qui va la tabla de analisis agregados-->
                  <?php 
                  include "includes/lista_analsis_alta.php";
                  ?>
             </div>
    </div>
</div>
</article>