<?php
   
    //Create connection
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Create database "majk_db" if there is no existing database
    $sql = "CREATE DATABASE IF NOT EXISTS majk_db";
    //Catches error creating databse
    if (!$conn->query($sql)) {
        echo "Error creating database: " . $conn->error;
    }

    $conn->select_db("majk_db");

    // Create tables "admin" and "employee" if they don't exist
    $tableSqlAdmin = "CREATE TABLE IF NOT EXISTS admin (
        admin_id int(6) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NUll,
        email VARCHAR(50)
    )";

    // Create tables "employee" and "employee" if they don't exist
    $tableSqlEmployee = "CREATE TABLE IF NOT EXISTS employee(
        emp_id int(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        address VARCHAR(100) NOT NULL,
        phone VARCHAR(50) NOT NULL
    )";
    
    $tableSqlEmpLogin = "CREATE TABLE IF NOT EXISTS employee_login(
        emp_login_id int(6) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL
    )";

if (!$conn->query($tableSqlEmpLogin)) {
    echo "Error creating employee_login table: " . $conn->error;
}
?>