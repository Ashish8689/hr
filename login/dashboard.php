<?php
 
 include 'connection.php';

 session_start();

if(isset($_SESSION['is_adminlogin'])){
  // $email = $_SESSION['email'];
}
else{
  echo "<script>location.href='login.php'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Dashboard</title>

 <link rel="stylesheet" type="text/css" href="../style.css">

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


<style>

  .nav-link{
    font-size: 17px;
    font-weight: 700;
    color: rgba(0, 0, 0, .77);
    border-radius: 24px;
    transition: .4s;
    border: 2px solid #9f0fef;
  }

  .nav-link i{
    color: whitesmoke;
  }

  .nav-link:hover{
    color: #9f0fef!important;
    background-color: whitesmoke;
    border: 2px solid #9f0fef;
  }

  .nav-link:hover i{
    color: #9f0fef;
    /* background-color: #ec5b53; */
  }

  table{
    margin-top: 7vh;
    width: 100%;
}

  th{
      padding:20px 30px;
      text-transform: uppercase;
      text-align: center;
  }
  td{
      text-align: center;
      padding:10px;
      font-weight: 600;
     font-size: 14px;
     color: #5d5d5a;
     font-family: 'Roboto', sans-serif;
  }

  i{
    color: #ec5b53;
    transition: .3s;
  }


</style>
</head>

<body>

 <!-- Top Navbar -->
 <nav class="navbar y-1 px-5 shadow justify-content-between">

  <a class="navbar-brand" href="#">Hr Binds</a>

  <a class="nav-link" href="logout.php">
      <i class="fas fa-sign-out-alt mr-2"></i>
      Logout
  </a>
</nav>



<!-- ********************  All entries  ******************************-->

 <div class="container-fluid">

<div class="table-responsive">
<table border="2px">
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>mobile</th>
      <th>job</th>
      <th>details</th>
      <th colspan="2">operation</th>
    </tr>
  </thead>
  <tbody>


    <?php
        

         $selectquery="select * from details";

         $call = mysqli_query($con,$selectquery);

         // $nums=mysqli_num_rows($call);

        while( $res = mysqli_fetch_array($call) ){

           ?>

          <tr>
            <td><?php echo $res['id']?></td>
            <td><?php echo $res['name']?></td>
            <td><?php echo $res['email']?></td>
            <td><?php echo $res['mobile']?></td>
            <td><?php echo $res['job']?></td>
            <td><?php echo $res['details']?></td>


            <td><a href="delete.php?id=<?php echo $res['id'];?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
              <i class="fa fa-trash"></i></a></td>
          </tr>

                <?php

        }

    ?>

  </tbody>
</table>
 </div>

</div>
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>


</body>

</html>