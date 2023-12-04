<?php

// Database credentials
$host = "localhost";
$dbname = "gemeente_rotterdam";
$username = "root";
$password = " ";

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate user input (add your validation logic here)

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert user data into the database
    $stmt = $pdo->prepare("INSERT INTO admin (email, password) VALUES (?, ?)");
    $stmt->execute([$email, $hashedPassword]);

    // You can add further logic or redirect the user after successful registration
}

// Close the database connection (optional, as PHP will automatically close it when the script ends)
$pdo = null;

?>
