<?php
session_start();
include 'connect.php';
define('direktorij', 'slike/');

$id=$_GET['id'];
$upit = "SELECT * FROM vijesti WHERE id=$id";
$odg=mysqli_query($con, $upit);
$red=mysqli_fetch_array($odg);
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
         echo $red['naslov'];
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
                    echo $red['kategorija'];
                ?>
            </p>
            <div class="naslovdatum">
                <h1>
                    <?php
                        echo $red['naslov'];
                    ?>
                </h1>
                <p>
                    <?php
                        echo $red['datum'];
                    ?>
                </p>
            </div>
                <p id="ispodnaslova">
                    <?php
                        echo $red['sazetak'];
                    ?>
                </p>
                <?php
                    echo '<img src="' .direktorij. $red['slika']. '" alt='.$red['slika'].' class="clanakslika">' ;
                ?>
            <hr id="dijeliclanak">
            <p>
                <?php
                    echo $red['sadrzaj'];
                ?>
            </p>
        </section>
        <footer>
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>