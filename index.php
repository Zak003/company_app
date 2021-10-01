<?php
		include_once 'header.php'; //vključimo kodo s datoteke glava.php
		include_once 'session.php';
		require 'conection.php';

		if(isset($_SESSION['rangu']))
		{
			$rang=$_SESSION['rangu'];	//rang shranimo v spremenljivko
		}
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
	<title>Repairs</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="t_images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="t_css/util.css">
	<link rel="stylesheet" type="text/css" href="t_css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<!--div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="t_images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>-->

		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(t_images/bg-01.jpg);">
				<span class="contact100-form-title-1">
					Repairs
				</span>

				<span class="contact100-form-title-2">
					Create a new repair.
				</span>
			</div>
			
			<!--<button class="contact100-form-btn" onclick="getlocation()">Get your current location</button>-->
		<p id="demo1" hidden></p>
		
		<script>
			var variable1 = document.getElementById("demo1");
			
			function getlocation() {
			navigator.geolocation.getCurrentPosition(showLoc);
			}
		// Defining async function
				async function getapi(url) {
					
					// Storing response
					const response = await fetch(url);
					
					// Storing data in form of JSON
					var data = await response.json();
					console.log(data);
					if (response) {
					
					}
					show(data);
				}
				// Calling that async function
				getlocation();
				
				function show(data) {
				
				// Setting innerHTML as tab variable
				/*var latituda = document.getElementById("lat").innerHTML = data.results[0].locations[0].street;
				var longituda = document.getElementById("long").innerHTML = data.results[0].locations[0].adminArea5;
				document.getElementById("izpis").innerHTML = latituda;
				document.getElementById("drugiizpis").innerHTML = longituda;*/
				var x = document.getElementById("lat").innerHTML;
				var y = document.getElementById("long").innerHTML;
				document.getElementById("lokacija_street").value = x;
				document.getElementById("lokacija_mesto").value = y;
			}
			function showLoc(pos) {
			variable1.innerHTML =
				"<p id='lat'>" +
				pos.coords.latitude + "</p>" +
				"<p id='long'>" +
				pos.coords.longitude + "</p>";
				var x = document.getElementById("lat").innerText;
				var y = document.getElementById("long").innerText;
				document.getElementById("izpis").innerHTML = x;
				document.getElementById("drugiizpis").innerHTML = y;
				/*document.getElementById("lat").style.display = x;
				document.getElementById("long").style.display = y;*/
				/*document.write(x);
				document.write(y);*/
				const api_url = 
				"https://open.mapquestapi.com/geocoding/v1/reverse?key=7MdftJsO5aUZZuPzO8PsNMqhCnlQjK0a&location="+x+","+y+"&includeRoadMetadata=true&includeNearestIntersection=true";
				getapi(api_url);
			} 

		</script>

		<?php 
		/*if(isset($_POST['submit_log']))
		{*/
                if(isset($_SESSION['imeu_priu']))
                {
                    $iu_pu=$_SESSION['imeu_priu'];  //tukaj dobimo ime in priimek uporabnika 
					//echo $iu_pu;
                }
				//pogledamo emaile vseh uporabnikov
				$sql_u = "SELECT id FROM uporabniki WHERE imePriimek='$iu_pu'";

				//sprožimo poizvedbo
				$res_u = mysqli_query($link, $sql_u);
				while($row = mysqli_fetch_array($res_u)) 
				{
					$id_uporabnika= $row['id'];
					//echo $id_uporabnika;
				}
		//}
            ?>
			

			<form action="insert_base.php" class="contact100-form validate-form" method="post" enctype="multipart/form-data">
			
				<!--<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Street:</span>
					<input type="text" class="input100" id="lokacija_street" name="lokacija_street" hidden> <p id="izpis"></p>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">City:</span>
					<input type="text" class="input100" id="lokacija_mesto" name="lokacija_mesto" hidden> <p id="drugiizpis"></p>
					<span class="focus-input100"></span>
				</div>-->

					<input type="text" class="input100" id="lokacija_street" name="lokacija_street" hidden><p id="izpis" hidden></p>

					<input type="text" class="input100" id="lokacija_mesto" name="lokacija_mesto" hidden><p id="drugiizpis" hidden></p>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Company name:</span>
					<input class="input100" type="text" name="ime_podjetja" required>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Repair name:</span>
					<input class="input100" type="text" name="ime_popravila" required>
					<span class="focus-input100"></span>
				</div>

					<input class="input100"  name="datum" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Notes:</span>
					<input class="input100" type="text" name="opombe" required>
					<span class="focus-input100"></span>
				</div>
				
				<input type="text" name="uporabnik_id" value="<?php echo $id_uporabnika; ?>" hidden>

				<div class="wrap-input100 validate-input" data-validate="Phone is required">
					<span class="label-input100">Select an image:</span>
					<input class="input100" type="file" id="img" name="slika" accept="image/*" value="" required>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<input type="submit" name="submit_rep" value="Submit" class="contact100-form-btn">
					<!--<button class="contact100-form-btn" name="submit_rep">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>-->
				</div>
			</form>
		</div>
	</div>
	<br><br>
	<?php
	if(isset($_SESSION['rangu']) && ($rang==1)) //preverimo če je oseba prijavljena kot admin, torej je rang 1
	{?>
		<button class="contact100-form-btn" onclick="location.href='show.php'">Show all repairs</button>
	<?php } ?>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<!--<script src="t_vendor/jquery/jquery-3.2.1.min.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="t_vendor/animsition/js/animsition.min.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="t_vendor/bootstrap/js/popper.js"></script>-->
	<!--<script src="t_vendor/bootstrap/js/bootstrap.min.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="t_vendor/select2/select2.min.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="t_vendor/daterangepicker/moment.min.js"></script>
	<script src="t_vendor/daterangepicker/daterangepicker.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="t_vendor/countdowntime/countdowntime.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="t_js/map-custom.js"></script>-->
<!--===============================================================================================-->
	<!--<script src="t_js/main.js"></script>-->

<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>
	<?php
		require 'footer.php'; //vključimo kodo s datoteke glava.php
	?>
