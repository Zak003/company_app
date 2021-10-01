<?php
	//ker dostopamo do baze moramo vključiti povezava.php
	require 'conection.php';
    include_once 'session.php';
	
	$lokacija_street=$_POST['lokacija_street'];
	$lokacija_mesto=$_POST['lokacija_mesto'];
	$ime_podjetja=$_POST['ime_podjetja'];
	$ime_popravila=$_POST['ime_popravila'];
	//$datum = date('Y-m-d', strtotime($_POST['datum']));
	$datum = date('Y-m-d H:i:s', strtotime($_POST['datum']));
	$opombe=$_POST['opombe'];
	$uporabnik_id=$_POST['uporabnik_id'];
	//za slike
    $filename = $_FILES["slika"]["name"];
    $tempname = $_FILES["slika"]["tmp_name"];    
        $folder = "pictures/".$filename;
	
	/* preverimo prenos */
	
	/*echo "$lokacija_street".'<br />';
	echo "$lokacija_mesto".'<br />';
	echo "$ime_podjetja".'<br />';
	echo "$ime_popravila".'<br />'; 
	echo "$datum".'<br />';
	echo "$opombe".'<br />';
	echo "$uporabnik_id".'<br />';
	echo "$filename".'<br />';
	echo "$tempname".'<br />';
	echo "$folder".'<br />';*/
  

	//zapis SQL stavka 
	if(isset($_POST['submit_rep']))
	{
		$sql="INSERT INTO popravila VALUES (NULL, '$ime_popravila', '$datum', '$lokacija_street' ,'$lokacija_mesto', '$ime_podjetja', '$opombe', '$uporabnik_id', '$folder')";	//v oklepaj zapišemo vrednosti ki jih želimo vnesti
		$result=mysqli_query($link, $sql);

		$uploaddir = 'pictures/';
		$uploadfile = $uploaddir . basename($_FILES['slika']['name']);
		if (move_uploaded_file($_FILES['slika']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
		  } else {
			 echo "Upload failed";
		  }

		echo "<script>alert('Successfully entered into the sytsem!');location.href=\"index.php\";</script>";
		//header("Location:index.php");
	}
	else
	{
		echo "<script>alert('Something went wrong try again.');location.href=\"index.php\";</script>";
		//header("Refresh: 3 index.php");
	}

	//sprožimo poizvedbo
	/*if(isset($_POST['sub_programi']))
	{
		$result=mysqli_query($link, $sql);
	}*/
	
	//header("Location:index.php");	//povemo kam naj nas pošlje
	
?>