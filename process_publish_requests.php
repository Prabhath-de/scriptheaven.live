<?php
// process_publish_requests.php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'publisher') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    // Database connection
    $conn = mysqli_connect("localhost", "scriptheaven_user", "3P%g5aQdX*k*UtKh", "scriptheaven_db");

    // Process publisher requests for publishing
    if (isset($_POST['publish'])) {
        $publisher_user_id = $_SESSION['user_id'];
        $publish_script_ids = $_POST['publish'];

        foreach ($publish_script_ids as $script_id) {
            // Insert publisher request into the 'publish_requests' table
            $query = "INSERT INTO publish_requests (script_id, publisher_user_id) 
                      VALUES ($script_id, $publisher_user_id)";
            mysqli_query($conn, $query);
        }

        // Close the connection
        mysqli_close($conn);

        // Redirect back to the publisher's page after submitting requests
        header("Location: publisher.php");
        exit();
    }
} else {
    // No valid action to perform
    header("Location: index.php");
    exit();
}
?>
