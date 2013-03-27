<?php session_start();  
   
   if($_SESSION["administrador"]==NULL){
	 ?>
     	<script type="text/javascript" language="javascript">
		    location.href="index.php";
		</script>
     <?php   
   }
   
   require("recursos/funciones.php");
   $conexion = Conectarse();
   
     
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IT Analytics - Menú Administrador</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css' />
<style type="text/css">

body{
 	margin:0px;
	background:#383739;
}
.contenedor_dashboard{	
	margin-left:auto;
	margin-right:auto;
	/*margin:0px;*/
	height:630px;
	width:1335px;
	border-bottom:1px solid #535353;
	/*background:#F00;*/
}
.barra{
	position:absolute;
    width:1335px;
	height:69px;
	background:#FFF;
	margin-top:10px;
	margin-left:0px;
}

.pie_pagina{
	position:absolute;
    width:1320px;
	height:20px;
	/*background:#3C6;*/
	margin-top:630px;
	margin-left:15px;
	/*border-bottom:1px solid #999;
	border-top:1px solid #999;*/
	font-size:12px;
	line-height:14px;
	text-align:center;	
	padding-top:10px;
	color:#009ee1;
}


.separador1{
    position:absolute;
	margin-top:80px;
	height:25px;
	width:1335px;
	margin-left:0px;
	border-bottom:1px solid #535353;
	z-index:0;	
	/*background:#F00;	*/
}

.icon_user{
  float:right;
  width:22px;
  height:22px;
  margin-top:2px;
}

.name_user{
  float:right;
  width:auto;
  padding-left:3px;
  padding-right:3px;
  height:20px;
  margin-top:2px;
  line-height:20px;
  color:#009ee1;	
  font-family: 'Open Sans Condensed', sans-serif;	  
  font-size:14px;
 /* background:#CCC;*/
}

.cuerpo{
    position:absolute;
	margin-top:165px;
	margin-left:0px;
	width:1366px;
	height:470px;
	border-bottom:1px solid #999;	
}

.menu{
    position:absolute;
	margin-top:106px;
	width:250px;
	height:523px;
	border-right:1px solid #535353;	
}

.opcion_menu{
    float:left;
	width:245px;
	height:20px;
	border-bottom:1px solid #535353;
	font-family: 'Open Sans Condensed', sans-serif;	
	font-size:14px;
	line-height:20px;
	padding-left:5px;
	color:#CCC;
}

.titulo_menu{
    float:left;
	width:250px;
	height:20px;
	border-bottom:1px solid #535353;
	font-family: 'Open Sans Condensed', sans-serif;	
	font-size:14px;
	line-height:20px;
	text-align:center;
	font-weight:bold;
	color:#CCC;
	background:#333;
}

.opcion_menu:hover{
    float:left;
	width:245px;
	height:20px;
	border-bottom:1px solid #999;
	font-family: 'Open Sans Condensed', sans-serif;	
	font-size:14px;
	line-height:20px;
	padding-left:5px;
	cursor:pointer;
    background:#009EE1;
	color:#FFF;	
}

a{
   text-decoration:none;
   color:#333;	
}
</style>
</head>


<script type="text/javascript" language="javascript">
	function validar_ingreso(formulario){
		if(formulario.usuario.value==""){
		   alert("Debe indicar su login para inciar sesión.");	
		   return false;
		}
		if(formulario.contra.value==""){
		   alert("Debe indicar su contraseña para iniciar sesión.");	
		   return false;
		}									
	}
	

function pregunta_salir(){
     var resp = confirm("Realmente desea salir de IT Analytics");
	 if(resp == true){
		 location.href="cerrarsesion.php";
	 }
}
		
</script>

<body>
    <div class="contenedor_dashboard" id="contenedor_dashboard">
	<div class="barra" id="barra"><img id="banner" src="recursos/imagenes/banner.png" width="1335" height="69" /></div>
    
    
    <div class="separador1" id="separador1">    	        
        <div class="name_user" id="cerrar" style="border-left:1px solid #666;"><label onclick="pregunta_salir()" style="cursor:pointer;">Cerrar Sesión</label></div>
    	<div class="name_user" id="usuario"><?php echo $_SESSION["login_administrador"]; ?></div>
        <div class="icon_user" id="conte_icono"> <img id="icono" src="recursos/imagenes/User-icon.png" width="22" height="22" /></div>
    </div>


		<div class="menu" id="menu">
			<?php Menu(); ?>
        </div>
   
	<div class="pie_pagina" id="pie_pagina" >Copyright 2013 JC Global Resources LLC | contacto@jcgr.net </br></div>
    </div>
</body>

	<script type="text/javascript" language="javascript">

   var ancho = screen.width;
  	
	function completa(resolucion,elemento,ancho_ele,alto_ele,marr_ele,mizq_ele){
   		document.getElementById(elemento).style.width=parseInt((((resolucion)*ancho_ele)/1366))+"px";
	   	document.getElementById(elemento).style.height=parseInt((((resolucion)*alto_ele)/1366))+"px";
	   	document.getElementById(elemento).style.marginTop=parseInt((((resolucion)*marr_ele)/1366))+"px";
	   	document.getElementById(elemento).style.marginLeft=parseInt((((resolucion)*mizq_ele)/1366))+"px";	  
	  }
  
  	function todoslosmargenes(resolucion,elemento,ancho_ele,alto_ele,marr_ele,mizq_ele,mder_ele,maba_ele){
   		document.getElementById(elemento).style.width=parseInt((((resolucion)*ancho_ele)/1366))+"px";
	   	document.getElementById(elemento).style.height=parseInt((((resolucion)*alto_ele)/1366))+"px";
	   	document.getElementById(elemento).style.marginTop=parseInt((((resolucion)*marr_ele)/1366))+"px";
	   	document.getElementById(elemento).style.marginLeft=parseInt((((resolucion)*mizq_ele)/1366))+"px"; 
		document.getElementById(elemento).style.marginRight=parseInt((((resolucion)*mder_ele)/1366))+"px";
		document.getElementById(elemento).style.marginBottom=parseInt((((resolucion)*maba_ele)/1366))+"px"; 
	  }
	  
	completa(ancho,"contenedor_dashboard",1349,630,0,0); 
   	document.getElementById("contenedor_dashboard").style.marginLeft="auto"; 
	document.getElementById("contenedor_dashboard").style.marginRight="auto";
    completa(ancho,"barra",1335,69,10,0);
    completa(ancho,"banner",1335,69,0,0);
    completa(ancho,"separador1",1335,25,80,0); 
	
    completa(ancho,"menu",250,523,106,0); 	
	
    completa(ancho,"titulo_menu",250,20,0,0);
    document.getElementById("titulo_menu").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("titulo_menu").style.fontSize=parseInt((((ancho)*14)/1366))+"px";	
	
	completa(ancho,"opcion1",245,20,0,0);	
	completa(ancho,"opcion2",245,20,0,0);
    document.getElementById("opcion1").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("opcion1").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
    document.getElementById("opcion2").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("opcion2").style.fontSize=parseInt((((ancho)*14)/1366))+"px";		
	
			  
		  
    completa(ancho,"pie_pagina",1320,20,630,15);
    document.getElementById("pie_pagina").style.lineHeight=parseInt((((ancho)*14)/1366))+"px";
    document.getElementById("pie_pagina").style.fontSize=parseInt((((ancho)*12)/1366))+"px"; 
    document.getElementById("pie_pagina").style.paddingTop= parseInt((((ancho)*10)/1366))+"px"; 	
	
    
	
	document.getElementById("cerrar").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("cerrar").style.fontSize=parseInt((((ancho)*14)/1366))+"px";	
	document.getElementById("cerrar").style.marginTop=parseInt((((ancho)*2)/1366))+"px";
	document.getElementById("cerrar").style.height=parseInt((((ancho)*20)/1366))+"px";
	
    document.getElementById("usuario").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("usuario").style.fontSize=parseInt((((ancho)*14)/1366))+"px";	
	document.getElementById("usuario").style.marginTop=parseInt((((ancho)*2)/1366))+"px";
	document.getElementById("usuario").style.height=parseInt((((ancho)*20)/1366))+"px";	
	
   	document.getElementById("conte_icono").style.width=parseInt((((ancho)*22)/1366))+"px";
	document.getElementById("conte_icono").style.height=parseInt((((ancho)*22)/1366))+"px";
	document.getElementById("conte_icono").style.marginTop=parseInt((((ancho)*2)/1366))+"px";	
	
   	document.getElementById("icono").style.width=parseInt((((ancho)*22)/1366))+"px";
	document.getElementById("icono").style.height=parseInt((((ancho)*22)/1366))+"px";		
				  
	</script>
</html>