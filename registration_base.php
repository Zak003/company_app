<?php
		include_once 'header.php'; //vključimo kodo s datoteke glava.php
        include_once 'session.php';
	?>


<?php
	//ker dostopamo do baze moramo vključiti povezava.php
	require 'conection.php';
	
	$i=$_POST['name_surname'];
	$em=$_POST['mail'];
    $pas=$_POST['psw'];
    $pas2=$_POST['psw-repeat'];
    $tel=$_POST['tel'];
    //$r=$_POST['rang'];

    //pogledamo emaile vseh uporabnikov
  	$sql_e = "SELECT * FROM uporabniki WHERE mail='$em'";

    //sprožimo poizvedbo
  	$res_e = mysqli_query($link, $sql_e);
	
	/* preverimo prenos */
	
	/*echo "$i".'<br />';
	echo "$p".'<br />';
	echo "$em".'<br />'; 
    echo "$pas".'<br />'; 
    echo "$pas2".'<br />'; 
    echo "$r".'<br />'; */

    if($pas!=$pas2) //preverimo če sta gesla enaka
    {
       // header("Refresh:3 url=registration.php");
		echo "<script>alert('Passwords do not match. Repeat the password correctly.');location.href=\"registration.php\";</script>";	
    }
    else if(mysqli_num_rows($res_e) > 0) //preverimo če je kakšen uporabnik že s takšnim email naslovom
    {
       // header("Refresh:2 url=registration.php");
  	  	echo "<script>alert('This email has already been used. Use a different email address.');location.href=\"registration.php\";</script>";	
  	}
	else
    {
		//zapis SQL stavka 
		$sql="INSERT INTO uporabniki VALUES (NULL, '$i', '$em', '$pas', '$tel', '0')";	//v oklepaj zapišemo vrednosti ki jih želimo vnesti
				
		//sprožimo poizvedbo
		$result=mysqli_query($link, $sql);

		//header("Refresh:3 url=login.php");
		echo "<script>alert('Thank you for registration. Please sign in now.');location.href=\"login.php\";</script>";
    }

?>

<?php
		require 'footer.php'; //vključimo kodo s datoteke noga.php
	?>