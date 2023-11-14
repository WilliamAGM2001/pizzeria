<?php
require "conexion.php";
$id=$_GET['id'];
echo $id;

$eliminar="DELETE FROM usuarios WHERE id='$id'";
$resultado=mysqli_query($conectar,$eliminar);

if($resultado){
  header("location:panel.php");

}
else {
  echo "no se pudo eliminar el dato";
}
?>