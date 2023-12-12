<?php
include "connect.php";
include "index.html";
//Selects database: attendance_db
$conn ->select_db("attendance_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    // Create the SQL query
    $sql = "SELECT * FROM accounts
            WHERE username='$username'
            AND password='$password'";

    // Execute the query
    $result = $conn->query($sql);

    if ($result) {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            include "menu.html";
        } else {
            echo '<script>displayModal("Invalid username or password");</script>';
        }
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
