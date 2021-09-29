<?php include_once 'session.php'; ?>
<!DOCTYPE html>
<html>
  <head>
   <title> Company app </title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="sytle.css">

  </head>

  <body>
	<div id="main">
	
	<div id="gl">
        <img src="images/logo.png" class="logo">

        <p id="contact100-form-title-1"> 
            <?php 
                if(isset($_SESSION['imeu_priu']))
                {
                    $iu_pu=$_SESSION['imeu_priu'];  //tukaj dobimo ime in priimek uporabnika
                    echo "You are logged in as: ".$iu_pu.""; 
                }
            ?>
        </p> 

        <?php 
        //preverimo če dobimo podatke s prijave, torej če je uporabnik prijavljen
		if(isset($_SESSION['imeu_priu']))
		{
			echo '<a href="logout.php"><button class="contact100-form-btn-header">Log out</button></a>';
		}
		else
		{
			echo '<a href="login.php"><button class="contact100-form-btn-header">Log in</button></a>';
		}
		?>

	</div>