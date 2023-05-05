<?php
// Start session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "idb";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $college = $_POST["college"];
  $major = $_POST["major"];
  $semester = $_POST["semester"];
  $domain = $_POST["domain"];
  $message = $_POST["message"];

  // Prepare SQL statement
  $stmt = $conn->prepare("INSERT INTO applications (name, email, phone, college, major, semester, domain, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $name, $email, $phone, $college, $major, $semester, $domain, $message);

  // Execute SQL statement
  if ($stmt->execute() === TRUE) {
    // Redirect to thank you page
    $_SESSION["success"] = true;
    header("Location: thank-you.php");
    exit();
  } else {
    // Display error message
    $_SESSION["error"] = "Error: " . $stmt->error;
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();
}
?>
