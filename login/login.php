<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- ************   Sign In  ***************** -->

<div class="contain">

   <div class="home">
   	  <i class="fa fa-home fa-3x"></i>
   </div>

	<div class="content">

		<h2 class="log-title">Login</h2>

		<form  class="log-form" action="" method="POST">	
	 
			    <div class="text">
					<label>Email</label><br>
					   <input type="text" name="email" autocomplete="off">
					   <i class=" log-icon fa fa-envelope-o"></i><br>
				</div>	   
			   
			    <div class="text">
					<label>Password</label><br>
					   <input type="text" name="pass"  autocomplete="off">
					   <i class=" log-icon fa fa-lock"></i><br>
				</div>	   
			    
			    <div class="login">
					   <input type="submit" name="login" value="login">
				</div>
			 
		</form>
	</div>

	<a href="../index.html" class="back">Home</a>
	
</div>

</body>
</html>


<?php


//   ************  Login Code   **************
 
	include "connection.php";

   session_start();

  if(!isset($_SESSION['is_adminlogin'])){

	if(isset($_POST['login'])){

		 $email=$_POST['email'];
		 $pass=$_POST['pass'];

		 $q="select * from admin where email='$email' && password='$pass'";

		 $result=mysqli_query($con,$q);

		 $num=mysqli_num_rows($result);

		 if($num == 1){
		 	$_SESSION['is_adminlogin'] = true;
		 	// $_SESSION['name'] = $name;
		 	// $_SESSION['email'] = $email;
		 	header('location:dashboard.php');
		 }

		 else{
		 	?>
		 	<script>
		 		alert ("Inncorrect");
		 	</script>
		 	<?php
		 }
	} 
}

else{
	header('location:dashboard.php');
}
