<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

   function Conectarse(){
	   if(!($conexion=pg_connect("host=187.162.52.203 port=5028 dbname=tablero user=jugador password=jcglobal2013")))
	   {
		   echo "No pudo conectarse al servidor";
	       exit();
	   }
	   return $conexion;
   }   
   
   Conectarse();

?>
</body>
</html>