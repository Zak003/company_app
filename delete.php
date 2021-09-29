<?php
	include 'conection.php';
?>
	
<div id ="vs">
	<h1>Izbris</h1>
	<?php
        //dobimo id od izbrane vrstice
        $i=$_GET['ajdi'];

	    //zapis SQL stavka 
        $sql="DELETE FROM popravila WHERE id=$i"; //ali pa naredimo tako da "id", shranimo v spremenljivko -> $i
			
	    //sprožimo poizvedbo
        $result=mysqli_query($link, $sql);
    
        //gremo nazaj na izpis
        echo "<script>alert('Successfully deleted.');location.href=\"show.php\";</script>";
        //header("Location:index.php");
	?>