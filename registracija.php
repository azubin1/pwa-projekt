<?php
session_start();
include 'connect.php';
define('direktorija', 'slike/');
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
    <title>Registracija</title>
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
            <?php
                $poruka='';
                $registriran= false;
                if(isset($_POST['ime'],$_POST['prezime'],$_POST['korisnicko_ime'],$_POST['lozinka'])){
                    $ime = $_POST['ime'];
                    $prezime = $_POST['prezime'];
                    $korisnickoime = $_POST['korisnicko_ime'];
                    $lozinka = $_POST['lozinka'];
                    $hashirana_lozina = password_hash($lozinka, CRYPT_SHA512);
                    $razina = 0;
                    //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
                    $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
                    $stmt = mysqli_stmt_init($con);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 's', $korisnickoime);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                    }
                    if(mysqli_stmt_num_rows($stmt) > 0){
                        $poruka ='<div class="korisnik"> Korisničko ime je već zauzeto!</div>';
                    }else{
                        // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection
                        $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init($con);
                        if (mysqli_stmt_prepare($stmt, $sql)) {
                            mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $korisnickoime, $hashirana_lozina, $razina);
                            mysqli_stmt_execute($stmt);
                            $registriran = true;
                        }
                    }
                    mysqli_close($con);
                }

                //Registracija je prošla uspješno
                if($registriran == true) {
                    echo '<div class="korisnik">';
                    echo '<h1>Korisnik je uspješno registriran!</h1>';
                    echo '<p>Molim vas ulogirajte se.</p>';
                    echo '</div>';
                } else {
                    //registracija nije protekla uspješno ili je korisnik prvi put došao na stranicu
                ?>
            <form enctype="multipart/form-data" action="" method="POST">
                <div class="form-item">
                    <label for="ime">Ime: </label>
                    <div class="form-field">
                        <input type="text" name="ime" id="ime" class="form-field-textual" autofocus>
                        <p id="porukaIme"></p>
                    </div>
                </div>
                <div class="form-item">
                    <label for="prezime">Prezime: </label>
                    <div class="form-field">
                        <input type="text" name="prezime" id="prezime" class="form-field-textual">
                        <p id="porukaPrezime"></p>
                    </div>
                </div>
                <div class="form-item">
                    <label for="korisnicko_ime">Korisničko ime: </label>
                    <div class="form-field">
                        <input type="text" name="korisnicko_ime" id="korisnicko_ime" class="form-field-textual">
                        <p id="porukaKorisnickoIme"></p>
                    </div>
                </div>
                <div class="form-item">
                    <label for="lozinka">Lozinka: </label>
                    <div class="form-field">
                        <input type="password" name="lozinka" id="lozinka" class="form-field">
                        <p id="porukaLozinka"></p>
                    </div>
                </div>
                <div class="form-item">
                    <label for="ponovilozinku">Ponovi lozinku: </label>
                    <div class="form-field">
                        <input type="password" name="ponovilozinku" id="ponovilozinku" class="form-field">
                        <p id="porukaPonovljenaLozinka"></p>
                    </div>
                </div>
                <div class="form-item posalji">
                    <button type="submit" value="Registriraj" id="registriraj">Registriraj se</button> 
                    <button type="reset" value="Poništi">Poništi</button> 
                </div>
            </form>
            <script type="text/javascript">
                    document.getElementById("registriraj").onclick = function(event) {
                        var slanjeForme = true;
                        // Ime korisnika mora biti uneseno
                        var poljeIme = document.getElementById("ime"); 
                        var ime = document.getElementById("ime").value; 
                        if (ime.length == 0) { 
                            slanjeForme = false; 
                            poljeIme.style.border="1px dashed red"; 
                            document.getElementById("porukaIme").innerHTML="Unesite ime!<hr>"; 
                        } else { 
                            poljeIme.style.border="1px solid green"; 
                            document.getElementById("porukaIme").innerHTML=""; 
                        } 
                        // Prezime korisnika mora biti uneseno
                        var poljePrezime = document.getElementById("prezime"); 
                        var prezime = document.getElementById("prezime").value; 
                        if (prezime.length == 0) { 
                            slanjeForme = false; 
                            poljePrezime.style.border="1px dashed red"; 
                            document.getElementById("porukaPrezime").innerHTML="Unesite Prezime!<hr>"; 
                        } else { 
                            poljePrezime.style.border="1px solid green"; 
                            document.getElementById("porukaPrezime").innerHTML=""; 
                        } 
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

                        // Provjera podudaranja lozinki
                        var poljeLozinka = document.getElementById("lozinka");
                        var lozinka = document.getElementById("lozinka").value;
                        var poljePonovljenaLozinka = document.getElementById("ponovilozinku");
                        var ponovljenalozinka = document.getElementById("ponovilozinku").value;
                        if (lozinka.length == 0 || ponovljenalozinka.length == 0 || lozinka != ponovljenalozinka) { 
                            slanjeForme = false; 
                            poljeLozinka.style.border="1px dashed red"; 
                            poljePonovljenaLozinka.style.border="1px dashed red"; 
                            document.getElementById("porukaLozinka").innerHTML="Lozinke nisu iste!<hr>"; 
                            document.getElementById("porukaPonovljenaLozinka").innerHTML=" Lozinke nisu iste!<br>"; 
                        } else { 
                            poljeLozinka.style.border="1px solid green"; 
                            poljePonovljenaLozinka.style.border="1px solid green"; 
                            document.getElementById("porukaLozinka").innerHTML=""; 
                            document.getElementById("porukaPonovljenaLozinka").innerHTML=""; 
                        } 
                        if (slanjeForme != true) {
                            event.preventDefault();
                        }
                    };
                </script>
                <?php
                    }
                ?>
        </section>
        <section>
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