<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista individual de un articulo</title>
    <link href="css/tailwind.min.css" rel="stylesheet">
    <?php
    require('../modelo/conecciones.php');
    session_start();
    $query= mysqli_query($conn,"select * from Articulos where Nombre_Articulo='$_GET[identificador]';");
    $partes=mysqli_fetch_array($query);
?>
</head>
<body class="bg-orange-500 font-serif text-gray-900">
    <div id="Cabecera" class=" py-3">
    <h1 class="text-4xl flex justify-center"><?php echo $partes['Nombre_Articulo']; ?></h1>
    </div>
    <div id="Media" class="my-16 mx-10 inline-block justify-around">
        <?php
        if (isset($partes['AudioURL']) && isset($partes['ImageURL'])) {
            echo '<img src="'.$partes['ImageURL'].'" width="450px" height="450px" style="display:inline-block"><br>
            <audio src="'.$partes['AudioURL'].'" controls></audio>';   
         }elseif (isset($partes['AudioURL']) ) {
             echo '<audio src="'.$partes['AudioURL'].'" controls></audio>';
         }elseif (isset($partes['ImageURL'])) {
             echo '<img src="'.$partes['ImageURL'].'"  width="450px" height="450px" style="display:inline-block">';
         }elseif (isset($partes['VideoURL'])) {
             echo '<video src="'.$partes['VideoURL'].'" controls width="700px" height="700px" class="inline"></video>';
         }
        ?>       
    </div>
    <div id="Descripcion"class="inline-block text-lg text-gray-900 ">
    <pre class="flex justify-around"><?php
    echo $partes['Detalle'];
    ?>
    </pre>
    </div>
    <div id="Pie">
    <a href="vistagrupal.php"><button class="border-2 rounded-l-full px-4 py-2 text-gray-200 text-xl mt-32 italic bg-teal-800">Regresar</button></a>
    </div>
</body>
</html>