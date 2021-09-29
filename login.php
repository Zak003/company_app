<?php
include_once 'header.php'; 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login page</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3>Sign In to <strong>Company App</strong></h3>
                  <p class="mb-4">Company app is one of the best app in the world.</p>
                </div>
                <form action="login_check.php" method="post">
                  <div class="form-group first">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" id="username" name="mail">
                  </div>

                  <div class="form-group last mb-4">
                    <label for="pasw">Password</label>
                    <input type="password" class="form-control" id="password" name="pasw">
                  </div>
                  
                  <div class="d-flex mb-5 align-items-center">
                   

                  <input type="submit" name="submit_log" value="Log In" class="btn btn-pill text-white btn-block btn-primary">

                  <a href="registration.php"><span class="d-block text-center my-4 text-muted"> or if you dont have an account click HERE</span></a>
          
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <!--<script src="js/popper.min.js"></script>-->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script src="js/main.js"></script>
  </body>
</html>
<?php
		require 'footer.php'; //vključimo kodo s datoteke noga.php
	?>