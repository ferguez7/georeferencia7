<?php
  $usuario          = $_REQUEST['usuario'];
  $password         = $_REQUEST['password'];
  
  $imagenlogo ="logomorena.png" ;  
  $tituloaplicacion= "Control Distrital";
  $acceso   ="INGRESAR";  
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
      <div class="one-half column" style="margin-top: 5%">
      
       <h2>Administrador</h2><br>
        <?php

     if (isset($_POST['usuario'])){
        require('tsiejsl.php');
        session_start();
        $username = stripslashes($_REQUEST['usuario']);
        $username = mysqli_real_escape_string($con,$usuario);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        $query = "SELECT id_adminis,modulo,nombre,usuario,password,nivel,autorizado,validacion FROM `administra` WHERE usuario='$usuario' and password='".md5($password)."'";
        $result = mysqli_query($con,$query) or die(mysqli_error());
        $rows = mysqli_fetch_assoc($result) ;

          if($rows['id_adminis'] > 0 ){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['control'] = $rows['id_adminis'];
            $_SESSION['nombre'] =  $rows['nombre'];
            $_SESSION['validacion'] =  $rows['validacion'];

            if ($rows['nivel']=="admins" and $rows['autorizado']=="sies")header("Location: admondis.php");
            if ($rows['nivel']=="cobrigada" and $rows['autorizado']=="sies")header("Location: cobrigada.php");
            if ($rows['nivel']=="brigadas" and $rows['autorizado']=="sies")header("Location: brigadas.php");
            if ($rows['nivel']=="informeeje" and $rows['autorizado']=="sies")header("Location: informe.php");           

            } else {
                echo "<div class='form'>
                <center><h3>Usuario/Password es incorrecto.</h3><br/>
                Click aqui para <a href='index.php'>Login</a></center>
                </div>";
                }
       }else{
?>
               
                <div class="color8" style="margin: 10%"><center>
                    <strong><?php echo $acceso ; ?></strong><br><br>
                    <form action="index.php" method="post" name="login">
                        <input type="text" name="usuario" placeholder="USUARIO" required /><br>
                        <input type="password" name="password" placeholder="PASSWORD" required /><br>
                        <input name="submit" type="submit" value="Ingresar" />
                    </form></center>
                </div>
      
<?php } ?>
      
      </div>
    </div>
  </div>

 <div class="color7 noimprimir">
            <div class="container "><br><strong><?php echo $tituloaplicacion ; ?></strong><br><br></div>
 </div>  

</body>
</html>
