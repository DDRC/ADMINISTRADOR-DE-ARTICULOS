<?php
require('../modelo/conecciones.php');
$info=$_POST;
session_start();
if (isset($_SESSION['articulo'])) {
    if ($_POST['publicado']==0) {
        $publicado=0;
    } else {
        $publicado=1;
    }
    echo $publicado;
    if ($_POST['media']=='I&A') {
        $IURL=$_POST['IMG'];
        $AURL=$_POST['AUD'];
$MediaID='Imagen y Audio';
$Cambios = "UPDATE Articulos 
SET Nombre_Articulo = '$_POST[Nombre]', Publicado='$publicado',Detalle='$_POST[Detalle]',media_type='$MediaID',VideoURL=NULL ,AudioURL='$AURL',ImageURL='$IURL'
WHERE Nombre_Articulo = '$_SESSION[articulo]'";
mysqli_query($conn,$Cambios);
header('location:../vista/lista.php');
     }elseif ($_POST['media']=='I') {
        $IURL=$_POST['IMG'];
        $MediaID='Imagen';
        $Cambios = "UPDATE Articulos 
        SET Nombre_Articulo = '$_POST[Nombre]', Publicado='$publicado',Detalle='$_POST[Detalle]',media_type='$MediaID',VideoURL=NULL ,AudioURL=NULL,ImageURL='$IURL'
        WHERE Nombre_Articulo = '$_SESSION[articulo]'";
        mysqli_query($conn,$Cambios);
        header('location:../vista/lista.php');
     }elseif ($_POST['media']=='A') {
        $AURL=$_POST['AUD'];
        $MediaID='Audio';
        $Cambios = "UPDATE Articulos 
SET Nombre_Articulo = '$_POST[Nombre]', Publicado='$publicado',Detalle='$_POST[Detalle]',media_type='$MediaID',VideoURL=NULL ,AudioURL='$AURL',ImageURL=NULL
WHERE Nombre_Articulo = '$_SESSION[articulo]'";
mysqli_query($conn,$Cambios);   
header('location:../vista/lista.php');      
     }elseif ($_POST['media']=='V') {
        $VURL=$_POST['VID'];
        $MediaID='Video';
        $Cambios = "UPDATE Articulos 
        SET Nombre_Articulo = '$_POST[Nombre]', Publicado='$publicado',Detalle='$_POST[Detalle]',media_type='$MediaID',VideoURL='$VURL' ,AudioURL=NULL,ImageURL=NULL
        WHERE Nombre_Articulo = '$_SESSION[articulo]'";
        mysqli_query($conn,$Cambios);
        header('location:../vista/lista.php');
     }
    
    
}else {
    // $subnivel = "INSERT INTO x_documento_categoria (documento_categoria_id,documento_categoria_nombre,documento_categoria_padre_id) VALUES ('$idnueva', '$concat1', '$idnivel2')";
    echo 'no hay nada que confirmar. <br>';
}
print_r($info);
?>