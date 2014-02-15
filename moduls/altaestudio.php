<article class="main">

  <div id="analisis">

<form name="aki" action="" method="post">
      <fieldset class="valores">
        <div id="seccion_valores">
           <label><b>Nombre del Analisis:</b></label>
                <div id="bs_txt1">
                  <input type='text' name='nom_anal' size="28" autocomplete="off" id="bs_analis1" onblur="NaFl(thisValue)"/>
                   <input type="hidden" name="id_ana1" size="5" id="an_p1">
                   <div id="menulista" style="display:none;">
                     <div class="dropdown-caret" aria-hidden="true">
                          <div class="caret-outer"></div>
                          <div class="caret-inner"></div>
                      </div>
                       <ul  class="bs_lis" id="bs_analis"></ul>
                   </div>
                  
                </div>
        </div>
        <div id="seccion_valores">
            <label>añadir sub-analisis</label>
                <div id="bs_txt">
                  <input type="text" name="bs_analisis" id="bs_analisis" placeholder="Nombre del analisis" autocomplete="off" onblur="fly(thisValue)" />
                   <div id="menulista" class="menulista2" style="display:none;">
                     <div class="dropdown-caret" aria-hidden="true">
                          <div class="caret-outer"></div>
                          <div class="caret-inner"></div>
                      </div>
                      <ul class="bs_lis" id="bs_analis_ul" ></ul>
                    </div>
                  <input type="button" id="btn_lis" name="ag_anlisis" value="añadir">
                </div>
            <input type='hidden' size="5" id="plantilla" name="plantilla">
            <input type="hidden" size="5" name="id" id="an_p">
        </div>
        <div id="seccion_valores">
                <label><b>Nombre del Campo:</b></label>
                <input type="text" size="28" id="vref" maxlength="50" name="vref" />
        </div>
        <div  id="opcional">
              <label><b>tipo:</b></label>
                <select id="seleccion" onchange="selecto()" name="opcion">
                      <option selected="selected">Seleccione</option>
                      <option value="numerico">Numerico</option>
                      <option value="Estudio">Estudio</option>
                </select>
        </div>            
      </fieldset><br>
      <div id="v">
              <fieldset id="valores"><legend> Hombre:</legend>
                   Maximo
                   Minimo
                   <input type="text" size="4" maxlength="25" name="maxh" />
                  <input type="text" size="4" maxlength="25" name="minh"/>
              </fieldset>
              <fieldset id="valores"><legend>Mujer</legend>
                  Maximo
                  Minimo
              <input type="text" size="4" maxlength="25" name="maxm" />
                  <input type="text" size="4" maxlength="25" name="minm" />
              </fieldset>
              <fieldset id="valores"><legend>Niño(a):</legend>
                 Maximo
                 Minimo 
              <input type="text" size="4" maxlength="25" name="maxn" />
              <input type="text" size="4" maxlength="25" name="minn"/>
              </fieldset>
              <fieldset id="valores"><legend>R/N</legend>
                  Maximo 
                  Minimo 
              <input type="text" size="4" maxlength="25" name="maxb" />
              <input type="text" size="4" maxlength="25" name="minb" />
              </fieldset>
              <fieldset id="valores"><legend>Unidades</legend>
                  unidad
              <input type="text" size="10" maxlength="15" name="unidades" /> <br>
              </fieldset>
              <fieldset id="valores"><legend>Edades</legend>
                  Maxima
                  Minima
                       <input type="text" size="3" maxlength="15" name="edmax" /> 
                       <input type="text" size="3" maxlength="15" name="edmin" /> 
                       <select name="edad">
                          <option value="años">años</option>
                          <option value="mes">mes</option>
                          <option value="dias">dias</option>
                       </select>
             </fieldset>
      </div>
        <div id="estud">
            <fieldset id="valore"><legend>Parametro:</legend>
                  <input type="text" size="20" name="parametro">
          </fieldset> 
          <fieldset id="valore"><legend>Unidad:</legend>
                 <input type="text" size="10" name="unidad">
          </fieldset>
            <fieldset  id="valore"><legend>Nota:</legend>
                  <textarea name="nota"></textarea>
          </fieldset>
        </div>
          <div class="altmetodo">
              <h4>Tipo de Metodo:</h4><input type='text' size='30' maxlength='60' name='metodo' />
              <input type="button" id="RegAnal" value="Guardar" name="Guardar"/><div class="guardar" id="RegAnal2" ></div>
          </div>     
</form> 

<div><br/>
    <hr>
        <h3>analis registrado</h3>
      <div id="agregado">
        <!--a qui va la tabla de analisis agregados-->
        <?php 
        include "includes/lista_analsis_alta.php";
        ?>
        </div>
     </div>

  </div>
</article>