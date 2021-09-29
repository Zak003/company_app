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

    <title>Registration page</title>
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
                  <h3>Register to <strong>Company App</strong></h3>
                  </div>
                <form action="registration_base.php" method="post">
                  
				  <div class="form-group first">
                    <label for="name_surname">Name and surname:</label>
                    <input type="text" class="form-control" id="name_surname" name="name_surname">
                  </div>
				  
				  <div class="form-group first">
                    <label for="mail">Email:</label>
                    <input type="email" class="form-control" id="mail" name="mail">
                  </div>
				  
				  <div class="form-group first">
                    <label for="psw">Password:</label>
                    <input type="password" class="form-control" id="psw" name="psw">
                  </div>
				  
				  <div class="form-group first">
                    <label for="psw-repeat">Repeat your password:</label>
                    <input type="password" class="form-control" id="psw-repeat" name="psw-repeat">
                  </div>
				  
                  <div class="form-group last mb-4">
                    <label for="tel">Phone number:</label>
                    <input type="text" class="form-control" id="tel" name="tel">
                  </div>
                  
                  <div class="d-flex mb-5 align-items-center">
                   

                  <input type="submit" name="submit_reg" value="Sign In" class="btn btn-pill text-white btn-block btn-primary">

                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php
		require 'footer.php'; //vključimo kodo s datoteke noga.php
	?>