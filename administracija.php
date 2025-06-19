<?php
session_start();
include 'connect.php';
define('direktorij', 'slike/');
$upit="SELECT * FROM vijesti";
$odg=mysqli_query($con, $upit);

// Provjera da li je korisnik došao s login forme 
if (isset($_POST['prijava'])) { 
    // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona 
    $prijavaImeKorisnika = $_POST['korisnickoIme']; 
    $prijavaLozinkaKorisnika = $_POST['lozinka']; 
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik 
            WHERE korisnicko_ime = ?"; 
    $stmt = mysqli_stmt_init($dbc); 
    if (mysqli_stmt_prepare($stmt, $sql)) { 
        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika); 
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_store_result($stmt); 
    } 
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika); 
    mysqli_stmt_fetch($stmt); 

    //Provjera lozinke 
    if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && 
    mysqli_stmt_num_rows($stmt) > 0) { 
        $uspjesnaPrijava = true; 

        // Provjera da li je admin 
        if($levelKorisnika == 1) { 
            $admin = true; 
        } 
        else { 
            $admin = false; 
        } 

        //postavljanje session varijabli 
        $_SESSION['$korisnickoIme'] = $imeKorisnika; 
        $_SESSION['$razina'] = $levelKorisnika; 
    } else { 
        $uspjesnaPrijava = false; 
    } 
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