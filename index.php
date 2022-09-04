<?php
   include("conn.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT username FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['username'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['username'] = $myusername;
         
         header("location: home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Hardware team</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<!-- <link rel="stylesheet" type="text/css" href="./css/style.css"> -->
 </head>
<body>

	
	<br/><br/>
	<div class="container">
 


		<div class="card mx-auto" style="width: 20rem; padding: 20px;">
    
		  <img class="card-img-top mx-auto" style="width:80%;" src="./images/logo.png" alt="Login Icon">
		  <div class="card-body">
			  <!-- this form cant be submit directly as it has onsubmit return false -->
		    <form id="form_login" action="" method="POST">
			  <div class="form-group">
			    <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
          <small id="u_error" class="form-text text-muted"></small>
			  </div>

			  <div class="form-group">
			    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
			  	<small id="p_error" class="form-text text-muted"></small>
			  </div>
        <div>
			  <button type="submit" class="btn btn-primary btn-block" valign="center" width=200px><i class="fa fa-lock">&nbsp;</i>Login</button>
       </div>
			  <span><a href="forgot.php">Forgot password ?</a></span>
			</form>
		  </div>
		  <div class="card-footer"><a href="#">Contact Admin</a></div>
		</div>
	</div>

</body>
</html>