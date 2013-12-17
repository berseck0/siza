<!-- perfil de lipidos   -->  
    <script type="text/javascript">  
    function Sumar(){  
          interval = setInterval("calcular()",1);  
    }  
    function calcular(){  
          coltotal = document.proceso.Text1.value;  
          vldl = document.proceso.Text5.value;
          hdl = document.proceso.Text3.value;    
          document.proceso.Text4.value = ( coltotal  * 1) - (vldl * 1)-(hdl*1);  
          trigli = document.proceso.Text2.value; 
            document.proceso.Text5.value = ( trigli  * 1) /5; 
           document.proceso.Text6.value = ( coltotal  * 1) / (hdl * 1); 
            
    }  
    function NoSumar(){  
          clearInterval(interval);  
    }  
    </script>  
