<?php

   function Conectarse(){
	   if(!($conexion=pg_connect("host=localhost port=5432 dbname=itanalytics user=postgres password=jcglobal")))
	   {
		   echo "No pudo conectarse al servidor";
	       exit();
	   }
	   return $conexion;
   }   
   
   function Menu(){
            echo "<div class='titulo_menu' id='titulo_menu'>Menú Administrador</div>";
        	echo "<a href='registrarnuevousuario.php'><div class='opcion_menu' id='opcion1'>Registrar un nuevo usuario</div></a>";
            echo "<a href='cambiarpassword.php'><div class='opcion_menu' id='opcion2'>Listar Usuarios Registrados</div></a>";			
   }
?>