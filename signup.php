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
    $birthdate = $_POST["birthdate"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Prepare and bind a SQL statement to insert the form data into the "members" table
    $stmt = $conn->prepare("INSERT INTO members (username, birthdate, phone, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $birthdate, $phone, $password);

    if ($stmt->execute()) {
        // Redirect to a success page or perform additional actions
        header("Location: journey login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

