<?php
    include ("./inc/settings.php");
    validar();
    /*
    print_r($_POST);
    echo "<br>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    */

    $id = $_POST ['id'];
    $nombre = $_POST ['name'];
    $fecha = $_POST ['fecha'];
    $numeroD = $_POST ['numeroD'];
    $numeroF = $_POST ['numeroF'];

    $query = "INSERT INTO table1 (column1,column2,column3,column4,column5) VALUES ($id, '$nombre', '$fecha', $numeroD, $numeroF);";
    //echo "<br>";
    //echo $query;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    if ($conn->query($query)){
        header("location:crud.php");
    }
    else{
        echo "Alguio salió mal <a href='crud.php'> click aqui para volver a crud</a>";
    }
?>