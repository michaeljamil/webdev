<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendance_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $user_name = $_POST['user_name'];
        $passwrd = $_POST['passwrd'];
        $email = $_POST['email'];

        $sql = "INSERT INTO accounts (username, pass, email) VALUES ('$user_name', '$passwrd', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
     // Close the connection
     $conn->close();
    }
?>