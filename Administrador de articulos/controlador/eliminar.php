<?php
session_start();
require('../modelo/conecciones.php');
$eliminar='DELETE FROM Articulos where Nombre_Articulo="'.$_SESSION['articulo'].'";';
mysqli_query($conn,$eliminar);
echo 'esta chuche se elimino';
echo '<br>'.$_SESSION['articulo'];
header('location:../vista/lista.php');

?>