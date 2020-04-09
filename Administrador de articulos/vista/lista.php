<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Articulos</title>
    <!-- <link href="css/tailwind.min.css" rel="stylesheet"> -->
    <style>
        #select{
            width: 100%;
        
        
        }
    </style>
</head>
<body>
    <center><h1 class=" text-4xl"><u>MODIFICACION DE LOS ARTICULOS</u></h1></center>
    <input type="text" class="border-2 rounded-lg" placeholder="Busca los articulos creados" size="25px"> 
    <input type="button" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="New">
    <input type="button" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Edit">
    <input type="button" class="border-l-4 border-r-2 border-red-500 rounded-lg bg-blue-900 text-blue-300 px-3 py-2" value="Delete">
    <!-- <button><i class="fa fa-thumbs-up"></i>Buy now!!!</button> -->
    <fieldset class="my-3 bg-indigo-600 text-teal-300 h-full w-full">
        <legend>Articulos Creados</legend>
        <br>
        <select name="" id="select" multiple size="6" >
            <option value="primero">opcion 1</option> 
            <option value="segundo">opcion 2</option>
            <option value="tercero">opcion 3</option>
        </select>
    </fieldset>
</body>

</html>