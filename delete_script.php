<?php
// delete_script.php
if (isset($_POST['submit'])) {
    // Check if any scripts were selected for deletion
    if (!empty($_POST['delete'])) {
        // Database connection
       $conn = mysqli_connect("localhost", "scriptheaven_user", "3P%g5aQdX*k*UtKh", "scriptheaven_db");

        foreach ($_POST['delete'] as $script_id) {
            // Perform the deletion query for each selected script
            $script_id = mysqli_real_escape_string($conn, $script_id);
            $query = "DELETE FROM scripts WHERE script_id = $script_id";
            mysqli_query($conn, $query);
        }

        // Close the connection
        mysqli_close($conn);

        // Refresh the page after deletion to reflect the changes
        header("Location: writer.php");
        exit();
    }
}
?>

