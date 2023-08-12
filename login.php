<?php
// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journey";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and bind a SQL statement to retrieve the stored password for the given username
    $stmt = $conn->prepare("SELECT password FROM members WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedPassword);
    $stmt->fetch();

    if ($password === $storedPassword) {
        // Authentication successful, redirect to a welcome page or perform additional actions
        header("Location: Journey_Home.html");
        exit();
    } else {
        // Invalid username or password, display an error message
        echo "Invalid username or password.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
