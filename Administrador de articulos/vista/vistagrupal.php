<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra de los articulos creados</title>
    <link href="css/tailwind.min.css" rel="stylesheet">
    <style>
#contenedor{
    display: grid;
grid-template-columns: 1fr 1fr 1fr;
background-color: none;
}
.column{
    background-color: gray;
    height: 6cm;
    border: 1px blue dashed;
}
    </style>
</head>
<body class="text-gray-900 font-serif bg-blue-500">

<center><h1 class="my-12 text-5xl text-orange-300 justify-center">Articulos de Contenido</h1></center>
    <div id="contenedor" >   
<?php
    require('../modelo/conecciones.php');
    session_start();
    $query= mysqli_query($conn,"select * from Articulos;");
    // $partes=mysqli_fetch_array($query);
    while ($fila=mysqli_fetch_array($query)) {
    if ($fila['Publicado']==true && $fila['Detalle']!="") {
        if (isset($fila['AudioURL']) && isset($fila['ImageURL'])) {
            $identificador=$fila['Nombre_Articulo'];
            echo '<a href="vistaindividual.php?identificador='.$identificador.'"><div class="column flex items-end justify-center" style="background:url('.$fila['ImageURL'].');  background-size: cover;"></div></a>';   
         }elseif (isset($fila['AudioURL']) ) {
            $identificador=$fila['Nombre_Articulo'];
             echo '<a href="vistaindividual.php?identificador='.$identificador.'"><div class="column flex items-center justify-center"><audio src="'.$fila['AudioURL'].'" controls></audio></div></a>';
         }elseif (isset($fila['ImageURL'])) {
            $identificador=$fila['Nombre_Articulo'];
             echo '<a href="vistaindividual.php?identificador='.$identificador.'"><div class="column flex items-center justify-center"><img src="'.$fila['ImageURL'].'"  width="300px" height="300px"></div></a>';
         }elseif (isset($fila['VideoURL'])) {
            $identificador=$fila['Nombre_Articulo'];
             echo '<a href="vistaindividual.php?identificador='.$identificador.'"><div class="column flex items-center justify-center"><video src="'.$fila['VideoURL'].'" controls  width="300px" height="300px"></video></div></a>';
         }
     }else if($fila['Publicado']==true){
        if (isset($fila['AudioURL']) && isset($fila['ImageURL'])) {
            echo '<div class="column flex items-end justify-center" style="background:url('.$fila['ImageURL'].'); background-size: cover;"><img src="'.$fila['ImageURL'].'" width="300px" height="300px"></div>';    
         }elseif (isset($fila['AudioURL']) ) {
             echo '<div class="column flex items-center justify-center"><audio src="'.$fila['AudioURL'].'" controls></audio></div>';
         }elseif (isset($fila['ImageURL'])) {
             echo '<div class="column flex items-center justify-center"><img src="'.$fila['ImageURL'].'" width="300px" height="300px"></div>';
         }elseif (isset($fila['VideoURL'])) {
             echo '<div class="column flex items-center justify-center"><video src="'.$fila['VideoURL'].'" controls  width="300px" height="300px"></video></div>';
         }
     }
    }   
?>
    </div>
</body>
</html>