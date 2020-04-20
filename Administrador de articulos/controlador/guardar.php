<?php
require('../modelo/conecciones.php');
$info=$_POST;
session_start();
if ($_POST['publicado']==0) {
    $publicado=0;
} else {
    $publicado=1;
}
// if ($_POST['Detalle']!=="") {
//     $descripcion=$_POST['Detalle'];
//     echo 'es llenito';
// } else {
//     $descripcion=NULL;
//     echo 'al parecer esta vacio';    
// } 
// echo $descripcion.'<br>';
// echo $publicado.'<br>';

if (isset($_SESSION['articulo'])) {
    
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
     
    if ($_POST['media']=='I&A') {
        $IURL=$_POST['IMG'];
        $AURL=$_POST['AUD'];
$MediaID='Imagen y Audio';
$Nuevo = "INSERT INTO Articulos 
VALUES('$_POST[Nombre]','$publicado','$_POST[Detalle]','$MediaID',NULL,'$AURL','$IURL')";
mysqli_query($conn,$Nuevo);
header('location:../vista/lista.php');
     }elseif ($_POST['media']=='I') {
        $IURL=$_POST['IMG'];
        $MediaID='Imagen';
        $Nuevo = "INSERT INTO Articulos 
        VALUES('$_POST[Nombre]','$publicado','$_POST[Detalle]','$MediaID',NULL,NULL,'$IURL')";
        mysqli_query($conn,$Nuevo);
        header('location:../vista/lista.php');
     }elseif ($_POST['media']=='A') {
        $AURL=$_POST['AUD'];
        $MediaID='Audio';
        $Nuevo = "INSERT INTO Articulos 
VALUES('$_POST[Nombre]','$publicado','$_POST[Detalle]','$MediaID',NULL,'$AURL',NULL)";
mysqli_query($conn,$Nuevo);   
header('location:../vista/lista.php');      
     }elseif ($_POST['media']=='V') {
        $VURL=$_POST['VID'];
        $MediaID='Video';
        $Nuevo = "INSERT INTO Articulos 
        VALUES('$_POST[Nombre]','$publicado','$_POST[Detalle]','$MediaID','$VURL',NULL,NULL)";
        mysqli_query($conn,$Nuevo);
        header('location:../vista/lista.php');
     }
}
print_r($info);
?>