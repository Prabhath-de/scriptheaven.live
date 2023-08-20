<?php
// upload_script.php
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'writer') {
   session_start();
}

if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    // Check if a file was uploaded
    if ($_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Check if the file is a PDF
        if (strtolower($file_ext) === 'pdf') {
            // Move the uploaded file to a folder on the server
            $file_path = 'uploads/' . uniqid('script_', true) . '.' . $file_ext;
            if (move_uploaded_file($file_tmp, $file_path)) {
                // Database connection
                $conn = mysqli_connect("localhost", "scriptheaven_user", "3P%g5aQdX*k*UtKh", "scriptheaven_db");

                // Insert script data into the 'scripts' table
                $query = "INSERT INTO scripts (user_id, title, description, file_path) 
                          VALUES ($user_id, '$title', '$description', '$file_path')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "Script uploaded successfully!";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                // Close the connection
                mysqli_close($conn);
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "Only PDF files are allowed.";
        }
    } else {
        echo "Please select a PDF file to upload.";
    }
}
?>
