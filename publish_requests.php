<?php
// publish_requests.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'publisher') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Publish Requests</title>
</head>
<body>
<?php
// Database connection
$conn = mysqli_connect("localhost", "scriptheaven_user", "3P%g5aQdX*k*UtKh", "scriptheaven_db");

// Query and display available scripts for publishing
$query = "SELECT scripts.script_id, scripts.title, scripts.description, users.username, scripts.file_path 
          FROM scripts INNER JOIN users ON scripts.user_id = users.user_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<center><h2>Here are the best scripts for your next present</h2></center><br>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<strong>Title:</strong> " . $row['title'] . "<br>";
        echo "<strong>Description:</strong> " . $row['description'] . "<br>";
        echo "<strong>Writer:</strong> " . $row['username'] . "<br>";
        echo "<a href='uploads/" . $row['file_path'] . "' download>Download Script</a>";
        echo "</li><br>";
    }
    echo "</ul>";
} else {
    echo "<p>No scripts available for publishing.</p>";
}

// Close the connection
mysqli_close($conn);
?>

</body>
</html>

