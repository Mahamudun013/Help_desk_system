<?php

include('config.php');
$connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

//user login
  	if (isset($_POST["login"])) {
    	$uname=$_POST["username"];
    	$password=$_POST["password"];  

    	session_start();
    	if (!empty($_POST["username"])) {
     		$query= "SELECT * FROM user_table WHERE username='$uname' AND password='$password' ";
      		$result= mysqli_query($connect,$query);
      		$row= mysqli_fetch_array($result);
      		if(!empty($row['username'] AND !empty($row['password']))){
        	$_SESSION['username']= $_POST["username"];
        		echo "<script>location='user_home.php'</script>";
      		}
      		else{
                echo "<script>alert('SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...')</script>";
				echo "<script>location='login.php'</script>";
      		}
    	}
    	elseif (empty($_POST["username"])) {
     		echo "<script>alert('Username empty !!!!')</script>";
      		session_unset();
      		session_destroy();
      		echo "<script>location='index.php'</script>";
    	}
    }




   // user  logout
    if (isset($_GET['emp_username'])) {
      session_unset();
      session_destroy();
      header("Location:index.php");
    }



//admin login
    if (isset($_POST["admin_login"])) {
      $uname=$_POST["username"];
      $password=$_POST["password"];  

      session_start();
      if (!empty($_POST["username"])) {
        $query= "SELECT * FROM admin  WHERE username='$uname' AND password='$password' ";
          $result= mysqli_query($connect,$query);
          $row= mysqli_fetch_array($result);
          if(!empty($row['username'] AND !empty($row['password']))){
          $_SESSION['adminName']= $_POST["username"];
            echo "<script>location='admin_home.php'</script>";
          }
          else{
                echo "<script>alert('SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...')</script>";
        echo "<script>location='admin.php'</script>";
          }
      }
      elseif (empty($_POST["username"])) {
        echo "<script>alert('Username empty !!!!')</script>";
          session_unset();
          session_destroy();
          echo "<script>location='index.php'</script>";
      }
    }


// Admin logout
    if (isset($_GET['adminName'])) {
      session_unset();
      session_destroy();
      header("Location:index.php");
    }

// delete job post from all jobs


     include('config.php');
     $connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

       if(!$connect)
       {
          die("Error occured".mysqli_connect_error());
       }
       
    if (isset($_GET['ap_id'])) {
      $id=$_GET['ap_id'];
      $q="DELETE FROM apply_table WHERE a_id='$id'";
      $r=mysqli_query($connect,$q);
      // echo $id;
      if(!$r){
        echo "<script>alert('Not Deleted')</script>";
        echo "<script>location='admin_home.php'</script>";
      }else{
        // echo "<script>alert('Application Deleted')</script>";
        echo "<script>location='admin_home.php'</script>";
      }
    }


   // accept status delete

include('config.php');
     $connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

       if(!$connect)
       {
          die("Error occured".mysqli_connect_error());
       }
       
    if (isset($_GET['accept_id'])) {
      $id=$_GET['accept_id'];
      $q="DELETE FROM accept_table WHERE accept_id='$id'";
      $r=mysqli_query($connect,$q);
      // echo $id;
      if(!$r){
        echo "<script>alert('Not Deleted')</script>";
        echo "<script>location='accept_news.php'</script>";
      }else{
        // echo "<script>alert('Application Deleted')</script>";
        echo "<script>location='accept_news.php'</script>";
      }
    }



//accepted request by donor
  {

    include('config.php');
     $connect= mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

       if(!$connect)
       {
          die("Error occured".mysqli_connect_error());
       }
       
    if (isset($_GET['accept_uid'])) {

      $acceptor=$_GET['accept_uid'];
      $donator=$_REQUEST['accept_donor'];
      $accp_status='Accepted';

      $q="INSERT INTO accept_table(receiver_name,donor_name,status) VALUES('$acceptor',
      '$donator','$accp_status')"; 

      $r=mysqli_query($connect,$q);

      if(!$r){
        echo "<script>alert('Not Accepted')</script>";
        echo "<script>location='permit_donor.php'</script>";
      }
      else{
        echo "<script>alert('Application Accepted')</script>";
        echo "<script>location='permit_donor.php'</script>";
      }
     }
   


  }


    ?>