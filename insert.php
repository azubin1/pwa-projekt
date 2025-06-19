<?php
include 'connect.php';

$naslov=$_POST['naslov'];
$sazetak=$_POST['sazetak'];
$sadrzaj=$_POST['sadrzaj'];
$slika=$_FILES['slika']['name'];
$kategorija=$_POST['kategorija'];
$datum=date('d.m.Y');
if(isset($_POST['arhiva'])){
    $arhiva=1;
}else{
    $arhiva=0;
}

$direktorij='slike/'.$slika;
move_uploaded_file($_FILES['slika']['tmp_name'],$direktorij);

$upit="INSERT INTO vijesti (datum, naslov, sazetak, sadrzaj, slika, kategorija, arhiva)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt=mysqli_stmt_init($con);
if (mysqli_stmt_prepare($stmt, $upit)){
    mysqli_stmt_bind_param($stmt, 'ssssssd', $datum, $naslov, $sazetak, $sadrzaj, $slika, $kategorija, $arhiva);
    mysqli_stmt_execute($stmt);
}

mysqli_close($con);
?>