<!-- bbilirrubinas   -->  
    <script type="text/javascript">  
    function Sumar(){  
          interval = setInterval("calcular()",1);  
    }  
    function calcular(){  
          bt = document.proceso.Text2.value;  
          bd = document.proceso.Text3.value;  
          document.proceso.Text4.value = ( bt  * 1) - (bd * 1);  
          
            
    }  
    function NoSumar(){  
          clearInterval(interval);  
    }  
    </script>  
