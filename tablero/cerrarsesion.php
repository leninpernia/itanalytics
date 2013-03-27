<?php session_start();  
  $_SESSION["administrador"]=NULL;
  $_SESSION["login_administrador"]=NULL;
  $_SESSION["usuario"]=NULL;
  $_SESSION["login_usuario"]=NULL;  
  session_destroy();
  			  ?>
              <script type="text/javascript">
				   location.href='index.php';
			  </script>
              <?     
?>