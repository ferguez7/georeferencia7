<?php 	//Muestra los puntos seleccioandos en el mapa/
	 
	 require('tsiejsl.php');   
     
$clientes = array();  
        
    $sel_query = "Select * from eventos order by  id_parada desc ";
    $result = mysqli_query($con, $sel_query);
    while ($row = mysqli_fetch_assoc($result))     {
        
            $id_parada=$row['id_parada'];
            $modulo=$row['modulo'];
            $ruta=$row['ruta'];
            $nombres=$row['nombres'];
            $modalidad=$row['modalidad'];
            $origendestino=$row['origendestino'];
            $cruce=$row['cruce'];
            $latitud=$row['latitud'];
            $longitud=$row['longitud'];
            
$clientes[] = array('id_parada'=> $id_parada, 'modulo'=> $modulo, 'ruta'=> $ruta, 'nombres'=> $nombres,'modalidad'=> $modalidad, 'origendestino'=> $origendestino, 'cruce'=> $cruce, 'latitud'=> $latitud, 'longitud'=> $longitud);       
     
    }
  
$json_string = json_encode($clientes);

$file = 'report/clientes.json';
file_put_contents($file, $json_string);
mysqli_close($con);    
 
?>
