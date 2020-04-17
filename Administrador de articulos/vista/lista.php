<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Articulos</title>
    <link href="css/tailwind.min.css" rel="stylesheet">
    
</head>
<body class="bg-orange-500 font-serif text-gray-900">
<?php
    require('../modelo/conecciones.php');
    $query= mysqli_query($conn,'select * from Articulos;');
    ?>
    <center><h1 class=" text-4xl"><u>MODIFICACION DE LOS ARTICULOS</u></h1></center>
    <form action="./lista.php" method="POST">
    <div id="actions" class="px-3 my-3">
    <input type="text" class="border-2 rounded-lg" placeholder="Busca los articulos creados" size="25px"> 
    <input type="submit" name="Nuevo" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="New">
    <input type="submit" name="Editar" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Edit">
    <input type="submit" name="Eliminar" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Delete">
    </div>
    <!-- <button><i class="fa fa-thumbs-up"></i>Buy now!!!</button> -->
    <fieldset class="my-3  text-teal-900 h-full w-full px-6">
        <legend>Articulos Creados</legend>
        <br>
        <select name="art" id="select"  size="6" style="width: 100%;">
            <?php          
            //DDRC:Con el uso de un bucle se recorrer el array devuelto sin usar aditamentos extras.
            while ($fila=mysqli_fetch_array($query)) {
                // $a<$limite
                // $a++;
                // $filas=mysqli_fetch_array($query);
                // mysqli_data_seek($query,$a);
                echo '<option value="'.$fila['Nombre_Articulo'].'">'.$fila['Nombre_Articulo'].'</option>';
            } 
            ?>
        </select>
    </fieldset>
    </form>
    
</body>
<?php
if (isset($_POST['Nuevo'])) {
    // header('location:index.php');
    echo '<script>window.location.href="edicion.php"</script>';
    session_start();
    unset($_SESSION['articulo']);
} else if (isset($_POST['Editar']) && isset($_POST['art'])) {
    $articulo=$_POST['art'];
    session_start();
    $_SESSION['articulo']=$articulo;
    echo '<script>window.location.href="edicion.php"</script>';
}else if(isset($_POST['Eliminar']) && isset($_POST['art'])){
    $articulo=$_POST['art'];
    session_start();
    $_SESSION['articulo']=$articulo;
    echo '<script>window.location.href="../controlador/eliminar.php"</script>';
}else if(isset($_POST['Editar']) || isset($_POST['Eliminar'])){
    echo '<script>alert("Primero seleccione un Articulo")</script>';
}
?>
</html>