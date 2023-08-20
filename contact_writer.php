<?php
// contact_writer.php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $publisher_request_id = $_POST['publisher_request_id'];
    $contact_details = $_POST['contact_details'];
    $short_note = $_POST['short_note'];

    // Save the contact details and short note in the database
    // Here, you can implement the code to update the 'publish_requests' table with the contact details and short note based on the $publisher_request_id.
    // Make sure to validate and sanitize the input data before updating the database.

    // Redirect back to the admin panel or any other page as needed
    header("Location: admin_panel.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Writer</title>
</head>
<body>
    <h1>Contact Writer</h1>
    <form action="contact_writer.php" method="post">
        <!-- Add a hidden input field to send the publisher_request_id -->
        <input type="hidden" name="publisher_request_id" value="<?php echo $_GET['publisher_request_id']; ?>">

        <label>Contact Details:</label>
        <input type="text" name="contact_details" required><br>

        <label>Short Note:</label>
        <textarea name="short_note"></textarea><br>

        <input type="submit" name="submit" value="Send">
    </form>
</body>
</html>
