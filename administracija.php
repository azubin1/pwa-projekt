<?php
session_start();
include 'connect.php';
define('direktorij', 'slike/');
$upit="SELECT * FROM vijesti";
$odg=mysqli_query($con, $upit);
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
    <title class="titl">Administracija</title>
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
        <section class="clanci">
            <div class="bclanka">
                <h2 class="podstranica">Popis vijesti</h2>
                <section>
                    <?php
                    $i=0;
                        while($red=mysqli_fetch_array($odg)){
                            $i++;
                            echo '<a href="clanakadmin.php?id='.$red['id'].'">
                                ';
                            echo '<article>
                                ';
                            echo '<div class="slika">
                                ';
                            echo '<img src="' .direktorij. $red['slika']. '" alt='.$red['slika'].'>
                            ' ;
                            echo '</div>
                            ';
                            echo '<p>'.$red['kategorija'].'</p>
                            ';
                            echo '<h3>'. $red['naslov']. '</h3>
                            ';
                            echo '</article>
                            ';
                            echo '</a>
                            ';
                            if($i%3==0){
                                echo '</section><section>';
                            }
                        }
                    ?>
                </section>
            </div>
        </section>
        <footer>
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>