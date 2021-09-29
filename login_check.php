<?php
include_once 'session.php';
require 'conection.php';

//uporaba filtra
/*$em=filter_input(INPUT_POST, 'mail'); //primer za filtriranje, če uporabimo filter ni opozorila
$pa=$_POST['pasw'];*/

//osnovno delovanje
$em=$_POST['mail']; //imena v enojnih narekovajih se morajo ujemati s imeni v obrazcih na prijava.php
$pa=$_POST['pasw'];

//preverimo prenos
/*echo "$em".'<br /';
echo "$pa".'<br /';*/

//zapis SQL stavka
$sql="SELECT * FROM uporabniki WHERE mail='$em' AND pass='$pa';";

//sprožimo poizvedbo
$result=mysqli_query($link, $sql);

//koliko jih je (uporabnikov)?
$st= mysqli_num_rows($result);

//preverimo rezultat, ki ga dobimo
if($st === 1) //tri enačaje -> === uporabimo ker mora dati rezultat 1 in mora biti celo število
{
    $row= mysqli_fetch_array($result);
    $_SESSION['imeu_priu']=$row['imePriimek'];  //to je asociativna tabela, v kateri s oglatim oklepajem določimo celico  
    $_SESSION['idu']=$row['id'];//v drugih oglatih oklepajih je ime kot ga imamamo v bazi
    $_SESSION['rangu']=$row['rang'];
    echo "<script>alert('Login successful.');location.href=\"index.php\";</script>";
    //header("Location: index.php");
}
else
{
    echo "<script>alert('Username or password is incorrect');location.href=\"login.php\";</script>";
    //header("Refresh: 3 login.php"); //nas po 3 sekundah vrže nazaj na prijava.php
}

?>