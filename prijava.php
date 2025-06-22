<?php
session_start();
include 'connect.php';
$poruka="";
$uspjesnaPrijava = false;
$admin = false;
$msg = "";
$nepostojeciKorisnik = false;
// Provjera da li je korisnik došao s login forme 
if (isset($_POST['prijava'])) { 
    // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona 
    $prijavaImeKorisnika = $_POST['korisnicko_ime']; 
    $prijavaLozinkaKorisnika = $_POST['lozinka']; 
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik 
            WHERE korisnicko_ime = ?"; 
    $stmt = mysqli_stmt_init($con); 
    if (mysqli_stmt_prepare($stmt, $sql)) { 
        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika); 
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_store_result($stmt); 
    } 
    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika); 
    mysqli_stmt_fetch($stmt); 

    //Provjera lozinke 
    if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) { 
        $uspjesnaPrijava = true; 

        // Provjera da li je admin 
        if($levelKorisnika == 1) { 
            $admin = true; 
        } 
        else { 
            $admin = false; 
        } 
        $poruka='Uspješna prijava<br><a href="administracija.php">Preusmjeri na administraciju</a>';
        //postavljanje session varijabli 
        $_SESSION['$korisnicko_ime'] = $imeKorisnika; 
        $_SESSION['$razina'] = $levelKorisnika; 
        } else { 
            $uspjesnaPrijava = false; 
            $poruka= 'Neuspješna prijava!<br>';
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
    <title>Prijava</title>
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
        <section class="prijava">
            <form enctype="multipart/form-data" action="" method="POST">
                <div class="form-item">
                    <label for="korisnicko_ime">Korisničko ime: </label>
                    <div class="form-field">
                        <input type="text" name="korisnicko_ime" id="korisnicko_ime" class="form-field-textual" autofocus required>
                    </div>
                </div>
                <div class="form-item">
                    <label for="lozinka">Lozinka: </label>
                    <div class="form-field">
                        <input type="password" name="lozinka" id="lozinka" class="form-field" required>
                    </div>
                </div>
                <div class="form-item posalji">
                    <button type="submit" value="Prijava" name="prijava" id="prijavi">Prijavi se</button> 
                    <button type="reset" value="Poništi">Poništi</button> 
                </div>
                <div id="nemasrac">
                    <a href="registracija.php">Nemaš račun?</a>
                </div>
            </form>
                <script type="text/javascript">
                    document.getElementById("prijavi").onclick = function(event) {
                    var slanjeForme = true;
                    // Korisničko ime mora biti uneseno
                    var poljeKorisnickoIme = document.getElementById("korisnicko_ime"); 
                    var korisnickoIme = document.getElementById("korisnicko_ime").value; 
                    if (korisnickoIme.length == 0) { 
                        slanjeForme = false; 
                        poljeKorisnickoIme.style.border="1px dashed red"; 
                        document.getElementById("porukaKorisnickoIme").innerHTML="Unesite korisničko ime!<hr>"; 
                    } else { 
                        poljeKorisnickoIme.style.border="1px solid green"; 
                        document.getElementById("porukaKorisnickoIme").innerHTML=""; 
                    } 

                    // Provjera lozinke
                    var poljeLozinka = document.getElementById("lozinka");
                    var lozinka = document.getElementById("lozinka").value;
                    var poljePonovljenaLozinka = document.getElementById("ponovilozinku");
                    var ponovljenalozinka = document.getElementById("ponovilozinku").value;
                    if (lozinka.length == 0){ 
                        slanjeForme = false; 
                        poljeLozinka.style.border="1px dashed red"; 
                        document.getElementById("porukaLozinka").innerHTML="Lozinke nisu iste!<hr>"; 
                    } else { 
                        poljeLozinka.style.border="1px solid green"; 
                        document.getElementById("porukaLozinka").innerHTML=""; 
                    } 
                    if (slanjeForme != true) {
                        event.preventDefault();
                    }
                };
                </script>
        </section>
        <section id=registrirajse>
            <?php
                echo $poruka;
            ?>
        </section>
        <footer>
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>