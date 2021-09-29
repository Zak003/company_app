	<?php
		include_once 'header.php'; //vključimo kodo s datoteke glava.php
		include_once 'session.php';
		require 'conection.php';

        if(isset($_SESSION['rangu']))
		{
			$rang=$_SESSION['rangu'];	//rang shranimo v spremenljivko
		}
	?>
<!doctype html>
<html lang="en">
  <head>
  	<title>All repairs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="table_css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="contact100-form-title-1">All repairs</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
					<?php
					//zapis SQL stavka 
					$sql="SELECT p.id AS popravilo_id, p.ime AS ime_popravila, p.datum AS datum, p.lokacija AS lokacija, p.podjetje AS podjetje, p.opombe AS opombe, p.uporabnik_id AS uporabnik_id, p.slika AS slika, u.imePriimek AS imePriimek
					FROM popravila p INNER JOIN uporabniki u ON p.uporabnik_id=u.id";

					//sprožimo poizvedbo
					$result=mysqli_query($link, $sql);
					
					
						echo '<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Repair ID</th>
						      <th>Repair name</th>
						      <th>Date</th>
						      <th>Location</th>
						      <th>Company</th>
							  <th>Notes</th>
							  <th>User</th>
							  <th>Image</th>
						    </tr>
						  </thead>';

						 
						  //echo $rang;
						  while($row = mysqli_fetch_array($result)) //v oklepaje damo ustrezno spremenljivko, ki smo jo prej omenili, v $row se nam shranijo podatki
							{
								$date = strtotime($row['datum']); //datum oddaje shranimo v spremenljivko

								if(isset($_SESSION['rangu']) && ($rang==1)) //preverimo če je oseba prijavljena kot admin, torej je rang 1
								{
									echo '<tbody>'
									//napolnimo tabelo s podatki
									 .'<tr class="alert" role="alert">'
									.'<th scope="row">'.$row['popravilo_id'].'</th>'
									.'<td>'.$row['ime_popravila'].'</td>'
									.'<td>'.date('d/m/y', $date).'</td>'
									.'<td>'.$row['lokacija'].'</td>' 
									.'<td>'.$row['podjetje'].'</td>'
									.'<td>'.$row['opombe'].'</td>'
									.'<td>'.$row['imePriimek'].'</td>'
									.'<td>'."<img src='$row[slika]'>".'</td>'
									.'<td>'.'<a href="delete.php?ajdi='.$row['popravilo_id'].'">
										<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-trash" viewBox="0 0 16 16">
											<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
											<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
											</svg> </a></td>'//z ? pošljemo neke podatke.
									/*.'<td>'.'<a href="update.php?ajdi='.$row['popravilo_id'].'"> 
										<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-wrench" viewBox="0 0 16 16">
										<path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z"/>
										</svg> </a></td>'*/		.'</tr>'. '</tbody>';	//napolnimo tabelo s podatki
								}
								else if(isset($_SESSION['imeu_priu']))
								{
									echo '<tbody>'
									//napolnimo tabelo s podatki
									 .'<tr class="alert" role="alert">'
									.'<th scope="row">'.$row['popravilo_id'].'</th>'
									.'<td>'.$row['ime_popravila'].'</td>'
									.'<td>'.date('d/m/y', $date).'</td>'
									.'<td>'.$row['lokacija'].'</td>' 
									.'<td>'.$row['podjetje'].'</td>'
									.'<td>'.$row['opombe'].'</td>'
									.'<td>'.$row['imePriimek'].'</td>'
									.'<td>'."<img src='$row[slika]'>".'</td>'	 .'</tr>'. '</tbody>';	//napolnimo tabelo s podatki
								}
								/*else
								{
									echo '<tbody>'
									//napolnimo tabelo s podatki
									 .'<tr class="alert" role="alert">'
									.'<th scope="row">'.$row['popravilo_id'].'</th>'
									.'<td>'.$row['ime_popravila'].'</td>'
									.'<td>'.date('d/m/y', $date).'</td>'
									.'<td>'.$row['lokacija'].'</td>' 
									.'<td>'.$row['podjetje'].'</td>'
									.'<td>'.$row['opombe'].'</td>'
									.'<td>'.$row['imePriimek'].'</td>'
									.'<td>'."<img src='$row[slika]'>".'</td>'	.'</tr>'. '</tbody>';
								}*/
							}
								echo '</table>';
								?>
					</div>
				</div>
			</div>
		</div>
		<button class="contact100-form-btn" onclick="location.href='index.php'">Go back to repair form</button>
	</section>

	<script src="table_js/jquery.min.js"></script>
  <script src="table_js/popper.js"></script>
  <script src="table_js/bootstrap.min.js"></script>
  <script src="table_js/main.js"></script>

	</body>
</html>

