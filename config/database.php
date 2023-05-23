<?php

    $host= "localhost";
   
    $username = "root";
    $password = "";

    // try {
    //     $conn = new PDO("mysql:host=$host;dbname=crud-mvc", $username, $password);
    //     //set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connected successfully";
    //   } catch(PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage();
    //   }

    //   return $conn;
$conn = mysqli_connect("localhost","root","","crud-mvc");
      
?>