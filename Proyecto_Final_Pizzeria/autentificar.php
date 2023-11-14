<?php
require "conexion.php";

$email=$_POST["email"];
$contrasena=$_POST["contrasena"];
$comparar="SELECT * FROM usuarios WHERE email='$email' AND contrasena='$contrasena'";

$resultado=mysqli_query($conectar, $comparar);

if(mysqli_num_rows($resultado)>0){
  session_start();
  $_SESSION['username'] = $email;
  $_SESSION["autentificado"] = "SI";
  header("Location: principal_usuarios.php");
  
}
else {
  echo 
  '
  <script>
  alert("ERROR EN LA AUTENTIFICACIÓN");
  location.href="iniciar_sesion.php?errorusuario=SI";
  </script>
  ';
}
mysqli_free_result($resultado);
mysqli_close($conectar);
?>
