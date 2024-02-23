<?php 
  
  // actualiza el registro creado.  8Qc2.Tvj53M?gQS  invitadosep
  
    echo $latitud=$_POST['latitud'];
    echo $longitud=$_POST['longitud'];
      
    require('tsiejsl.php');   
     
  
 
   $query = "INSERT INTO eventos (nombres, modulo, ruta, modalidad, origendestino,cruce, latitud, longitud ) VALUES('$nombres', '$modulo', '$ruta', '$modalidad', '$origendestino', '$cruce', '$latitud', '$longitud')";
    
	if ($con->query($query)) { return true; }else{ return false; }
	
    mysqli_close($con); 
?>
