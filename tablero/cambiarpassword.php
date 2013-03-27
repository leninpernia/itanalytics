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
<title>IT Analytics - Listado de Usuarios</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>	

<script type="text/javascript" language="javascript">
$(function()
{
	$('#contenido_tabla').jScrollPane();				
});
</script>


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

.titulo_lista{
    position:absolute;	
	width:700px;
	height:20px;
	margin:0px;
	margin-top:135px;
	margin-left:260px;
	/*border:1px solid #CCC;*/
	font-family: 'Open Sans Condensed', sans-serif;	
	font-size:16px;
	line-height:20px;
	color:#CCC;
}

.titulo_parametro_busqueda{
    position:absolute;	
	width:700px;
	height:15px;
	margin:0px;
	margin-top:160px;
	margin-left:260px;
	/*border:1px solid #CCC;*/
	font-family: 'Open Sans Condensed', sans-serif;	
	font-size:15px;
	line-height:15px;
	color:#CCC;
}

.contenedor_parametros{
    position:absolute;	
	width:700px;
	height:22px;
	margin:0px;
	margin-top:180px;
	margin-left:260px;
	/*border:1px solid #CCC;*/
}

.seleccion_parametro{
   float:left;
   width:80px;
   height:22px;
  /* font-family: 'Open Sans Condensed', sans-serif;*/		
   font-size:13px;
   color:#333;
}

.campo_busqueda{
   float:left;
   width:200px;
   height:16px;		
   font-size:13px;
   color:#333;  
   margin-left:10px;
   padding-left:2px; 
}

.boton_filtro{
   float:left;
   margin-left:10px;
   width:auto;
   padding-left:3px;
   padding-right:3px;
   height:22px;
   line-height:22px;
   font-size:14px;
   background:#009ee1;	
   text-align:center;
   color:#FFF;
   font-family: 'Open Sans Condensed', sans-serif;
   cursor:pointer;
	moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;   
   
}

.tabla_usuarios{
	position:absolute;
	width:700px;
	height:222px;
	margin:0px;
	margin-top:210px;
	margin-left:260px;
	border-top:1px solid #252525;
	/*border:1px solid #CCC;	*/
	-moz-box-shadow: 2px 2px 3px #111;
    -webkit-box-shadow: 2px 2px 3px #111;
    box-shadow: 2px 2px 3px #111;
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111');
  	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
  	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
  	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
  	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C');			
}

.cabecera_tabla_usuarios{
   position:absolute;
   margin:0px;
   width:700px;
   height:20px;
   border-bottom:1px solid #252525; 
   font-family: 'Open Sans Condensed', sans-serif;
   color:#009ee1;
   font-size:14px;
   line-height:20px;	     
   
}

.cabecera_uno{
   float:left;
   width:200px;
   height:20px;
   border-right:2px solid #252525;
   padding-left:5px;
}
.cabecera_dos{
   float:left;
   width:150px;
   height:20px;
   border-right:2px solid #252525;
   padding-left:5px;
}
.cabecera_tres{
   float:left;
   width:100px;
   height:20px;
 /*  border-right:2px solid #252525;*/
   padding-left:5px;
}

.icon_opcion{
  float:left;
  margin-right:5px;
  width:16px;
  height:16px;
  margin-top:2px;
 /* background:#F00;*/	
  cursor:pointer;
}

.linea_uno{
   float:left;
   width:202px;
   height:20px;
   border-right:2px solid #252525;
   padding-left:5px;
}

.linea_cuatro{
   float:left;
   width:200px;
   height:20px;
   border-right:2px solid #252525;
   padding-left:5px;
}
.linea_dos{
   float:left;
   width:150px;
   height:20px;
   border-right:2px solid #252525;
   padding-left:5px;
}
.linea_tres{
   float:left;
   width:98px;
   height:20px;
 /*  border-right:2px solid #252525;*/
   padding-left:5px;
}

.conte_lineas_tabla_usuarios{
   	position:absolute;
	width:700px;
	height:200px;
	margin-top:22px;
}

.linea_tabla_usuarios{
    float:left;
	width:700px;
	height:19px;
    font-family: 'Open Sans Condensed', sans-serif;		
	color:#CCC;
	font-size:14px;
	line-height:19px;
	border-bottom:1px solid #252525;
}
.linea_tabla_usuarios:hover{
    float:left;
	width:700px;
	height:19px;
    font-family: 'Open Sans Condensed', sans-serif;		
	color:#CCC;
	font-size:14px;
	line-height:19px;
	background:#666;
	border-bottom:1px solid #252525;	
}


.jspContainer
{
	overflow: hidden;
	position: relative;
	margin-left:-2px;	
}

.jspPane
{
	position: absolute;	
}

.jspVerticalBar
{
	position: absolute;
	top: 0;
	right: 0;
	width: 5px;
	height: 100%;
	background: red;
	moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;	
	
}

.jspHorizontalBar
{
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 5px;
	background: red;
}

.jspVerticalBar *,
.jspHorizontalBar *
{
	margin: 0;
	padding: 0;
}

.jspCap
{
	display: none;
}

.jspHorizontalBar .jspCap
{
	float: left;
}

.jspTrack
{
	background: #666;
	position: relative;
	moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;		
	
}

.jspDrag
{
	background: #009EE1;
	position: relative;
	top: 0;
	left: 0;
	cursor: pointer;
	moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
}

.jspHorizontalBar .jspTrack,
.jspHorizontalBar .jspDrag
{
	float: left;
	height: 100%;
}

.jspArrow
{
	background: #F0F;
	text-indent: -20000px;
	display: block;
	cursor: pointer;
}

.jspArrow.jspDisabled
{
	cursor: default;
	background: #AC7C31;
}

.jspVerticalBar .jspArrow
{
	height: 16px;
}

.jspHorizontalBar .jspArrow
{
	width: 16px;
	float: left;
	height: 100%;
}

.jspVerticalBar .jspArrow:focus
{
	outline: none;
}

.jspCorner
{
	background: #eeeef4;
	float: left;
	height: 100%;
}



.actualiza{
    position:absolute;	
    width:400px;
	height:180px;
	border:1px solid #666;
	margin-top:440px;
	margin-left:260px;	
}

.actualiza_linea{
    width:380px;
	height:auto;
	margin-left:10px;
	margin-top:5px;
 /*   border:1px solid #CCC;*/
    font-family: 'Open Sans Condensed', sans-serif;		
	font-size:14px;
	color:#CCC;		
}

.cerrar{
   position:absolute;
   width:50px;
   font-size:14px;
   color:#CCC;
   font-family: 'Open Sans Condensed', sans-serif;      	
   text-align:center;
   margin-left:340px;
   cursor:pointer;   
}

.cerrar:hover{
   position:absolute;
   width:50px;
   font-size:14px;
   color:#CCC;
   font-family: 'Open Sans Condensed', sans-serif;      	
   text-align:center;
   margin-left:340px;
   cursor:pointer;   
   text-decoration:underline;
}

.actualiza_dato{
    width:380px;
	height:auto;
	margin-left:10px;
	margin-top:5px;
	/*border:1px solid #CCC;	*/
    font-family: 'Open Sans Condensed', sans-serif;		
	font-size:14px;
	color:#CCC;		
}

.actualiza_dato_nombre{
    width:400px;
	height:15px;	
    font-family: 'Open Sans Condensed', sans-serif;		
	font-size:13px;
	line-height:15px;	
}

.actualiza_dato_campo{
    width:400px;
	height:20px;	
}

.actualiza_campo{
   position:absolute;
   margin:0px;
   height:15px;	
   width:375px;  
}







</style>
</head>

<script type="text/javascript" language="javascript">
	function filtrarusuarios(){	
	   if(document.getElementById("campobusqueda").value==""){
		   alert("Debe indicar el filtro que usara juanto con el parametro");   
	   }else{
		   $("#tabla").load("recursos/ajaxtablero.php", {parametro: document.getElementById("parametro").value, filtro: document.getElementById("campobusqueda").value, indice: 4}, function(){
			   $('#contenido_tabla').jScrollPane();			   
		   });	   
	       
	   }       
	}
	
	function mostrartodos(){
		   document.getElementById("campobusqueda").value="";
		   $("#tabla").load("recursos/ajaxtablero.php", {parametro: 0, filtro: document.getElementById("campobusqueda").value, indice: 4}, function(){
			   $('#contenido_tabla').jScrollPane();			   
		   });		
	}
	
	function actualizar_usuario(registro){
		   $("#capa").load("recursos/ajaxtablero.php", {id: registro, indice: 5});			
	}
	
	function cerrar_act_contrasena(){
	    document.getElementById("actualiza").style.visibility="hidden";	
	}
	
	
	function editar_usuario(registro){
		   $("#capa").load("recursos/ajaxtablero.php", {id: registro, indice: 6});			
	}	
	
	function pregunta_eliminar(id,nombre){
		 var nom=nombre.replace("_"," ");
	     var resp = confirm("Realmente desea eliminar el usuario '"+nom+"'");
		 if(resp == true){
			 location.href="eliminarusuario.php?id="+id;
		 }
	}    
	
function pregunta_salir(){
     var resp = confirm("Realmente desea salir de IT Analytics");
	 if(resp == true){
		 location.href="cerrarsesion.php";
	 }
}	
	
	
	

</script>

<?php
    if(isset($_POST["Actualizar"])){
	    $con=Conectarse();
		$sql_update="update users set password='".$_POST["contra1"]."' where id_user='".$_POST["usuarioo"]."'";
		$result=pg_exec($con,$sql_update);
		?>
        <script type="text/javascript" language="javascript">
		    alert("Contraseña cambiada de forma satisfactoria");
			location.href="cambiarpassword.php";
		</script>
        <?php	
	}
	
    if(isset($_POST["Editar"])){
		
	    $con=Conectarse();
		$sql_select ="select * from users where email='".$_POST["contra2"]."' and id_user!='".$_POST["usuarioo"]."'";
		$result=pg_exec($con,$sql_select);
		$band=pg_num_rows($result);
		if($band!=0){
		   ?>
           	  <script type="text/javascript" language="javascript">
              	  alert("El correo electrónico suministrado ya se encuentra asignados a otro usuario.");
              </script>
           <?	
		}else{
			$sql_update="update users set name='".$_POST["contra1"]."', email='".$_POST["contra2"]."' where id_user='".$_POST["usuarioo"]."'";
			$result=pg_exec($con,$sql_update);
			?>
	        <script type="text/javascript" language="javascript">
			    alert("Datos de usuario editado satisfactoriamente");
				location.href="cambiarpassword.php";
			</script>
	        <?php				
		}
		
		


	}	
	
	
?>

<script type="text/javascript" language="javascript">
	function validar_registro(formulario){
		if(formulario.contra1.value==""){
		   alert("Debe indicar la nueva contraseña.");	
		   return false;
		}	
		
		if(formulario.contra2.value==""){
		   alert("Por favor confirme la nueva contraseña.");	
		   return false;
		}	
		
		if(formulario.contra1.value!=formulario.contra2.value){
		   alert("Las contraseñas no coinciden.");	
		   return false;			
		}
		
		valor = document.getElementById("contra1").value;
		if( !(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,15})$/.test(valor)) ) {
		   alert("El password debe tener entre 8 y 15 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales.");	
		   return false;
		}	
																				
	}
	
	function validar_actualizacion(formulario){
		
		if(formulario.contra1.value==""){
		   alert("El Nombre del usuario no puede quedar vacio.");	
		   return false;
		}	
		
		if(formulario.contra2.value==""){
		   alert("El Email del usuario no puede quedar vacio.");	
		   return false;
		}	
		
		valor = document.getElementById("contra2").value;		
		if( !(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/.test(valor)) ) {
		   alert("El correo electrónico no cumple con el formato requerido");
		   return false;
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

    
		<div class="menu" id="menu"  >
			<?php Menu(); ?>
        </div>
        <div class="titulo_opcion" id="titulo_opcion">CAMBIAR CONTRASEÑA DE USUARIO</div>
		<div class="titulo_lista" id="titulo_lista">Lista de Usuarios Registrados</div>
		<div class="titulo_parametro_busqueda" id="titulo_parametro_busqueda">Indique un parametro para filtrar la tabla</div>
		<div class="contenedor_parametros" id="contenedor_parametros">
        	<select name="parametro" id="parametro"  class="seleccion_parametro">
            	<option value="1" >Nombre</option>
                <option value="2" >Login</option>
                <option value="3" >Email</option>
            </select>
            <input type="text" class="campo_busqueda" id="campobusqueda" name="campobusqueda" value="" />
            <div class="boton_filtro" id="boton1" onClick="filtrarusuarios()">FILTRAR</div>
            <div class="boton_filtro" id="boton2" onClick="mostrartodos()">MOSTRAR TODOS LOS USUARIOS</div>
        </div>
		<div class="tabla_usuarios" id="tabla" >
        	<div class="cabecera_tabla_usuarios" id="cabecera_tabla_usuarios">
            	<div class="cabecera_uno" id="c1">Nombre</div>
                <div class="cabecera_dos" id="c2">Login</div>
                <div class="cabecera_uno" id="c3">Email</div>
                <div class="cabecera_tres" id="c4">Opciones</div>
            </div>
            <div class="conte_lineas_tabla_usuarios" id="contenido_tabla">
                <?php
				   $con=Conectarse();
				   $sql_select = " select * from users order by name";
				   $result_usuarios = pg_exec($con,$sql_select);
				   for($i=0;$i<pg_num_rows($result_usuarios);$i++){
					   $arreglo=pg_fetch_array($result_usuarios,$i);
            			echo "<div class='linea_tabla_usuarios' id='linea_".($i+1)."'>";
		            	echo "<div class='linea_uno' id='linea_".($i+1)."_l1'>".$arreglo[1]."</div>";
			            echo "<div class='linea_dos' id='linea_".($i+1)."_l2'>".$arreglo[2]."</div>";
			            echo "<div class='linea_cuatro' id='linea_".($i+1)."_l3'>".$arreglo[4]."</div>";
						$nombre_aux = str_replace(" ","_",$arreglo[1]);
			            echo "<div class='linea_tres' id='linea_".($i+1)."_l4'><div class='icon_opcion' id='icon_".($i+1)."_1' onclick='actualizar_usuario(".$arreglo[0].")' title='Cambiar contraseña'><img id='icon_".($i+1)."_11' src='recursos/imagenes/password_icon.png' width='16' height='16' /> </div>       <div class='icon_opcion' id='icon_".($i+1)."_3' onclick='editar_usuario(".$arreglo[0].")'  title='Editar usuario'><img id='icon_".($i+1)."_33' src='recursos/imagenes/editusuario.png' width='16' height='16' /></div>        <div class='icon_opcion' id='icon_".($i+1)."_2' onclick=pregunta_eliminar(".$arreglo[0].",'".$nombre_aux."')  title='Eliminar usuario'><img id='icon_".($i+1)."_22' src='recursos/imagenes/borrarusuario.png' width='16' height='16' /></div></div>";                               
		                echo "</div>";
				   }				   				   				   
				
				?>
            </div>
        </div>
        
        <div id="capa">        
        </div>
        

        <div class="pie_pagina" id="pie_pagina" >Copyright 2013 JC Global Resources LLC | contacto@jcgr.net </br></div> 
     
    
    
</div>
    
</body>

	<script type="text/javascript" language="javascript">

      var ancho = screen.width;
  	 //   var ancho = 1200;
		
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
	
	completa(ancho,"titulo_lista",700,30,135,260);		  
    document.getElementById("titulo_lista").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("titulo_lista").style.fontSize=parseInt((((ancho)*16)/1366))+"px";	
	
	completa(ancho,"titulo_parametro_busqueda",700,15,160,260);		  
    document.getElementById("titulo_parametro_busqueda").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
    document.getElementById("titulo_parametro_busqueda").style.fontSize=parseInt((((ancho)*15)/1366))+"px";			
   	
	completa(ancho,"contenedor_parametros",700,22,180,260);		
	completa(ancho,"parametro",80,22,0,0);
    document.getElementById("parametro").style.fontSize=parseInt((((ancho)*13)/1366))+"px";		
		
	completa(ancho,"campobusqueda",200,16,0,10);
    document.getElementById("campobusqueda").style.fontSize=parseInt((((ancho)*13)/1366))+"px";	
	
	completa(ancho,"tabla",700,222,210,260);
	
	completa(ancho,"cabecera_tabla_usuarios",700,20,0,0);
    document.getElementById("cabecera_tabla_usuarios").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";
    document.getElementById("cabecera_tabla_usuarios").style.fontSize=parseInt((((ancho)*14)/1366))+"px";		
	completa(ancho,"contenido_tabla",700,200,22,0);
	
	completa(ancho,"c1",200,20,0,0);
	completa(ancho,"c2",150,20,0,0);
	completa(ancho,"c3",200,20,0,0);
	completa(ancho,"c4",100,20,0,0);
	
	
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("linea_"+(i))!=null){
				   
   		   document.getElementById("linea_"+(i)).style.width=parseInt((((ancho)*700)/1366))+"px";
		   document.getElementById("linea_"+(i)).style.height=parseInt((((ancho)*19)/1366))+"px";
		   document.getElementById("linea_"+(i)).style.lineHeight=parseInt((((ancho)*19)/1366))+"px";
		   document.getElementById("linea_"+(i)).style.fontSize=parseInt((((ancho)*14)/1366))+"px";
		   
		   completa(ancho,"linea_"+(i)+"_l1",202,20,0,0);
		   completa(ancho,"linea_"+(i)+"_l2",150,20,0,0);
    	   completa(ancho,"linea_"+(i)+"_l3",200,20,0,0);
    	   completa(ancho,"linea_"+(i)+"_l4",98,20,0,0);	
		   
   		   document.getElementById("icon_"+(i)+"_1").style.width=parseInt((((ancho)*16)/1366))+"px";
		   document.getElementById("icon_"+(i)+"_1").style.height=parseInt((((ancho)*16)/1366))+"px";
   		   document.getElementById("icon_"+(i)+"_11").style.width=parseInt((((ancho)*16)/1366))+"px";
		   document.getElementById("icon_"+(i)+"_11").style.height=parseInt((((ancho)*16)/1366))+"px";
		   document.getElementById("icon_"+(i)+"_1").style.marginTop=parseInt((((ancho)*2)/1366))+"px";
		   
   		   document.getElementById("icon_"+(i)+"_2").style.width=parseInt((((ancho)*16)/1366))+"px";
		   document.getElementById("icon_"+(i)+"_2").style.height=parseInt((((ancho)*16)/1366))+"px";
   		   document.getElementById("icon_"+(i)+"_22").style.width=parseInt((((ancho)*16)/1366))+"px";
		   document.getElementById("icon_"+(i)+"_22").style.height=parseInt((((ancho)*16)/1366))+"px";	
		   document.getElementById("icon_"+(i)+"_2").style.marginTop=parseInt((((ancho)*2)/1366))+"px";		   		   			   		   	   
			
			
   		   document.getElementById("icon_"+(i)+"_3").style.width=parseInt((((ancho)*16)/1366))+"px";
		   document.getElementById("icon_"+(i)+"_3").style.height=parseInt((((ancho)*16)/1366))+"px";
   		   document.getElementById("icon_"+(i)+"_33").style.width=parseInt((((ancho)*16)/1366))+"px";
		   document.getElementById("icon_"+(i)+"_33").style.height=parseInt((((ancho)*16)/1366))+"px";	
		   document.getElementById("icon_"+(i)+"_3").style.marginTop=parseInt((((ancho)*2)/1366))+"px";				
		}else{
		  band1=1;	
		}			
   }	
   
   
   
   
   
	

    document.getElementById("boton1").style.fontSize=parseInt((((ancho)*14)/1366))+"px";		
    document.getElementById("boton1").style.lineHeight=parseInt((((ancho)*22)/1366))+"px";	
	document.getElementById("boton1").style.height=parseInt((((ancho)*22)/1366))+"px";	
	document.getElementById("boton1").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
	
    document.getElementById("boton2").style.fontSize=parseInt((((ancho)*14)/1366))+"px";		
    document.getElementById("boton2").style.lineHeight=parseInt((((ancho)*22)/1366))+"px";	
	document.getElementById("boton2").style.height=parseInt((((ancho)*22)/1366))+"px";	
	document.getElementById("boton2").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";		
	
			
		  
    completa(ancho,"pie_pagina",1320,20,630,15);
    document.getElementById("pie_pagina").style.lineHeight=parseInt((((ancho)*14)/1366))+"px";
    document.getElementById("pie_pagina").style.fontSize=parseInt((((ancho)*12)/1366))+"px"; 
    document.getElementById("pie_pagina").style.paddingTop= parseInt((((ancho)*10)/1366))+"px"; 	
	completa(ancho,"linea_boton",500,25,5,0);
	
	document.getElementById("linea_boton").style.marginTop=parseInt((((ancho)*5)/1366))+"px";			
	document.getElementById("linea_boton").style.marginBottom=parseInt((((ancho)*10)/1366))+"px"; 	
			 
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