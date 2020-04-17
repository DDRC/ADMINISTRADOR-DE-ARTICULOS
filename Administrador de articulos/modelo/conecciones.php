<?php
//declaracion de varibles para conectarse a la DB
$servername = "localhost";
$username = "DDRC";
$password = "Daniel";
$database = "x_corapecurso_cms";
// Crea la connection
$conn = mysqli_connect($servername, $username, $password,$database);
// pregunta si hay un error al conectaarse y lo nuestra si existiese
if ($conn->connect_error) {
    die("ERROR: No se puede conectar al servidor: " . $conn->connect_error);
  }

  // mysqli_close($conn);
?>