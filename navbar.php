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
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse" style="margin-bottom: 0; border-radius: 0">
    <div class="container-fluid">
      <div class="navbar-header">
        <a style="padding-left: 80px;" class="navbar-brand" href="index.php">HELPDESK.COM</a>
      </div>
      <ul class="nav navbar-nav">

        <li><a href="home.php">Donated Products</a></li>
        <li><a href="admin.php">Admin</a></li>
        

        <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
     </ul>
      <ul class="nav navbar-nav navbar-right" style="padding-right: 80px;">
         <li><a href="user_register.php"><span class="glyphicon glyphicon-user"></span> User Register</a></li>
    
        
    <li>
       <a style="text-decoration:none;" href="#" role="button" id="myBtn1"><span class="glyphicon glyphicon-log-in"></span> User Login</a>

        <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="a"><span class="glyphicon glyphicon-lock"></span>User Login</h4>
          </div>
          <div class="modal-body" style="padding:40px 50px;">
            <form role="form" action="function.php" method="POST">
              <div class="form-group">
                <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                <input type="text" id="username" class="form-control" name="username" placeholder="Enter Username" required="">
              </div>
              <div class="form-group">
                <label for="password"><span class="glyphicon glyphicon-eye-open"></span>Password</label>          
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              

              <button type="submit" class="btn btn-success btn-block" name="login"><span class="glyphicon glyphicon-off"></span> Login</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            <p>Not a Member? <a href="user_register.php">Sign Up</a></p>
          </div>
        </div>
        </div>
        </div>
        <script>
          $(document).ready(function(){
            $("#myBtn1").click(function(){
              $("#myModal1").modal();
            });
          });
        </script>
      </li>

    </ul>



    </div>
  </nav>


</body>
</html>