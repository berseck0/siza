<!-- proteinas totales   -->  
    <script type="text/javascript">  
    function Sumar(){  
          interval = setInterval("calcular()",1);  
    }  
    function calcular(){  
          prototal = document.proceso.Text1.value;  
          albumina = document.proceso.Text2.value;
          document.proceso.Text3.value = ( prototal  * 1) - (albumina * 1);  
            glob = document.proceso.Text3.value;
           document.proceso.Text4.value = ( albumina  * 1) / ( glob * 1); 
            
    }  
    function NoSumar(){  
          clearInterval(interval);  
    }  
    </script>  
