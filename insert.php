<?php
    include "connect.php";

    //Access the attendance_db
    ($conn->select_db("attendance_db"))
        //Checks if HTTP POST method is used
        if (isset($_POST['submit'])) {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            //SQL query to insert data to 'accounts' table
            $sql = "INSERT INTO accounts (username, password, email) VALUES ('$user_name', '$password', '$email')";
    
            if ($conn->query($sql)) {
                echo "Record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        $conn->close();
    }
?>
