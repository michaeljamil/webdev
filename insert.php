<?php
include "connect.php";

// Selects database: majk_db
$conn->select_db("majk_db");

// Create tables "admin" and "employee" if they don't exist
$tableSqlAdmin = "CREATE TABLE IF NOT EXISTS admin (
                    record_id int(6) AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL,
                    password VARCHAR(50) NOT NUll,
                    email VARCHAR(50)
                )";

$tableSqlEmployee = "CREATE TABLE IF NOT EXISTS employee (
                    record_id int(6) AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL,
                    password VARCHAR(50) NOT NUll,
                    email VARCHAR(50)
                )";

// Catches error creating tables
if (!$conn->query($tableSqlAdmin) || !$conn->query($tableSqlEmployee)) {
    echo "Error creating tables: " . $conn->error;
}

// Checks if HTTP POST method is used
if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // SQL query to insert data based on the selected role
    if ($role === 'admin') {
        $sql = "INSERT INTO admin (username, password, email) VALUES ('$user_name', '$password', '$email')";
    } elseif ($role === 'employees') {
        $sql = "INSERT INTO employee (username, password, email) VALUES ('$user_name', '$password', '$email')";
    } else {
        echo "Invalid role selected";
        exit; // Stop execution if an invalid role is selected
    }

    if ($conn->query($sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
