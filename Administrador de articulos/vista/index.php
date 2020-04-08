<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de articulos</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="text-gray-900 font-serif">
    <center><h1 class=" text-4xl"><u>CONTENIDO DE LOS ARTICULOS</u></h1></center>
    <div id="Cabecera">
        <h2 class="text-2xl text-center my-1">Contenido</h2>
        <input class="bg-orange-600 text-white rounded-lg p-2 mx-2" type="button" value="Guardar">
        <input class="bg-orange-600 text-white rounded-lg p-2 mx-2" type="button" value="Cancelar">
    </div>
    <div id="Cambios-nombre" class="mx-2" style="margin-bottom: 40px;">
    <br><br>
<span id=""  style=" float:inline-left; margin-right: 30px;">
     Publicado:<input class="mx-2" type="radio" name="publicado" id=""> 
<br> No Publicado:<input class="mx-2" type="radio" name="publicado" id="">
</span>
Nombre del articulo <sup>*</sup>: <input type="text" name="" id="" class="border-2 rounded-sm" required>
    </div>
    <hr>
    <div id="Cambios-detalle" class="pl-16" style="display: inline;">
    <br><br>
    <label for="" class="flex mx-12" style="display: flex;">Detalle</label>
        <textarea name="" id="" cols="80" rows="10" class="mx-12" style="overflow: scroll;
    resize: none;"></textarea>     
    </div>
    <div id="Cambios-articulo" class="px-6" style="float:right;">
   <br> Video <input type="radio" name="media" id="" style="margin-right:50px;"> URL Video: <input type="text" name="" id="">
   <br> Audio <input type="radio" name="media" id=""style="margin-right:50px;"> URL Audio: <input type="text" name="" id="">
   <br> Imagen <input type="radio" name="media" id=""style="margin-right:50px;"> URL Imagen: <input type="text" name="" id="">
   <br> Imagen y audio <input type="radio" name="media" id="" style="margin-right:50px;">
   </div>
</body>
</html>
