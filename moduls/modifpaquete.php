<article class="main">

  <div id="analisis">
        <div id="seccion_valores">
           <label><b>Nombre del Paquete:</b></label>
                <div id="bs_txt1">
                  <input type='text' name='nom_paq' size="28" autocomplete="off" placeholder="Nombre del Paquete" id="bs_paq" onblur="NaPa(thisValue)"/>
                  <div id="menulista" style="display:none;">
                     <div class="dropdown" aria-hidden="true">
                          <div class="caret-outer"></div>
                          <div class="caret-inner"></div>
                      </div>
                       <ul class="bs_lis" id="bs_analis"></ul>
                   </div>
                   <input type="hidden" size="5" name="id" id="an_p1">
                   <input type="hidden" size="5" name="id" id="pa_pre">
                </div>
            <input type="button" value="checar" id="mod_paq_btn" >
        </div>
  </div>
</article>

<div id="analisis" class="paq_selec" style="display:none">
        <div id="seccion_valores">
            <label>añadir sub-analisis</label>
                <div id="bs_txt">
                  <input type="text" name="bs_analisis" id="bs_analisis" placeholder="Nombre del analisis" autocomplete="off" onblur="fly(thisValue)" />
                   <div id="menulista" class="menulista2" style="display:none;">
                     <div class="dropdown" aria-hidden="true">
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
          <div id="paq_mod"></div>
</div>
