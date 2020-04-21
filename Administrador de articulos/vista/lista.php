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
    mysqli_close($conn);
    ?>
    <center><h1 class=" text-4xl"><u>LISTADO DE LOS ARTICULOS</u></h1></center>
    <input type="text"  id="txtBuscar" class="border-2 rounded-lg" placeholder="Busca los articulos creados" size="25px"> 
    <form action="./lista.php" method="POST">
    <div id="actions" class="px-3 my-3">
    <input type="submit" name="Nuevo" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Nuevo">
    <input type="submit" name="Editar" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Editar">
    <input type="button" id="Eliminar" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Eliminar">
    <dialog id="dialogo"> <p>¿Esta seguro que desea eliminar el articulo?</p><button type="submit" name="Eliminar">Si</button> &emsp;&emsp; <button id="Cancelar">No</button> </dialog> 
    </div>
    <!-- <button><i class="fa fa-thumbs-up"></i>Buy now!!!</button> -->
    <fieldset class="my-3  text-teal-900 h-full w-full px-6">
        <legend>Articulos Creados</legend>
        <br>
        <select name="art" id="select"  size="6" style="width: 100%;">
            <?php          
            //DDRC:Con el uso de un bucle se recorrer el array devuelto sin usar aditamentos extras.
            echo '<script>var valselect=[];</script>';
            while ($fila=mysqli_fetch_array($query)) {
                if ($fila['Publicado']==true) {
                    $public='Publicado';
                } else {
                    $public='No Publicado';
                }
                
                echo '<option value="'.$fila['Nombre_Articulo'].'">'.$fila['Nombre_Articulo'].' 
                &emsp;&emsp; '.$public.'</option>';
                echo '<script>valselect.push({"Nombre":"'.$fila['Nombre_Articulo'].'","Estado":"'.$public.'"});
                 </script>';
            } 
            ?>
        </select>
    </fieldset>
    </form> 
    
</body>
<script src="../controlador/buscar.js"></script>
<?php
//condiciones para enviar datos con varibles de secion
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