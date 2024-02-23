
<?php
       		       
	  case "6":
	       $valis = $_SESSION['validacion'] ;	       
	       tareas ("tareaactiva.php?id=6",$valis);   
	       modulos(6,$tarea); 
	        $titulo1= titulotarea($tarea);	      
	       echo"<div class=\"estilomensajegris icon-doc-text\"><font-size=20px>".$titulo1."</font></div>";  
           listartareas($tarea,$valis,$modulo);  
                  
           break;
     
     case "7":
           $valis = $_SESSION['validacion'] ;
           tareas ("tareaactiva.php?id=7",$valis);    
           $titulo1= titulotarea($tarea);
           modulos(7,$tarea); 
           echo"<div class=\"estilomensajegris icon-doc-text\"><font-size=20px>".$titulo1."</font></div>";   
                
           if ($modulo) {
			  busespormodulomantenimiento($modulo,$tarea) ;
		       }		  
	       break;      
	   case "8":
           include "edicionunidad.php";
	       break;    
				

	  
	// incidencias ----     
	   case "29":     
	       $tarea="d";
	        echo "<div class=\"estilomensaje\">Incidencias</div>";
	        echo "<span class=\"estilomensajegris\">Nueva :</span>" ; modulos(29,$tarea); 
	        echo "<span class=\"estilomensajegris\"><a href=\"tareaactiva.php?id=32\">Seguimiento</a></span>";       
	      
	       if ($modulo) {    
			// si el bus tiene algun reporte que cambie de color   
	       busesincidencias($modulo) ;     
	                     }                               
	       break; 
	    case "30":   // captura datos y graba	
	        echo "<div class=\"estilomensaje\">Nueva Incidencia </div>";          
            include "formaincidencias/incidencia_agregar.php";                               
	       break;     
	    
	   case "32":     // lista la informacion y envia a edicion
	       $tarea="d";
	        modulos(32,$tarea);
	       include "formaincidencias/incidencia_listar.php";
	       break;  
	            
	   case "33":    // edita y actualiza incidencia y envia a listado
           include "editarincidencia.php";                               
	       break;                 
              //----incidencias 


?>
