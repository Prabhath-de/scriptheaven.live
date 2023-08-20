<?php
// writer_page.php
session_start();
// Check if the user is not logged in or not a writer, then redirect to the login page
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'writer') {
    header("Location: login.php");
    exit();
}
// Include the necessary files
require_once 'upload_script.php';
require_once 'view_script.php';

// Define $writer_script_table before the section where it's used
$writer_id = $_SESSION['user_id'];
$conn = mysqli_connect("localhost", "scriptheaven_user", "3P%g5aQdX*k*UtKh", "scriptheaven_db");
$query = "SELECT * FROM scripts WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
ob_start(); // Start output buffering
?>
<!-- View uploaded scripts -->
<table>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    <?php 
      while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>
<?php
// Capture the output buffer contents into $writer_script_table
  $writer_script_table = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Writers</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
  <div class="container-fluid"><div class="container">
    <br>
    <center><h1>Welcome,Amazing Writers!</h1></center>
    <!-- Upload script form -->
    <h2>Upload Script</h2>
    <br>
    <table>
    <form action="upload_script.php" method="post" enctype="multipart/form-data">
            <tr>
        <td><label>Title:</label></td>
        <td><input type="text" name="title" required></td>
             <tr>
        <td><label>Description:</label></td>
        <td><textarea name="description" required></textarea></td>
             <tr>
        <td><label>PDF File:</label></td>
        <td><input type="file" name="pdf_file" accept=".pdf" required></td>
             <tr>
            <td> </td><td><input type="submit" name="upload" value="Upload"></td>
    </form>
    </table>
    <br>
    <br>
    <!-- Logout button -->
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
    <!--footer-->
    <div class="container">
	  <center><img src="images/SHlogo.png" alt="logo" width="300" height="300"></center>
    <br>
    <center>
    <h6>Developed by NSBM</h6>
	  </center>
  </div>
	  <br>
<footer><center><img src="images/SHlogo.png" alt="logo" width="50" height="50"> Copyrigt © 2023 Script Heaven. All Rights Reserved</center></footer>
  <!-- body code goes here -->

</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-3.3.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.3.1.js"></script>
	<script>
	function relocate()
		{location.href="team.php";
		}
	</script>
	
  </body>
</html>