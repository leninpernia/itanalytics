 <?
   require("funciones.php");
   
   
   
   if($_POST["indice"]==0){ 
   $conexion = Conectarse();
  //echo $_POST["filtros"]."</br>";
  $filtros = explode(",",$_POST["filtros"]);
  $where=" where ";
  $band=0;
  $contadores= array(0,0,0,0,0,0,0,0,0,0,0,0,0);
  $nombres = array("priority","group_receive","urgency","ci","medium","statuss","location","service","dias_mes","mes","trimestre","dias_semana","anno");
  $filtros_prioridad= array();
  $filtros_grupo= array();
  $filtros_urgencia= array();
  $filtros_ci= array();
  $filtros_apertura= array();
  $filtros_estado= array();
  $filtros_ubicacion= array();
  $filtros_servicio= array();
  $filtros_dias_mes = array();
  $filtros_mes = array();
  $filtros_trimestre = array();
  $filtros_dia_semana = array();
  $filtros_anno = array();
  
  $muestra_dias = array();
  $muestra_incidentes = array();
  $muestra_deadline = array();
  $cuenta_muestra = 0;
  $muestra_aux1="";
  $muestra_aux2="";
  $muestra_aux3="";
  
  $band_mostrar=0;
  
    
  for($i=0;$i<sizeof($filtros);$i++){
	   if($filtros[$i]!=""){
		     $campos_filtro = explode(".",$filtros[$i]);
			 $campos_filtro[1]=str_replace("_"," ",$campos_filtro[1]);
			 
			 if($campos_filtro[0]=="prioridad"){				
				$filtros_prioridad[$contadores[0]]=$filtros[$i];
				$contadores[0]=$contadores[0]+1;
			 }
			 
			 if($campos_filtro[0]=="grupo"){				
				$filtros_grupo[$contadores[1]]=$filtros[$i];
				$contadores[1]=$contadores[1]+1;
			 }	
			 
			 if($campos_filtro[0]=="urgencia"){				
				$filtros_urgencia[$contadores[2]]=$filtros[$i];
				$contadores[2]=$contadores[2]+1;
			 }	
			 
			 if($campos_filtro[0]=="ci"){				
				$filtros_ci[$contadores[3]]=$filtros[$i];
				$contadores[3]=$contadores[3]+1;
			 }				 
			 
			 if($campos_filtro[0]=="apertura"){				
				$filtros_apertura[$contadores[4]]=$filtros[$i];
				$contadores[4]=$contadores[4]+1;
			 }	
			 
			 if($campos_filtro[0]=="estado"){				
				$filtros_estado[$contadores[5]]=$filtros[$i];
				$contadores[5]=$contadores[5]+1;
			 }		
			 
			 if($campos_filtro[0]=="ubicacion"){				
				$filtros_ubicacion[$contadores[6]]=$filtros[$i];
				$contadores[6]=$contadores[6]+1;
			 }	
			 
			 if($campos_filtro[0]=="servicio"){				
				$filtros_servicio[$contadores[7]]=$filtros[$i];
				$contadores[7]=$contadores[7]+1;
			 }	
			 
			 if($campos_filtro[0]=="dias_mes"){				
				$filtros_dias_mes[$contadores[8]]=$filtros[$i];
				$contadores[8]=$contadores[8]+1;
			 }		
			 
			 if($campos_filtro[0]=="mes"){				
				$filtros_mes[$contadores[9]]=$filtros[$i];
				$contadores[9]=$contadores[9]+1;
			 }		
			 
			 if($campos_filtro[0]=="trimestre"){				
				$filtros_trimestre[$contadores[10]]=$filtros[$i];
				$contadores[10]=$contadores[10]+1;
			 }	
			 
			 if($campos_filtro[0]=="dias_semana"){				
				$filtros_dia_semana[$contadores[11]]=$filtros[$i];
				$contadores[11]=$contadores[11]+1;
			 }	
			 
			 if($campos_filtro[0]=="anno"){				
				$filtros_anno[$contadores[12]]=$filtros[$i];
				$contadores[12]=$contadores[12]+1;
			 }			 			 			 		 			 			 			 		 			 			 			 			 		 
	   }	   	   	  
  }  
  
  for($i=0;$i<13;$i++){
	  
	  if($contadores[$i]>0 && $nombres[$i]!="dias_mes" && $nombres[$i]!="mes" && $nombres[$i]!="trimestre" && $nombres[$i]!="dias_semana" && $nombres[$i]!="anno"){
		if($band==0){
		  $where=$where." ( ";
			  for($j=0;$j<$contadores[$i];$j++){
				  if($i==0){$aux_filtro = explode(".",$filtros_prioridad[$j]);}
				  if($i==1){$aux_filtro = explode(".",$filtros_grupo[$j]);}
				  if($i==2){$aux_filtro = explode(".",$filtros_urgencia[$j]);}
				  if($i==3){$aux_filtro = explode(".",$filtros_ci[$j]);}
				  if($i==4){$aux_filtro = explode(".",$filtros_apertura[$j]);}
				  if($i==5){$aux_filtro = explode(".",$filtros_estado[$j]);}
				  if($i==6){$aux_filtro = explode(".",$filtros_ubicacion[$j]);}
				  if($i==7){$aux_filtro = explode(".",$filtros_servicio[$j]);}
				  if($j==0){
					  $where=$where." ".$nombres[$i]." = '".str_replace("_"," ",$aux_filtro[1])."' ";
				  }else{
					  $where=$where." or ".$nombres[$i]." = '".str_replace("_"," ",$aux_filtro[1])."' ";  
				  }				  				  
			  }
		  $where=$where." ) ";		
		  $band=1;	
		}else{
		  $where=$where." and ( ";
			  for($j=0;$j<$contadores[$i];$j++){
				  if($i==0){$aux_filtro = explode(".",$filtros_prioridad[$j]);}
				  if($i==1){$aux_filtro = explode(".",$filtros_grupo[$j]);}
				  if($i==2){$aux_filtro = explode(".",$filtros_urgencia[$j]);}
				  if($i==3){$aux_filtro = explode(".",$filtros_ci[$j]);}
				  if($i==4){$aux_filtro = explode(".",$filtros_apertura[$j]);}
				  if($i==5){$aux_filtro = explode(".",$filtros_estado[$j]);}
				  if($i==6){$aux_filtro = explode(".",$filtros_ubicacion[$j]);}
				  if($i==7){$aux_filtro = explode(".",$filtros_servicio[$j]);}
				  if($j==0){
					  $where=$where." ".$nombres[$i]." = '".str_replace("_"," ",$aux_filtro[1])."' ";
				  }else{
					  $where=$where." or ".$nombres[$i]." = '".str_replace("_"," ",$aux_filtro[1])."' ";  
				  }				  				  
			  }
		  $where=$where." ) ";			
		}// final else
	  }//final if($contadores[$i]>0){
  }// final for
 // echo $where;
 
 
 //calculo de filtro mes y trimestre
 $meses_seleccionados = array(0,0,0,0,0,0,0,0,0,0,0,0);
 
 
 $aux_meses1=explode(".",$filtros_mes[0]);
 if(sizeof($aux_meses1)>0){
	$aux_meses2=explode("_",$aux_meses1[1]);
	for($i=0;$i<(sizeof($aux_meses2));$i++){		
	   $meses_seleccionados[($aux_meses2[$i]-1)]=1;	
	}
			 
 }else{
	 $meses_seleccionados[0]=1;$meses_seleccionados[1]=1;$meses_seleccionados[2]=1;$meses_seleccionados[3]=1;$meses_seleccionados[4]=1;$meses_seleccionados[5]=1;
	 $meses_seleccionados[6]=1;$meses_seleccionados[7]=1;$meses_seleccionados[8]=1;$meses_seleccionados[9]=1;$meses_seleccionados[10]=1;$meses_seleccionados[11]=1;	 
 }
   
 $aux_trimestre1=explode(".",$filtros_trimestre[0]);
 if(sizeof($aux_trimestre1)>0){
	 $aux_trimestre2=explode("_",$aux_trimestre1[1]);
	 for($i=0;$i<sizeof($aux_trimestre2);$i++){
		  if($aux_trimestre2[$i]==1){
			  $meses_seleccionados[0]=$meses_seleccionados[0]+1;
			  $meses_seleccionados[1]=$meses_seleccionados[1]+1;
			  $meses_seleccionados[2]=$meses_seleccionados[2]+1;  
		  }
		  if($aux_trimestre2[$i]==2){
			  $meses_seleccionados[3]=$meses_seleccionados[3]+1;
			  $meses_seleccionados[4]=$meses_seleccionados[4]+1;
			  $meses_seleccionados[5]=$meses_seleccionados[5]+1;  
		  }
		  if($aux_trimestre2[$i]==3){
			  $meses_seleccionados[6]=$meses_seleccionados[6]+1;
			  $meses_seleccionados[7]=$meses_seleccionados[7]+1;
			  $meses_seleccionados[8]=$meses_seleccionados[8]+1;  
		  }
		  if($aux_trimestre2[$i]==4){
			  $meses_seleccionados[9]=$meses_seleccionados[9]+1;
			  $meses_seleccionados[10]=$meses_seleccionados[10]+1;
			  $meses_seleccionados[11]=$meses_seleccionados[11]+1;  
		  }	  		  		  		  
	 }
 }
 
 
 
 
 // echo $meses_seleccionados[0]." ".$meses_seleccionados[1]." ".$meses_seleccionados[2]." ".$meses_seleccionados[3]." ".$meses_seleccionados[4]." ".$meses_seleccionados[5]." ".$meses_seleccionados[6]." ".$meses_seleccionados[7]." ".$meses_seleccionados[8]." ".$meses_seleccionados[9]." ".$meses_seleccionados[10]." ".$meses_seleccionados[11]."</br>";
  $bandera_meses=0;
  for($i=0;$i<12;$i++){
	  if($meses_seleccionados[$i]==1 || $meses_seleccionados[$i]==2 ){
		  $bandera_meses=1;  
	  }
  }
   
  if($bandera_meses==1){
  	if($band==0){
		$where=$where." ( ";
		    $cuenta=0;
	  		for($i=0;$i<12;$i++){
		        if($meses_seleccionados[$i]!=0){
					if($cuenta==0){
						$where=$where." extract ( month from open_time ) = '".($i+1)."' ";
					    $cuenta++;
					}else{
						$where=$where." or extract ( month from open_time ) = '".($i+1)."' ";
						$cuenta++;
					}					
				}

	  		}
		$where=$where." ) ";
		$band=1;	  	
  	}else if ($band==1){
		$where=$where." and ( ";
			$cuenta=0;
	  		for($i=0;$i<12;$i++){
		        if($meses_seleccionados[$i]!=0){
					if($cuenta==0){
						$where=$where." extract ( month from open_time ) = '".($i+1)."' ";
					    $cuenta++;
					}else{
						$where=$where." or extract ( month from open_time ) = '".($i+1)."' ";
						$cuenta++;
					}					
				}		  
	  		}
		$where=$where." ) ";	  
  	}	  	  	  	  
  }//fin if banderameses
  

//calculo filtro dias mes
 $aux_diames1=explode(".",$filtros_dias_mes[0]);
 if($filtros_dias_mes[0]!=""){
	 $band_mostrar=1;	
	$aux_diames2=explode("_",$aux_diames1[1]);
	if($band==0){
		$where=$where." ( ";
		$cuenta=0;
			for($i=0;$i<(sizeof($aux_diames2));$i++){		
				if($cuenta==0){
					$where=$where." extract ( day from open_time ) = '".$aux_diames2[$i]."' ";
					$cuenta++;	
					$muestra_dias[$cuenta_muestra]=$aux_diames2[$i];
					$cuenta_muestra++;
				}else{
					$where=$where." or extract ( day from open_time ) = '".$aux_diames2[$i]."' ";
					$cuenta++;	
					$muestra_dias[$cuenta_muestra]=$aux_diames2[$i];
					$cuenta_muestra++;									
				}
			}
		$where=$where." ) ";	
	
	$band=1;	
	}else{
		$where=$where." and ( ";
		$cuenta=0;
			for($i=0;$i<(sizeof($aux_diames2));$i++){		
				if($cuenta==0){
					$where=$where." extract ( day from open_time ) = '".$aux_diames2[$i]."' ";
					$cuenta++;	
					$muestra_dias[$cuenta_muestra]=$aux_diames2[$i];
					$cuenta_muestra++;					
				}else{
					$where=$where." or extract ( day from open_time ) = '".$aux_diames2[$i]."' ";
					$cuenta++;	
					$muestra_dias[$cuenta_muestra]=$aux_diames2[$i];
					$cuenta_muestra++;									
				}
			}
		$where=$where." ) ";		
	}				 
 }

  
//calculo filtro dia semana
 $aux_diasemana1=explode(".",$filtros_dia_semana[0]);
 if($filtros_dia_semana[0]!=""){
	 $aux_diasemana2=explode("_",$aux_diasemana1[1]);
	 if($band==0){
     	$where=$where." ( ";
			$cuenta=0;
			for($i=0;$i<(sizeof($aux_diasemana2));$i++){		
				$dia=-1;
				if($aux_diasemana2[$i]==7){
				  $dia=0;	
				}else{
				  $dia=$aux_diasemana2[$i];	
				}
				if($cuenta==0){
					$where=$where." extract ( dow from open_time ) = '".$dia."' ";
					$cuenta++;					
				}else{
					$where=$where." or extract ( dow from open_time ) = '".$dia."' ";
					$cuenta++;						
				}				
			}
	 	$where=$where." ) ";
		$band=1;
	 }else{
     	$where=$where." and ( ";
			$cuenta=0;
			for($i=0;$i<(sizeof($aux_diasemana2));$i++){		
				$dia=-1;
				if($aux_diasemana2[$i]==7){
				  $dia=0;	
				}else{
				  $dia=$aux_diasemana2[$i];	
				}
				if($cuenta==0){
					$where=$where." extract ( dow from open_time ) = '".$dia."' ";
					$cuenta++;					
				}else{
					$where=$where." or extract ( dow from open_time ) = '".$dia."' ";
					$cuenta++;						
				}				
			}
	 	$where=$where." ) ";		 		 		 		 
	 }
	 
 }
 
 //calculo filtro anno
 $aux_anno1=explode(".",$filtros_anno[0]);
 $vector_anos= array();
 $sql_select_ano="select distinct extract (year from open_time) from incident order by extract (year from open_time);";
 $result_ano = pg_exec($conexion,$sql_select_ano);
 $cuenta=pg_num_rows($result_ano);

 
 for($i=0;$i<$cuenta;$i++){
	$arreglo_ano = pg_fetch_array($result_ano,$i);
	$vector_anos[$i]=$arreglo_ano[0];	
 }
				
				 
 if($filtros_anno[0]!=""){
	$aux_anno2=explode("_",$aux_anno1[1]);
	 if($band==0){
     	$where=$where." ( ";
		$cuenta=0;
		for($i=0;$i<(sizeof($aux_anno2));$i++){
			if($cuenta==0){
			  $where=$where." extract ( year from open_time ) = '".$vector_anos[($aux_anno2[$i]-1)]."' ";				
			  $cuenta++;
			}else{
			  $where=$where." or extract ( year from open_time ) = '".$vector_anos[($aux_anno2[$i]-1)]."' ";
			  $cuenta++;
			}
		}
	 	$where=$where." ) ";
		$band=1;					
	 }else{
     	$where=$where." and ( ";
		$cuenta=0;
		for($i=0;$i<(sizeof($aux_anno2));$i++){
			if($cuenta==0){
			  $where=$where." extract ( year from open_time ) = '".$vector_anos[($aux_anno2[$i]-1)]."' ";				
			  $cuenta++;
			}else{
			  $where=$where." or extract ( year from open_time ) = '".$vector_anos[($aux_anno2[$i]-1)]."' ";
			  $cuenta++;
			}
		}
	 	$where=$where." ) ";		 
		 
	 }
	 
 }

 
 
 //Calculo de super consulta jajajaja   
   
   $pendientes=0;
   $abiertos=0;
   $enprogreso=0;
   $cerrados=0;  
   $total_abiertos=0;	   
  
   $sql_aux1="select extract (month from open_time) as mes, count(CASE WHEN (dead_line=true or dead_line=false) THEN 0 END) as incidentes, count(CASE WHEN dead_line=true THEN 0 END) as dentro_dead_line, count(CASE WHEN statuss = 'Accepted' THEN 0 END) as aceptados, count(CASE WHEN statuss = 'Closed' THEN 0 END) as cerrados, count(CASE WHEN statuss = 'Open' THEN 0 END) as abiertos, count(CASE WHEN statuss = 'Work In Progress' THEN 0 END) as en_progreso  from incident  ".$where."  group by extract (month from open_time) order by mes";   
   $sql_aux2="select extract (month from open_time) as mes, count(CASE WHEN (dead_line=true or dead_line=false) THEN 0 END) as incidentes, count(CASE WHEN dead_line=true THEN 0 END) as dentro_dead_line, count(CASE WHEN statuss = 'Accepted' THEN 0 END) as aceptados, count(CASE WHEN statuss = 'Closed' THEN 0 END) as cerrados, count(CASE WHEN statuss = 'Open' THEN 0 END) as abiertos, count(CASE WHEN statuss = 'Work In Progress' THEN 0 END) as en_progreso  from incident group by extract (month from open_time) order by mes";
   $sql_todos1="select * from incident ".$where." ";
   $sql_todos2="select * from incident";
   
   $sql_general="";
   $sql_todos="";
   if($where==" where "){
       $sql_general=$sql_aux2;	
	   $sql_todos=$sql_todos2;   
   }else{
	   $sql_general=$sql_aux1;
	   $sql_todos=$sql_todos1;
   }
   
   $result_general= pg_exec($conexion,$sql_general);
   $numero_inicentes_mes=array(0,0,0,0,0,0,0,0,0,0,0,0);
   $aux1="";
   $total_incidentes=0;
   
   $numero_inicentes_dead=array(0,0,0,0,0,0,0,0,0,0,0,0);
   $aux2="";
   $total_deadline=0;
      
   for($i=0;$i<pg_num_rows($result_general);$i++){
	  $arreglo_general=pg_fetch_array($result_general,$i);
	  $numero_inicentes_mes[($arreglo_general[0]-1)]=$arreglo_general[1]; 
	  $numero_inicentes_dead[($arreglo_general[0]-1)]=$arreglo_general[2];  
	  
	  $pendientes=$pendientes+$arreglo_general[3];
	  $cerrados=$cerrados+$arreglo_general[4];
	  $abiertos=$abiertos+$arreglo_general[5];	  
	  $enprogreso=$enprogreso+$arreglo_general[6];  
   }   
   
   for($i=0;$i<12;$i++){
	  if($i<11){
		  $aux1=$aux1.$numero_inicentes_mes[$i]."-";
		  $aux2=$aux2.$numero_inicentes_dead[$i]."-";		  
	  }else{
		  $aux1=$aux1.$numero_inicentes_mes[$i];
		  $aux2=$aux2.$numero_inicentes_dead[$i];
	  }
	 // $total_incidentes=$total_incidentes+$numero_inicentes_mes[$i];
	  $total_deadline=$total_deadline+$numero_inicentes_dead[$i];		  	     
   }     
   
   $result_general_aux= pg_exec($conexion,$sql_todos);
   $total_incidentes = pg_num_rows($result_general_aux);     
   

   
   
	//calculo del % de incidentes dentro del deadline
	if($total_incidentes>0){
		$gauge1 = round((($total_deadline*100)/$total_incidentes),2);
	}else{
	    $gauge1= 0;		
	}
	
	$total_abiertos=$abiertos+$pendientes+$enprogreso;

   //Calculo nuevo para mostrar por dias      
   if($_POST["bandera"]==1){
	    //echo $where."</br>";
		$sql_muestra1="select extract (day from open_time) as dia, count(CASE WHEN (dead_line=true or dead_line=false) THEN 0 END) as incidentes, count(CASE WHEN dead_line=true THEN 0 END) as dentro_dead_line  from incident ".$where." group by extract (day from open_time) order by dia;";   
		$sql_muestra2="select extract (day from open_time) as dia, count(CASE WHEN (dead_line=true or dead_line=false) THEN 0 END) as incidentes, count(CASE WHEN dead_line=true THEN 0 END) as dentro_dead_line  from incident group by extract (day from open_time) order by dia;";
	    $sql_todos1="select * from incident ".$where." ";
	    $sql_todos2="select * from incident";	    
		$sql_general_muestra="";
		$sql_todos="";
		
	   if($where==" where "){
    	   $sql_general_muestra=$sql_muestra2;
		   $sql_todos=$sql_todos2;	   
	   }else{
		   $sql_general_muestra=$sql_muestra1;
		   $sql_todos=$sql_todos1;
	   }	
	   //echo $sql_general_muestra;   
	   $result_general_muestra= pg_exec($conexion,$sql_general_muestra);
	   	  
		  
		for($i=0;$i<$cuenta_muestra;$i++){
		      $muestra_incidentes[$i]=0;
			  $muestra_deadline[$i]=0;
		}
		  
   	   for($i=0;$i<pg_num_rows($result_general_muestra);$i++){
	  		$arreglo_muestra=pg_fetch_array($result_general_muestra,$i);			
	        for($j=0;$j<$cuenta_muestra;$j++){
				if($arreglo_muestra[0]==$muestra_dias[$j]){
					$muestra_incidentes[$j]=$arreglo_muestra[1];
					$muestra_deadline[$j]=$arreglo_muestra[2];					
					break;
				}
			}
	  }
	   	   	   
	   
	   for($i=0;$i<$cuenta_muestra;$i++){
		   if($i==0){
			   $muestra_aux1=$muestra_aux1.$muestra_dias[$i];
			   $muestra_aux2=$muestra_aux2.$muestra_incidentes[$i];
			   $muestra_aux3=$muestra_aux3.$muestra_deadline[$i];
		   }else{
			   $muestra_aux1=$muestra_aux1."-".$muestra_dias[$i];
			   $muestra_aux2=$muestra_aux2."-".$muestra_incidentes[$i];
			   $muestra_aux3=$muestra_aux3."-".$muestra_deadline[$i];			   
		   }		   		   
	   }	
	 // echo $muestra_aux1." _____ ".$muestra_aux2." _____ ".$muestra_aux3;	   
   }

	    	   	   	   	   	   	   	   	   	   	   	   	   	   	   	   	   	   	   	  	   	   	   	   	   	   	   	   	   	   
		echo "<div id='parametros'>";
		echo "<input type='hidden' name='meses_grafica' id='meses_grafica' value='Ene-Feb-Mar-Abr-May-Jun-Jul-Ago-Sep-Oct-Nov-Dic' />";
		echo "<input type='hidden' name='incidentes_grafica' id='incidentes_grafica' value='".$aux1."' />";
		echo "<input type='hidden' name='deadline_grafica' id='deadline_grafica' value='".$aux2."' />";
		echo "<input type='hidden' name='valor_gauge1' id='valor_gauge1' value='".$gauge1."' />";
		echo "<input type='hidden' name='valor_gauge2' id='valor_gauge2' value='0' />";
		echo "<input type='hidden' name='pendientes' id='pendientes' value='".$pendientes."' />";
		echo "<input type='hidden' name='abiertos' id='abiertos' value='".$abiertos."' />";
		echo "<input type='hidden' name='enprogreso' id='enprogreso' value='".$enprogreso."' />";
		echo "<input type='hidden' name='cerrados' id='cerrados' value='".$cerrados."' />";
		echo "<input type='hidden' name='total_incidentes' id='total_incidentes' value='".$total_incidentes."' />";
		echo "<input type='hidden' name='total_abiertos' id='total_abiertos' value='".$total_abiertos."' />";
		$valoraux=$meses_seleccionados[0]."-".$meses_seleccionados[1]."-".$meses_seleccionados[2]."-".$meses_seleccionados[3]."-".$meses_seleccionados[4]."-".$meses_seleccionados[5]."-".$meses_seleccionados[6]."-".$meses_seleccionados[7]."-".$meses_seleccionados[8]."-".$meses_seleccionados[9]."-".$meses_seleccionados[10]."-".$meses_seleccionados[11];
		if($valoraux=="0-0-0-0-0-0-0-0-0-0-0-0"){
		   $valoraux="1-1-1-1-1-1-1-1-1-1-1-1";	
		}
		
        echo "<input type='hidden' name='muestra_meses' id='muestra_meses' value='".$valoraux."' />";
		
		if($_POST["bandera"]==0 ){
			echo "<input type='hidden' name='bandera_show' id='bandera_show' value='0' />";		
		}
		
		if($_POST["bandera"]==1 ){
			echo "<input type='hidden' name='bandera_show' id='bandera_show' value='1' />";		
		}		
		
        echo "<input type='hidden' name='lista_dias' id='lista_dias' value='".$muestra_aux1."' />";
        echo "<input type='hidden' name='incidentes_dias' id='incidentes_dias' value='".$muestra_aux2."' />";
        echo "<input type='hidden' name='deadline_dias' id='deadline_dias' value='".$muestra_aux3."' />";
		
		//echo "<input type='hidden' name='bandera_show' id='bandera_show' value='0' />";		
		echo "<input type='hidden' name='orden_filtros' id='orden_filtros' value='".$_POST["filtros"]."' />";
		echo "</div>"; 
		
	
		
	    $filtros = explode(",",$_POST["filtros"]);
		$cuenta=1;
		$nombres_filtros = array();
		$nombres_filtros["prioridad"]="Prioridad:";$nombres_filtros["grupo"]="Grupo:";$nombres_filtros["urgencia"]="Urgencia:";$nombres_filtros["ci"]="Ci:";
		$nombres_filtros["apertura"]="Medio de Apertura:";$nombres_filtros["estado"]="Estado del Incidente:";$nombres_filtros["ubicacion"]="Ubicación:";$nombres_filtros["servicio"]="Servicio Afectado:";
		$nombres_filtros["dias_mes"]="Dias del Mes:";$nombres_filtros["mes"]="Mes:";$nombres_filtros["trimestre"]="Trimestre:";$nombres_filtros["dias_semana"]="Dias de la Semana:";$nombres_filtros["anno"]="Año:";
								
	    echo "<div class='contenedor_filtros' id='contenedor_filtros'>";
    	echo "<div class='cabecera_filtros' id='cabecera_filtros'>";
        echo "<div class='cabecera_ele_1' id='cabecera_ele_1'>Descripción del Filtro</div>";
        echo "</div>";
        echo "<div class='contenido_filtros' id='tabla_filtros'>"; 

		for($i=0;$i<(sizeof($filtros));$i++){			
			$aux= explode(".",$filtros[$i]);
			if($aux[0]=="prioridad" || $aux[0]=="grupo" || $aux[0]=="urgencia" || $aux[0]=="ci"
			|| $aux[0]=="apertura" || $aux[0]=="estado" || $aux[0]=="ubicacion" || $aux[0]=="servicio" ){
				echo "<div class='elemento_filtros' id='linea_fil_".$cuenta."'>";
            	echo "<div class='filtro_ele_1' id='linea_fil_".$cuenta."_1'>";              
				echo "<input type='checkbox' checked='checked' name='check_fil_".$cuenta."' value='".$cuenta."' id='check_fil_".$cuenta."' class='check_filtro' onchange=eliminar_filtro('".$aux[0]."','".$aux[1]."') /> <label for='check_fil_".$cuenta."' id='check_lab_".$cuenta."' class='check_etiqueta'>".$nombres_filtros[$aux[0]]." ".str_replace("_"," ",$aux[1])."</label> ";
			    echo "</div>";
	            echo "</div>";
			}
			if($aux[0]=="anno"){
				$aux_anno=explode("_",$aux[1]);
				$aux_text="";

				 $sql_select_ano="select distinct extract (year from open_time) from incident order by extract (year from open_time);";
				 $result_ano = pg_exec($conexion,$sql_select_ano);				  
				 for($j=0;$j<pg_num_rows($result_ano);$j++){
					$arreglo_ano = pg_fetch_array($result_ano,$j);
					$vector_anos[$j]=$arreglo_ano[0];	
				 }
				 
				for($j=0;$j<sizeof($aux_anno);$j++){
					$aux_text=$aux_text." ".$vector_anos[($aux_anno[$j]-1)];										
				}
					echo "<div class='elemento_filtros' id='linea_fil_".$cuenta."'>";
	            	echo "<div class='filtro_ele_1' id='linea_fil_".$cuenta."_1'>";
					echo "<input type='checkbox' checked='checked' name='check_fil_".$cuenta."' value='".$cuenta."' id='check_fil_".$cuenta."' class='check_filtro' onchange=eliminar_filtro('".$aux[0]."','".$aux[1]."') /> <label for='check_fil_".$cuenta."' id='check_lab_".$cuenta."' class='check_etiqueta'>".$nombres_filtros[$aux[0]]." ".$aux_text."</label> ";					
					echo "</div>";

		            echo "</div>";									 								
			}			
			
			if($aux[0]=="dias_mes"){
				$aux_dias=explode("_",$aux[1]);
				$aux_text="";
				for($j=0;$j<sizeof($aux_dias);$j++){
					$aux_text=$aux_text." ".$aux_dias[$j];					
				}
					echo "<div class='elemento_filtros' id='linea_fil_".$cuenta."'>";
	            	echo "<div class='filtro_ele_1' id='linea_fil_".$cuenta."_1'>";
					echo "<input type='checkbox' checked='checked' name='check_fil_".$cuenta."' value='".$cuenta."' id='check_fil_".$cuenta."' class='check_filtro' onchange=eliminar_filtro('".$aux[0]."','".$aux[1]."') /> <label for='check_fil_".$cuenta."' id='check_lab_".$cuenta."' class='check_etiqueta'>".$nombres_filtros[$aux[0]]." ".$aux_text."</label> ";					
					echo "</div>";

		            echo "</div>";				
			}
			if($aux[0]=="mes"){
				$aux_mes=explode("_",$aux[1]);
				$aux_text="";
				$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				for($j=0;$j<sizeof($aux_mes);$j++){
					$aux_text=$aux_text." ".$meses[($aux_mes[$j]-1)];					
				}				
					echo "<div class='elemento_filtros' id='linea_fil_".$cuenta."'>";
	            	echo "<div class='filtro_ele_1' id='linea_fil_".$cuenta."_1'>";
					echo "<input type='checkbox' checked='checked' name='check_fil_".$cuenta."' value='".$cuenta."' id='check_fil_".$cuenta."' class='check_filtro' onchange=eliminar_filtro('".$aux[0]."','".$aux[1]."') /> <label for='check_fil_".$cuenta."' id='check_lab_".$cuenta."' class='check_etiqueta'>".$nombres_filtros[$aux[0]]." ".$aux_text."</label> ";					
					echo "</div>";

		            echo "</div>";				
			}
			if($aux[0]=="trimestre"){
				$aux_trimestre=explode("_",$aux[1]);
				$aux_text="";
				$trimestres=array("Enero-Marzo","Abril-Junio","Julio-Septiembre","Octubre-Diciembre");
				for($j=0;$j<sizeof($aux_trimestre);$j++){
					$aux_text=$aux_text." ".$trimestres[($aux_trimestre[$j]-1)];										
				}				
					echo "<div class='elemento_filtros' id='linea_fil_".$cuenta."'>";
	            	echo "<div class='filtro_ele_1' id='linea_fil_".$cuenta."_1'>";
					echo "<input type='checkbox' checked='checked' name='check_fil_".$cuenta."' value='".$cuenta."' id='check_fil_".$cuenta."' class='check_filtro' onchange=eliminar_filtro('".$aux[0]."','".$aux[1]."') /> <label for='check_fil_".$cuenta."' id='check_lab_".$cuenta."' class='check_etiqueta'>".$nombres_filtros[$aux[0]]." ".$aux_text."</label> ";					
					echo "</div>";

		            echo "</div>";								
			}
			if($aux[0]=="dias_semana"){
				$aux_semana=explode("_",$aux[1]);
				$aux_text="";
				$semana=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
				for($j=0;$j<sizeof($aux_semana);$j++){
					$aux_text=$aux_text." ".$semana[($aux_semana[$j]-1)];										
				}
					echo "<div class='elemento_filtros' id='linea_fil_".$cuenta."'>";
	            	echo "<div class='filtro_ele_1' id='linea_fil_".$cuenta."_1'>"; 
					echo "<input type='checkbox' checked='checked' name='check_fil_".$cuenta."' value='".$cuenta."' id='check_fil_".$cuenta."' class='check_filtro' onchange=eliminar_filtro('".$aux[0]."','".$aux[1]."') /> <label for='check_fil_".$cuenta."' id='check_lab_".$cuenta."' class='check_etiqueta'>".$nombres_filtros[$aux[0]]." ".$aux_text."</label> ";					
					echo "</div>";

		            echo "</div>";											
			}

			
			$cuenta=$cuenta+1;
		}			
		
		                
        echo "</div>";
	    echo "</div>";		
								        
    	echo "<div class='contenedor_grafica' id='contenedor_grafica'></div>";
		
		if($_POST["bandera"]==0 && $band_mostrar==1){
			echo "<div class='mostrar_dias' onclick='cambio(),actualiza()'> <label style='cursor:pointer;' id='mostrar_dias'>MOSTRAR POR DÍAS</label></div>";
		}
		
		if($_POST["bandera"]==1 && $band_mostrar==1){
			echo "<div class='mostrar_dias' onclick='cambio(),actualiza()'> <label style='cursor:pointer;' id='mostrar_dias'>MOSTRAR POR MESES</label></div>";
		}		
		
		
		
	    echo "<div class='contenedor_gauge_1' id='gauge1'></div>";
	    echo "<div class='contenedor_gauge_2' id='gauge2'></div>";
	    echo "<div class='contenedor_pie' id='contenedor_pie'></div>";
    		
        echo "<div class='titulo_tabla_incidentes' id='titulo_tabla_incidentes'>List of Incidents</div>";
	    echo "<div class='contenedor_tabla' id='contenedor_tabla' >";
    	echo "<div class='cabecera_tabla' id='cabecera_tabla'>";
        echo "<div class='elemento_1' id='cabeta_1'>Id Incident</div>";
        echo "<div class='elemento_2' id='cabeta_2'>Opening Date</div>";
        echo "<div class='elemento_3' id='cabeta_3'>Responsible</div>";
        echo "<div class='elemento_4' id='cabeta_4'>Status At Closing</div>";
        echo "<div class='elemento_5' id='cabeta_5'>Group</div>";
        echo "<div class='elemento_6' id='cabeta_6'>Priority</div>";
        echo "<div class='elemento_7' id='cabeta_7'>Affected</div>";
        echo "</div>";
        echo "<div class='contenido_tabla' id='tabla_incidentes'>";
			  				 
	   $sql_select_registros=""; 
	   $sql_select_registros_aux1="select * from incident ".$where." order by cust_id";
	   $sql_select_registros_aux2="select * from incident order by cust_id";
	   $sql_general="";
	   if($where==" where "){
	       $sql_select_registros=$sql_select_registros_aux2;	   
	   }else{
		   $sql_select_registros=$sql_select_registros_aux1;
	   } 
   
	   $result_registros= pg_exec($conexion,$sql_select_registros);
	   $cuenta_registros= pg_num_rows($result_registros);			 			 

			  for($i=0;$i<$cuenta_registros;$i++){
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
			                                                                                                                                                                                  
       echo "</div>";
	   echo "</div>";	   	   	   	        	   	   
	   	   
	   pg_close($conexion);
	   
	   ?>
       		<script type="text/javascript" language="javascript">

				
   var ancho = screen.width;
  //var ancho = 1280;     
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
   
   
   completa(ancho,"pie_pagina",1320,25,1295,15);
   document.getElementById("pie_pagina").style.lineHeight=parseInt((((ancho)*14)/1366))+"px";
   document.getElementById("pie_pagina").style.fontSize=parseInt((((ancho)*12)/1366))+"px"; 
   document.getElementById("pie_pagina").style.paddingTop= parseInt((((ancho)*10)/1366))+"px"; 																
				
				
				
				generar_grafica_central();
				generar_gauge1();	
				generar_gauge2();
				generar_torta();				
			</script>
       <?php
   }
                
  
  if($_POST["indice"]==4){
	  $con=Conectarse();
	  $sql_select="";
	  
	  if($_POST["parametro"]==0){
		  $sql_select="select * from users order by name"; 
	  }	  	  
	  if($_POST["parametro"]==1){
		  $sql_select="select * from users where name like '%".$_POST["filtro"]."%' order by name"; 
	  }
	  if($_POST["parametro"]==2){
		  $sql_select="select * from users where login like '%".$_POST["filtro"]."%' order by name"; 
	  }	  
	  if($_POST["parametro"]==3){
		  $sql_select="select * from users where email like '%".$_POST["filtro"]."%' order by name"; 
	  }

	  $result_usuarios = pg_exec($con,$sql_select);
	          	
				echo "<div class='cabecera_tabla_usuarios'  id='cabecera_tabla_usuarios'>";
            	echo "<div class='cabecera_uno' id='c1'>Nombre</div>";
                echo "<div class='cabecera_dos' id='c2'>Login</div>";
                echo "<div class='cabecera_uno' id='c3'>Email</div>";
                echo "<div class='cabecera_tres' id='c4'>Opciones</div>";
                echo "</div>";
				echo "<div class='conte_lineas_tabla_usuarios' id='contenido_tabla'>";
	  
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
			   echo "</div>";  
		
		?>
        
        	<script type="text/javascript" language="javascript">
     		 var ancho = screen.width;
  	    	//var ancho = 1200;
		
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
				
			}else{
			  band1=1;	
			}			
	   }			
			
						    
			</script>        
        
        <?php
		
		
			  	  		  
  }
  
  if($_POST["indice"]==5){
	  
	    $con=Conectarse();
		$sql_select="select * from users where id_user='".$_POST["id"]."'";
		$result = pg_exec($con,$sql_select);
		$arreglo=pg_fetch_array($result,0);
		
        echo "<div class='actualiza' id='actualiza'>";
		    echo "<form onSubmit='return validar_registro(this)' name='form1' id='form1' method='post'  >";
			echo "<div class='cerrar' id='cerrar2' onclick='cerrar_act_contrasena()'>Cancelar</div>";
			echo "<input type='hidden' id='usuarioo' name='usuarioo' value='".$arreglo[0]."' />";
        	echo "<div class='actualiza_linea' id='actualiza_linea'>Cambio de Contraseña</div>";
            echo "<div class='actualiza_dato' id='actualiza_dato1' >";
            echo "<div class='actualiza_dato_nombre' id='nombre11'>Nombre del Usuario:</div>";
            echo "<div class='actualiza_dato_campo' id='dato11'><input type='text' name='nombre' id='nombre' disabled='disabled' value='".$arreglo[1]."'  class='actualiza_campo' /></div>";
            echo "</div>";            
            echo "<div class='actualiza_dato' id='actualiza_dato2' >";
            echo "<div class='actualiza_dato_nombre' id='nombre22'>Nueva Contraseña:</div>";
            echo "<div class='actualiza_dato_campo' id='dato22'><input type='password' name='contra1' id='contra1' value='' class='actualiza_campo' /></div>";
            echo "</div>";            
            echo "<div class='actualiza_dato' id='actualiza_dato3'>";
            echo "<div class='actualiza_dato_nombre' id='nombre33'>Repita La Nueva Contraseña:</div>";
            echo "<div class='actualiza_dato_campo' id='dato33'><input type='password' name='contra2' id='contra2' value='' class='actualiza_campo' /></div>";
            echo "</div>";   
            echo "<div class='actualiza_linea' id='linea_boton'>";
            echo "<input type='submit' name='Actualizar' value='Actualizar' id='Actualizar' style='margin-left:0px; position:absolute;' />";
            echo "</div>";                    
			echo "</form>";  
				  
        echo "</div>";
		
		?>
           <script type="text/javascript" language="javascript">
     		 var ancho = screen.width;
  	    	//var ancho = 1200;
		
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
			

			completa(ancho,"actualiza",400,180,440,260);		
	   		document.getElementById("actualiza_linea").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("actualiza_linea").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("actualiza_linea").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("actualiza_linea").style.fontSize=parseInt((((ancho)*14)/1366))+"px";				   				   		   

	   		document.getElementById("actualiza_dato1").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("actualiza_dato1").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("actualiza_dato1").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("actualiza_dato1").style.fontSize=parseInt((((ancho)*14)/1366))+"px"
			
	   		document.getElementById("actualiza_dato2").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("actualiza_dato2").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("actualiza_dato2").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("actualiza_dato2").style.fontSize=parseInt((((ancho)*14)/1366))+"px"
			
	   		document.getElementById("actualiza_dato3").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("actualiza_dato3").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("actualiza_dato3").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("actualiza_dato3").style.fontSize=parseInt((((ancho)*14)/1366))+"px"											
			
	   		document.getElementById("nombre11").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("nombre11").style.height=parseInt((((ancho)*15)/1366))+"px";
			document.getElementById("nombre11").style.fontSize=parseInt((((ancho)*13)/1366))+"px";			
		    document.getElementById("nombre11").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
			
	   		document.getElementById("nombre22").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("nombre22").style.height=parseInt((((ancho)*15)/1366))+"px";
			document.getElementById("nombre22").style.fontSize=parseInt((((ancho)*13)/1366))+"px";			
		    document.getElementById("nombre22").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
			
	   		document.getElementById("nombre33").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("nombre33").style.height=parseInt((((ancho)*15)/1366))+"px";
			document.getElementById("nombre33").style.fontSize=parseInt((((ancho)*13)/1366))+"px";			
		    document.getElementById("nombre33").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";	
			
	   		document.getElementById("dato11").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("dato11").style.height=parseInt((((ancho)*20)/1366))+"px";	
	   		document.getElementById("dato22").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("dato22").style.height=parseInt((((ancho)*20)/1366))+"px";	
	   		document.getElementById("dato33").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("dato33").style.height=parseInt((((ancho)*20)/1366))+"px";	
				
	   		document.getElementById("nombre").style.width=parseInt((((ancho)*375)/1366))+"px";
			document.getElementById("nombre").style.height=parseInt((((ancho)*15)/1366))+"px";		
	   		document.getElementById("contra1").style.width=parseInt((((ancho)*375)/1366))+"px";
			document.getElementById("contra1").style.height=parseInt((((ancho)*15)/1366))+"px";		
	   		document.getElementById("contra2").style.width=parseInt((((ancho)*375)/1366))+"px";
			document.getElementById("contra2").style.height=parseInt((((ancho)*15)/1366))+"px";										
														
	   		document.getElementById("linea_boton").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("linea_boton").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("linea_boton").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("linea_boton").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
			
			document.getElementById("cerrar2").style.width=parseInt((((ancho)*50)/1366))+"px";	
			document.getElementById("cerrar2").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
			document.getElementById("cerrar2").style.marginLeft=parseInt((((ancho)*340)/1366))+"px";	
																		
		   
           </script>
        <?php

  }
  
  




  if($_POST["indice"]==6){
	  
	    $con=Conectarse();
		$sql_select="select * from users where id_user='".$_POST["id"]."'";
		$result = pg_exec($con,$sql_select);
		$arreglo=pg_fetch_array($result,0);
		
        echo "<div class='actualiza' id='actualiza'>";
		    echo "<form onSubmit='return validar_actualizacion(this)' name='form1' id='form1' method='post'  >";
			echo "<div class='cerrar' id='cerrar2' onclick='cerrar_act_contrasena()'>Cancelar</div>";			
			echo "<input type='hidden' id='usuarioo' name='usuarioo' value='".$arreglo[0]."' />";
        	echo "<div class='actualiza_linea' id='actualiza_linea'>Editar Datos del Usuario</div>";
            echo "<div class='actualiza_dato' id='actualiza_dato1' >";
            echo "<div class='actualiza_dato_nombre' id='nombre11'>Login Usuario:</div>";
            echo "<div class='actualiza_dato_campo' id='dato11'><input type='text' name='nombre' id='nombre' disabled='disabled' value='".$arreglo[2]."'  class='actualiza_campo' /></div>";
            echo "</div>";            
            echo "<div class='actualiza_dato' id='actualiza_dato2' >";
            echo "<div class='actualiza_dato_nombre' id='nombre22'>Nombre:</div>";
            echo "<div class='actualiza_dato_campo' id='dato22'><input type='text' name='contra1' id='contra1' value='".$arreglo[1]."' class='actualiza_campo' /></div>";
            echo "</div>";            
            echo "<div class='actualiza_dato' id='actualiza_dato3'>";
            echo "<div class='actualiza_dato_nombre' id='nombre33'>Email:</div>";
            echo "<div class='actualiza_dato_campo' id='dato33'><input type='text' name='contra2' id='contra2' value='".$arreglo[4]."' class='actualiza_campo' /></div>";
            echo "</div>";   
            echo "<div class='actualiza_linea' id='linea_boton'>";
            echo "<input type='submit' name='Editar' value='Editar' id='Editar' style='margin-left:0px; position:absolute;' />";
            echo "</div>";                    
			echo "</form>";  
				  
        echo "</div>";
		
		?>
           <script type="text/javascript" language="javascript">
     		 var ancho = screen.width;
  	    	//var ancho = 1200;
		
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
			

			completa(ancho,"actualiza",400,180,440,260);		
	   		document.getElementById("actualiza_linea").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("actualiza_linea").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("actualiza_linea").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("actualiza_linea").style.fontSize=parseInt((((ancho)*14)/1366))+"px";				   				   		   

	   		document.getElementById("actualiza_dato1").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("actualiza_dato1").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("actualiza_dato1").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("actualiza_dato1").style.fontSize=parseInt((((ancho)*14)/1366))+"px"
			
	   		document.getElementById("actualiza_dato2").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("actualiza_dato2").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("actualiza_dato2").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("actualiza_dato2").style.fontSize=parseInt((((ancho)*14)/1366))+"px"
			
	   		document.getElementById("actualiza_dato3").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("actualiza_dato3").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("actualiza_dato3").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("actualiza_dato3").style.fontSize=parseInt((((ancho)*14)/1366))+"px"											
			
	   		document.getElementById("nombre11").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("nombre11").style.height=parseInt((((ancho)*15)/1366))+"px";
			document.getElementById("nombre11").style.fontSize=parseInt((((ancho)*13)/1366))+"px";			
		    document.getElementById("nombre11").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
			
	   		document.getElementById("nombre22").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("nombre22").style.height=parseInt((((ancho)*15)/1366))+"px";
			document.getElementById("nombre22").style.fontSize=parseInt((((ancho)*13)/1366))+"px";			
		    document.getElementById("nombre22").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";
			
	   		document.getElementById("nombre33").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("nombre33").style.height=parseInt((((ancho)*15)/1366))+"px";
			document.getElementById("nombre33").style.fontSize=parseInt((((ancho)*13)/1366))+"px";			
		    document.getElementById("nombre33").style.lineHeight=parseInt((((ancho)*15)/1366))+"px";	
			
	   		document.getElementById("dato11").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("dato11").style.height=parseInt((((ancho)*20)/1366))+"px";	
	   		document.getElementById("dato22").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("dato22").style.height=parseInt((((ancho)*20)/1366))+"px";	
	   		document.getElementById("dato33").style.width=parseInt((((ancho)*400)/1366))+"px";
			document.getElementById("dato33").style.height=parseInt((((ancho)*20)/1366))+"px";	
				
	   		document.getElementById("nombre").style.width=parseInt((((ancho)*375)/1366))+"px";
			document.getElementById("nombre").style.height=parseInt((((ancho)*15)/1366))+"px";		
	   		document.getElementById("contra1").style.width=parseInt((((ancho)*375)/1366))+"px";
			document.getElementById("contra1").style.height=parseInt((((ancho)*15)/1366))+"px";		
	   		document.getElementById("contra2").style.width=parseInt((((ancho)*375)/1366))+"px";
			document.getElementById("contra2").style.height=parseInt((((ancho)*15)/1366))+"px";										
														
	   		document.getElementById("linea_boton").style.width=parseInt((((ancho)*380)/1366))+"px";
			document.getElementById("linea_boton").style.marginTop=parseInt((((ancho)*5)/1366))+"px";						
			document.getElementById("linea_boton").style.marginLeft=parseInt((((ancho)*10)/1366))+"px";	
			document.getElementById("linea_boton").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
			
			document.getElementById("cerrar2").style.width=parseInt((((ancho)*50)/1366))+"px";	
			document.getElementById("cerrar2").style.fontSize=parseInt((((ancho)*14)/1366))+"px";
			document.getElementById("cerrar2").style.marginLeft=parseInt((((ancho)*340)/1366))+"px";																					
		   
           </script>
        <?php

  }  

?>
		