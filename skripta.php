<?php
session_start();
include 'connect.php';
include 'insert.php';

if(isset($_POST['naslov'],$_POST['sazetak'],$_POST['sadrzaj'],$_FILES['slika']['name'],$_POST['kategorija'])){
    $naslov=$_POST['naslov'];
    $sazetak=$_POST['sazetak'];
    $sadrzaj=$_POST['sadrzaj'];
    $slika=$_FILES['slika']['name'];
    $kategorija=$_POST['kategorija'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <title>
        <?php
            echo $naslov;
        ?>
    </title>
</head>
<body>
    <div class="centriraj">
        <header>
            <nav>
                <div class="navigacija">
                    <img src="slike/logo.png" id="logo" alt="logo">
                    <img src="slike/f1.png" id="f1" alt="Formula 1">
                    <br><br>
                    <div class="plutaj">
                        <div class="dolje">
                            <a href="index.php">Početna</a>
                            <a href="kategorija.php?kategorija=politika">Politika</a>
                            <a href="kategorija.php?kategorija=zdravlje">Zdravlje</a>
                            <a href="administracija.php">Administracija</a>
                            <a href="unos.php">Unos vijesti</a>
                            <a href="prijava.php">Prijava</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section class="tekstclanka">
            <p id="kategorije">
                <?php
                    echo $kategorija;
                ?>
            </p>
            <div class="naslovdatum">
                <h1>
                    <?php
                        echo $naslov;
                    ?>
                </h1>
                <p>
                    <?php
                        echo $datum;
                    ?>
                </p>
            </div>
            <p id="ispodnaslova">
                <?php
                    echo $sazetak;
                ?>
            </p>
            <img 
            <?php
                echo 'src="slike/'.$slika.'"';
            ?>
            alt="
                <?php
                    echo $slika;
                ?>" 
            class="clanakslika">
            <hr>
            <p>
                <?php
                    echo $sadrzaj;
                ?>
            </p>
        </section>
        <footer>
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>