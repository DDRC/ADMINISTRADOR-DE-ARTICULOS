<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de articulos</title>
    <script src="tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        #cosa{
           float: right;
           background-color: #afcafc;
           display: inline-block;
        }        
        body{
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
    <H1>MODIFICACION DE LOS ARTICULOS</H1>
    <h1 id="titulo"></h1>
    <img src="" alt="" id="imagen">
    <div id="cosa">
   <br> ¿EL ARTICULO TENDRA IMAGEN?: <input type="radio" name="eleccion" id="audio" ><==Audio<input type="radio" id="video" name="eleccion" ><==Video
    <br> <input type="file"  style="display: none">
   <br> ¿DESEA QUE EL ARTICULO TENGA UN TITULO?: <input type="radio" name="title" id="tittled" onchange="audvid()"><==SI  <input type="radio" name="title" id="nontittled" onchange="audvid()"><==NO
   <br> <input type="text" id="test" style="display: none"> &#09; <input type="button" value="Enviar" id="Wtitle" style="display: none" onclick="escribir()">
   <br> ¿DESEA QUE EL ARTICULO TENGA UNA DESCRIPCION?: <input type="radio" name="description" id=""><==SI<input type="radio" name="description" id=""><==NO
   <br><textarea name="texteditar" id="editar"></textarea>
   </div>
</body>

 <script>
      /*tinymce.init({
        selector: '#editar',
        plugins:[
            'advlist autolink list link imagecharmap print preview hr anchor pagebreak'
        ]
      });*/
      
      function audvid() {
      let titled= document.getElementById('tittled');
      let nontitled= document.getElementById('nontittled');
      let test= document.getElementById('test');
      let tt= document.getElementById('Wtitle');
        if (titled.checked) {
            test.style='display:inline-block'
            tt.style='display:inline-block'
        }else if(nontitled.checked){
            test.style='display:inline-block'
            tt.style='display:inline-block'
            alert("valiste niño")
        }
      }
      function escribir() {
          let test= document.getElementById('test').value;
        let titulo=document.getElementById('titulo');
     titulo.innerHTML=test;
      }
    </script>
 

</html>
