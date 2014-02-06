<article class="main">
<div id="analisis">
<h2>Datos del Analisis</h2>
<form name="aki" action="" method="post">
      <fieldset class="valores">
        <label><b>Nombre del Analisis:</b></label>
            <input type='text' size='28' maxlength='50' name='nom_anal' value='<?=$noms2?>'/>
            <label>añadir sub-analisis</label>
                <div id="bs_txt">
                    <input type="text" name="bs_analisis" id="bs_analisis" placeholder="Nombre del analisis" autocomplete="off" onblur="fly(thisValue)">
                    <ul class="bs_lis" id="bs_analis_ul" style="display:none;"></ul>
                    <input type="button" id="btn_lis" name="ag_anlisis" value="añadir">
                </div>
            <input type='hidden' size='5' maxlength='50'  id="an_primario" name='id' value='<?=$sdi?>'/>

        <label><b>Nombre del Valor:</b></label>
           <input type="text" size="28" id="vref" maxlength="50" name="vref" />
             <label><b>tipo:</b></label>
            <select id="seleccion" onchange="selecto()" name="opcion">
              <option>seleccione</option>
              <option value="numerico">numerico</option>
              <option value="texto">texto</option>
            </select>
      </fieldset><br>
<div id="v">
              
           </div>
             <br><fieldset  id="valore"><legend>Nota:</legend>
             <textarea name="nota"></textarea></fieldset><br>
                  Metodo: <input type='text' size='30' maxlength='60' name='metodo' />
                  <input type="button" id="RegAnal" value="Enviar" name="enviar"/>

                 </form> 

                 <div><br/>
                  <hr>
        <h3>analis registrado</h3>
                 </div>
               </div>
</article>