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

    //Selects database: attendance_db
    $conn ->select_db("attendance_db");

    //Create table "accounts" if there is no existing table
    $tableSql = "CREATE TABLE IF NOT EXISTS accounts(
        record_id int(6) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NUll,
        email VARCHAR(50)
    )";
    //Catches error creating table
    if (!$conn->query($tableSql)) {
        echo "Error creating table: " . $conn->error;
    }

    
    
?>