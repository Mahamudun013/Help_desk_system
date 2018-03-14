<!DOCTYPE html>
<html lang="en">
<head>
  <title>Help Desk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
  .jumbotron:hover{
      background: #fffbc7;
    }
</style>
</head>
<body>


<?php  include('navbar.php');  ?> 


<div class="container" style="margin-top:30px;" >
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
        <div  class="jobs_link" >
            
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