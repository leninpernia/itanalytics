<?php session_start();  
   require("recursos/funciones.php");
   $conexion = Conectarse();
   
   $con=Conectarse();
   $sql_delete="delete from users where id_user='".$_GET["id"]."'";
   $result= pg_exec($con,$sql_delete);
      
   ?>
   	<script type="text/javascript" language="javascript">
	    location.href="cambiarpassword.php";
	</script>
   <?php     

?>