<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User login</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
<div class="container-fluid"><div class="container">
    <center>
        <br>
        <h2>User Login</h2>
        <br>
        <br>
        <table>  
          <form action="login.php" method="post">
          <tr>
              <td><label>Username:</label></td>
              <td><input type="text" name="username" required></td>
           </tr>
           <tr>
               <td><label>Password:</label></td>
               <td><input type="password" name="password" required></td>
           </tr>
           <tr>
               <td> </td>
               <td><input type="submit" name="login" value="Login"></td>
           </tr>
          </form>
</table>
<br>
Not a member yet?
<br>
<a href="register.php"><button class"btn btn-primary btn-lg">Register now</button></a>
<br>
<br>
<a href="admin_login.php">I'm an admin</a>
</center>
<br>
<!--footer-->
<div class="container">
	  <center><a href="index.php"><img src="images/SHlogo.png" alt="logo" width="300" height="300"> </a></center>
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
<?php
// login.php (PHP code)
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
     $conn = mysqli_connect("localhost", "scriptheaven_user", "3P%g5aQdX*k*UtKh", "scriptheaven_db");

    // Check if the user exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_type'] = $user['user_type'];
        
            // Redirect based on user type
            if ($user['user_type'] === 'writer') {
                header("Location: writer.php");
                exit();
            } elseif ($user['user_type'] === 'publisher') {
                header("Location: publisher.php");
                exit();
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    // Close the connection
    mysqli_close($conn);
}
?>
