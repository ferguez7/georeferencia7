<?php 	//Muestra tabla de puntos seleccioandos/
	      
    require('tsiejsl.php');   
   
    echo "<center><table width=\"100%\">
		<thead>
			<tr><th>Numero</th><th>Distrito</th><th>Brigada
			</th><th>Actividad</th><th>Ubicaciòn</th>
			<th>Autorizacion</th><th>Seccion</th><th>Latitud</th><th>Longitud</th></tr>
		</thead>
		<tbody> ";
        
    $count = 1;        
    $sel_query = "Select * from eventos order by  id_parada desc limit 0,10";
    $result = mysqli_query($con, $sel_query);
    while ($row = mysqli_fetch_assoc($result))     {
           
        echo "
		<tr><td>" . $count . "</td>		
		<td>" . $row["modulo"] . "</td>			
		<td>" . $row["ruta"] . "</td>		
		<td>" . $row["modalidad"] . "</td>		
		<td>" . $row["origendestino"] . "</td>		
		<td>" . $row["nombres"] . "</td>		
		<td>" . $row["cruce"] . "</td>		
		<td>" . $row["latitud"] . "</td>		
		<td>" . $row["longitud"] . "</td></tr>";

        $count++;
    }
    echo "</tbody>
	     </table></center>
          <br><br>";
     mysqli_close($con);    
?>
