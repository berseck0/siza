<script type="text/javascript">
  $(document).on("ready",function(){
	  
	 $(".boton").click(function(){
	  var nombrec = $("#nombrec").val();
	  var emailc = $("#emailc").val();
	  var message = $("#message").val();
	  var inf = "nombrec="+nombrec+"&emailc="+emailc+"&message="+message;
	  var archivo="mensajes.php";
		if(nombrec == ""){
			alert("Escriba su nombre por favor.");
			return false;
			} else if(emailc == ""){
				alert("Escriba su correo electronico.");
				return false;
				} else if(message ==""){
					alert("No escribio el mensaje.");
					return false;
					} else{
	  $.ajax({
		  type:"POST",
		  url: archivo,
		  data: inf,
		  success: function(respuesta){
			 if(respuesta == "No puedes acceder directamente"){
				 alert("Debes rellenar todos los campos");
				 return false;
				 }
			if(respuesta == "Error"){
				alert("Hubo un error al enviar el feedback");
				return false;
				}  
			  },
			  error: function(respuesta){
				  alert("hubo un problema con el servidor");
			  }
		  }); }
	});


$("#pass").keypress(function (e) {
    if (e.which == 13) {
       logeos();
    }
});

$("#cabecera").keypress(function(e) {
	if(e.which == 39){
		alert("hola");
	}
});

$(".btn1").on("click",logeos);

	function logeos(){

		  var user = $("#user").val();
		  var pas = $("#pass").val();
		  var loged ="user="+user+"&pass="+pas;
		  var loge="includes/valida.php";
		$.ajax({
		  type:"POST",
		  url:  loge,
		  data: loged,
		  success: function(resp){
				//document.location.href="index.php";
				if(resp=="Exito session iniciada"){
					document.location.href="index.php";
				}else{

					var d2 ="Error de datos";
					//document.getElementById("error").style.display="block";
					$("#error").fadeIn(800);
					$("#error").html(d2);
					$("#error").fadeOut(5000);
				}
			 	return false;
			  },
			  error: function(resp){
				// alert("error no se pudo iniciar");
					return false;
			  }
		  });
	}


/*	$(".reg").click(function(){			document.location.href="index.php?d=4&p=2";	});*/
		 $(".reg").click(function(){
		 	  var titulo = $("#titulo").val();
			  var nombre = $("#nombre").val();
			  var edad = $("#edad").val();
			  var tiempo = $("#tiempo").val();
			  var telefono = $("#telefono").val();
			  var correo = $("#correo").val();
			  var empresa = $("#empresa").val();
			  var ocupacion = $("#ocupacion").val();
			  var fechareg = $("#fechareg").val();
			  var direccion = $("#direccion").val();
			  var localidad = $("#localidad").val();
			  var colonia = $("#colonia").val();
			  var sexo = $("#sexo").val();
			  var fur= $("#fur").val();

		 	 var dataUsr = "titu="+titulo+"&nom="+nombre+"&col="+colonia+"&edad="+edad+"&tiempo="+tiempo+"&telefono="+telefono+"&correo="+correo+"&empresa="+empresa+"&ocupacion="+ocupacion+"&fecha="+fechareg+"&direccion="+direccion+"&localidad="+localidad+"&sexo="+sexo+"&op=1&fur="+fur;
			 var direcion = "moduls/regClientes.php";

		$.ajax({
		  type:"POST",
		  url:  direcion,
		  data: dataUsr,
		  success: function(solicitud){
				document.location.href="index.php?d=4&p=2&i="+solicitud;
				return false;
				},
			error: function(solicitud){
				alert("no se envio");
				document.location.href="index.php?d=4";
				return false;
				}
				});
			  });
	$(".update").click(function(){
  			  var titulo = $("#titulo").val();
			  var nombre = $("#nombre").val();
			  var edad = $("#edad").val();
			  var tiempo = $("#tiempo").val();
			  var telefono = $("#telefono").val();
			  var correo = $("#correo").val();
			  var empresa = $("#empresa").val();
			  var ocupacion = $("#ocupacion").val();
			  var fechareg = $("#fechareg").val();
			  var direccion = $("#direccion").val();
			  var localidad = $("#localidad").val();
			  var colonia = $("#colonia").val();
			  var sexo = $("#sexo").val();
			  var fur= $("#fur").val();
		 	 var dataUsr = "titu="+titulo+"&nom="+nombre+"&col="+colonia+"&edad="+edad+"&tiempo="+tiempo+"&telefono="+telefono+"&correo="+correo+"&empresa="+empresa+"&ocupacion="+ocupacion+"&fecha="+fechareg+"&direccion="+direccion+"&localidad="+localidad+"&sexo="+sexo+"&op=2&fur="+fur;
			 var direcion = "moduls/regClientes.php";

		$.ajax({
		  type:"POST",
		  url:  direcion,
		  data: dataUsr,
		  success: function(solicitud){
				document.location.href="index.php?d=4&p=2&i="+solicitud;
				return false;
				},
			error: function(solicitud){
				alert("no se envio");
				document.location.href="index.php?d=4";
				return false;
				}	
				});

	});

		$(".doc").submit(function(){	  	
		var datosdoc = $(this).serialize();//alert(datosdoc);
		var liga = "includes/reg.php?r=1";		
		$.post(liga,datosdoc,function(doc){
			$('#for2').find('form').slideUp('normal',function(){
				$('#res').html(doc);
					});    setInterval(function() {
   					 $('#for2').find('form').slideDown('normal', function(){
   					 	$('#res').html(doc);
   					 });
					},   2500); });return false;});

		$(".emp").submit(function(){
			var datosemp = $(this).serialize();
			var liga = "includes/reg.php?r=2";
			$.post(liga,datosemp,function(emp){
				$('#for2').find('form').slideUp('normal',function(){
					$('#res').html(emp);
				});setInterval(function() {
   					 $('#for2').find('form').slideDown('normal',function(){
   				 	document.getElementById("res").style.display="none";
   					 });
					},   1000);
			});return false;
		});
});/*---------------------fin del prime inicioo------------------------------------------------
*/

$(document).on("ready", moviendo)
function moviendo(){
	$(".liga").on("click", mover);
}
function mover(ids){
var mov=ids.currentTarget.id;

		switch (mov) {
		 	case 'registro':
		 	document.getElementById('for2').style.display="block";
			document.getElementById('lista').style.display="none";
		  break
			case 'lista2':
			document.getElementById('lista').style.display="block";
			document.getElementById('for2').style.display="none";
			setInterval(function() {
		    					$("#lista").load(location.href+" #lista>*","");
									},   1500);
		  break
		  	case 'LisPrecio':
		  	document.getElementById('LisPrecios').style.display="block";
			document.getElementById('RegPrecios').style.display="none";
			buscalista();
		  	break
		  	case 'RegPrecio':
		  	document.getElementById('RegPrecios').style.display="block";
			document.getElementById('LisPrecios').style.display="none";
		  	break
			}
}
/* registro de analisis con sus valores dereferencia*/
$(document).on("ready",selec)
function selec(){
	$("#seleccion").on("select",selecto);
}
function selecto(){
	//var otro =document.aki.opcion[document.aki.opcion.selectedIndex].value;
	var os = $("#seleccion").val();

	if(os== "numerico"){
		document.getElementById('v').style.display="block";
		document.getElementById('estud').style.display="none";
		$("#plantilla").attr('value', '1');
		$("#estud :text").each(function(){
			$($(this)).val('');
	});
	}else if(os == "Estudio"){
		document.getElementById('estud').style.display="block";
		document.getElementById('v').style.display="none";
		$("#plantilla").attr('value', '2');
		$("#v :text").each(function(){
			$($(this)).val('');
	});
	}
}
$(document).on("ready",elige)
function elige(){
	$("#elegido").on("select",elegido)
}
function elegido(){
	var m = $("#titulo option:selected").text();
	alert(m);
}

//registro de los precios en los analisis ***moduls/reg_analisis.php
$(document).on("ready",registra)
function registra(){
	$("#RegPrecios .sas").on("click",regis2);
}
function regis2(){
	//var met = $('#inicio').attr('method');
	var precios = $("form").serialize();
	var liga = "moduls/reg_analisis.php";
		$.ajax({
		url:liga,
		type:"POST",
		data:precios,
			success:function(respuesta){

					if(respuesta == 'exito'){
						$("#actualizado").fadeOut(1000);
						setInterval(function() {
    					$("#actualizado").load(location.href+" #actualizado>*","");
							},   1500);
   						$("#actualizado").fadeIn(1000); 
   					}else{
   						alert(respuesta);
   					}

					return false;
					},
			error:function(respuesta){
					alert(respuesta);
					return false;
					}
					});
	}
////////////////////////////////////////////////////////
//registro de los analisis y sus valores de ref
//////////////////////////////////////////////////
$(document).on("ready",reg_anal)
		function reg_anal(){
			$("#RegAnal") 	.on("click",registro);
			$("#RegAnal2") 	.on("click",registro);
			$("#altestudio").on("click",showreg);
			$("#modestudio").on("click",showmodes);
			$("#altpaquete").on("click",showpaq);
			$("#modpaquete").on("click",showmodpa);
			$('#btn_lis') 	.on("click",agregalis);
			$("#reg_paq") 	.on("click",regpaque);
			$("#btn_paq") 	.on("click",regana_paq);
			$("#mod_paq_btn").on("click",mod_paq);
		}
	function showreg(){
		 	document.location.href="index.php?d=1&p=2&ide=1";
	}
	function showpaq(){
			document.location.href="index.php?d=1&p=2&ide=2";
	}
	function showmodpa(){
			document.location.href="index.php?d=1&p=2&ide=3";
	}
	function showmodes(){
			document.location.href="index.php?d=1&p=2&ide=4";
	}
function registro(){
	var datos_analis = $("form").serialize();
	var liga 	=	"includes/reg_analis.php";
	var id_an 	=	$("#an_p").val();
	var tip_anal 	= $("#plantilla").val();	
	var nom_analis 	= $("#bs_analis1").val();
	$.ajax({
		url:liga,
		type:"POST",
		data:datos_analis,
			success:function(respuesta){
					if(respuesta == 'exito'){
						var url 	=	"includes/lista_analsis_alta.php";
						var texto	=	"sid="+id_an+"&tip="+tip_anal+"&nom="+nom_analis;
						$.post(url,texto, function(data) {
							if(data.length>0){
								$("#agregado").fadeOut(50);
								$("#agregado").html(data);
								$("#agregado").fadeIn(950); 
							}
						});
   						
   					}else{
   						alert(respuesta);
   					}

					return false;
					},
			error:function(respuesta){
					alert(respuesta);
					return false;
					}
					});

}

function agregalis(){
	var dato = $("#an_p1").val();
	var anali= $("#an_p").val();
	var liga ="includes/RegGrupos.php";
	var text="an="+dato+"&op=1&an2="+anali;
	$.post(liga,text,function(data){
		if(data == 'exito'){
			var ruta 	=	"includes/lista_analsis_alta.php";
			var nombre 	=	$("#bs_analis1").val();
			var txt 	=	"tip=3&sid="+dato+"&nom="+nombre;
			$.post(ruta,txt, function(data){
					if(data.length>0){
						$("#agregado").fadeOut(950);
						$("#agregado").html(data);
						$("#agregado").fadeIn(950); 
					}
			});						
   		}else{
   			alert(data);
   		}
	});
}


function regpaque(){
	var cost 	= 	$("#precio").val();
	var nom 	= 	$("#nompaq").val();
	var ruta  	= 	"includes/reg_paquetes.php";
	var text 	= 	"nom="+nom+"&co="+cost+"&op=1";

	$.post(ruta ,text, function(data) {
		if (data.length>0) {
			alert(data);
			$("#precio").attr('value', '');
			$("#nompaq").attr('value', '');
		};
	});
}
function regana_paq(){

	var analis 	= 	$("#an_p1").val();
	var dato 	=	$("#an_p").val();
	var liga 	= 	"includes/RegGrupos.php";
	var text 	= 	"an="+analis+"&an2="+dato+"&op=2";
	var nombre = 	$("#bs_paq").val();
	$.post(liga,text,function(data){

		if(data == 'exito 2'){
			 var ruta 	=	"includes/lista_analsis_alta.php";
			 var txt 	= 	"tip=3&sid="+analis+"&nom="+nombre;
			
			 $.post(ruta,txt, function(dat){
			
			 	 if(dat.length>0){
			 	 	$("#agregado").fadeOut(950);
			 	 	$("#agregado").html(dat);
			 	 	$("#agregado").fadeIn(950);	
			 	 }
			 });
		}else{
			alert(data +" "+ nombre);
		}
	});
}

function mod_paq(){
	
	var paq_id	=	$("#an_p1").val();
	var nom_pa	=	$("#bs_paq").val();
	var pre 	=	$("#pa_pre").val();
	var liga	=	"includes/modificar_datos_analis.php";
	var txt 	=	"op=1&idan="+paq_id+"&pak="+nom_pa+"&co="+pre;
	$.post(liga,txt, function(data) {
		if(data.length>0){
			$(".paq_selec").slideDown("normal");
			$("#paq_mod").html(data);
		}else{
			$(".paq_selec").show();
			$("#paq_mod").html(data);
		}
	});
}
//fin reg_analisis
////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on("ready",share)
function share(){
	$("#buscar").on("keyup",buscaClien);
	$("#buscar").on("keyup",buscaAnalisis);
	$("#doctor_shar").on("keyup",buscadoc);
	$("#bs_analisis").on("keyup",bus_ana);
	$("#bs_analis1").on("keyup",bs_anali);
	$("#buscarlista").on("keyup",buscalista);
	$("#bs_paq").on("keyup",buspaq);
	
}

function sas(){
		var da = $("#buscar").val();
		if(da.length==""){
			alert("No hay nombre de cliente");
		}else{
		document.location.href="index.php?d=4&p=2&e="+da;}
	}

function historial(){
		var da = $("#buscar").val();
		document.location.href="index.php?d=4&p=3&e="+da;
	}

function buscaClien(){
     var buscar=$("#buscar").val();
	if(buscar.length<=0){
		$("#listado").hide();
		$("#listado").css("display","none");
	}else if(buscar.length>=2){
			var liga = "includes/buscar.php";
			var text = "trm="+buscar+"&l=1";
		$.post(liga,text,function(data){
					if(data.length>0){
							$("#listado").show();
							$("#listado").html(data);
						}else{
							$("#listado").hide();
							$("#listado").css("display","none");
						}
					});
			}
	}
function buscadoc(){
	var buscar = $("#doctor_shar").val();
		if(buscar.length<=0){
			$("#doc").hide();
			$("#doc").css("display","none");
		}else{
		var liga="includes/buscar.php";
		var text="dc="+buscar+"&l=3";
		$.post(liga,text,function(data){
				if(data.length>0){
					$("#doc").show();
					$("#doc").html(data);
				}else{
					$("#doc").hide();
					$("#doc").css("display","none");
				}
			});
		}
	}

function fill(thisValue) {
		$('#buscar').val(thisValue);
		setTimeout("$('#listado').hide();", 200);
	}

function bus_ana(){
	var buscar = $("#bs_analisis").val();
	if(buscar.length<=0){
		$(".menulista2").hide();
		$(".menulista2").css("display","none");
		}else{
			var liga="includes/buscar.php";
			var text="an="+buscar+"&l=4";
			$.post(liga,text,function(data){
				if(data.length>0){
					$(".menulista2").show();
					$("#bs_analis_ul").html(data);
				}else{
					$(".menulista2").hide();
					$(".menulista2").css("display","none");
				}
			});
		}
	}
function fly(nombre){
	var n=nombre.split(",");
	$('#bs_analisis').val(n[1]);
	setTimeout("$('.menulista2').hide();",200);
	$("#an_p").attr('value', n[0]);
}
/////////
function bs_anali(){
	var buscar = $("#bs_analis1").val();
	if(buscar.length<=0){
		$("#menulista").hide();
		$("#menulista").css("display","none");
		}else{
			var liga="includes/buscar.php";
			var text="an="+buscar+"&l=5";
			$.post(liga,text,function(data){
				if(data.length>0){
					$("#menulista").show();
					$("#bs_analis").html(data);
				}else{
					$("#menulista").hide();
					$("#menulista").css("display","none");
				}
			});
		}
	}
function NaFl(nom){
	var n=nom.split(",");
	$('#bs_analis1').val(n[1]);
	setTimeout("$('#menulista').hide();",200);
	$("#an_p1").attr('value', n[0]);//paso el id del analisis seleccionado
}

function buscaAnalisis(){
	var buscar=$("#buscar").val();
	var liga = "includes/buscar.php";
	var txt = "analisis="+buscar+"&l=2";
	$.post(liga,txt,function(data){
					if(data.length>0){
						$("#listado").show();
						$("#solisitudListado").html(data);
									}
									});
}
function flip(nombre){
	$('#doctor_shar').val(nombre);
	setTimeout("$('#doc').hide();", 200);
}

function buscalista(){
	var buscar 	= $("#buscarlista").val();
	var liga 	= "includes/buscar.php";
	var txt 	= "analisis="+buscar+"&l=6";
	$.post(liga,txt,function(data){
					if(data.length>0){
						$("#lis_pre").html(data);
									}
						});
}
//////////////////////////////////
///buscador de paquetes
///disparador 365
///////////////////////////////
function buspaq(){
	var buscar = $("#bs_paq").val();
	if(buscar.length<=0){
		$("#menulista").hide();
		$("#menulista").css("display","none");
	}else{
	var nom 	= 	$("#bs_paq").val();
	var liga 	= 	"includes/buscar.php";
	var txt 	= 	"paq="+nom+"&l=7";

	$.post( liga, txt, function(data) {
		 if (data.length>0) {
		 			$("#menulista").show();
					$("#bs_analis").html(data);
				}else{
					$("#menulista").hide();
					$("#menulista").css("display","none");
				}
	});
	}
}
function NaPa(nombre){
	var n 	= 	nombre.split(",");
	$('#bs_paq').val(n[1]);
	setTimeout("$('#menulista').hide();",200);
	$("#an_p1").attr('value', n[0]);//paso el id del analisis seleccionado
	$("#pa_pre").attr('value',n[2]);
}





/////////////////////////////////////////////////////////////////////////////
///
/*-----elimina doctores------*/
function eliminadoc(dato){
	var liga="moduls/eliminar.php";
	var text="dc="+dato+"&op=1";
	$.post(liga,text,function(data){
	});
}
function emp_dell(dato){
	var liga="moduls/eliminar.php";
	var text="emp="+dato+"&op=2";
	$.post(liga,text,function(data){
	});
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on("ready",clienstopcion)
	function clienstopcion(){
		$('#titulo').change(function(){
			var n = $("#titulo").val();
			sexselc(n);
		});
	}
function sexselc(titulo){
	var n=titulo;
  switch(n){
  	case "Sra.":
  	case "Srita.":
  	case "niña":
  	$("#sexo option[value='Femenino']").attr("selected",true);
  	$(".fur").css("display","block");
	$(".fur").slideDown("slow");
  	break;
  	case "Sr.":
  	case "joven":
  	case "niño":
  	$("#sexo option[value='Masculino']").attr("selected",true);
  	$(".fur").css("display","none");
  	$(".fur").fadeOut(3000);
  	break;
  }

}

function datosClienteProcesar(nombre){
	var datos="id="+nombre;
	var liga ="includes/buscaDatosCliente.php";
	$.post(liga,datos,function(resp){

			var dato = resp.split(",");
			var myVal=dato[0];
			var sex=dato[12];
			var tmp=dato[3];
			sexselc(myVal);
			$("#titulo option[value='"+myVal+"']").attr("selected",true);
			$("#nombre").val(dato[1]);
			$("#edad").val(dato[2]);
			$("#tiempo option[value="+tmp+"]").attr("selected",true);
			$("#telefono").val(dato[4]);
			$("#correo").val(dato[5]);
			$("#empresa").val(dato[6]);
			$("#ocupacion").val(dato[7]);
			$("#fechareg").val(dato[8]);
			$("#direccion").val(dato[9]);
			$("#colonia").val(dato[10]);
			$("#localidad").val(dato[11]);
			$("#sexo option[value="+sex+"]").attr("selected",true);
			//$("#sexo").val(dato[12]);
			$(".reg").css("display","none");
			$(".update").css("display","block");
			$(".bus_clie span").css("display","block");
	});
}


function posclr(){
	$(".clr").each(function(){	
	$($(this)).val('');
	});
	$('.clr').focus();
}
function descuento(desconton,opcion){
						var ds = "ams="+desconton+"&ops="+opcion;
						var ls = "moduls/procesos.php";
						$.get(ls,ds,function(data){
    					$("#dsd").html(data);
						});
}
function cobroref(folio){
				var ds = "fl="+folio;
				var ls = "moduls/cobro.php";
				$.get(ls,ds,function(data){
    			$("#total_s").val(data);
				});

}
$(document).on("ready",oculta)
function oculta(){
	$(".operaciones").css("display","none")
}
function visibiliti(){
	if ($(".operaciones").css("visibiliti","hidden")) {
			$(".operaciones").slideDown("slow");
		} else {
		$(".operaciones").hide();
		}
}
//registro de los analisis para la solicitud
function Registro22(analisis){
	var palabras = analisis.split(",");
	var nombre 	 =palabras[0];
	var costo 	 =palabras[1];
	var id 		 =palabras[2];
	var opcion 	 =1;
	var solicitud   = document.getElementById("id_solis").innerHTML;
	var nombre_cli  = document.getElementById("nom_clie").innerHTML;
	var id_clie 	= document.getElementById("id_clie").innerHTML;
	var fecha 		= document.getElementById("fecha").innerHTML;
	var doc 		= $("#doctor_shar").val();
	var liga		="moduls/reg_sol_analis.php";
	var texto 		="nombre="+nombre+"&costo="+costo+"&id="+id+"&solis="+solicitud+"&doc="+doc+"&ac=1&nomcl="+nombre_cli+"&idcl="+id_clie;
	$.post(liga,texto,function(data){
			if(data==solicitud){
				var ls ="includes/list_analisisProceso.php";
				var ds = "fol="+solicitud;
				$.get(ls,ds,function(data2){
				$(".lis2").html(data2);
					});
						posclr();
						visibiliti();
						descuento(solicitud,opcion);
						cobroref(solicitud);
   					}if(data!=solicitud){
   						alert(data);
   					}
			});
}
//fin de registro
function eliminaSolicitud(datos){
	var serie = datos.split(",");
	var id_analis = serie[0];
	var folio = serie[1];
	var nombrcl=serie[2];
	var opcion=1;
	var liga="includes/elimina_analisisProceso.php";
	var datos ="id_1="+id_analis+"&id_2="+folio;
	$.post(liga,datos,function(data){
		if(data="Exito"){
				var ls ="includes/list_analisisProceso.php";
						var ds = "fol="+folio;
						$.get(ls,ds,function(data2){
						$(".lis2").html(data2);
						});
    			descuento(folio,opcion);
    			cobroref(folio);
		}
	});

}/*-----proceso dedescuentos -------------------------------------------------------------*/


function desconta2(){
	var liga="moduls/procesos.php?ops=2";
	var datos = $("form").serialize();
	var folio = $("#fol_io").val();
	$.post(liga,datos,function(data){
		if(data="Exito"){
			var opcion = 1;
			descuento(folio,opcion);
			cobroref(folio);
		}else{
			alert(data);
		}
	});
}


function cortesia1(){
	var liga="moduls/procesos.php?ops=3";
	var datos = $("#cortesias").serialize();
	var folio = $("#fol_io").val();
	$.post(liga,datos,function(data){
		if(data="Exito"){
			var opcion = 1;
			descuento(folio,opcion);
			cobroref(folio);
		}
	});
}

function cortesia2(){
	var liga="moduls/procesos.php?ops=4";
	var datos = $("#cortesias").serialize();
	var folio = $("#fol_io").val();
	$.post(liga,datos,function(data){
		if(data="Exito"){
			var opcion = 1;
			descuento(folio,opcion);
			cobroref(folio);
		}
	});
}

function eliminadesc(ids){
	var serie = ids.split(",");
	var id = serie[0];
	var fol = serie[1];	
	var liga="moduls/procesos.php?ops=5";
	var datos="id="+id+"&fol="+fol;

	$.post(liga,datos,function(data){
		if(data="Exito"){
			var opcion = 1;
			descuento(fol,opcion);
			cobroref(fol);

		}
	});
}

function eliminacortes(id){
	var serie = id.split(",");
	var id = serie[0];
	var fol = serie[1];
	var liga="moduls/procesos.php?ops=6";
	var datos="id="+id+"&fol="+fol;

	$.post(liga,datos,function(data){
		if(data="Exito"){
			var opcion = 1;
			descuento(fol,opcion);
			cobroref(fol);
		}
	});
}


$(document).on("ready",registrototal)
function registrototal(){
	$("#cobrototal").on("click",regis)
	$("#cancelsolis").on("click",dellanalis)
}
function regis(){
	var solicitud   = document.getElementById("id_solis").innerHTML;
	var nombre_cli  = document.getElementById("nom_clie").innerHTML;
	var id_clie 	= document.getElementById("id_clie").innerHTML;
	var fecha 		= document.getElementById("fecha").innerHTML;
	var furs		= $("#fur").val();
	var doc 		= $("#doctor_shar").val();
	var cos_total	= $("#total_s").val();
	var cobr_total 	= $("#cobro_s").val();
	var datos="fl="+solicitud+"&nc="+nombre_cli+"&icl="+id_clie+"&fur="+furs+"&fc="+fecha+"&dc="+doc+"&cstal="+cos_total+"&cbtal="+cobr_total;
	var liga="moduls/registroTotalSolis.php"
	$.post(liga,datos,function(resp){
		if(resp=="Exito"){
			document.location.href="index.php?d=0&k=1&idcl="+id_clie+"&cb="+solicitud;
		}else{
			alert(resp);
		}

	});
}


function dellanalis(){
	var solicitud   = document.getElementById("id_solis").innerHTML;
	var dat="fl="+solicitud;
	var liga="moduls/eliminaSolisAnalisis.php";
	$.post(liga,dat,function(resp){
		if(resp=='Exito'){
			document.location.href="index.php?d=4";
		}else{
			alert(resp);
		}
	});

}
//proceso de resultados de analissi
$(document).on("ready",oculta2)
function oculta2(){
	$("#proceso_de_registro").css("display","none")
}
function visibiliti2(){
	if ($("#proceso_de_registro").css("visibiliti","hidden")) {
			$("#proceso_de_registro").slideDown("slow");
		} else {
		$("#proceso_de_registro").hide();
		}
}
function procesanalisis(id,nombre){
	var id_an=id;
	var fol=nombre;
	var datos ="id="+id_an+"&fol="+fol;
	var liga="moduls/cajas_analisisProcesos.php";

	$.post(liga,datos,function(resp){
		$("#proceso_de_registro").html(resp);
		visibiliti2();
	});
}
//////////////////////////////////////////////////////
///		tabla de lista de solicitudes
///		
/////////////////////////////////////////////////////
function altasolis(dato){
	var liga="moduls/eliminar.php";
	var text="fl="+dato+"&op=3";
	$.post(liga,text,function(data){
		if (data=="exito") {
		document.location.href="index.php";
		}
	});
}


  </script>
