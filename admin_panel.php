<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
<div class="container-fluid"><div class="container">
    <!--after header-->
    <center><h1><br>Welcome, Admin!</h1></center>
    <br>
    <!--content eka methanin dandoo-->
    <!-- Logout button -->
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
        <br>
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
