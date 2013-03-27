<?php session_start();

   require("recursos/funciones.php");
   $conexion = Conectarse();

  if($_SESSION["usuario"]==NULL){
	 ?>
     	<script type="text/javascript" language="javascript">
		    location.href="index.php";
		</script>
     <?php   
   }

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IT Analytics - Dashboard</title>


<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css' />

<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>	

	
<style type="text/css">
body{
 	margin:0px;
	background:#383739;
}

.contenedor_dashboard{	
	margin-left:auto;
	margin-right:auto;
	/*margin:0px;*/
	height:1340px;
	width:1335px;
	/*background:#F00;*/
}
.barra{
	position:absolute;
    width:1319px;
	height:69px;
	background:#FFF;
	margin-top:10px;
	margin-left:15px;
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
	width:1319px;
	margin-left:0px;
	border-bottom:1px solid #999;
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

.contenedor_tiempo{
    position:absolute;
	margin-top:105px;
	margin-left:15px;
	height:72px;
	width:1319px;
   /* border:1px solid #999;*/
	z-index:0;	
}

.tiempo_1{
    position:absolute;
	width:527px;
	height:61px;
	margin:5px;
	margin-left:0px;
	margin-right:0px;
	padding-left:-40px;
	z-index:5;	 
  	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
  	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
  	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
  	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C'); 
 	-moz-box-shadow: 2px 2px 3px #111;
    -webkit-box-shadow: 2px 2px 3px #111;
    box-shadow: 2px 2px 3px #111;
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111');		

}

.tiempo_2{
    position:absolute;
	width:204px;
	height:61px;
	margin:5px;
	margin-right:0px;
	margin-left:533px;
	z-index:4;
  	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
  	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
  	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
  	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C');	
 	-moz-box-shadow: 2px 2px 3px #111;
    -webkit-box-shadow: 2px 2px 3px #111;
    box-shadow: 2px 2px 3px #111;
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111');			
}

.tiempo_3{
    position:absolute;
	width:170px;
	height:61px;
	margin:5px;
	margin-right:0px;
	margin-left:743px;
	z-index:3;
  	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
  	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
  	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
  	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C');	
 	-moz-box-shadow: 2px 2px 3px #111;
    -webkit-box-shadow: 2px 2px 3px #111;
    box-shadow: 2px 2px 3px #111;
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111');			

}

.tiempo_4{
    position:absolute;
	width:169px;
	height:61px;
	margin:5px;
	margin-right:0px;
	margin-left:919px;
	z-index:2;
  	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
  	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
  	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
  	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C');	
 	-moz-box-shadow: 2px 2px 3px #111;
    -webkit-box-shadow: 2px 2px 3px #111;
    box-shadow: 2px 2px 3px #111;
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111');			

}

.tiempo_5{
    position:absolute;
	width:225px;
	height:61px;
	margin:5px;
	margin-right:0px;
	margin-left:1094px;
	z-index:1;
  	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
  	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
  	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
  	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C');	
 	-moz-box-shadow: 2px 2px 3px #111;
    -webkit-box-shadow: 2px 2px 3px #111;
    box-shadow: 2px 2px 3px #111;
    -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
    filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111');			

}
.tiempo_titulo{
    float:left;
	width:100%;
	height:20px;
	/*background:#662800;*/
	color:#009EE1;
	font-size:13px;
	line-height:20px;
	border-bottom:2px solid #2C2B2C;
	font-family: 'Open Sans Condensed', sans-serif;	
}

.tiempo_cuadro1{
	float:left;
    width:auto;
	padding-left:3px;
	padding-right:3px;
	height:19px;
	border:1px solid #333;		
	text-align:center;
	line-height:19px;
	margin:0px;
	font-family: 'Open Sans Condensed', sans-serif;	
	font-size:13px;
	border-left:0px;
	border-top:0px;
	cursor:default;	
	color:#FFF;
}

.tiempo_cuadro1:hover{
	float:left;
    width:auto;
	padding-left:3px;
	padding-right:3px;
	height:19px;
	border:1px solid #333;		
	text-align:center;
	line-height:19px;
	margin:0px;
	font-family: 'Open Sans Condensed', sans-serif;	
	font-size:13px;
	border-left:0px;
	border-top:0px;
	cursor:default;	
	color:#FFF;
	background:#666;
}

#selectable_dia_mes, #selectable_mes, #selectable_trimestre, #selectable_dia_semana, #selectable_anno{
 counter-reset:item; 
 list-style-type:none; 
 float:left;
 margin-left:0px;
 margin-top:0px;
 width:auto;	
}

#contenedor_filtros { 
  font-size: 1.4em; 
}


#selectable_dia_mes .ui-selecting { 
  background: #0CF; 
}

#selectable_dia_mes .ui-selected { 
  background: #009EE1; 
  color: white; 
}

#selectable_mes .ui-selecting { 
  background: #0CF;  
}

#selectable_mes .ui-selected { 
  background: #009EE1; 
  color: white; 
}

#selectable_trimestre .ui-selecting { 
  background: #0CF; 
}

#selectable_trimestre .ui-selected { 
  background: #009EE1; 
  color: white; 
}

#selectable_dia_semana .ui-selecting { 
  background: #0CF;  
}

#selectable_dia_semana .ui-selected { 
  background: #009EE1; 
  color: white; 
}

#selectable_anno .ui-selecting { 
  background: #0CF; 
}

#selectable_anno .ui-selected { 
  background: #009EE1;
  color: white; 
}

.contenedor_reportes{ 
	position:absolute;
	width:288px;
	height:100px;
	margin-left:15px;
	margin-top:178px; 
	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C');	 
	-moz-box-shadow: 2px 2px 3px #111;
	-webkit-box-shadow: 2px 2px 3px #111;
	box-shadow: 2px 2px 3px #111;
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111'); 
} 

.contenedor_parametros{
 position:absolute;
 width:288px;
 height:1008px;
 margin-top:284px;
 margin-left:15px;
 /*border:1px solid #999;*/
}

.conte_parametros{
	float:left;
	width:288px;
	height:120px;
	margin:7px;
	margin-top:0px;
	margin-left:0px;
	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C'); 
	-moz-box-shadow: 2px 2px 3px #111;
	-webkit-box-shadow: 2px 2px 3px #111;
	box-shadow: 2px 2px 3px #111;
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111'); 
}

.actualiza{
   position:absolute;
   margin-top:178px;
   margin-left:310px;
  /* border:1px solid #F00;*/
  /*background:#F00;*/
   width:1024px;
   height:1040px;	
}

.conte_para_cabecera{
  position:absolute;
  width:283px;
  height:18px;
  color:#009EE1;
  font-size:13px;
  line-height:18px;
  font-family: 'Open Sans Condensed', sans-serif;  	
  padding-left:5px;
  border-bottom:2px solid #2C2B2C;
}

.conte_para_contenido{
  position:absolute;
  margin-top:19px;
  width:288px;
  height:101px;	
}

.conte_para_linea{
  float:left;
  width:270px;
  height:17px;
/*  border-bottom:1px solid #999;	*/
  font-family: 'Open Sans Condensed', sans-serif; 
  font-size:13px;
  line-height:17px;
  padding-left:5px; 
  color:#CCC; 
}

.conte_para_linea:hover{
  float:left;
  width:270px;
  height:17px;
 /* border-bottom:1px solid #999;*/	
  font-family: 'Open Sans Condensed', sans-serif; 
  font-size:13px;
  line-height:17px;
  padding-left:5px;  
  cursor:pointer;
  background:#666;
  color:#FFF; 
}

.contenedor_filtros{
 position:absolute;
 width:700px;
 height:100px;
/* border:1px solid #999;*/
 margin-top:0px;
 margin-left:0px;
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

.cabecera_filtros{
  position:absolute;
  width:700px;
  height:18px;
  border-bottom:1px solid #333;
}

.cabecera_ele_1{
  float:left;
  width:695px;
  height:18px;
  line-height:18px;
  color:#009EE1;
  font-family: 'Open Sans Condensed', sans-serif;	
  font-size:13px; 
  padding-left:5px;
  border-bottom:2px solid #333; 
}



.elemento_filtros{
  float:left;
  width:700px;
  height:16px;
  
 /* border-bottom:1px solid #999;*/	
}  
.elemento_filtros:hover{
  float:left;
  width:700px;
  height:16px;
  /*border-bottom:1px solid #999;*/	
  cursor:pointer;
  background:#666;
  
} 

.filtro_ele_1{
  float:left;
  width:695px;
  height:17px;
  line-height:18px;
  color:#000;
  font-family: 'Open Sans Condensed', sans-serif;	
  font-size:13px; 
  padding-left:5px;
  color:#CCC;
}

.filtro_ele_2{
  float:left;
  width:236px;
  height:17px;
  line-height:18px;
  color:#000;
  font-family: 'Open Sans Condensed', sans-serif;	
  font-size:13px; 
  padding-left:5px;
  color:#CCC;
}

.contenido_filtros{
  position:absolute;
  margin-top:19px;
  width:700px;
  height:82px;
}

.contenedor_grafica{
 position:absolute;
 width:700px;
 height:450px;
 /*border:1px solid #999;*/
 margin-top:106px;
 margin-left:0px;	
}


.mostrar_dias{
 position:absolute;
 width:110px;
 height:20px;
 border:1px solid #999;
 margin-top:111px;
 margin-left:5px;
 font-size:14px;
 color:#000;
 cursor:pointer;
 text-align:center;
 line-height:20px;	
  font-family: 'Open Sans Condensed', sans-serif; 
}

.mostrar_dias:hover{
 position:absolute;
 width:110px;
 height:20px;
 border:1px solid #999;
 margin-top:111px;
 margin-left:5px;
 font-size:14px;
 color:#FFF;
 cursor:pointer;
 text-align:center;
 line-height:20px;	
 background:#009EE1;
  font-family: 'Open Sans Condensed', sans-serif; 
}



.contenedor_gauge_1{ 
 position:absolute;
 width:318px;
 height:275px;
 /*border:1px solid #999;*/
 margin-left:706px;
 margin-top:0px; 
} 

.contenedor_gauge_2{ 
 position:absolute;
 width:318px;
 height:275px;
 /*border:1px solid #999;*/
 margin-left:706px;
 margin-top:281px; 
} 

.contenedor_pie{ 
 position:absolute;
 width:1024px;
 height:274px;
 /*border:1px solid #999;*/
 margin-left:0px;
 margin-top:562px; 
}

.titulo_tabla_incidentes{
 position:absolute;	
 width:1024px;
 height:20px;
/* border:1px solid #999;*/
 margin-top:841px;
 text-align:center;
 line-height:20px;
 font-size:12px;
 color:#009EE1;
}



.contenedor_tabla{ 
 position:absolute;
 width:1024px;
 height:252px;
 /*border:1px solid #999;*/
 margin-left:0px;
 margin-top:863px;
 
	background-image:-webkit-linear-gradient( #333234, #2C2B2C);  
	background-image:-moz-linear-gradient(top,  #333234, #2C2B2C);  
	background-image:-o-linear-gradient(top,  #333234, #2C2B2C);   
	filter:progid:DXImageTransform.Microsoft.gradient(startColorStr=' #333234', EndColorStr='#2C2B2C');
	-moz-box-shadow: 2px 2px 3px #111;
	-webkit-box-shadow: 2px 2px 3px #111;
	box-shadow: 2px 2px 3px #111;
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111')";
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#111111');  		   
}

.cabecera_tabla{
 position:absolute;
 width:1024px;
 height:18px;
 	border-bottom:2px solid #2C2B2C;
	/*background:#662800;	*/
  line-height:18px;
  font-size:12px;
  color:#FFF;
  font-family: 'Open Sans Condensed', sans-serif;	  
}

.contenido_tabla{
  position:absolute;
  width:1024px;
  height:233px;
  margin-top:18px;	
}

.elemento{
  float:left;
  width:1018px;
  height:18px;
 /* border-bottom:1px solid #999;*/
  color:#CCC;
  font-size:12px;
  font-family: 'Open Sans Condensed', sans-serif;
  line-height:18px;    	
}

.elemento:hover{
  float:left;
  width:1018px;
  height:18px;
 /* border-bottom:1px solid #999;*/
  color:#CCC;
  font-size:12px;
  font-family: 'Open Sans Condensed', sans-serif;
  line-height:18px; 
  cursor:pointer;
  background:#666;   
  	
}

.elemento_1{
  float:left;
  width:65px;
  height:18px;
 /* border-right:1px solid #999;*/	
	border-right:2px solid #2C2B2C;  
  padding-left:5px;
  color:#009EE1;

}

.elemento_2{
  float:left;
  width:115px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;  
  color:#009EE1;	
}

.elemento_3{
  float:left;
  width:200px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;  
  color:#009EE1;	
}

.elemento_4{
  float:left;
  width:115px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;
  color:#009EE1;  	
}

.elemento_5{
  float:left;
  width:200px;
  height:18px;
	border-right:2px solid #2C2B2C;	
  padding-left:5px; 
  color:#009EE1; 
}

.elemento_6{
  float:left;
  width:75px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px; 
  color:#009EE1; 	
}

.elemento_7{
  float:left;
  width:196px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px; 
  color:#009EE1; 
}


.elemento_1_{
  float:left;
  width:67px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;	

}

.elemento_2_{
  float:left;
  width:115px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;	
}

.elemento_3_{
  float:left;
  width:200px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;	
}

.elemento_4_{
  float:left;
  width:115px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;		
}

.elemento_5_{
  float:left;
  width:200px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;		
}

.elemento_6_{
  float:left;
  width:75px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;		
}

.elemento_7_{
  float:left;
  width:196px;
  height:18px;
	border-right:2px solid #2C2B2C;
  padding-left:5px;		
}

.titulo_gauge{
  position:absolute;
  width:313px;
  height:20px;
  background:#F90;
  color:#FFF;
  margin:0px;
  line-height:20px;
  font-size:14px;
  padding-left:5px;
  font-family: 'Open Sans Condensed', sans-serif;	  
}

.elemento_gauge{
  position:absolute;
  margin-top:20px;
  margin-left:0px;
  width:313px;
  height:240px;
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

/* Yuk! CSS Hack for IE6 3 pixel bug :( */
* html .jspCorner
{
	margin: 0 -3px 0 0;
}

.check_filtro{
  width:12px;
  height:12px;
  margin-left:10px;
  margin-top:2px;	
}

.check_etiqueta{ 
  position:absolute;
  font-size:13px;
  line-height:17px;
  color:#FFF;
  margin-top:0px;
  font-family: 'Open Sans Condensed', sans-serif;  
}

</style>


<?php
   //Calculo de incidentes totales por mes
   $sql_general = "select extract (month from open_time) as mes, count(*) from incident where ( dead_line=true or dead_line=false )  group by extract (month from open_time) order by mes";
   $result_general= pg_exec($conexion,$sql_general);
   $numero_inicentes_mes=array(0,0,0,0,0,0,0,0,0,0,0,0);   
   $aux1="";
   $total_incidentes=0;
   for($i=0;$i<pg_num_rows($result_general);$i++){
	  $arreglo_general=pg_fetch_array($result_general,$i);
	  $numero_inicentes_mes[($arreglo_general[0]-1)]=$arreglo_general[1];   	  
   }
   for($i=0;$i<12;$i++){
	  if($i<11){
		  $aux1=$aux1.$numero_inicentes_mes[$i]."-";		  
	  }else{
		  $aux1=$aux1.$numero_inicentes_mes[$i];
	  }
	//  $total_incidentes=$total_incidentes+$numero_inicentes_mes[$i];	  	     
   }
  
   $sql_general_aux = "select * from incident";
   $result_general_aux= pg_exec($conexion,$sql_general_aux);
   $total_incidentes = pg_num_rows($result_general_aux);            
   
  
   // calculo de incidentes totales dentro del deadline
   $sql_general2 = "select extract (month from open_time) as mes, count(*) from incident where dead_line=true group by extract (month from open_time) order by mes";
   $result_general2= pg_exec($conexion,$sql_general2);
   $numero_inicentes_dead=array(0,0,0,0,0,0,0,0,0,0,0,0);
   $aux2="";
   $total_deadline=0;
   for($i=0;$i<pg_num_rows($result_general2);$i++){
	  $arreglo_general2=pg_fetch_array($result_general2,$i);
	  $numero_inicentes_dead[($arreglo_general2[0]-1)]=$arreglo_general2[1];   	  
   }
   for($i=0;$i<12;$i++){
	  if($i<11){
		  $aux2=$aux2.$numero_inicentes_dead[$i]."-";
	  }else{
		  $aux2=$aux2.$numero_inicentes_dead[$i];
	  }	  
	  $total_deadline=$total_deadline+$numero_inicentes_dead[$i];	     
   }  
   
   //calculo del % de incidentes dentro del deadline
   $gauge1 = round((($total_deadline*100)/$total_incidentes),2);
   
   //calculo de la clasificacion de los incidentes 
   $pendientes=0;
   $abiertos=0;
   $enprogreso=0;
   $cerrados=0;  
   $total_abiertos=0;  
   $sql_general3 = "select statuss, count(*) from incident group by (statuss) order by statuss;";
   $result_general3= pg_exec($conexion,$sql_general3);
   $cuenta3= pg_num_rows($result_general3);
   for($i=0;$i<$cuenta3;$i++){
	   $arreglo_general3=pg_fetch_array($result_general3,$i);
	   if($arreglo_general3[0]=="Accepted"){
		    $pendientes=$arreglo_general3[1];  
	   } 
	   if($arreglo_general3[0]=="Open"){
		    $abiertos=$arreglo_general3[1];  
	   }
	   if($arreglo_general3[0]=="Closed"){
		    $cerrados=$arreglo_general3[1];  
	   }
	   if($arreglo_general3[0]=="Work In Progress"){
		    $enprogreso=$arreglo_general3[1];  
	   }	   	
	      	   
   }
 	$total_abiertos=$abiertos+$pendientes+$enprogreso;
   
?>




<script type="text/javascript" language="javascript">

function pregunta_salir(){
     var resp = confirm("Realmente desea salir de IT Analytics");
	 if(resp == true){
		 location.href="cerrarsesion.php";
	 }
}
	
$(function()
{
	$('#tabla_incidentes').jScrollPane();
	$('#tabla_filtros').jScrollPane();
	$('#tabla_prioridad').jScrollPane();
	$('#tabla_grupo').jScrollPane();
	$('#tabla_urgencia').jScrollPane();
	$('#tabla_ci').jScrollPane();
	$('#tabla_medio_apertura').jScrollPane();	
	$('#tabla_estado_incidente').jScrollPane();	
	$('#tabla_ubicacion').jScrollPane();
	$('#tabla_servicio_afectado').jScrollPane();					
});

  //Funcion para seleccionar dias del mes
  $(function() {
    $( "#selectable_dia_mes" ).selectable({
			
      stop: function() {
		var dias_mes="";
		var cuenta=0;
        $( ".ui-selected", this ).each(function() {
			
          var index = $( "#selectable_dia_mes li" ).index( this );
		  if(cuenta==0){
			 dias_mes=dias_mes+(index+1); 
		  }else{
			 dias_mes=dias_mes+"_"+(index+1); 
		  }
		  cuenta++;		  
        });
		filtro_dias_mes(dias_mes);
		
      }
    });
  });
  
  //Funcion para seleccionar meses
  $(function() {
    $( "#selectable_mes" ).selectable({
      stop: function() {
		var mes="";
		var cuenta=0;		
        $( ".ui-selected", this ).each(function() {
          var index = $( "#selectable_mes li" ).index( this );		  
		  if(cuenta==0){
			 mes=mes+(index+1); 
		  }else{
			 mes=mes+"_"+(index+1); 
		  }
		  cuenta++;		 
        });
		filtro_mes(mes);
      }
    });
  });  
  
  //Función para seleccionar trimestres
  $(function() {
    $( "#selectable_trimestre" ).selectable({
      stop: function() {
		var trimestre="";
		var cuenta=0;		
        $( ".ui-selected", this ).each(function() {
          var index = $( "#selectable_trimestre li" ).index( this );
		  if(cuenta==0){
			 trimestre=trimestre+(index+1); 
		  }else{
			 trimestre=trimestre+"_"+(index+1); 
		  }
		  cuenta++;			  
        });		
		filtro_trimestre(trimestre);
      }
    });
  });   
  
  //Función para seleccionar dias de la semana
  $(function() {
    $( "#selectable_dia_semana" ).selectable({
      stop: function() {
			var dia_semana="";
			var cuenta=0;			
        	$( ".ui-selected", this ).each(function() {
          		var index = $( "#selectable_dia_semana li" ).index( this );
	    		if(cuenta==0){
					 dia_semana=dia_semana+(index+1); 
	  		    }else{
			        dia_semana=dia_semana+"_"+(index+1); 
		     }
		    cuenta++;		  
            });
		filtro_dia_semana(dia_semana);
      }	  
    });
  });     
  
  //Función para seleccionar años
  $(function() {
    $( "#selectable_anno" ).selectable({
      stop: function() {
		var anno="";
		var cuenta=0;		
        $( ".ui-selected", this ).each(function() {
          var index = $( "#selectable_anno li" ).index( this );
		  if(cuenta==0){
			 anno=anno+(index+1); 
		  }else{
			 anno=anno+"_"+(index+1); 
		  }
		  cuenta++;			  
        });
		filtro_anno(anno);
      }
    });
  });    
  
  //Función para generar grafica central

function generar_grafica_central(){
    var chart;
	
	var meses_filtrados = new Array();
	var incidentes_filtrados = new Array();
	var deadline_filtrados = new Array();	
	
	if(document.getElementById("bandera_show").value==0){
    	var meses = document.getElementById("meses_grafica").value;
		arreglo_meses = meses.split("-");
		
		var mostrar = document.getElementById("muestra_meses").value;
		arreglo_mostrar = mostrar.split("-");
			
	    var incidentes = document.getElementById("incidentes_grafica").value;
		//alert(incidentes);
		arreglo_incidentes = incidentes.split("-");
		for(var i=0;i<arreglo_incidentes.length;i++){
		   arreglo_incidentes[i]=parseInt(arreglo_incidentes[i]);	
		}
		
	    var deadline = document.getElementById("deadline_grafica").value;
		arreglo_deadline = deadline.split("-");	
		for(var i=0;i<arreglo_deadline.length;i++){
		   arreglo_deadline[i]=parseInt(arreglo_deadline[i]);	
		}	
		
		var cuenta=0;	
		for(var i=0;i<arreglo_incidentes.length;i++){
			if(arreglo_mostrar[i]!=0){
				meses_filtrados[cuenta]=arreglo_meses[i];
				incidentes_filtrados[cuenta]=arreglo_incidentes[i];
				deadline_filtrados[cuenta]=arreglo_deadline[i];
				cuenta=cuenta+1;
			}
		}		
	}
    
	
	if(document.getElementById("bandera_show").value==1){
    	var dias = document.getElementById("lista_dias").value;
		meses_filtrados = dias.split("-");						
	
    	var incidentes = document.getElementById("incidentes_dias").value;
		incidentes_filtrados = incidentes.split("-");
		
    	var deadline = document.getElementById("deadline_dias").value;
		deadline_filtrados = deadline.split("-");
		
		for(var i=0;i<incidentes_filtrados.length;i++){
		   incidentes_filtrados[i]=parseInt(incidentes_filtrados[i]);	
		}
		for(var i=0;i<deadline_filtrados.length;i++){
		   deadline_filtrados[i]=parseInt(deadline_filtrados[i]);	
		}							
	}
			
	
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'contenedor_grafica',
				backgroundColor: '#797979'
            },
	    title: {
	        text: 'Incidents Within The Dead Line',
			style: {
                color: '#CCC',
				fontSize:'14px'
            }
	    },
			
			credits:{
				enabled: true,
				href:'http://www.jcglobalresources.net',
				position: {
					align: 'right',
					x: -10,
					verticalAlign: 'bottom',
					y: -5					
				},
				itemStyle: {
					cursor: 'pointer',
					color: '#909090',
					fontSize: '10px'
				},
				text:'www.jcgr.net',
			style: {
                color: '#CCC',
				fontSize:'10px'
            }				
				
			},
            xAxis: {
                categories: meses_filtrados,
				labels: {
                    style: {
                        color: '#CCC'
                    }
                }				
            },
			yAxis: { // Primary yAxis
                labels: {
                    formatter: function() {
                        return this.value ;
                    },
                    style: {
                        color: '#CCC'
                    }
                },
                title: {
                    text: 'Incidentes',
                    style: {
                        color: '#CCC'
                    }
                }
            },			
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +' fruits';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y;
                    }
                    return s;
                }
            },
			
            series: [{
                type: 'column',
                name: 'Incidents',
				color: '#009EE1',
                data: incidentes_filtrados
            }, {
                type: 'spline',
                name: 'Dead Line',
				color: '#333',
                data: deadline_filtrados,                
            }, ]
        });
    });	
}
  
function generar_gauge1(){
	var valor1 = document.getElementById("valor_gauge1").value;	 	 
	arreglo_valor1 = valor1.split("-");    
	for(var i=0;i<arreglo_valor1.length;i++){
	   arreglo_valor1[i]=parseFloat(arreglo_valor1[i]);	
	}	
	 	
    var chart = new Highcharts.Chart({
	
	    chart: {
	        renderTo: 'gauge1',
	        type: 'gauge',
	        plotBackgroundColor: null,
	        plotBackgroundImage: null,
	        plotBorderWidth: 0,
	        plotShadow: false,
			backgroundColor: '#797979'
	    },
	    
	    title: {
	        text: '% Incidents Within The Dead Line',
			style: {
                color: '#CCC',
				fontSize:'14px'
            }
	    },
			credits:{
				enabled: true,
				href:'http://www.jcglobalresources.net',				
				position: {
					align: 'right',
					x: -10,
					verticalAlign: 'bottom',
					y: -5					
				},
				itemStyle: {
					cursor: 'pointer',
					color: '#909090',
					fontSize: '10px'
				},
				text:'www.jcgr.net',
			style: {
                color: '#CCC',
				fontSize:'10px'
            }				
				
			},
	    
	    pane: {
	        startAngle: -150,
	        endAngle: 150,
	        background: [{
	            backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#FFF'],
	                    [1, '#333']
	                ]
	            },
	            borderWidth: 0,
	            outerRadius: '109%'
	        }, {
	            backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#333'],
	                    [1, '#FFF']
	                ]
	            },
	            borderWidth: 1,
	            outerRadius: '107%'
	        }, {
	            // default background
	        }, {
	            backgroundColor: '#DDD',
	            borderWidth: 0,
	            outerRadius: '105%',
	            innerRadius: '103%'
	        }]
	    },
	       
	    // the value axis
	    yAxis: {
	        min: 0,
	        max: 100,
	        
	        minorTickInterval: 'auto',
	        minorTickWidth: 1,
	        minorTickLength: 10,
	        minorTickPosition: 'inside',
	        minorTickColor: '#666',
	
	        tickPixelInterval: 30,
	        tickWidth: 2,
	        tickPosition: 'inside',
	        tickLength: 10,
	        tickColor: '#666',
	        labels: {
	            step: 2,
	            rotation: 'auto'
	        },
	        title: {
	            text: '% Incidents'
	        },
	        plotBands: [{
	            from: 0,
	            to: 70,
	            color: '#DF5353' // green #DF5353
	        }, {
	            from: 70,
	            to: 90,
	            color: '#DDDF0D' // yellow
	        }, {
	            from: 90,
	            to: 100,
	            color: '#55BF3B' // red
	        }]        
	    },
	
	    series: [{
	        name: 'Within The Dead Line',
	        data: arreglo_valor1,
	        tooltip: {
	            valueSuffix: ' %'
	        }
	    }]
	
	});	
};


function generar_gauge2(){
	
	var total = document.getElementById("total_incidentes").value;	 	 
	total = parseInt(total);
	
	var abiertos = document.getElementById("total_abiertos").value;	  
	arreglo_abiertos = abiertos.split("-");    
	for(var i=0;i<arreglo_abiertos.length;i++){
	   arreglo_abiertos[i]=parseFloat(arreglo_abiertos[i]);	
	}			
	
    var chart = new Highcharts.Chart({
	
	    chart: {
	        renderTo: 'gauge2',
	        type: 'gauge',
	        plotBackgroundColor: null,
	        plotBackgroundImage: null,
	        plotBorderWidth: 0,
	        plotShadow: false,
			backgroundColor: '#797979'
	    },
	    
	    title: {
	        text: 'Number of Open Incidents',
			style: {
                color: '#CCC',
				fontSize:'14px'
            }
	    },
			credits:{
				enabled: true,
				href:'http://www.jcglobalresources.net',
				position: {
					align: 'right',
					x: -10,
					verticalAlign: 'bottom',
					y: -5					
				},
				itemStyle: {
					cursor: 'pointer',
					color: '#909090',
					fontSize: '10px'
				},
				text:'www.jcgr.net',
							style: {
                color: '#CCC',
				fontSize:'10px'
            }
				
			},		
				    
	    pane: {
	        startAngle: -150,
	        endAngle: 150,
	        background: [{
	            backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#FFF'],
	                    [1, '#333']
	                ]
	            },
	            borderWidth: 0,
	            outerRadius: '109%'
	        }, {
	            backgroundColor: {
	                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
	                stops: [
	                    [0, '#333'],
	                    [1, '#FFF']
	                ]
	            },
	            borderWidth: 1,
	            outerRadius: '107%'
	        }, {
	            
	        }, {
	            backgroundColor: '#DDD',
	            borderWidth: 0,
	            outerRadius: '105%',
	            innerRadius: '103%'
	        }]
	    },
	       
	   
	    yAxis: {
	        min: 0,
	        max: total,
	        
	        minorTickInterval: 'auto',
	        minorTickWidth: 1,
	        minorTickLength: 10,
	        minorTickPosition: 'inside',
	        minorTickColor: '#666',
	
	        tickPixelInterval: 30,
	        tickWidth: 2,
	        tickPosition: 'inside',
	        tickLength: 10,
	        tickColor: '#666',
	        labels: {
	            step: 2,
	            rotation: 'auto'
	        },
	        title: {
	            text: 'Incidents'
	        },
	        plotBands: [{
	            from: 0,
	            to: parseFloat(total*0.2),
	            color: '#55BF3B' 
	        }, {
	            from: parseFloat(total*0.2),
	            to: parseFloat(total*0.5),
	            color: '#DDDF0D' 
	        }, {
	            from: parseFloat(total*0.5),
	            to: total,
	            color: '#DF5353' 
	        }]        
	    },
	
	    series: [{
	        name: 'Incidents Open',
	        data: arreglo_abiertos,
	        tooltip: {
	            valueSuffix: ''
	        }
	    }]
	
	});	
};

function dos_decimales(numero){
	var base = parseFloat(numero);
	stringbase = base.toString();
	nuevabase = stringbase[0]+stringbase[1]+stringbase[2]+stringbase[3]+stringbase[4];
	nuevabase = parseFloat(nuevabase);
	return nuevabase;		
}

function generar_torta(){
	var total = document.getElementById("total_incidentes").value;	 	 
	total = parseInt(total);		
	
	var abiertos = document.getElementById("abiertos").value;	 	 
	abiertos = parseFloat((abiertos*100)/total);
	
	var pendientes = document.getElementById("pendientes").value;	 	 
	pendientes = parseFloat((pendientes*100)/total);
	
	var enprogreso = document.getElementById("enprogreso").value;	 	 
	enprogreso = parseFloat((enprogreso*100)/total);
	
	var cerrados = document.getElementById("cerrados").value;	 	 
	cerrados = parseFloat((cerrados*100)/total);
	
	//alert("total: " + document.getElementById("total_incidentes").value + " abiertos: " + document.getElementById("abiertos").value + " pendientes: " + document.getElementById("pendientes").value + " progreso: " + document.getElementById("enprogreso").value + " cerrados: " + document.getElementById("cerrados").value );
			
		
    var chart;
    $(document).ready(function() {    	
		
		// Build the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'contenedor_pie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
				backgroundColor: '#797979'
            },
			credits:{
				enabled: true,
				href:'http://www.jcglobalresources.net',
				position: {
					align: 'right',
					x: -10,
					verticalAlign: 'bottom',
					y: -5					
				},
				itemStyle: {
					cursor: 'pointer',
					color: '#909090',
					fontSize: '10px'
				},
				text:'www.jcgr.net',
			style: {
                color: '#CCC',
				fontSize:'10px'
            }				
				
			},
            title: {
                text: 'Incident Classification',
				style: {
    	            color: '#CCC',
					fontSize:'14px'
            	}				
            },
            tooltip: {
				valueDecimals: 2,
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>'
            	
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
							if(this.point.percentage){
								var almacena="";
								for(var i=0;i<5;i++){
									 if(String(this.point.percentage)[i]!=null){
										 almacena = almacena + String(this.point.percentage)[i];
									 }
								}
								
								return '<b>'+ this.point.name +'</b>: '+ almacena +' %';	
							}
                            
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Incident Classification',
                data: [                 
					{
                        name: 'Accepted',
                        y: dos_decimales(pendientes),
						color:'#FFAA26'												
					},
                    {
                        name: 'Open',
                        y: dos_decimales(abiertos),
                        sliced: true,
                        selected: true,
						color:'#E41656'
                    },
					{
                        name: 'Closed',
                        y: dos_decimales(cerrados),
						color:'#4FD64E'							
					},
					{
                        name: 'Work In Progress',
                        y: dos_decimales(enprogreso),
						color:'#C4FF26'						
					}
                ]
            }]
        });
    });	
};



function actualiza(){
	$("#cargando").css("display", "inline");
	$("#actualiza").load("recursos/ajaxtablero.php", {filtros: document.getElementById("orden_filtros").value, bandera: document.getElementById("bandera_show").value, indice: 0},function(){	  	    	   	
		$(function()
		{
		  $('#tabla_incidentes').jScrollPane();		
		},$(function(){
		   $('#tabla_filtros').jScrollPane();
		}),$(function(){
			
		}),$(function(){
		//	generar_gauge1();	
		}),$(function(){
		//	generar_gauge2();
		}),$(function(){
		//	generar_torta();	
		}),$(function(){
			$("#cargando").css("display", "none");
		}));  	   		   	      	   	
	});	
	$("#cargando").css("display", "none");
	
}

function actualizar_filtro(filtro,valor){
	$("#cargando").css("display", "inline");
	var band = -1;
	var aux = document.getElementById("orden_filtros").value;
    var filtros = aux.split(",");
	for(var i=0;i<filtros.length;i++){
		 var campos_filtro = filtros[i].split(".");
		 if((campos_filtro[0]==filtro && campos_filtro[1]==valor)){			 
				band=i; 
		 }
	}
	if(band==-1){
        aux = aux+filtro+"."+valor+",";
		document.getElementById("orden_filtros").value=aux;
			
	}else{
		var aux2="";		
		for(var i=0;i<filtros.length;i++){			
			if(i!=band && filtros[i]!="," && filtros[i]!=""){
			    aux2=aux2+filtros[i]+",";				
			}
		}
		document.getElementById("orden_filtros").value=aux2;
	}		
	
	$("#actualiza").load("recursos/ajaxtablero.php", {filtros: document.getElementById("orden_filtros").value, bandera: document.getElementById("bandera_show").value, indice: 0},function(){	  	    	   	
		$(function()
		{	
		  $('#tabla_incidentes').jScrollPane();		
		},$(function(){
		   $('#tabla_filtros').jScrollPane();
		}),$(function(){
		
		}),$(function(){
		//	generar_gauge1();	
		}),$(function(){
		//	generar_gauge2();
		}),$(function(){
		//	generar_torta();	
		}),$(function(){
			$("#cargando").css("display", "none");
		}));  	   		   	      	   	
	});
								   	
}



function actualizar_filtro_tiempo(filtro,valor){
		$("#cargando").css("display", "inline");
	var band = -1;
	var aux = document.getElementById("orden_filtros").value;
    var filtros = aux.split(",");
	for(var i=0;i<filtros.length;i++){
		 var campos_filtro = filtros[i].split(".");
		 if((campos_filtro[0]==filtro && campos_filtro[1]==valor) ||(campos_filtro[0]=="mes" && filtro == "mes") ||(campos_filtro[0]=="trimestre" && filtro == "trimestre") ||(campos_filtro[0]=="dias_mes" && filtro == "dias_mes") ||(campos_filtro[0]=="dias_semana" && filtro == "dias_semana") ||(campos_filtro[0]=="anno" && filtro == "anno")){
			 band=i;
		 }		 
	}
	
	if(band==-1){
        aux = aux+filtro+"."+valor+",";
		document.getElementById("orden_filtros").value=aux;
			
	}else{
		var aux2="";		
		for(var i=0;i<filtros.length;i++){			
			if(i!=band && filtros[i]!="," && filtros[i]!=""){
			    aux2=aux2+filtros[i]+",";				
			}
		}
		document.getElementById("orden_filtros").value=aux2;
		aux = document.getElementById("orden_filtros").value;
        aux = aux+filtro+"."+valor+",";
		document.getElementById("orden_filtros").value=aux;		
	}		
	
	$("#actualiza").load("recursos/ajaxtablero.php", {filtros: document.getElementById("orden_filtros").value,  bandera: document.getElementById("bandera_show").value, indice: 0},function(){
		$(function()
		{
		  $('#tabla_incidentes').jScrollPane();		
		},$(function(){
		   $('#tabla_filtros').jScrollPane();
		}),$(function(){
			//generar_grafica_central();
		}),$(function(){
			//generar_gauge1();	
		}),$(function(){
			//generar_gauge2();
		}),$(function(){
			//generar_torta();	
		}),$(function(){
			$("#cargando").css("display", "none");
		}));   	  		   	   		   	      	   	
	});
					
}

function eliminar_filtro(filtro,valor){
	//alert(filtro+" "+valor);
		$("#cargando").css("display", "inline");
	var band=-1;
	var aux = document.getElementById("orden_filtros").value;
    var filtros = aux.split(",");
	for(var i=0;i<filtros.length;i++){
		 var campos_filtro = filtros[i].split(".");
	     if(campos_filtro[0]==filtro && campos_filtro[1]== valor){
			 band=i;
		 }
	}
	if(band!=-1){
		var aux2="";		
		for(var i=0;i<filtros.length;i++){			
			if(i!=band && filtros[i]!="," && filtros[i]!=""){
			    aux2=aux2+filtros[i]+",";				
			}
		}
		document.getElementById("orden_filtros").value=aux2;				
	}
	
	if(filtro=="dias_mes"){
		document.getElementById("bandera_show").value=0;
		for(var i=1;i<32;i++){
			document.getElementById("dia"+i).className="tiempo_cuadro1 ui-selectee";
		}
	}

	if(filtro=="mes"){
		for(var i=1;i<13;i++){
			document.getElementById("mes"+i).className="tiempo_cuadro1 ui-selectee";
		}
	}	
	
	if(filtro=="trimestre"){
		for(var i=1;i<5;i++){
			document.getElementById("tri"+i).className="tiempo_cuadro1 ui-selectee";
		}
	}	
	
	if(filtro=="dias_semana"){
		for(var i=1;i<8;i++){
			document.getElementById("dias"+i).className="tiempo_cuadro1 ui-selectee";
		}
	}
	
	if(filtro=="anno"){
		for(var i=1;i<17;i++){
			if(document.getElementById("anno"+i)!=null){
				document.getElementById("anno"+i).className="tiempo_cuadro1 ui-selectee";
			}
			
		}
	}			
	
	
	$("#actualiza").load("recursos/ajaxtablero.php", {filtros: document.getElementById("orden_filtros").value, bandera: document.getElementById("bandera_show").value, indice: 0},function(){
		$(function()
		{
		  $('#tabla_incidentes').jScrollPane();		
		},$(function(){
		   $('#tabla_filtros').jScrollPane();
		}),$(function(){
		//	generar_grafica_central();
		}),$(function(){
		//	generar_gauge1();	
		}),$(function(){
		//	generar_gauge2();
		}),$(function(){
		//	generar_torta();	
		}),$(function(){
			$("#cargando").css("display", "none");
		}));			     	   		   	      	   	
	});				
}


function filtro_prioridad(valor){    
   actualizar_filtro("prioridad",valor);    		
}

function filtro_grupo(valor){
   actualizar_filtro("grupo",valor);
}

function filtro_urgencia(valor){
   actualizar_filtro("urgencia",valor);
}

function filtro_ci(valor){
   actualizar_filtro("ci",valor);
}

function filtro_apertura(valor){
   actualizar_filtro("apertura",valor);
}

function filtro_estado(valor){
   actualizar_filtro("estado",valor);
}

function filtro_ubicacion(valor){
   actualizar_filtro("ubicacion",valor);
}

function filtro_servicio(valor){
   actualizar_filtro("servicio",valor);
}

function filtro_dias_mes(valor){
   actualizar_filtro_tiempo("dias_mes",valor);	
}

function filtro_mes(valor){
   actualizar_filtro_tiempo("mes",valor);	
}

function filtro_trimestre(valor){
   actualizar_filtro_tiempo("trimestre",valor);	
}

function filtro_dia_semana(valor){
   actualizar_filtro_tiempo("dias_semana",valor);	   
}

function filtro_anno(valor){
   actualizar_filtro_tiempo("anno",valor);	
}


  $(function () {
	 generar_grafica_central();
	 generar_gauge1();
	 generar_gauge2(); 
	 generar_torta();

});

function cambio(){

	if(document.getElementById("mostrar_dias").innerHTML=="MOSTRAR POR DÍAS"){
		  document.getElementById("bandera_show").value=1;
	}
	if(document.getElementById("mostrar_dias").innerHTML=="MOSTRAR POR MESES"){
		  document.getElementById("bandera_show").value=0;
	}
	
	
}
  
  </script>
</head> 
<body>
	<div class="contenedor_dashboard" id="contenedor_dashboard" >
	
	<div class="barra" id="barra" ><img id="banner" src="recursos/imagenes/banner.png" width="1319" height="69" /> </div>
    <div class="separador1" id="separador1">    	        
        <div class="name_user" id="cerrar" style="border-left:1px solid #666;"><label  onclick="pregunta_salir()" style="cursor:pointer;">Cerrar Sesión</label></div>
    	<div class="name_user" id="usuario"><?php echo $_SESSION["login_usuario"]; ?></div>
        <div class="icon_user" id="conte_icono"> <img id="icono" src="recursos/imagenes/User-icon.png" width="22" height="22" /></div>
    </div>
    
    <div class="contenedor_tiempo" id="contenedor_tiempo" >    	
        <div class="tiempo_1" id="dia_mes">
        	<div class="tiempo_titulo" id="titulo1"><label style="margin-left:5px;">Day Of Month</label></div>
			<ol id="selectable_dia_mes" style="margin-left:-40px; z-index:5;" >
			  <li class="tiempo_cuadro1" id="dia1">01</li>
			  <li class="tiempo_cuadro1" id="dia2">02</li>
			  <li class="tiempo_cuadro1" id="dia3">03</li>
			  <li class="tiempo_cuadro1" id="dia4">04</li>
			  <li class="tiempo_cuadro1" id="dia5">05</li>
			  <li class="tiempo_cuadro1" id="dia6">06</li>
			  <li class="tiempo_cuadro1" id="dia7">07</li>
			  <li class="tiempo_cuadro1" id="dia8">08</li>
			  <li class="tiempo_cuadro1" id="dia9">09</li>
			  <li class="tiempo_cuadro1" id="dia10">10</li>
			  <li class="tiempo_cuadro1" id="dia11">11</li>
			  <li class="tiempo_cuadro1" id="dia12">12</li>
			  <li class="tiempo_cuadro1" id="dia13">13</li>
			  <li class="tiempo_cuadro1" id="dia14">14</li>
			  <li class="tiempo_cuadro1" id="dia15">15</li>
			  <li class="tiempo_cuadro1" id="dia16">16</li>
			  <li class="tiempo_cuadro1" id="dia17">17</li>
			  <li class="tiempo_cuadro1" id="dia18">18</li> 
			  <li class="tiempo_cuadro1" id="dia19">19</li>
			  <li class="tiempo_cuadro1" id="dia20">20</li>
			  <li class="tiempo_cuadro1" id="dia21">21</li>
			  <li class="tiempo_cuadro1" id="dia22">22</li>
			  <li class="tiempo_cuadro1" id="dia23">23</li>
			  <li class="tiempo_cuadro1" id="dia24">24</li>
			  <li class="tiempo_cuadro1" id="dia25">25</li>
			  <li class="tiempo_cuadro1" id="dia26">26</li>
			  <li class="tiempo_cuadro1" id="dia27">27</li>
			  <li class="tiempo_cuadro1" id="dia28">28</li> 
			  <li class="tiempo_cuadro1" id="dia29">29</li>
			  <li class="tiempo_cuadro1" id="dia30">30</li>
			  <li class="tiempo_cuadro1" id="dia31">31</li>                                                         
			</ol>                                    
        </div>
        
    	<div class="tiempo_2" id="mes">
        	<div class="tiempo_titulo" id="titulo2"><label style="margin-left:5px;">Month</label></div>
			<ol id="selectable_mes" style="margin-left:-40px; z-index:4;"  >
			  <li class="tiempo_cuadro1" id="mes1">01</li>
			  <li class="tiempo_cuadro1" id="mes2">02</li>
			  <li class="tiempo_cuadro1" id="mes3">03</li>
			  <li class="tiempo_cuadro1" id="mes4">04</li>
			  <li class="tiempo_cuadro1" id="mes5">05</li>
			  <li class="tiempo_cuadro1" id="mes6">06</li>
			  <li class="tiempo_cuadro1" id="mes7">07</li>
			  <li class="tiempo_cuadro1" id="mes8">08</li>
			  <li class="tiempo_cuadro1" id="mes9">09</li>
			  <li class="tiempo_cuadro1" id="mes10">10</li>
			  <li class="tiempo_cuadro1" id="mes11">11</li>
			  <li class="tiempo_cuadro1" id="mes12">12</li>                                                        
			</ol>             
        </div>
        
    	<div class="tiempo_3" id="trimestre">
        	<div class="tiempo_titulo" id="titulo3"><label style="margin-left:5px;">Quarter</label></div>
			<ol id="selectable_trimestre" style="margin-left:-40px;">
			  <li class="tiempo_cuadro1" id="tri1">ENE-MAR</li>
			  <li class="tiempo_cuadro1" id="tri2">ABR-JUN</li>
			  <li class="tiempo_cuadro1" id="tri3">JUL-SEP</li>
			  <li class="tiempo_cuadro1" id="tri4">OCT-DIC</li>                                                      
			</ol>              
        </div>
        
    	<div class="tiempo_4" id="dia_semana">
        	<div class="tiempo_titulo" id="titulo4"><label style="margin-left:5px;">Day Of The Week</label></div>
			<ol id="selectable_dia_semana" style="margin-left:-40px;">
			  <li class="tiempo_cuadro1" id="dias1">LUN</li>
			  <li class="tiempo_cuadro1" id="dias2">MAR</li>
			  <li class="tiempo_cuadro1" id="dias3">MIE</li>
			  <li class="tiempo_cuadro1" id="dias4">JUE</li>
			  <li class="tiempo_cuadro1" id="dias5">VIE</li>
			  <li class="tiempo_cuadro1" id="dias6">SAB</li>
			  <li class="tiempo_cuadro1" id="dias7">DOM</li>                                                                    
			</ol>            
        </div>
        
    	<div class="tiempo_5" id="anno">
        	<div class="tiempo_titulo" id="titulo5"><label style="margin-left:10px;">Year</label></div>
			<ol id="selectable_anno" style="margin-left:-40px;">
            <?php
			    $con = Conectarse();
			    $sql_select_ano="select distinct extract (year from open_time) from incident order by extract (year from open_time);";
				$result_ano = pg_exec($con,$sql_select_ano);
				$cuenta=pg_num_rows($result_ano);												
				for($i=0;$i<$cuenta;$i++){
					$arreglo_ano = pg_fetch_array($result_ano,$i);
					echo "<li class='tiempo_cuadro1' id='anno".($i+1)."'>".$arreglo_ano[0]."</li>";					
				}
			?>                                                                          
			</ol>                         
        </div>                                
    </div><!-- final contenedor_tiempo" -->
    
    <div class="contenedor_parametros" id="contenedor_parametros">
    
    	<div class="conte_parametros" id="conte_para1">
        	<div class="conte_para_cabecera" id="cabe_para1">Priority</div>
            <div class="conte_para_contenido" id="tabla_prioridad">
            <?php
			  $sql_select_prioridad="select distinct priority from incident order by priority";
			  $result_prioridad=pg_exec($conexion,$sql_select_prioridad);		
			  for($i=0;$i<pg_num_rows($result_prioridad);$i++){
				$arreglo=pg_fetch_array($result_prioridad,$i);
				$aux=$arreglo[0];
				$aux=str_replace(" ","_",$aux);					
				echo "<div class='conte_para_linea' id='prioridad".($i+1)."' onclick=filtro_prioridad('".$aux."')>".$arreglo[0]."</div>";
			  }
			?>
            </div>
        </div>
        
        
        <div class="conte_parametros" id="conte_para2">
        	<div class="conte_para_cabecera" id="cabe_para2">Group</div>
            <div class="conte_para_contenido" id="tabla_grupo">            
            <?php
			  $sql_select_grupo="select distinct group_receive from incident order by group_receive";
			  $result_grupo=pg_exec($conexion,$sql_select_grupo);		
			  for($i=0;$i<pg_num_rows($result_grupo);$i++){
				$arreglo=pg_fetch_array($result_grupo,$i);
				$aux=$arreglo[0];
				$aux=str_replace(" ","_",$aux);					
				echo "<div class='conte_para_linea' id='grupo".($i+1)."' onclick=filtro_grupo('".$aux."')>".$arreglo[0]."</div>";
			  }
			?>                                                                                                                 
            </div>        
        </div>
        
        
        <div class="conte_parametros" id="conte_para3">
        	<div class="conte_para_cabecera" id="cabe_para3">Urgency</div>
            <div class="conte_para_contenido" id="tabla_urgencia">
            <?php
			  $sql_select_urgencia="select distinct urgency from incident order by urgency";
			  $result_urgencia=pg_exec($conexion,$sql_select_urgencia);		
			  for($i=0;$i<pg_num_rows($result_urgencia);$i++){
				$arreglo=pg_fetch_array($result_urgencia,$i);				
				$aux=$arreglo[0];
				$aux=str_replace(" ","_",$aux);				
				echo "<div class='conte_para_linea' id='urgencia".($i+1)."' onclick=filtro_urgencia('".$aux."')>".$arreglo[0]."</div>";
			  }
			?>                                                                                                                  
            </div>                  
        </div>
        
        
        <div class="conte_parametros" id="conte_para4">
        	<div class="conte_para_cabecera" id="cabe_para4">CI</div>
            <div class="conte_para_contenido" id="tabla_ci">
            <?php
			  $sql_select_ci="select distinct ci from incident order by ci";
			  $result_ci=pg_exec($conexion,$sql_select_ci);		
			  for($i=0;$i<pg_num_rows($result_ci);$i++){
				$arreglo=pg_fetch_array($result_ci,$i);
				$aux=$arreglo[0];
				$aux=str_replace(" ","_",$aux);					
				echo "<div class='conte_para_linea' id='ci".($i+1)."' onclick=filtro_ci('".$aux."')>".$arreglo[0]."</div>";
			  }
			?>             
             </div>                 
        </div>
        
        
    	<div class="conte_parametros" id="conte_para5">
        	<div class="conte_para_cabecera" id="cabe_para5">Opening Means</div>
            <div class="conte_para_contenido" id="tabla_medio_apertura">
            <?php
			  $sql_select_medio="select distinct medium from incident order by medium";
			  $result_medio=pg_exec($conexion,$sql_select_medio);		
			  for($i=0;$i<pg_num_rows($result_medio);$i++){
				$arreglo=pg_fetch_array($result_medio,$i);
				$aux=$arreglo[0];
				$aux=str_replace(" ","_",$aux);					
				echo "<div class='conte_para_linea' id='apertura".($i+1)."' onclick=filtro_apertura('".$aux."')>".$arreglo[0]."</div>";
			  }
			?>              
             </div>        
        </div>
        
        
        <div class="conte_parametros" id="conte_para6">
        	<div class="conte_para_cabecera" id="cabe_para6">Incident Status</div>
            <div class="conte_para_contenido" id="tabla_estado_incidente">
            <?php
			  $sql_select_estatus="select distinct statuss from incident order by statuss";
			  $result_estatus=pg_exec($conexion,$sql_select_estatus);		
			  for($i=0;$i<pg_num_rows($result_estatus);$i++){
				$arreglo=pg_fetch_array($result_estatus,$i);
				$aux=$arreglo[0];
				$aux=str_replace(" ","_",$aux);					
				echo "<div class='conte_para_linea' id='estado".($i+1)."' onclick=filtro_estado('".$aux."')>".$arreglo[0]."</div>";
			  }
			?>              
             </div>         
        </div>
        
        
        <div class="conte_parametros" id="conte_para7">
        	<div class="conte_para_cabecera" id="cabe_para7">Location</div>
            <div class="conte_para_contenido" id="tabla_ubicacion">
            <?php
			  $sql_select_ubicacion="select distinct location from incident order by location";
			  $result_ubicacion=pg_exec($conexion,$sql_select_ubicacion);		
			  for($i=0;$i<pg_num_rows($result_ubicacion);$i++){
				$arreglo=pg_fetch_array($result_ubicacion,$i);
				$aux=$arreglo[0];
				$aux=str_replace(" ","_",$aux);					
				echo "<div class='conte_para_linea' id='ubicacion".($i+1)."' onclick=filtro_ubicacion('".$aux."')>".$arreglo[0]."</div>";
			  }
			?>                          
             </div>         
        </div>
        
        
        <div class="conte_parametros" id="conte_para8">
        	<div class="conte_para_cabecera" id="cabe_para8">Affected Service</div>
            <div class="conte_para_contenido" id="tabla_servicio_afectado">
            <?php
			  $sql_select_servicio="select distinct service from incident order by service";
			  $result_servicio=pg_exec($conexion,$sql_select_servicio);		
			  for($i=0;$i<pg_num_rows($result_servicio);$i++){
				$arreglo=pg_fetch_array($result_servicio,$i);
				$aux=$arreglo[0];
				$aux=str_replace(" ","_",$aux);					
				echo "<div class='conte_para_linea' id='servicio".($i+1)."' onclick=filtro_servicio('".$aux."')>".$arreglo[0]."</div>";
			  }
			?>             
             </div>                  
        </div> 
        
               
    </div><!-- final contenedor_parametros -->
        
	<div class="contenedor_reportes" id="contenedor_reportes"></div>
    
    <div id="cargando" style="display:none; width:50px; height:50px; position:absolute; margin-left:640px; margin-top:400px; z-index:10000000;"><img src="recursos/imagenes/loading.gif" width="50" height="50" /></div>    
    
<div id="actualiza" class="actualiza">        
	<div id="parametros">
		<input type="hidden" name="meses_grafica" id="meses_grafica" value="Ene-Feb-Mar-Abr-May-Jun-Jul-Ago-Sep-Oct-Nov-Dic" />
		<input type="hidden" name="incidentes_grafica" id="incidentes_grafica" value="<?php echo $aux1; ?>" />
		<input type="hidden" name="deadline_grafica" id="deadline_grafica" value="<?php echo $aux2; ?>" />
		<input type="hidden" name="valor_gauge1" id="valor_gauge1" value="<?php echo $gauge1; ?>" />
		<input type="hidden" name="valor_gauge2" id="valor_gauge2" value="0" />
		<input type="hidden" name="pendientes" id="pendientes" value="<?php echo $pendientes; ?>" />
		<input type="hidden" name="abiertos" id="abiertos" value="<?php echo $abiertos; ?>" />
		<input type="hidden" name="enprogreso" id="enprogreso" value="<?php echo $enprogreso; ?>" />
		<input type="hidden" name="cerrados" id="cerrados" value="<?php echo $cerrados; ?>" />
		<input type="hidden" name="total_incidentes" id="total_incidentes" value="<?php echo $total_incidentes; ?>" />
		<input type="hidden" name="total_abiertos" id="total_abiertos" value="<?php echo $total_abiertos; ?>" />
        <input type="hidden" name="muestra_meses" id="muestra_meses" value="1-1-1-1-1-1-1-1-1-1-1-1" />
        <input type="hidden" name="bandera_show" id="bandera_show" value="0" />
        
        <input type="hidden" name="lista_dias" id="lista_dias" value="0" />
        <input type="hidden" name="incidentes_dias" id="incidentes_dias" value="0" />
        <input type="hidden" name="deadline_dias" id="deadline_dias" value="0" />
        
		<input type="hidden" name="orden_filtros" id="orden_filtros" value="" />
	</div>    
                    
    <div class="contenedor_filtros" id="contenedor_filtros">
    	<div class="cabecera_filtros" id="cabecera_filtros">
        	<div class="cabecera_ele_1" id="cabecera_ele_1">Descripción del Filtro</div>
        </div>
        <div class="contenido_filtros" id="tabla_filtros"> 
        
        
        <!--<input type="checkbox" name="prueba" value="prueba" id="prueba" class="check_filtro" /> <label for="prueba" class="check_etiqueta">Prueba</label> -->
        </div>        
    </div>
        
    
	<div class="contenedor_grafica" id="contenedor_grafica"></div>
    <!--<div class="mostrar_dias">MOSTRAR POR DÍAS</div>-->
    <div class="contenedor_gauge_1" id="gauge1"></div>
    <div class="contenedor_gauge_2" id="gauge2"></div>
    <div class="contenedor_pie" id="contenedor_pie"></div>
    
    
     <div class="titulo_tabla_incidentes" id="titulo_tabla_incidentes">List of Incidents</div>
    <div class="contenedor_tabla" id="contenedor_tabla" >
    	<div class="cabecera_tabla" id="cabecera_tabla">
        	<div class="elemento_1" id="cabeta_1">Id Incident</div>
            <div class="elemento_2" id="cabeta_2">Opening Date</div>
            <div class="elemento_3" id="cabeta_3">Responsible</div>
            <div class="elemento_4" id="cabeta_4">Status At Closing</div>
            <div class="elemento_5" id="cabeta_5">Group</div>
            <div class="elemento_6" id="cabeta_6">Priority</div>
            <div class="elemento_7" id="cabeta_7">Affected</div>
        </div>
       
        <div class="contenido_tabla" id="tabla_incidentes">
        	
            <?php
			  $sql_select_registros="select * from incident order by cust_id";
			  $result_registros=pg_exec($conexion,$sql_select_registros);		
			  for($i=0;$i<pg_num_rows($result_registros);$i++){
				$arreglo_registros=pg_fetch_array($result_registros,$i);
				echo"<div class='elemento' id='linea_incidente_".($i+1)."'>";
        		echo"<div class='elemento_1_' id='linea_incidente_".($i+1)."_1'>".$arreglo_registros[0]."</div>";
	            echo"<div class='elemento_2_' id='linea_incidente_".($i+1)."_2'>".$arreglo_registros[1]."</div>";
	            echo"<div class='elemento_3_' id='linea_incidente_".($i+1)."_3'>".$arreglo_registros[5]."</div>";
				$aux="";
				
				if($arreglo_registros[12]=="t"){
					$aux="On Time";
				}
				
				if($arreglo_registros[12]=="f"){
					$aux="Off Time";
				}
				
				if($arreglo_registros[12]==null || $arreglo_registros[12]==NULL || $arreglo_registros[12]=="" ){
					$aux="Not Applicable";
				}			
								
	            echo"<div class='elemento_4_' id='linea_incidente_".($i+1)."_4'>".$aux."</div>";
	            echo"<div class='elemento_5_' id='linea_incidente_".($i+1)."_5'>".$arreglo_registros[3]."</div>";
	            echo"<div class='elemento_6_' id='linea_incidente_".($i+1)."_6'>".$arreglo_registros[7]."</div>";
	            echo"<div class='elemento_7_' id='linea_incidente_".($i+1)."_7'>".$arreglo_registros[9]."</div>"; 
				echo"</div>";			
			  }
			?>                                                                                                                                                                                   
       </div> <!-- final contenido tabla -->
   </div> <!-- final contenedor tabla -->
   </div> <!-- final div actualiza -->
   
   


<div class="pie_pagina" id="pie_pagina" >
	Copyright 2013 JC Global Resources LLC | contacto@jcgr.net </br>
</div>




<script language="JavaScript">   
	
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
  
   completa(ancho,"contenedor_dashboard",1349,1335,0,0); 
   	document.getElementById("contenedor_dashboard").style.marginLeft="auto"; 
	document.getElementById("contenedor_dashboard").style.marginRight="auto";   
   
   completa(ancho,"barra",1319,69,10,15);
   completa(ancho,"banner",1319,69,0,0);
   completa(ancho,"separador1",1319,25,80,15);               
   completa(ancho,"contenedor_tiempo",1319,72,105,15);      
   todoslosmargenes(ancho,"dia_mes",527,61,5,0,0,0);
   todoslosmargenes(ancho,"mes",204,61,5,533,0,0);
   todoslosmargenes(ancho,"trimestre",170,61,5,743,0,0);
   todoslosmargenes(ancho,"dia_semana",169,61,5,919,0,5);
   todoslosmargenes(ancho,"anno",225,61,5,1094,0,5);   
   
   document.getElementById("titulo1").style.height=parseInt((((ancho)*20)/1366))+"px";  
   document.getElementById("titulo1").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";       
   document.getElementById("titulo1").style.fontSize=parseInt((((ancho)*13)/1366))+"px";  
   document.getElementById("titulo2").style.height=parseInt((((ancho)*20)/1366))+"px";  
   document.getElementById("titulo2").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";       
   document.getElementById("titulo2").style.fontSize=parseInt((((ancho)*13)/1366))+"px";   
   document.getElementById("titulo3").style.height=parseInt((((ancho)*20)/1366))+"px";  
   document.getElementById("titulo3").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";       
   document.getElementById("titulo3").style.fontSize=parseInt((((ancho)*13)/1366))+"px";
   document.getElementById("titulo4").style.height=parseInt((((ancho)*20)/1366))+"px";  
   document.getElementById("titulo4").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";       
   document.getElementById("titulo4").style.fontSize=parseInt((((ancho)*13)/1366))+"px";   
   document.getElementById("titulo5").style.height=parseInt((((ancho)*20)/1366))+"px";  
   document.getElementById("titulo5").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";       
   document.getElementById("titulo5").style.fontSize=parseInt((((ancho)*13)/1366))+"px"; 
   
   var band1=0;   
   for(var i=0;i<100 && band1==0;i++){
	    if(document.getElementById("dia"+(i+1))!=null){
			document.getElementById("dia"+(i+1)).style.height=parseInt((((ancho)*19)/1366))+"px";  
			document.getElementById("dia"+(i+1)).style.lineHeight=parseInt((((ancho)*19)/1366))+"px";    
   			document.getElementById("dia"+(i+1)).style.fontSize=parseInt((((ancho)*13)/1366))+"px"; 
   			document.getElementById("dia"+(i+1)).style.paddingLeft=parseInt((((ancho)*3)/1366))+"px"; 
   			document.getElementById("dia"+(i+1)).style.paddingRight=parseInt((((ancho)*3)/1366))+"px";
		}else{
		  band1=1;	
		}

   }
   
   var band1=0;
   for(var i=0;i<12;i++){
	    if(document.getElementById("mes"+(i+1))!=null){	   
   			document.getElementById("mes"+(i+1)).style.height=parseInt((((ancho)*19)/1366))+"px";  
			document.getElementById("mes"+(i+1)).style.lineHeight=parseInt((((ancho)*19)/1366))+"px";    
   			document.getElementById("mes"+(i+1)).style.fontSize=parseInt((((ancho)*13)/1366))+"px"; 
   			document.getElementById("mes"+(i+1)).style.paddingLeft=parseInt((((ancho)*3)/1366))+"px"; 
   			document.getElementById("mes"+(i+1)).style.paddingRight=parseInt((((ancho)*3)/1366))+"px";
		}else{
		  band1=1;	
		}		
   }
      
   var band1=0;
   for(var i=0;i<4;i++){
	    if(document.getElementById("tri"+(i+1))!=null){	   
   			document.getElementById("tri"+(i+1)).style.height=parseInt((((ancho)*19)/1366))+"px";  
			document.getElementById("tri"+(i+1)).style.lineHeight=parseInt((((ancho)*19)/1366))+"px";    
   			document.getElementById("tri"+(i+1)).style.fontSize=parseInt((((ancho)*13)/1366))+"px"; 
   			document.getElementById("tri"+(i+1)).style.paddingLeft=parseInt((((ancho)*3)/1366))+"px"; 
   			document.getElementById("tri"+(i+1)).style.paddingRight=parseInt((((ancho)*3)/1366))+"px";
		}else{
		  band1=1;	
		}		
   } 
     
   var band1=0;
   for(var i=0;i<7;i++){
	    if(document.getElementById("dias"+(i+1))!=null){	   
   			document.getElementById("dias"+(i+1)).style.height=parseInt((((ancho)*19)/1366))+"px";  
			document.getElementById("dias"+(i+1)).style.lineHeight=parseInt((((ancho)*19)/1366))+"px";    
   			document.getElementById("dias"+(i+1)).style.fontSize=parseInt((((ancho)*13)/1366))+"px"; 
   			document.getElementById("dias"+(i+1)).style.paddingLeft=parseInt((((ancho)*3)/1366))+"px"; 
   			document.getElementById("dias"+(i+1)).style.paddingRight=parseInt((((ancho)*3)/1366))+"px";
		}else{
		  band1=1;	
		}		
   }
     
   var band1=0;
   for(var i=0;i<8;i++){
	    if(document.getElementById("anno"+(i+1))!=null){	   
   			document.getElementById("anno"+(i+1)).style.height=parseInt((((ancho)*19)/1366))+"px";  
			document.getElementById("anno"+(i+1)).style.lineHeight=parseInt((((ancho)*19)/1366))+"px";    
   			document.getElementById("anno"+(i+1)).style.fontSize=parseInt((((ancho)*13)/1366))+"px"; 
   			document.getElementById("anno"+(i+1)).style.paddingLeft=parseInt((((ancho)*3)/1366))+"px"; 
   			document.getElementById("anno"+(i+1)).style.paddingRight=parseInt((((ancho)*3)/1366))+"px";
		}else{
		  band1=1;	
		}		
   }         
            
   completa(ancho,"contenedor_reportes",288,100,178,15);	
   completa(ancho,"contenedor_parametros",288,1008,284,15);	    
   todoslosmargenes(ancho,"conte_para1",288,120,0,0,7,7);
   todoslosmargenes(ancho,"conte_para2",288,120,0,0,7,7);
   todoslosmargenes(ancho,"conte_para3",288,120,0,0,7,7);
   todoslosmargenes(ancho,"conte_para4",288,120,0,0,7,7);
   todoslosmargenes(ancho,"conte_para5",288,120,0,0,7,7);
   todoslosmargenes(ancho,"conte_para6",288,120,0,0,7,7);
   todoslosmargenes(ancho,"conte_para7",288,120,0,0,7,7);
   todoslosmargenes(ancho,"conte_para8",288,120,0,0,7,7); 
   
   
   
   
   
   for(var i=1;i<9;i++){
   		document.getElementById("cabe_para"+i).style.width=parseInt((((ancho)*283)/1366))+"px";		
   		document.getElementById("cabe_para"+i).style.height=parseInt((((ancho)*18)/1366))+"px";		
   		document.getElementById("cabe_para"+i).style.lineHeight=parseInt((((ancho)*18)/1366))+"px";
   		document.getElementById("cabe_para"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
   }
   
   document.getElementById("tabla_prioridad").style.width=parseInt((((ancho)*288)/1366))+"px";
   document.getElementById("tabla_prioridad").style.height=parseInt((((ancho)*101)/1366))+"px";
   document.getElementById("tabla_prioridad").style.marginTop=parseInt((((ancho)*19)/1366))+"px";
   
   document.getElementById("tabla_grupo").style.width=parseInt((((ancho)*288)/1366))+"px";
   document.getElementById("tabla_grupo").style.height=parseInt((((ancho)*101)/1366))+"px";
   document.getElementById("tabla_grupo").style.marginTop=parseInt((((ancho)*19)/1366))+"px";  
   
   document.getElementById("tabla_urgencia").style.width=parseInt((((ancho)*288)/1366))+"px";
   document.getElementById("tabla_urgencia").style.height=parseInt((((ancho)*101)/1366))+"px";
   document.getElementById("tabla_urgencia").style.marginTop=parseInt((((ancho)*19)/1366))+"px"; 
   
   document.getElementById("tabla_ci").style.width=parseInt((((ancho)*288)/1366))+"px";
   document.getElementById("tabla_ci").style.height=parseInt((((ancho)*101)/1366))+"px";
   document.getElementById("tabla_ci").style.marginTop=parseInt((((ancho)*19)/1366))+"px"; 
   
   document.getElementById("tabla_medio_apertura").style.width=parseInt((((ancho)*288)/1366))+"px";
   document.getElementById("tabla_medio_apertura").style.height=parseInt((((ancho)*101)/1366))+"px";
   document.getElementById("tabla_medio_apertura").style.marginTop=parseInt((((ancho)*19)/1366))+"px"; 
   
   document.getElementById("tabla_estado_incidente").style.width=parseInt((((ancho)*288)/1366))+"px";
   document.getElementById("tabla_estado_incidente").style.height=parseInt((((ancho)*101)/1366))+"px";
   document.getElementById("tabla_estado_incidente").style.marginTop=parseInt((((ancho)*19)/1366))+"px"; 
   
   document.getElementById("tabla_ubicacion").style.width=parseInt((((ancho)*288)/1366))+"px";
   document.getElementById("tabla_ubicacion").style.height=parseInt((((ancho)*101)/1366))+"px";
   document.getElementById("tabla_ubicacion").style.marginTop=parseInt((((ancho)*19)/1366))+"px"; 
   
   document.getElementById("tabla_servicio_afectado").style.width=parseInt((((ancho)*288)/1366))+"px";
   document.getElementById("tabla_servicio_afectado").style.height=parseInt((((ancho)*101)/1366))+"px";
   document.getElementById("tabla_servicio_afectado").style.marginTop=parseInt((((ancho)*19)/1366))+"px";   
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("prioridad"+(i))!=null){	   
   		document.getElementById("prioridad"+i).style.width=parseInt((((ancho)*270)/1366))+"px";		
   		document.getElementById("prioridad"+i).style.height=parseInt((((ancho)*17)/1366))+"px";		
   		document.getElementById("prioridad"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";
   		document.getElementById("prioridad"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
		}else{
		  band1=1;	
		}			
   }    
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("grupo"+(i))!=null){	   
   		document.getElementById("grupo"+i).style.width=parseInt((((ancho)*270)/1366))+"px";		
   		document.getElementById("grupo"+i).style.height=parseInt((((ancho)*17)/1366))+"px";		
   		document.getElementById("grupo"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";
   		document.getElementById("grupo"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
		}else{
		  band1=1;	
		}			
   }     
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("urgencia"+(i))!=null){	   
   		document.getElementById("urgencia"+i).style.width=parseInt((((ancho)*270)/1366))+"px";		
   		document.getElementById("urgencia"+i).style.height=parseInt((((ancho)*17)/1366))+"px";		
   		document.getElementById("urgencia"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";
   		document.getElementById("urgencia"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
		}else{
		  band1=1;	
		}			
   }   
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("ci"+(i))!=null){	   
   		document.getElementById("ci"+i).style.width=parseInt((((ancho)*270)/1366))+"px";		
   		document.getElementById("ci"+i).style.height=parseInt((((ancho)*17)/1366))+"px";		
   		document.getElementById("ci"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";
   		document.getElementById("ci"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
		}else{
		  band1=1;	
		}			
   }     
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("apertura"+(i))!=null){	   
   		document.getElementById("apertura"+i).style.width=parseInt((((ancho)*270)/1366))+"px";		
   		document.getElementById("apertura"+i).style.height=parseInt((((ancho)*17)/1366))+"px";		
   		document.getElementById("apertura"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";
   		document.getElementById("apertura"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
		}else{
		  band1=1;	
		}			
   }                            
   
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("estado"+(i))!=null){	   
   		document.getElementById("estado"+i).style.width=parseInt((((ancho)*270)/1366))+"px";		
   		document.getElementById("estado"+i).style.height=parseInt((((ancho)*17)/1366))+"px";		
   		document.getElementById("estado"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";
   		document.getElementById("estado"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
		}else{
		  band1=1;	
		}			
   }   
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("ubicacion"+(i))!=null){	   
   		document.getElementById("ubicacion"+i).style.width=parseInt((((ancho)*270)/1366))+"px";		
   		document.getElementById("ubicacion"+i).style.height=parseInt((((ancho)*17)/1366))+"px";		
   		document.getElementById("ubicacion"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";
   		document.getElementById("ubicacion"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
		}else{
		  band1=1;	
		}			
   }  
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("servicio"+(i))!=null){	   
   		document.getElementById("servicio"+i).style.width=parseInt((((ancho)*270)/1366))+"px";		
   		document.getElementById("servicio"+i).style.height=parseInt((((ancho)*17)/1366))+"px";		
   		document.getElementById("servicio"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";
   		document.getElementById("servicio"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";
		}else{
		  band1=1;	
		}			
   }
   
   
   completa(ancho,"actualiza",1024,1118,178,310);   
   completa(ancho,"contenedor_filtros",700,100,0,0);             		  
   document.getElementById("cabecera_filtros").style.width=parseInt((((ancho)*700)/1366))+"px";
   document.getElementById("cabecera_filtros").style.height=parseInt((((ancho)*18)/1366))+"px";
   
   
   
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("linea_fil_"+(i))!=null){	   
   			document.getElementById("linea_fil_"+i).style.width=parseInt((((ancho)*700)/1366))+"px";
		    document.getElementById("linea_fil_"+i).style.height=parseInt((((ancho)*16)/1366))+"px";
			
			document.getElementById("linea_fil_"+i+"_1").style.width=parseInt((((ancho)*605)/1366))+"px";
			document.getElementById("linea_fil_"+i+"_1").style.height=parseInt((((ancho)*17)/1366))+"px";
			document.getElementById("linea_fil_"+i+"_1").style.lineHeight=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("linea_fil_"+i+"_1").style.fontSize=parseInt((((ancho)*13)/1366))+"px";
			
			document.getElementById("check_fil_"+i).style.width=parseInt((((ancho)*12)/1366))+"px";
			document.getElementById("check_fil_"+i).style.height=parseInt((((ancho)*12)/1366))+"px";
			document.getElementById("check_fil_"+i).style.marginLeft=parseInt((((ancho)*10)/1366))+"px";			
			document.getElementById("check_fil_"+i).style.marginTop=parseInt((((ancho)*2)/1366))+"px";
			
			document.getElementById("check_lab_"+i).style.fontSize=parseInt((((ancho)*13)/1366))+"px";	
			document.getElementById("check_lab_"+i).style.lineHeight=parseInt((((ancho)*17)/1366))+"px";				
					
		}else{
		  band1=1;	
		}			
   }   
           	document.getElementById("cabecera_ele_1").style.width=parseInt((((ancho)*695)/1366))+"px";
			document.getElementById("cabecera_ele_1").style.height=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabecera_ele_1").style.lineHeight=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabecera_ele_1").style.fontSize=parseInt((((ancho)*13)/1366))+"px";				   						
			
			completa(ancho,"contenedor_grafica",700,450,106,0);
			completa(ancho,"gauge1",318,275,0,706);
			completa(ancho,"gauge2",318,275,281,706);
			completa(ancho,"contenedor_pie",1024,274,562,0);
			
				
			
			document.getElementById("tabla_filtros").style.width=parseInt((((ancho)*700)/1366))+"px";
			document.getElementById("tabla_filtros").style.height=parseInt((((ancho)*82)/1366))+"px";	
			document.getElementById("tabla_filtros").style.marginTop=parseInt((((ancho)*19)/1366))+"px";
			
			
			completa(ancho,"titulo_tabla_incidentes",1024,20,841,0);
			document.getElementById("titulo_tabla_incidentes").style.lineHeight=parseInt((((ancho)*20)/1366))+"px";
			document.getElementById("titulo_tabla_incidentes").style.fontSize=parseInt((((ancho)*12)/1366))+"px";				
			
			completa(ancho,"contenedor_tabla",1024,252,863,0);
				
			document.getElementById("cabecera_tabla").style.width=parseInt((((ancho)*1024)/1366))+"px";
			document.getElementById("cabecera_tabla").style.height=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabecera_tabla").style.lineHeight=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabecera_tabla").style.fontSize=parseInt((((ancho)*12)/1366))+"px";
			
			
			document.getElementById("cabeta_1").style.width=parseInt((((ancho)*65)/1366))+"px";
			document.getElementById("cabeta_1").style.height=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabeta_2").style.width=parseInt((((ancho)*115)/1366))+"px";
			document.getElementById("cabeta_2").style.height=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabeta_3").style.width=parseInt((((ancho)*200)/1366))+"px";
			document.getElementById("cabeta_3").style.height=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabeta_4").style.width=parseInt((((ancho)*115)/1366))+"px";
			document.getElementById("cabeta_4").style.height=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabeta_5").style.width=parseInt((((ancho)*200)/1366))+"px";
			document.getElementById("cabeta_5").style.height=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabeta_6").style.width=parseInt((((ancho)*75)/1366))+"px";
			document.getElementById("cabeta_6").style.height=parseInt((((ancho)*18)/1366))+"px";
			document.getElementById("cabeta_7").style.width=parseInt((((ancho)*196)/1366))+"px";
			document.getElementById("cabeta_7").style.height=parseInt((((ancho)*18)/1366))+"px";
			
			
			document.getElementById("tabla_incidentes").style.width=parseInt((((ancho)*1024)/1366))+"px";
			document.getElementById("tabla_incidentes").style.height=parseInt((((ancho)*233)/1366))+"px";
			document.getElementById("tabla_incidentes").style.marginTop=parseInt((((ancho)*18)/1366))+"px";	
			
			
   band1=0;
   for(var i=1;i<100000 && band1==0;i++){
	    if(document.getElementById("linea_incidente_"+(i))!=null){			
			document.getElementById("linea_incidente_"+i).style.width=parseInt((((ancho)*1024)/1366))+"px";
			document.getElementById("linea_incidente_"+i).style.height=parseInt((((ancho)*18)/1366))+"px";																	
			document.getElementById("linea_incidente_"+i).style.fontSize=parseInt((((ancho)*12)/1366))+"px";
			document.getElementById("linea_incidente_"+i).style.lineHeight=parseInt((((ancho)*18)/1366))+"px";
			
			document.getElementById("linea_incidente_"+i+"_1").style.width=parseInt((((ancho)*65)/1366))+"px";
			document.getElementById("linea_incidente_"+i+"_1").style.height=parseInt((((ancho)*18)/1366))+"px";				
			document.getElementById("linea_incidente_"+i+"_2").style.width=parseInt((((ancho)*115)/1366))+"px";
			document.getElementById("linea_incidente_"+i+"_2").style.height=parseInt((((ancho)*18)/1366))+"px";	
			document.getElementById("linea_incidente_"+i+"_3").style.width=parseInt((((ancho)*200)/1366))+"px";
			document.getElementById("linea_incidente_"+i+"_3").style.height=parseInt((((ancho)*18)/1366))+"px";										
			document.getElementById("linea_incidente_"+i+"_4").style.width=parseInt((((ancho)*115)/1366))+"px";
			document.getElementById("linea_incidente_"+i+"_4").style.height=parseInt((((ancho)*18)/1366))+"px";	
			document.getElementById("linea_incidente_"+i+"_5").style.width=parseInt((((ancho)*200)/1366))+"px";
			document.getElementById("linea_incidente_"+i+"_5").style.height=parseInt((((ancho)*18)/1366))+"px";	
			document.getElementById("linea_incidente_"+i+"_6").style.width=parseInt((((ancho)*75)/1366))+"px";
			document.getElementById("linea_incidente_"+i+"_6").style.height=parseInt((((ancho)*18)/1366))+"px";				
			document.getElementById("linea_incidente_"+i+"_7").style.width=parseInt((((ancho)*196)/1366))+"px";
			document.getElementById("linea_incidente_"+i+"_7").style.height=parseInt((((ancho)*18)/1366))+"px";	

		}else{
		  band1=1;	
		}		
   }  
   
   
   completa(ancho,"pie_pagina",1320,20,1295,15);
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
</div>
</body>
</html>


