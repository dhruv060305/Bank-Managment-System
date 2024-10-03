<?php
$host = "localhost";
$user = "root"; // Change this if your MySQL user is different
$pass = "";     // Change this if your MySQL password is set
$db = "bank_management";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
