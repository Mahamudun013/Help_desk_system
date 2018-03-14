<?php
   include('function.php');
   session_start();
  if(!isset($_SESSION['username'])){
    session_unset();
    session_destroy();
    header("Location:homepage.php");

   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Donor Information Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
   .error {color: #FF001;}
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






<!-- Form validation section -->

<?php

     
    $name=$username=$producttype=$productname=$address=$city=$zip=$phonenumber=$email=$file="";

    $nameErr=$usernameErr=$producttypeErr=$productnameErr=$addressErr=$cityErr=$zipErr=$phonenumberErr=$emailErr=$fileErr="";
      
    
//if($_SERVER["REQUEST_METHOD"] == "POST")
   
   if(isset($_POST["submit"]))
   {
        
        
        if (empty($_POST["name"]))
         {
           $nameErr = "Name is required";
         } 
        else 
        {
           $name = test_input($_POST["name"]);
        }


         if (empty($_POST["username"]))
         {
           $usernameErr = "Username is required";
         } 
        else 
        {
           $username = test_input($_POST["username"]);
        }        

        

       if (empty($_POST["productname"]))
         {
           $productnameErr = "Product name is required";
         } 
        else 
        {
           $productname = test_input($_POST["productname"]);
        }

        if (empty($_POST["producttype"]))
         {
           $producttypeErr = " Product type is required";
         } 
        else 
        {
           $producttype = test_input($_POST["producttype"]);
        }


        if (empty($_POST["address"]))
         {
           $addressErr = "Address is required";
         } 
        else 
        {
           $address = test_input($_POST["address"]);
        }

        if (empty($_POST["city"]))
         {
           $cityErr = "City is required";
         } 
        else 
        {
           $city = test_input($_POST["city"]);
        }

        if (empty($_POST["zip"]))
         {
           $zipErr = "Zip is required";
         } 
        else 
        {
           $zip = test_input($_POST["zip"]);
        }


        if (empty($_POST["phonenumber"]))
         {
           $phonenumberErr = "Phonenumber is required";
         } 
        else 
        {
           $phonenumber = test_input($_POST["phonenumber"]);
        }


         if (empty($_POST["email"]))
         {
           $emailErr = "Email is required";
         } 
        else 
        {
           $email = test_input($_POST["email"]);
        }

        if (empty($_POST["file"]))
         {
           $fileErr = "File is required";
         } 
        else 
        {
           $file = test_input($_POST["file"]);
        }

         
    }


   function test_input($data) 
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


?>


<?php  include('config.php');


 
if(isset($_POST["submit"]))
 {

       $conn= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

       if(!$conn)
       {
          die("Error occured".mysqli_connect_error());
       }


    
       $sql="INSERT INTO donor_table(name,username,product_type,product_name,address,city,zip,phone_number,
       email,file) VALUES('$name','$username','$producttype','$productname','$address','$city',
       '$zip','$phonenumber','$email','$file') ";



       $insert=mysqli_query($conn,$sql);
  
       if($insert)
       {
             echo " Successfully Submitted !"."<br>";
       }
       else
       {
             echo "Data Not inserted"."<br>";
       }
  


  mysqli_close($conn);

}

?>



<div class="container">
    <h1 class="well">Donor Information Form</h1>
  <div class="col-lg-12 well">
  <div class="row">
        <form action="#" method="post">
          <div class="col-sm-12">
            
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Name</label><span class="error">* <?php echo $nameErr;?></span>
                <input type="text" placeholder="Enter Name Here.." class="form-control" name="name" required >
              </div>


              <div class="col-sm-6 form-group">
                <label>Username</label><span class="error">* <?php echo $usernameErr ;?></span>
                <input type="text" placeholder="Enter Username Here.." class="form-control" name="username" required >
              </div>
            </div> 


            <div class="row">
           
               <div class="col-sm-6 form-group">
                <label>Product Type<small> (select one)</small></label><span class="error">* <?php echo $producttypeErr ;?></span>
             <select class="form-control" id="select" placeholder="Enter Product Type Here.."  name="producttype" required >
                  <option></option>
                  <option> Furniture </option>
                  <option> Medical Equipment </option>
                  <option> Winter clothes </option>
                  <option> Toys and children items </option>
                  <option> Books </option>
                  <option> Human organ </option>
                  <option> Blood </option>
                  <option> Electrical equipment </option>
                  <option> Financial aid </option>
                  <option> Others </option>

              </select>
             </div> 


            <div class="col-sm-6 form-group">
                <label>Product Name</label><span class="error">* <?php echo $productnameErr;?></span>
                <input type="text" placeholder="Enter Product Name Here.." class="form-control" name="productname" required >
              </div> 

           </div>


            <div class="form-group">
              <label>Address</label><span class="error">* <?php echo $addressErr;?></span>
              <textarea placeholder="Enter Address Here.." rows="4" class="form-control" name="address" required ></textarea>
            </div>  

            <div class="row">
              <div class="col-sm-6 form-group">
                <label>City</label><span class="error">* <?php echo $cityErr;?></span>
                <input type="text" placeholder="Enter City Name Here.." class="form-control" name="city" required >
              </div>  

        
              <div class="col-sm-6 form-group">
                <label>Zip</label><span class="error">* <?php echo $zipErr;?></span>
                <input type="text" placeholder="Enter Zip Code Here.." class="form-control" name="zip" required >
              </div>  

            </div>


            <div class="form-group">
             <label>Phone Number</label><span class="error">* <?php echo $phonenumberErr;?></span>
             <input type="text" placeholder="Enter Phone Number Here.." class="form-control" name="phonenumber" required >
             </div>    

            <div class="form-group">
              <label>Email Address</label><span class="error">* <?php echo $emailErr;?></span>
              <input type="email" placeholder="Enter Email Address Here.." class="form-control" name="email" required >
            </div> 


        

          <div class="form-group">
          <label>Input Product Image</label><span class="error">* <?php  ?></span>
          <input type="file" class="form-control-file" id="InputFile" aria-describedby="fileHelp" name="file" required>
          <small id="fileHelp" class="form-text text-muted">  </small> <br><br>
         </div>



            <button type="submit" class="btn btn-primary" name="submit">Submit</button>&nbsp&nbsp&nbsp&nbsp
            <input type="reset" class="btn btn-danger"  value="Reset">       


          </div>
        </form> 
        </div>
  </div>
  </div>


<?php include('footer.php'); ?>

</body>
</html>