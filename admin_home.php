<?php
  include('function.php');
  session_start();
  if(!isset($_SESSION['adminName'])){
    session_unset();
    session_destroy();
    header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

 <nav class="navbar navbar-inverse ">
  <div class="container">
    
    
    <div class="navbar-header">
       <a class="navbar-brand" href="#">HELPDESK.COM</a>
    </div>
  

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" 
        href="#"><?php echo $_SESSION['adminName'];?> &nbsp<span class="caret"></span></a>
        <ul class="dropdown-menu">
          
          <li><a href="function.php?adminName=<?php echo $_SESSION['adminName'];?> "><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </li>

    </ul>


  </div>
</nav>

        <h2 style="text-align: center;
        color: blue;"> Admin Access Panel </h2>

  


  <h2 style="text-align: center;">Welcome <?php echo $_SESSION['adminName'];?> </h2>
  
  <div class="container">

   <div class="col-md-10 col-md-offset-1">
    <div class="jumbotron">
      <table class="table table-hover table-bordered">
        <thead >
          <th>Serial</th>
          <th>Applicant_name</th>
          <th>Donor name</th>
          <th>Product type</th>
          <th>Product name</th>
          <th>Action</th>
        </thead>
        
       <?php

       include('config.php');

         $connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

       if(!$connect)
       {
          die("Error occured".mysqli_connect_error());
       }
          
          $q="SELECT * FROM apply_table";
          $run=mysqli_query($connect,$q);
        
          
          if (mysqli_num_rows($run) > 0) {

           // output data of each row
            $i=1;
           while($row = mysqli_fetch_assoc($run)){
      ?>  

          <tbody>
      
          <tr class="success">
            <td><?php  echo $i++; ?></td>
            <td><?php echo $row['applicant_name']; ?></td>
            <td><?php echo $row['donor_name']; ?></td>
            <td><?php echo $row['product_type']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td>
              <a href="function.php?ap_id=<?php echo $row['a_id'] ?>" class="btn btn-danger" onclick=" return confirm('Are you sure to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
          </tr>
        </tbody>
      
      <?php
        }
      }
      ?>
      </table>
    </div>
     
   </div>
  
  </div>


 <?php include('footer.php'); ?>
</body>
</html>
