<?php
require "conexion.php";

$usuari=$_POST["usuari"];
$access=$_POST["access"];
$comparar="SELECT * FROM administrador WHERE usuari='$usuari' AND access='$access'";

$resultado=mysqli_query($conectar, $comparar);

if(mysqli_num_rows($resultado)>0){
  session_start();
  $_SESSION['username'] = $usuari;
  $_SESSION["autentificado"] = "SI";
  header("Location: panel.php");
  
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