<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra de los articulos creados</title>
    <style>
#contenedor{
    display: grid;
grid-template-columns: 1fr 1fr 1fr;
background-color: teal;
}
.column{
    background-color: gray;
    height: 5cm;
    border: 1px blue dashed;
}
    </style>
</head>
<body class="text-gray-900 font-serif bg-blue-500">
<?php
    require('../modelo/conecciones.php')
    ?>
    <div id="contenedor">
    <div id="0" class="column">Holas chavos</div>
    <div id="1" class="column">Aqui programando</div>
    <div id="2" class="column">Ando</div>
    <div id="0" class="column">Holas chavos</div>
    <div id="1" class="column">Aqui programando</div>
    <div id="2" class="column">Ando</div>
    <div id="0" class="column">Holas chavos</div>
    <div id="1" class="column">Aqui programando</div>
    <div id="2" class="column">Ando</div>
    <div id="0" class="column">Holas chavos</div>
    <div id="1" class="column">Aqui programando</div>
    <div id="2" class="column">Ando</div>
    </div>
    <video src="Las.cicatrices.de.dracula.2K.etigol.descargacineclasico.com.mp4"  id="vid"  width="500px" height="500px" controls autoplay>
        <source src="" type="">
    </video>
    <audio src="Kalimba.mp3" controls autoplay></audio>
    <picture></picture>
    <embed src="" type="audio/mp3"  width="100px" height="100px">
    <input type="file" name="" id="url">
    <input type="button" value="chus" onclick="reproducir()">
    <object data="C:\Users/Daniel/Videos/XM-DP-2019-720p/X-Men DP (2019).mkv" width="250"
    height="200" type=""></object>
</body>
<script>
function reproducir() {
    var file = document.getElementById('url').files[0];    
    console.log(file);
    // var file={name: "Primal.2019.1080p-dual-lat-cinecalidad.is.mp4", webkitRelativePath: "", size: 1666639192, type: "video/mp4"};
var url = window.URL.createObjectURL(file);
console.log(url);
document.getElementById('vid').src=url;
}
</script>
</html>