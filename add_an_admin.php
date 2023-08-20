<?php
// Add admin to the users table with a hashed password

// Database connection
$conn = mysqli_connect("localhost", "scriptheaven_user", "3P%g5aQdX*k*UtKh", "scriptheaven_db");

// Admin details
$adminUsername = "admin";
$adminPassword = "admin123"; // The plain text password

// Hash the password
$hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

// Insert admin into the database
$query = "INSERT INTO users (username, password, user_type, admin) VALUES ('$adminUsername', '$hashedPassword', 'admin', 1)";
mysqli_query($conn, $query);

// Close the connection
mysqli_close($conn);

echo "Admin added successfully!";
?>
