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
<title>IT Analytics - Registrar Nuevo Usuario</title>
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

.formulario{
    position:absolute;
	margin-top:135px;
	margin-left:260px;
	width:500px;
	height:auto;
/*	border:1px solid #CCC;	*/
}

.linea_campo{
    float:left;
	width:500px;
	height:auto;
	margin-bottom:10px;	
}

.nombre_campo{
	float:left;
	width:500px;
	height:15px;
	line-height:15px;
	font-size:13px;
	font-family: 'Open Sans Condensed', sans-serif;	
	color:#CCC;
}

.campo{
    float:left;
	width:500px;
	height:20px;	
}

.entrada{
    position:absolute;
	margin:0px;
	width:494px;
	height:19px;
	/*font-family: 'Open Sans Condensed', sans-serif;*/		
	color:#333;
	font-size:14px;
	padding-left:3px;
}

.entrada2{
    position:absolute;
	margin:0px;
	width:500px;
	height:25px;
	/*font-family: 'Open Sans Condensed', sans-serif;	*/	
	color:#333;
	font-size:14px;
}

.linea_boton{
   float:left;
   width:500px;
   height:25px;
   /*border:1px solid #CCC;	*/
   margin-top:5px;
}
.boton{
   margin-left:200px;
   cursor:pointer;	
}

.titulo_opcion{
    position:absolute;	
	width:700px;
	height:30px;
	margin:0px;
	margin-top:106px;
	margin-left:260px;
	/*border:1px solid #CCC;*/
	font-family: 'Open Sans Condensed', sans-serif;	
	font-size:20px;
	line-height:30px;
	font-weight:bold;
	color:#CCC;
}


</style>
</head>

<?php
    if(isset($_POST["Registrar"])){
	    $con=Conectarse();
		$sql_select ="select * from users where login ='".$_POST["login"]."' or email='".$_POST["correo"]."'";
		$result=pg_exec($con,$sql_select);
		$band=pg_num_rows($result);
		if($band!=0){
		   ?>
           	  <script type="text/javascript" language="javascript">
              	  alert("El nombre de usuario o correo electronico suministrados ya se encuentran asignados a otro usuario.");
              </script>
           <?	
		}else{
			$sql_insert="insert into users values(nextval('users_id_user_seq'),'".$_POST["nombre"]."','".$_POST["login"]."','".$_POST["password"]."','".$_POST["correo"]."','".$_POST["perfil"]."',now())";
			$result=pg_exec($con,$sql_insert);
			?>
            	<script type="text/javascript" language="javascript">
					alert("Usuario Registrado Satisfactoriamente");
					location.href="registrarnuevousuario.php";
				</script>
            <?
		}
		
	}
?>

<script type="text/javascript" language="javascript">
	function validar_registro(formulario){
		if(formulario.nombre.value==""){
		   alert("Debe indicar el nombre y apellido de la persona que va registrar.");	
		   return false;
		}
		if(formulario.correo.value==""){
		   alert("Debe indicar el correo electrónico de la persona que va registrar.");	
		   return false;
		}	

		valor = document.getElementById("correo").value;		
		if( !(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/.test(valor)) ) {
		   alert("El correo electrónico no cumple con el formato requerido");
		   return false;
		}
		
		if(formulario.login.value==""){
		   alert("Debe indicar el login que el usuario tendra.");	
		   return false;
		}
		
		if(formulario.login.value.length<8){
		   alert("El login del usuario debe contener almenos 08 caracteres.");	
		   return false;
		}		
						
		if(formulario.password.value==""){
		   alert("Debe indicar el password que el usuario tendra.");	
		   return false;
		}	
		
		valor = document.getElementById("password").value;
		if( !(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,15})$/.test(valor)) ) {
		   alert("El password debe tener entre 8 y 15 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales.");	
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
        <div class="name_user" id="cerrar" style="border-left:1px solid #666;"><label onClick="pregunta_salir()" style="cursor:pointer;">Cerrar Sesión</label></div>
    	<div class="name_user" id="usuario"><?php echo $_SESSION["login_administrador"]; ?></div>
        <div class="icon_user" id="conte_icono"> <img id="icono" src="recursos/imagenes/User-icon.png" width="22" height="22" /></div>
    </div>

    
		<div class="menu" id="menu">
			<?php Menu(); ?>
        </div>
        <div class="titulo_opcion" id="titulo_opcion">REGISTRO DE NUEVO USUARIO</div>
        <form onSubmit="return validar_registro(this)" name="form1" id="form1" method="post">
        <div class="formulario" id="formulario">
        	<div class="linea_campo" id="linea_campo1">
            	<div class="nombre_campo" id="nombre1">Nombre y Apellido</div>
                <div class="campo" id="campo1"><input type="text" name="nombre" id="nombre" class="entrada" maxlength="45" /></div>
            </div>
        	<div class="linea_campo" id="linea_campo2">
            	<div class="nombre_campo" id="nombre2">Correo Electrónico</div>
                <div class="campo" id="campo2"><input type="text" name="correo" id="correo" class="entrada" maxlength="60" /></div>
            </div>    
        	<div class="linea_campo" id="linea_campo3">
            	<div class="nombre_campo" id="nombre3">Tipo de Perfil</div>
                <div class="campo" id="campo3">
                	<select name="perfil" id="perfil"  class="entrada2" >
                    	<option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </select>
                </div>
            </div> 
        	<div class="linea_campo" id="linea_campo4">
            	<div class="nombre_campo" id="nombre4">Login</div>
                <div class="campo" id="campo4" ><input type="text" name="login" id="login" class="entrada" maxlength="45" /></div>
            </div>   
        	<div class="linea_campo" id="linea_campo5">
            	<div class="nombre_campo" id="nombre5">Password</div>
                <div class="campo" id="campo5"><input type="password" name="password" id="password" class="entrada" maxlength="15" /></div>
            </div>  
            <div class="linea_boton" id="linea_boton"><input type="submit" name="Registrar" id="Registrar" value="Registrar" class="boton" /></div>                                               
        </div>
    </form>    
    
    
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
	
	completa(ancho,"titulo_opcion",700,30,106,260);		  
    document.getElementById("titulo_opcion").style.lineHeight=parseInt((((ancho)*30)/1366))+"px";
    document.getElementById("titulo_opcion").style.fontSize=parseInt((((ancho)*20)/1366))+"px";	
	
   	document.getElementById("formulario").style.width=parseInt((((ancho)*500)/1366))+"px";	
	document.getElementById("formulario").style.marginTop=parseInt((((ancho)*135)/1366))+"px";
	document.getElementById("formulario").style.marginLeft=parseInt((((ancho)*260)/1366))+"px";	
			  
   	document.getElementById("linea_campo1").style.width=parseInt((((ancho)*500)/1366))+"px";			
	document.getElementById("linea_campo1").style.marginBottom=parseInt((((ancho)*10)/1366))+"px"; 		
   	document.getElementById("linea_campo2").style.width=parseInt((((ancho)*500)/1366))+"px";			
	document.getElementById("linea_campo2").style.marginBottom=parseInt((((ancho)*10)/1366))+"px"; 
   	document.getElementById("linea_campo3").style.width=parseInt((((ancho)*500)/1366))+"px";			
	document.getElementById("linea_campo4").style.marginBottom=parseInt((((ancho)*10)/1366))+"px"; 
   	document.getElementById("linea_campo4").style.width=parseInt((((ancho)*500)/1366))+"px";			
	document.getElementById("linea_campo4").style.marginBottom=parseInt((((ancho)*10)/1366))+"px"; 
   	document.getElementById("linea_campo5").style.width=parseInt((((ancho)*500)/1366))+"px";			
	document.getElementById("linea_campo5").style.marginBottom=parseInt((((ancho)*10)/1366))+"px"; 	
	
	completa(ancho,"nombre1",500,15,0,0);
	completa(ancho,"nombre2",500,15,0,0);
	completa(ancho,"nombre3",500,15,0,0);
	completa(ancho,"nombre4",500,15,0,0);
	completa(ancho,"nombre5",500,15,0,0);
    document.getElementById("nombre1").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
    document.getElementById("nombre1").style.fontSize=parseInt((((ancho)*13)/1366))+"px";
    document.getElementById("nombre2").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
    document.getElementById("nombre2").style.fontSize=parseInt((((ancho)*13)/1366))+"px";
    document.getElementById("nombre3").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
    document.getElementById("nombre3").style.fontSize=parseInt((((ancho)*13)/1366))+"px";
    document.getElementById("nombre4").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
    document.getElementById("nombre4").style.fontSize=parseInt((((ancho)*13)/1366))+"px";						
    document.getElementById("nombre5").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
    document.getElementById("nombre5").style.fontSize=parseInt((((ancho)*13)/1366))+"px";	
	
	completa(ancho,"campo1",500,20,0,0);
	completa(ancho,"campo2",500,20,0,0);
	completa(ancho,"campo3",500,20,0,0);
	completa(ancho,"campo4",500,20,0,0);
	completa(ancho,"campo5",500,20,0,0);
	
	completa(ancho,"nombre",494,19,0,0);	
	completa(ancho,"correo",494,19,0,0);	
	completa(ancho,"password",494,19,0,0);
	completa(ancho,"login",494,19,0,0);			
	completa(ancho,"perfil",500,25,0,0);
    document.getElementById("nombre").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
    document.getElementById("correo").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
    document.getElementById("password").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
    document.getElementById("login").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
    document.getElementById("perfil").style.fontSize=parseInt((((ancho)*14)/1366))+"px";														
	completa(ancho,"linea_boton",500,25,5,0);
	document.getElementById("linea_boton").style.marginTop=parseInt((((ancho)*5)/1366))+"px";			
	document.getElementById("linea_boton").style.marginBottom=parseInt((((ancho)*10)/1366))+"px";	
	document.getElementById("Registrar").style.marginLeft=parseInt((((ancho)*200)/1366))+"px";	
		  
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