<?php
  include ("./inc/settings.php");
  validar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/funciones.js"></script>

    <link rel="stylesheet" href="./css/estilos.css">

</head>
<body>
    Bienvenido a mi crud
    <?= $_SESSION["user"]?>
    <?= $_SESSION["apellido1"]?>
    <?= $_SESSION["apellido2"]?>
    <a href="LogOut.php">Log Out</a>
    <?php

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT column1, column2, column3, column4, column5 FROM table1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Fecha</th><th>NumeroDouble</th><th>NumeroFloat</th><th>Eliminar</th><th>Modificar</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "\n<tr>\n\t<td>".$row["column1"]."</td>\n\t<td>".$row["column2"]."</td>\n\t<td>".$row["column3"]."</td>
                \n\t<td>".$row["column4"]."</td>\n\t<td>".$row["column5"]."</td>\n\t";
          
          echo "<td><a href='eliminar.php?column1=".$row["column1"]."' onclick='return confirmar()'><img src='./img/delete.png'></a></td>
                <td><a href='actualizar.php?column1=".$row["column1"]."' onclick='return confirmarModificar()'><img src='./img/update.png'></td></tr>\n";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
      $conn->close();
    ?>

<form action = "insertar.php" method="post">

<fieldset style="width: 400px;">
    <legend>Inserte la informacion del nuevo registro</legend>
    ID <input type="number" name="id" id="" value = "1975" class="w3-input" required>
    <br>
    Nombre <input type="text" name="name" id="" value = "humberto" class="w3-input">
    <br>
    Fecha <input type="date" name="fecha" id="" value = "2021-06-09" class="w3-input">
    <br>
    Numero Double <input type="number" name="numeroD" id="" value = "" class="w3-input">
    <br>
    Numero Float <input type="number" name="numeroF" id="" value = "" class="w3-input">
    <br>
    <input type="submit" value="Aceptar">
    
</fieldset>
</body>
</html>