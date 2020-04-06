<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggueo al aplicativo</title>
    <style>
        #loggin{
            padding: 20px;
            background-color: gray;
            width: 400px;
            height: 500px;
            border-radius: 16px;
        }
        #contenedor{
            width: 100%;
            height: 100vh;
            display: flex;
   justify-content: center;
   align-items: center;
        }
    </style>
</head>
<body>
    <div id="contenedor">
    <div id="loggin">
        Usuario: <input type="text">
        <br>Contraseña: <input w type="password">
        <br><br>
        <input type="button" value="Ingresar">
        <br> <input type="button" value="Cancelar">
    </div>
    </div>
</body>
</html>