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
    <div class="col-md-8 col-md-offset-2">
      <div class="jumbotron">
        <div class="form_head">
          <h3>Application Form</h3>
        </div>
        <hr>
        <div class="form_body">
          <?php
          //  apply 

          include('config.php');

           $connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

              if (isset($_GET['product_id'])) {
                $applicant=$_GET['app_name'];
                $pro_id=$_GET['product_id'];

                
              $sql="SELECT * FROM donor_table WHERE id=$pro_id";


             $select =mysqli_query($connect,$sql);

       
            if (mysqli_num_rows($select) > 0) {

             // output data of each row
             while($row = mysqli_fetch_assoc($select)){
              
          ?>

           <form class="form-horizontal" action="#" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-4">Applicant Name:</label>
              <div class="col-sm-6">
                <?php echo $applicant ?>
                <input type="hidden" name="applicant" value="<?php echo $applicant ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4">Donar Name:</label>
              <div class="col-sm-6">          
                <?php echo $row["username"] ?>
                <input type="hidden" name="donor" value="<?php echo $row["username"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-4">Product type:</label>
              <div class="col-sm-6">
                <?php echo $row["product_type"] ?>
                <input type="hidden" name="product_type" value="<?php echo $row["product_type"] ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-4">Product Name:</label>
              <div class="col-sm-6">
                <?php echo $row["product_name"] ?>
                <input type="hidden" name="product_name" value="<?php echo $row["product_name"] ?>">
              </div>
            </div>

            <div class="form-group">        
              <div class="col-sm-offset-4 col-sm-6">
                <button type="submit" class="btn btn-success" name="req_apply">Confirm</button>
              </div>
            </div>
          </form>

          <?php }
        }
      }?>
          
        </div>

      </div>
    
    </div>
  </div>
  <?php

  
  //$connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

    if (isset($_POST['req_apply'])) {

      $applicant=$_POST['applicant'];
      $donor=$_POST['donor'];
      $ptype=$_POST['product_type'];
      $pname=$_POST['product_name'];

      // echo $applicant."<br>".$company."<br>".$position."<br>".$Salary;
      $query=" INSERT INTO apply_table(applicant_name,donor_name,product_type,product_name) 
      VALUES('$applicant','$donor','$ptype','$pname')";

      $run=mysqli_query($connect,$query);

      if(!$run){
        echo "<script>alert('Application Not Submitted')</script>";
        echo "<script>location='user_home.php'</script>";
      }else{
        echo "<script>alert('Application Successfully Submitted')</script>";
        echo "<script>location='user_home.php'</script>";
      }

    }


  ?>
  <?php include ("footer.php"); ?>
  
</body>
</html>