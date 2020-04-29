<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de articulos</title>
    <link href="css/tailwind.min.css" rel="stylesheet">
    <script src="../controlador/edicion.js"></script>
</head>
<body class="text-gray-900 font-serif bg-blue-500">
    <?php
    require('../modelo/conecciones.php');
    session_start();
if (isset($_SESSION['articulo'])) {
    $query= mysqli_query($conn,"select * from Articulos where Nombre_Articulo='$_SESSION[articulo]';");
    $partes=mysqli_fetch_array($query);
    $llenar=true;
}else{
    $llenar=false;
}
mysqli_close($conn);
    ?>
  <h1 class=" text-4xl justify-center text-center my-6"><u>CONTENIDO DE LOS ARTICULOS</u></h1>

    <form action="../controlador/guardar.php" method="POST">
    <div id="Cabecera">
        
        <input class="bg-orange-600 text-white rounded-lg p-2 mx-2" type="submit" name="save" value="Guardar">
        <a href="lista.php"><input class="bg-orange-600 text-white rounded-lg p-2 mx-2" type="button" value="Cancelar"></a>
    </div>
    
    <div id="Cambios-nombre" class="mx-2" style="margin-bottom: 40px;">
    <br><br>
<span id=""  style=" float:inline-left; margin-right: 30px;">
     Publicado*:<input class="mx-2" type="radio" name="publicado" value="1" required id="P"> 
<br> No Publicado*:<input class="mx-2" type="radio" name="publicado" value="0" required id="Nop">
</span>
Nombre del articulo*: <input type="text" name="Nombre" id="Nombre" class="border-2 rounded-sm" required>
    </div>
    <hr>
    <div id="Cambios-detalle" class="pl-16" style="display: inline;">
    <br><br>
    <label for="" class="flex mx-12" style="display: flex;">Detalle</label>
        <textarea name="Detalle" id="Detalle" cols="80" rows="10" class="mx-12" style="overflow: scroll;
    resize: none;
    white-space: pre-wrap;
    word-break: keep-all;"
    ><?php
    if ($llenar) {
echo ($partes['Detalle']);
    }
    ?></textarea>     
    </div>
    <div id="Cambios-articulo" class="px-6" style="float:right;">
   <br> Video *<input type="radio" required onchange="mediaselect();" name="media" class="mx-4" id="V" value="V" style=" margin-right:50px;"> URL Video: <input name="VID" class="border-2 rounded-sm" type="text" disabled id="MediaVideo">
   <br> Audio *<input type="radio" required onchange="mediaselect();" name="media" class="mx-4" id="A" value="A"style=" margin-right:50px;"> URL Audio: <input name="AUD" class="border-2 rounded-sm" type="text" disabled id="MediaAudio">
   <br> Imagen *<input type="radio" required onchange="mediaselect();" name="media" class="mx-4" id="I" value="I" style=" margin-right:50px;">URL Imagen: <input name="IMG" class="border-2 rounded-sm" type="text" disabled id="MediaImagen">
   <br> Imagen y audio *<input type="radio" required onchange="mediaselect();" name="media" id="I&A" value="I&A" style="margin-right:50px;">
   </div>
   </form>

</body>

</html>
<?php
// $cadena = $_POST['VID'];
// $cadena = $_POST['AUD'];
// $cadena = $_POST['IMG'];
// $cadena = "https://time-machine/blog";
// if(filter_var( $cadena, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED )){
//     echo "La url es correcto";
// }else{
//     echo "La url es incorrecto";
// }
// if(filter_var( $cadena, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED )){
//     echo "La url es correcto";
// }else{
//     echo "La url es incorrecto";
// }
if ($llenar) {
    if ($partes['Publicado']==true) {
        echo '<script>document.getElementById("P").checked=true;</script>';
     }else{
        echo '<script>document.getElementById("Nop").checked=true;</script>';
     }
     echo '<script>document.getElementById("Nombre").value="'.$partes['Nombre_Articulo'].'";
     </script>"';
     if (isset($partes['AudioURL']) && isset($partes['ImageURL'])) {
        echo '<script>document.getElementById("I&A").checked=true;
        document.getElementById("MediaImagen").disabled=false;
        document.getElementById("MediaAudio").disabled=false;
        document.getElementById("MediaImagen").value="'.$partes['ImageURL'].'";
        document.getElementById("MediaAudio").value="'.$partes['AudioURL'].'";
        </script>';   
     }elseif (isset($partes['AudioURL']) ) {
         echo '<script>document.getElementById("A").checked=true;
         document.getElementById("MediaAudio").disabled=false;
         document.getElementById("MediaAudio").value="'.$partes['AudioURL'].'";
         </script>';
     }elseif (isset($partes['ImageURL'])) {
         echo '<script>document.getElementById("I").checked=true;
         document.getElementById("MediaImagen").disabled=false;
         document.getElementById("MediaImagen").value="'.$partes['ImageURL'].'";
         </script>';
     }elseif (isset($partes['VideoURL'])) {
         echo '<script>document.getElementById("V").checked=true;
         document.getElementById("MediaVideo").disabled=false;
         document.getElementById("MediaVideo").value="'.$partes['VideoURL'].'";
         </script>';
     }     
}
?>

