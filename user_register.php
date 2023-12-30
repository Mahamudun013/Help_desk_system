<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
   .error {color: #FF0000;}
  </style>

</head>
<body>


<!-- Form validation section -->

<?php

     
    $name=$username=$password=$confirmpassword=$gender=$phonenumber=$email="";

    $nameErr=$usernameErr=$passwordErr=$confirmpasswordErr=$genderErr=$phonenumberErr=$emailErr="";
      
    
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


         if (empty($_POST["password"]))
         {
           $passwordErr = " Password is required";
         } 
        else 
        {
           $password = test_input($_POST["password"]);
        }


         if (empty($_POST["confirmpassword"]))
         {
           $confirmpasswordErr = " Confirm password is required";
         } 
        else 
        {
           $confirmpassword = test_input($_POST["confirmpassword"]);
        }


		
		  if (empty($_POST["gender"]))
		  {
           $genderErr = "Gender is required";
         } 
		 else
	     {
           $gender = test_input($_POST["gender"]);
       }



        if (empty($_POST["phonenumber"]))
         {
           $phonenumberErr = "Phone number is required";
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


  }


   function test_input($data) 
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }


?>

<?php include('navbar.php'); ?>


<?php  include('config.php');


 
if(isset($_POST["submit"]))
 {

       $conn= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

       if(!$conn)
       {
          die("Error occured".mysqli_connect_error());
       }

    
       $sql="INSERT INTO user_table(name,username,password,confirm_password,gender,phone_number,email) 
       VALUES('$name','$username','$password','$confirmpassword','$gender','$phonenumber','$email') ";



       $insert=mysqli_query($conn,$sql);
  
       if ($insert)
       {
          echo '<script>alert("Congratulations ! Successfully Registered.") </script>';
       }
       else
       {
            echo '<script>alert("Something went wrong!") </script>';
       }
  


  mysqli_close($conn);

}

?>

<div class="container">
  <div class="col-md-10 col-md-offset-1">

    <h1 class="well">User Registration Form</h1>
  <div class="col-lg-12 well">
    <div class="row">
       <form action="#" method="post">
          <div class="col-sm-12">

              <div class="form-group">
                <label>Name</label><span class="error">* <?php echo $nameErr;?></span>
                <input type="text" placeholder="Enter Name Here.." class="form-control" name="name" required>
              </div>


              <div class="form-group">
                <label>Username</label><span class="error">* <?php echo $usernameErr ;?></span>
                <input type="text" placeholder="Enter Username Here.." class="form-control" name="username" required>
              </div>
            


            
              <div class="form-group">
                <label>Password</label><span class="error">* <?php echo $passwordErr;?></span>
                <input type="password" placeholder="Enter Password Here.." class="form-control" name="password" required >
              </div>

              <div class="form-group">
                <label>Confirm Password</label><span class="error">* <?php
                 echo $confirmpasswordErr ;?></span>
                <input type="password" placeholder="Enter Confirm Password Here.." class="form-control" name="confirmpassword" required >
              </div>
                       
              
			  
			  <div class="form-group">
                <label>Gender </label><span class="error">* <?php echo $genderErr;?></span>
                <br>
                    <input type="radio" name="gender" required value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
              </div>
            

            <div class="form-group">
             <label>Phone Number</label><span class="error">* <?php 
             echo $phonenumberErr;?></span>
             <input type="text" placeholder="Enter Phone Number Here.." class="form-control" name="phonenumber" required >
             </div>  

            <div class="form-group">
              <label>Email Address</label><span class="error">* <?php echo $emailErr;?></span>
              <input type="email" placeholder="Enter Email Address Here.." class="form-control" name="email" required >
            </div>  

            <input type="checkbox" value="" name="check1" required> I agree to the HelpDesk.com <font color="blue" > Terms of use.</font><br><br>


            <button type="submit" class="btn btn-primary" name="submit">Submit</button>&nbsp&nbsp&nbsp&nbsp
            <input type="reset" class="btn btn-danger"  value="Reset">       
          </div>
        </form> 
        </div>
  </div>
 </div>
</div>


<?php include('footer.php'); ?>

</body>
</html>