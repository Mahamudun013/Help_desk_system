<?php
    include('function.php');
    session_start();
  if(!isset($_SESSION['username']))
  {
       session_unset();
       session_destroy();
       header("Location:index.php");

 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Donated Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .jobs_link a{
      text-decoration:none;
    }
    .jumbotron:hover{
      background: #fffbc7;
    }

  </style>
</head>
<body>

 <nav class="navbar navbar-inverse" style="border-radius:0; margin-bottom: 0px;">
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
  <br>
<div class="container">
  <div class="col-md-10 col-md-offset-1">
    
      <?php

      include('config.php');

      $connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

       if(!$connect)
       {
          die("Error occured".mysqli_connect_error());
       }


        $sql="SELECT * FROM donor_table";


           $select =mysqli_query($connect,$sql);

     
        if (mysqli_num_rows($select) > 0) {

         // output data of each row
         while($row = mysqli_fetch_assoc($select)) 
          {
        ?>
        <div  class="jobs_link">
          <a href="view.php?product_id=<?php echo $row['id'] ?>" target="_blank">
            
            <div class="jumbotron">
              <h3 style="color: green"><?php echo $row["name"] ?></h3>
              <table>
                   <tr>
                  <td><h5 style="font-weight: bold;">Product Type</h5></td>
                  <td>:</td>
                  <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row["product_type"] ?></td>
                </tr>

                <tr>
                  <td><h5 style="font-weight: bold;">Product Name</h5></td>
                  <td>:</td>
                  <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row["product_name"] ?></td>
                </tr>
                <tr>
                  <td><h5 style="font-weight: bold;">Address</h5></td>
                  <td>:</td>
                  <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row["address"] ?></td>
                </tr>
                <tr>
                  <td><h5 style="font-weight: bold;">City</h5></td>
                  <td>:</td>
                  <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row["city"] ?></td>
                </tr>
              </table>
            </div>
          </a>
          
        </div>

        <?php

             }
           }

      ?>
    
  </div>
  
</div>

<?php include('footer.php') ?>

</body>
</html>
