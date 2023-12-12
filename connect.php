<?php
   
    //Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Create database "attendance_db" if there is no existing database
    $sql = "CREATE DATABASE IF NOT EXISTS attendance_db";
    //Catches error creating databse
    if (!$conn->query($sql)) {
        echo "Error creating database: " . $conn->error;
    }
    
?>