<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
<div class="container-fluid"><div class="container">
    <!--after header-->
    <center>
    <br>
    <h2>User Registration</h2>
    <br>
    <br>
    <table>
    <form action="register.php" method="post">
        <tr>
            <td><label>Username:</label></td>
            <td><input type="text" name="username" required><td>
        </tr>
        <tr>
             <td><label>Password:</label></td>
             <td><input type="password" name="password" required></td>
        </tr>
        <tr>
              <td><label>Phone Number:</label></td>
               <td><input type="tel" name="phone_number" required></td>
       </tr>
       <tr>
              <td><label>User Type:</label></td>
              <td><select name="user_type" required>
                    <option value="writer">Writer</option>
                    <option value="publisher">Publisher</option>
                  </select></td>
        </tr>
        <tr><td> </td>
        <td><input type="submit" name="register" value="Register"><td>
        </tr>
    </form>
</table>
<br>
Already a member?
<br>
<a href="login.php"><button class"btn btn-primary btn-lg">Login</button></a>
</center>
<br>
<!--footer-->
<div class="container">
	  <center><a href="index.php"><img src="images/SHlogo.png" alt="logo" width="300" height="300"></a></center>
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
// register.php (PHP code)
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone_number = $_POST['phone_number'];
    $user_type = $_POST['user_type'];

    // Database connection
    $conn = mysqli_connect("localhost", "scriptheaven_user", "3P%g5aQdX*k*UtKh", "scriptheaven_db");

    // Insert user data into the 'users' table
    $query = "INSERT INTO users (username, password, phone_number, user_type, admin) VALUES ('$username', '$password', '$phone_number', '$user_type', 0)";
    $result = mysqli_query($conn, $query);
   if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
