<?php session_start();  
   
   require("recursos/funciones.php");
   $conexion = Conectarse();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IT Analytics - Inicio de Sesión</title>
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
	margin-top:1295px;
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



.contenedor_inicio{
   position:absolute;
   width:600px;
   height:205px;
   border:1px solid #535353;
   margin-top:250px;
   margin-left:375px;	
}

.conte_titulo{
   float:left;
   width:550px;
   height:20px;
   /*border:1px solid #CCC;*/
   margin-top:15px;
   margin-bottom:5px;
   margin-left:25px;		
   font-family: 'Open Sans Condensed', sans-serif;
   color:#CCC;
   font-weight:bold;
   text-align:center;
   font-size:14px;
   line-height:20px;
}

.conte_boton{
   float:left;
   width:550px;
   height:30px;
 /*  border:1px solid #CCC;*/
   margin-top:5px;
   margin-bottom:5px;
   margin-left:25px;		
   font-family: 'Open Sans Condensed', sans-serif;
}

.conte_dato{
   float:left;
   width:550px;
   height:auto;
  /* border:1px solid #CCC;*/
   margin-bottom:10px;
   margin-left:25px;	
   	
}

.nombre_dato{
   float:left;
   width:550px;
   height:20px;
   line-height:20px;
   font-size:14px;
  /* border-bottom:1px solid #CCC;	*/
   font-family: 'Open Sans Condensed', sans-serif;	
   color:#CCC;
}

.campo_dato{
   float:left;
   width:550px;
   height:28px;
}

.campo{
  position:absolute;
  margin:0px;
  width:546px;
  height:22px;
  color:#333;
  font-size:14px;
   font-family: 'Open Sans Condensed', sans-serif;	  	
}

.boton{
  margin-left:220px;
  width:100px;
  height:25px;	
  cursor:pointer;
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

</style>
</head>
<?php
    if(isset($_POST["boton"])){
        $con=Conectarse();
		$sql_consulta="select * from users where login='".$_POST["usuario"]."' and password='".$_POST["contra"]."'";
		$result=pg_exec($con,$sql_consulta);
		$cuenta=pg_num_rows($result);
		
		if($cuenta==0){
			?>
            <script type="text/javascript" language="javascript">
			    alert("Usuario o Contraseña Incorrectos");
			</script>
            <?php
		}else{
		   $arreglo=pg_fetch_array($result,0);	
		   if($arreglo[5]==1){
			   $_SESSION["administrador"]=$arreglo[0];
			   $_SESSION["login_administrador"]=$arreglo[2];
			   ?>
               <script type="text/javascript" language="javascript">
			      location.href="menuadmin.php";
			   </script>
               <?php			   
		   }
		   if($arreglo[5]==2){
			   $_SESSION["usuario"]=$arreglo[0];
			   $_SESSION["login_usuario"]=$arreglo[2];
			   ?>
               <script type="text/javascript" language="javascript">
			      location.href="Dashboard.php";
			   </script>
               <?php
		   }
		}
		


	}
?>

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
</script>

<body>
	<div class="contenedor_dashboard" id="contenedor_dashboard" >
	<div class="barra" id="barra" ><img id="banner" src="recursos/imagenes/banner.png" width="1335" height="69" /></div>

<div class="separador1" id="separador1"></div>
    <form onsubmit="return validar_ingreso(this)" name="form1" id="form1" method="post">
    
    	<div class="contenedor_inicio" id="contenedor_inicio">
        	<div class="conte_titulo" id="conte_titulo">Ingrese sus datos para iniciar sesion</div>
        	<div class="conte_dato" id="conte_dato1">
            	<div class="nombre_dato" id="nombre_dato1">Usuario:</div>
                <div class="campo_dato" id="campo_dato1"><input type="text" name="usuario" id="usuario" class="campo"/></div>
            </div>
        	<div class="conte_dato" id="conte_dato2">
            	<div class="nombre_dato" id="nombre_dato2">Contraseña:</div>
                <div class="campo_dato" id="campo_dato2"><input type="password"  name="contra" id="contra" class="campo"/></div>
            </div>
            <div class="conte_boton" id="conte_boton"><input type="submit" i name="boton" id="boton" value="Entrar" class="boton" /></div>
        </div>
   
    </form>        					
	<div class="pie_pagina" id="pie_pagina" >Copyright 2013 JC Global Resources LLC | contacto@jcgr.net </br></div>
    </div>
    
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
	completa(ancho,"contenedor_inicio",600,205,250,375); 	
		   
	document.getElementById("conte_dato1").style.marginLeft=parseInt((((ancho)*25)/1366))+"px"; 
	document.getElementById("conte_dato1").style.marginBottom=parseInt((((ancho)*10)/1366))+"px"; 
	document.getElementById("conte_dato1").style.width=parseInt((((ancho)*550)/1366))+"px";	
	document.getElementById("conte_dato2").style.marginLeft=parseInt((((ancho)*25)/1366))+"px"; 
	document.getElementById("conte_dato2").style.marginBottom=parseInt((((ancho)*10)/1366))+"px"; 
	document.getElementById("conte_dato2").style.width=parseInt((((ancho)*550)/1366))+"px";	
	document.getElementById("nombre_dato1").style.width=parseInt((((ancho)*550)/1366))+"px";	
	document.getElementById("nombre_dato1").style.height=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("nombre_dato1").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";       
	document.getElementById("nombre_dato1").style.fontSize=parseInt((((ancho)*14)/1366))+"px";  	
	document.getElementById("nombre_dato2").style.width=parseInt((((ancho)*550)/1366))+"px";	
	document.getElementById("nombre_dato2").style.height=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("nombre_dato2").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";       
	document.getElementById("nombre_dato2").style.fontSize=parseInt((((ancho)*14)/1366))+"px";  		
	document.getElementById("campo_dato1").style.width=parseInt((((ancho)*550)/1366))+"px";	
	document.getElementById("campo_dato1").style.height=parseInt((((ancho)*28)/1366))+"px";	
	document.getElementById("campo_dato2").style.width=parseInt((((ancho)*550)/1366))+"px";	
	document.getElementById("campo_dato2").style.height=parseInt((((ancho)*28)/1366))+"px";						   			
	document.getElementById("conte_boton").style.width=parseInt((((ancho)*550)/1366))+"px";	
	document.getElementById("conte_boton").style.height=parseInt((((ancho)*30)/1366))+"px";	
	document.getElementById("conte_boton").style.marginTop=parseInt((((ancho)*5)/1366))+"px";	
	document.getElementById("conte_boton").style.marginLeft=parseInt((((ancho)*25)/1366))+"px"; 
	document.getElementById("conte_boton").style.marginBottom=parseInt((((ancho)*5)/1366))+"px"; 			
	document.getElementById("boton").style.marginLeft=parseInt((((ancho)*220)/1366))+"px";     
	document.getElementById("boton").style.width=parseInt((((ancho)*100)/1366))+"px";	
	document.getElementById("boton").style.height=parseInt((((ancho)*25)/1366))+"px"; 
	
	document.getElementById("usuario").style.fontSize=parseInt((((ancho)*14)/1366))+"px";  		
	document.getElementById("usuario").style.width=parseInt((((ancho)*546)/1366))+"px";	
	document.getElementById("usuario").style.height=parseInt((((ancho)*22)/1366))+"px";	 
	
	document.getElementById("contra").style.fontSize=parseInt((((ancho)*14)/1366))+"px";  		
	document.getElementById("contra").style.width=parseInt((((ancho)*546)/1366))+"px";	
	document.getElementById("contra").style.height=parseInt((((ancho)*22)/1366))+"px";	
	
	document.getElementById("conte_titulo").style.width=parseInt((((ancho)*546)/1366))+"px";	
	document.getElementById("conte_titulo").style.height=parseInt((((ancho)*22)/1366))+"px";		  
    document.getElementById("conte_titulo").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";       
	document.getElementById("conte_titulo").style.fontSize=parseInt((((ancho)*14)/1366))+"px";   
   
    completa(ancho,"pie_pagina",1320,20,630,15);
    document.getElementById("pie_pagina").style.lineHeight=parseInt((((ancho)*14)/1366))+"px";
    document.getElementById("pie_pagina").style.fontSize=parseInt((((ancho)*12)/1366))+"px"; 
    document.getElementById("pie_pagina").style.paddingTop= parseInt((((ancho)*10)/1366))+"px"; 	
    </script>

</body>
</html>