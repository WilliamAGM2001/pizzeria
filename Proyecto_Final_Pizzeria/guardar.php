<?php
require "conexion.php";

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$direccion=$_POST['direccion'];
$numero=$_POST['numero'];
$email=$_POST['email'];
$contrasena=$_POST['contrasena'];

$insertar = "INSERT INTO usuarios (nombre,apellido,direccion,numero, email, contrasena) VALUES ('$nombre','$apellido','$direccion','$numero','$email','$contrasena')";

//validar usuario
$verificar_usuario=mysqli_query($conectar, "SELECT *FROM usuarios WHERE email='$email'");
if(mysqli_num_rows($verificar_usuario)>0){
  echo '
<script>
alert("ESTE USUARIO YA ESTA REGISTRADO");
location.href="registro.php";
</script>

  ';
  exit;
}


$query=mysqli_query($conectar, $insertar);
if($query){
  echo '
  <script>
  alert("Si se guardaron las datos correctamente");
  location.href="iniciar_sesion.php";
  </script>
  
  ';
}
else {
  echo '
  <script>
  alert("No se guardaron las datos correctamente");
  location.href="registro.php";
  </script>
  
  ';
}
