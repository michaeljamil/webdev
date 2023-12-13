<?php
    include "connect.php";

    //Selects database: attendance_db
    $conn ->select_db("employee_attendance_system");

    //Create table "accounts" if there is no existing table
    $tableSql = "CREATE TABLE IF NOT EXISTS admin(
                record_id int(6) AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(50) NOT NUll,
                email VARCHAR(50)
            )";
    //Catches error creating table
    if (!$conn->query($tableSql)) {
        echo "Error creating table: " . $conn->error;
    }

    //Checks if HTTP POST method is used
    if (isset($_POST['submit'])) {
        $user_name = $_POST['user_name'];
        $password = $_POST['confirm_password'];
        $email = $_POST['email'];
        
        //SQL query to insert data to 'accounts' table
        $sql = "INSERT INTO admin (username, password, email) VALUES ('$user_name', '$password', '$email')";

        if ($conn->query($sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    $conn->close();
}
?>
