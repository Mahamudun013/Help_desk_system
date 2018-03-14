<?php
  include('function.php');
  session_start();
  if(!isset($_SESSION['username'])){
    session_unset();
    session_destroy();
    header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .jobs_link a{
      text-decoration:none;
    }
    .jumbotron h5{
        color: #333333; 
        font-family: Arial, Helvetica, sans-serif;
    }
    
  </style>

</head>
<body>

 <nav class="navbar navbar-inverse" style="border-radius: 0">
  <div class="container">
    

    <div class="navbar-header">

      <a class="navbar-brand" href="#">HELPDESK.COM</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#"></a></li>

        <form class="navbar-form navbar-left">   
          <div class="input-group">
             <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
         </div>    
      </form>
    

    </ul>


    <ul class="nav navbar-nav navbar-right">

      
      <li><a href="donor_info.php"><span class="glyphicon glyphicon-gift"></span> Donate</a></li>
      <li><a href="user_home.php"><span class="glyphicon glyphicon-search"></span> Receive</a></li>

      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" 
        href="#"><?php echo $_SESSION['username'];?> &nbsp<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="user_profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
          <li><a href="function.php?emp_username=<?php echo $_SESSION['username'];?> "><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </li>

    </ul>
  </div>
</nav>

  <div class="container">
    <div class="col-md-10 col-md-offset-1">
      <?php

      include('config.php');
       $connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

        if (isset($_GET['product_id'])) {
          $p_id=$_GET['product_id'];
          $sql="SELECT * FROM donor_table WHERE id=$p_id";


             $select =mysqli_query($connect,$sql);

       
          if (mysqli_num_rows($select) > 0) {

           // output data of each row
           while($row = mysqli_fetch_assoc($select)){
      ?>  
         <div class="jumbotron">
            <h2 style="text-align: center;color: red;"><b>Donor Details</b></h3><br>

          <h2 style="color: blue"><?php echo $row["name"] ?></h2>
          <br>
           <h3>Product Type:</h3>
            <h4>&nbsp&nbsp&nbsp&nbsp<?php echo $row["product_type"] ?></h4>
          <br>

          <h4>Product name:</h4><h5>&nbsp&nbsp&nbsp<?php echo $row["product_name"] ?></h5>

          <h4>Address: </h4>
          <h5>&nbsp&nbsp&nbsp<?php echo $row["address"] ?></h5>
          <h4>City:</h4> 
          <h5 >&nbsp&nbsp&nbsp<?php echo $row["city"] ?></h5>

           <h4>Zip: </h4>
           <h5 >&nbsp&nbsp&nbsp<?php echo $row["zip"] ?></h5>
          <h4>Phone</h4>
          <h5 >&nbsp&nbsp&nbsp<?php echo $row["phone_number"] ?></h5>
          <h4>Email:</h4>
          <h5 >&nbsp&nbsp&nbsp<?php echo $row["email"] ?></h5><br><br>


          <a href="apply_form.php?app_name=<?php echo $_SESSION['username'] ?>&product_id=<?php echo 
          $row['id'] ?>" class="btn btn-primary" type="button"> Apply Now</a>
         
        <?php
        }
      }
    }
      ?>


      </div>


    </div>
  </div>
 <?php include ("footer.php"); ?>
  
</body>
</html>