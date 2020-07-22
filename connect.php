<?php

$username="root";
$password="";
$server="localhost";
$db="hr";

$con=mysqli_connect($server,$username,$password,$db);

if($con){

	$name = $_POST['name'];
	$email= $_POST['email'];
	$mobile=$_POST['mobile'];
	$job =  $_POST['job'];
	$details=$_POST['details'];

	$insertQuery = "insert into details(name,email,mobile,job,details) values('$name','$email','$mobile','$job','$details')";

	$run = mysqli_query($con,$insertQuery);

	if($run){
		?>
		<script>
		  alert('data inserted');
		</script>
		<?php
	}
	else{
		?>
		<script>
			alert('data not send retry!!!');
		</script>
		<?php
	}
	header('location:index.html');
}

	else{
		?>
		<script>
			alert('No connection');
		</script>
		<?php
	}	

?>