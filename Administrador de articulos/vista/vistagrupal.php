<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra de los articulos creados</title>
    <link href="css/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo vistaG.css">
</head>

<body class="text-gray-900 font-serif bg-blue-500">
    <h1 class="my-12 text-5xl text-orange-300 text-center justify-center">Articulos de Contenido</h1>
    <div id="contenedor" class="flex justify-center items-center">
        <?php
        require('../modelo/conecciones.php');
        session_start();
        $query = mysqli_query($conn, "select * from Articulos;");
        // $partes=mysqli_fetch_array($query);
        while ($fila = mysqli_fetch_array($query)) {
            $identificador = $fila['Nombre_Articulo'];
            if ($fila['Publicado'] == true && $fila['Detalle'] != "") {
                if (isset($fila['AudioURL']) && isset($fila['ImageURL'])) {

                    echo '<a href="vistaindividual.php?identificador=' . $identificador . '"><div class="column" style="background:url(' . $fila['ImageURL'] . '); background-size: cover;"><center><audio src="' . $fila['AudioURL'] . '" controls></audio>
            <div class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic p-2 rounded-lg">
    <h2>' . $identificador . '</h2>
</div>
</center></div></a>';
                } elseif (isset($fila['AudioURL'])) {

                    echo '<a href="vistaindividual.php?identificador=' . $identificador . '"><div class="column"><center><audio src="' . $fila['AudioURL'] . '" controls></audio>
             <div class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic p-2 rounded-lg">
    <h2>' . $identificador . '</h2>
</div>
</center></div></a>';
                } elseif (isset($fila['ImageURL'])) {

                    echo '<a href="vistaindividual.php?identificador=' . $identificador . '"><div class="column"><center><img src="' . $fila['ImageURL'] . '"  width="300px" height="300px">
             <div class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic p-2 rounded-lg">
    <h2>' . $identificador . '</h2>
</div>
</center></div></a>';
                } elseif (isset($fila['VideoURL'])) {

                    echo '<a href="vistaindividual.php?identificador=' . $identificador . '"><div class="column"><center><video src="' . $fila['VideoURL'] . '" controls  width="400px" height="300px"></video>
             <div class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic p-2 rounded-lg">
    <h2>' . $identificador . '</h2>
</div>
</center></div></a>';
                }
            } else if ($fila['Publicado'] == true) {
                if (isset($fila['AudioURL']) && isset($fila['ImageURL'])) {
                    echo '<div class="column" style="background:url(' . $fila['ImageURL'] . '); background-size: cover;"><center><audio src="' . $fila['AudioURL'] . '" controls></audio>
            <div class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic p-2 rounded-lg">
    <h2>' . $identificador . '</h2>
</div>
</center> </div>';
                } elseif (isset($fila['AudioURL'])) {
                    echo '<div class="column"><center><audio src="' . $fila['AudioURL'] . '" controls></audio>
             <div class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic p-2 rounded-lg">
    <h2>' . $identificador . '</h2>
</div>
</center> </div>';
                } elseif (isset($fila['ImageURL'])) {
                    echo '<div class="column"><center><img src="' . $fila['ImageURL'] . '" width="300px" height="300px">
             <div class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic p-2 rounded-lg">
    <h2>' . $identificador . '</h2>
</div>
</center> </div>';
                } elseif (isset($fila['VideoURL'])) {
                    echo '<div class="column"><center><video src="' . $fila['VideoURL'] . '" controls  width="300px" height="300px"></video>
             <div class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic p-2 rounded-lg">
    <h2>' . $identificador . '</h2>
</div>
<center></div>';
                }
            }
        }
        ?>
        <section class="textoD text-lg bg-gray-500 text-blue-900 font-serif italic rounded-lg">
            <h2>Aqui va el detalle</h2>
            <center></center>
        </section>
    </div>
</body>

</html>