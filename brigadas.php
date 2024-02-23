<?php

  //include "./auth.php" ;  
  include "plantilla/mostrarerrores.php";
   $id = (!empty ($_GET['id']) ) ? $_GET['id'] : NULL;  
   $imagen = (!empty ($_GET['imagen']) ) ? $_GET['imagen'] : NULL;  
   $gws = (!empty ($_GET['gws']) ) ? $_POST['gws'] : NULL;  
  // $gws = $_POST['gws'];
   
  $imagenlogo ="logomorena.png" ;  
  $tituloaplicacion= "Control Distrital";

?>

<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8">
   <title><?php echo $tituloaplicacion ; ?></title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="icon" type="image/png" href="images/favicon.png">
</head>

<body>
		<header class="color18">
			<div class="container" style="padding: 1%">
				<div>
					<img src="images/<?php echo $imagenlogo; ?>" align="absmiddle">
				</div>
			</div>
		</header>

	<img src="images/sombra1.png" width="100%">

  <div class="container">
    <div class="row">
      <div class="column" style="margin-top: 5%">
      <h2>Bri</h2><br>
   
   <?php
   
    switch ($id) {
	 case "1":    		  
           echo '<br>Captura los datos del simpatizante';
           include "formularios/agregarsimpatizante.php";		  
	       break;
	 case "2":    		  
		   echo 'Captura los datos del de evento';
		   include "formularios/agregarevento.php";		  
	       break;
	 case "3":    		 
	        if($gws==2) 
		       { include "formularios/grabarmilitante.php";} 
		     else 
		       { include "formularios/grabarvento.php";}
		    break;
	 case "4":    		  
		   echo 'Seleccionar ubicacion en mapa ';
		   include "formularios/ubicacion.php";		  
	       break;
	 case "5":    		  
		  echo ' Actualiza el registro con coordenadas';
		   echo '<br><a href="?id=6">Siguiente</a>'; 
	       break;
	 case "6":    		  
		   echo 'Muestra la ubicacion en mapa del evento o simpatizante registrado';
		   echo '<br>Muestra la ubicacion en el mapa ';		  
		   echo '<a href="?id=1">Siguiente</a>'; 
	       break;
      
	 
	 default:    
      // $valis = $_SESSION['validacion'] ;	       

         echo ' Favor de tomar la fotografia';
	      echo '<br><a href="?id=1">Simpatizante</a>'; 
		   echo '<br><a href="?id=2">Evento</a>'; 		  
	     }  
  
   ?>
   
   
   <script>
   
     function muestraformulario() {
            var tabla = $.ajax({
                url: localizacion + 'creajson.php',
                dataType:'text',
                async:false
            }).responseText;
                }
   
   </script>
   
   
   
      
      </div>
    </div>
  </div>

 <div class="color7 noimprimir">
            <div class="container "><br><strong><?php echo $tituloaplicacion ; ?></strong><br><br></div>
 </div>  

</body>
</html>
