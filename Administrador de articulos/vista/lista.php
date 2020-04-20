<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Articulos</title>
    <link href="css/tailwind.min.css" rel="stylesheet">
    <script src="../controlador/jquery-1.12.0.js">

</script>
</head>
<body class="bg-orange-500 font-serif text-gray-900">
<?php
    require('../modelo/conecciones.php');
    $query= mysqli_query($conn,'select * from Articulos;');
    mysqli_close($conn);
    ?>
    <center><h1 class=" text-4xl"><u>MODIFICACION DE LOS ARTICULOS</u></h1></center>
    <input type="text"  id="txtBuscar" class="border-2 rounded-lg" placeholder="Busca los articulos creados" size="25px"> 
    <form action="./lista.php" method="POST">
    <div id="actions" class="px-3 my-3">
    
    <input type="submit" name="Nuevo" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Nuevo">
    <input type="submit" name="Editar" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Editar">
    <input type="submit" name="Eliminar" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Eliminar">
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
                echo '<option value="'.$fila['Nombre_Articulo'].'">'.$fila['Nombre_Articulo'].'</option>';
                echo '<script>valselect.push("'.$fila['Nombre_Articulo'].'"); </script>';
            } 
            ?>
        </select>
    </fieldset>
    </form>
    
</body>
<script>
    //la funcion para hacer la busqueda
    document.getElementById('txtBuscar').addEventListener('keyup',
    function buscar() {
        const valores=document.getElementById('txtBuscar').value.toLowerCase();
    const result=document.getElementById('select');
        result.innerHTML='';
        console.log(valselect);
        for (let i = 0; i < valselect.length; i++) {
            let aBuscar=valselect[i].toLowerCase();
            if(aBuscar.indexOf(valores) !== -1){
                result.innerHTML+=`<option value="${valselect[i]}">${valselect[i]}</option>`
            }
        }
        if (result.innerHTML==='') {
            result.innerHTML+=`<option disabled>No se ha encontrado el Articulo...</option>`
        }
    }   );
</script>
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