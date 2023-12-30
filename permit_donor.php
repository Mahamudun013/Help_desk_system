<?php
    include('function.php');
    session_start();
  if(!isset($_SESSION['username'])){
     session_unset();
     session_destroy();
     header("Location:homepage.php");

//$_SESSION['username']="mahamudun013";

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
  
  </style>
</head>
<body>

 <nav class="navbar navbar-inverse" style="border-radius: 0">
  <div class="container">
    

    <div class="navbar-header">

      <a class="navbar-brand" href="#">HELPDESK.COM</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="user_home.php">Home</a></li>
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

      <li><a href="accept_news.php"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
      <li><a href="permit_donor.php"><span class="glyphicon glyphicon-ok"></span> Accept</a></li>
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

<br>
 
  
<div class="container" style="min-height: 400px;">

   <div class="col-md-10 col-md-offset-1">
    <div class="jumbotron">
      <table class="table table-hover table-bordered">
        <thead >
          <th>Serial</th>
          <th>applicant_name</th>
          <th>donor_name</th>
          <th>product_type</th>
          <th>product_name</th>
          <th>Accept</th>
          <th>Reject</th>
        </thead>
        
       <?php


        $donor_uname=$_SESSION['username'];

       include('config.php');

         $connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

       if(!$connect)
       {
          die("Error occured".mysqli_connect_error());
       }
          
          $q=" SELECT *FROM apply_table WHERE donor_name='$donor_uname' ";
          $run=mysqli_query($connect,$q);
        
          
        if (mysqli_num_rows($run)> 0) {

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
              <a href="function.php?accept_uid=<?php echo $row['applicant_name']?>& ?accept_donor=<?php echo $row['donor_name']?>" class="btn btn-primary" onclick=" return confirm('Are you sure to Accept?')"><span class="glyphicon glyphicon-ok"></span></a>
            </td>
            <td>
              <a href="#?rejected_uid=<?php echo $row['applicant_name']?> & reject_donor=<?php echo $row['donor_name'] ?>" class="btn btn-danger" onclick=" return confirm('Are you sure to Reject?')"><span class="glyphicon glyphicon-remove"></span></a>
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

<?php include('footer.php') ?>

</body>
</html>