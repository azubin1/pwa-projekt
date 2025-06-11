<?php
include 'connect.php';
define('direktorij', 'slike/');
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
    <title>Početna</title>
</head>
<body>
    <div class="centriraj">
        <header>
            <nav>
                <div class="navigacija">
                    <img src="slike/logo.png" id="logo" alt="Stern logo">
                    <img src="slike/stern.png" id="stern" alt="stern">
                    <br><br><br>
                    <div class="plutaj">
                        <div class="dolje">
                            <a href="index.php">Početna</a>
                            <a href="kategorija.php?kategorija=politika">Politika</a>
                            <a href="kategorija.php?kategorija=zdravlje">Zdravlje</a>
                            <a href="administrator.php">Administracija</a>
                            <a href="unos.html">Unos vijesti</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section class="clanci">
            <div class="bclanka">
                <h2><a href="kategorija.php?kategorija=politika" class="podstranica">POLITIKA ></a></h2>
                <section>
                    <?php
                        $upitp="SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='politika' LIMIT 3";
                        $odgp=mysqli_query($con, $upitp);  
                        while($red=mysqli_fetch_array($odgp)){
                            echo '<a href="clanak.php?id='.$red['id'].'" target="_blank">
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
                        }
                    ?>
                </section>
            </div>
            <div class="bclanka">
                <h2><a href="kategorija.php?kategorija=zdravlje" class="podstranica">ZDRAVLJE ></a></h2>
                <section>
                    <?php
                        $upitz="SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='zdravlje' LIMIT 3";
                        $odgz=mysqli_query($con, $upitz);
                        while($red=mysqli_fetch_array($odgz)){
                            echo '<a href="clanak.php?id='.$red['id'].'" target="_blank">
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
                        }
                    ?>
                </section>
            </div>
        </section>
        <footer class="podnozje">
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>