<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chamadatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// Example database operations (e.g., insert, update, delete)
// ...

// Close the connection after all database operations are done
$conn->close();
?>
