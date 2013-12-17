<!-- FORMULA ROJA   -->  
    <script type="text/javascript">  
    function Sumar(){  
          interval = setInterval("calcular()",1);  
    }  
    function calcular(){  
          hematocrito = document.proceso.Text3.value;  
          eritrocitos = document.proceso.Text1.value;   
          document.proceso.Text4.value = ( hematocrito  * 1) / (eritrocitos * 1)*10000;  
          hemoglobina = document.proceso.Text2.value; 
            document.proceso.Text5.value = ( hemoglobina  * 1) / (eritrocitos * 1)*10000; 
               
           document.proceso.Text6.value = ( hemoglobina  * 1) / (hematocrito * 1)*100; 
            
    }  
    function NoSumar(){  
          clearInterval(interval);  
    }  
    </script>  
