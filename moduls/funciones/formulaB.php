<!-- FORMULA BLANCA   -->  
 <script type="text/javascript" >

    function Sumar(){  
          interval = setInterval("calcular()",1);  
    }  
    function calcular(){  
  //leu = document.proceso.Text1.value;  
 lin = document.proceso.Text2.value;   
 mon = document.proceso.Text3.value; 
  eos = document.proceso.Text4.value; 
bas = document.proceso.Text5.value; 
 seg = document.proceso.Text6.value; 
  mie = document.proceso.Text7.value; 
juv = document.proceso.Text8.value; 
 en = document.proceso.Text9.value; 


var 
//leu2 =(leu*1);
 
  lin2 =(lin*1);
   
  mon2 =(mon*1) 
  
  eos2 =(eos*1) 
    
 bas2 =(bas*1) 
  
   seg2 =(seg*1)
   
    mie2 =(mie*1)
 
    juv2 =(juv*1)

    en2 =(en*1)
  
   
  tr =  (lin2)+(mon2)+ (eos2)+(bas2)+ (seg2)+(mie2)+ (juv2)+(en2)
   	
   	
   	if( tr >100  ){

   		alert("error ")
   	//document.proceso.Text1.value ='';
   	document.proceso.Text2.value='';   
  document.proceso.Text3.value=''; 
   document.proceso.Text4.value=''; 
document.proceso.Text5.value=''; 
  document.proceso.Text6.value=''; 
   document.proceso.Text7.value=''; 
document.proceso.Text8.value=''; 
  document.proceso.Text9.value=''; 
  document.proceso.Text1.focus();	 
document.proceso.Text2.focus();	
 document.proceso.Text3.focus();	
  document.proceso.Text4.focus();	
document.proceso.Text5.focus();
 document.proceso.Text6.focus();	
  document.proceso.Text7.focus();
document.proceso.Text8.focus();
 document.proceso.Text9.focus();				
   		//window.history. go(-1);
   		
   	//	regresa pagian anterior 
   	///  window.history. go( -1); 
   		}
    
  
             rs1 = document.proceso.rs.value = (tr);  
     // document.proceso.rs.value;  
       
          if (rs1<'100'){ 
   document.proceso.rs.style.color = "Red"  
   }  else  { 
 document.proceso.rs.style.color = "blue"  }   
            
                

 //  if (leu2==''&&lin2==''){ document.proceso.chek.value = ('error') 
 //  document.proceso.chek.style.color = "Red"  
 //   }  else if (tr >'')  { document.proceso.chek.value = ('bien'); 
// document.proceso.chek.style.color = "blue"  }   
     }
    
  
    
    function NoSumar(){  
          clearInterval(interval);  
    }  
    
</script>	
    	



