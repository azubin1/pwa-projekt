<?php
header('Content-Type: text/html; charset=utf-8');

$servername="localhost";
$username="root";
$password="";
$baza="stern";


$con = mysqli_connect($servername, $username, $password, $baza) or die('Greška pri spajanju.');
mysqli_set_charset($con, "utf8");

if($con){
    echo "Povezano!";
}
?>