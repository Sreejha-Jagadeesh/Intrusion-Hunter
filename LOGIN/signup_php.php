<?php
$server_name = "localhost";
$username = "root";
$password = "krish1312";
$database_name = "signup";

// Create connection
$conn = new mysqli($server_name, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['save'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // Prepare the statement
    $stmt = $conn->prepare("INSERT INTO signup (email, pwd) VALUES (?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $email, $pwd);

    if ($stmt->execute()) {
        include 'signedup.html';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
