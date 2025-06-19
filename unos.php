<?php
session_start();
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
    <title>Unos vijesti</title>
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
        <section class="forma">
            <form enctype="multipart/form-data" action="skripta.php" method="POST">
                <div class="form-item">
                    <label for="naslov">Naslov vijesti</label>
                    <div class="form-field">
                        <input type="text" name="naslov" id="naslov" maxlength="150" class="form-field-textual" autofocus required>
                    </div>
                </div>
                <div class="form-item">
                    <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova)</label>
                    <div class="form-field">
                        <textarea name="sazetak" id="sazetak" cols="30" rows="10" class="form-field-textual" required></textarea>
                    </div>
                </div>
                <div class="form-item">
                    <label for="sadrzaj">Sadržaj vijesti</label>
                    <div class="form-field">
                        <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="form-field-textual" required></textarea>
                    </div>
                </div>
                <div class="form-item">
                    <label for="slika">Slika: </label>
                    <div class="form-field">
                        <input type="file" accept="image/*" class="input-text" name="slika" id="slika" required/>
                    </div>
                </div>
                <div class="form-item">
                    <label for="kategorija">Kategorija vijesti</label>
                    <div class="form-field">
                        <select name="kategorija" id="kategorija" class="form-field-textual" required>
                            <option value="politika">Politika</option>
                            <option value="zdravlje">Zdravlje</option>
                        </select>
                    </div>
                </div>
                <div class="form-item lijevo">
                    <label for="arhiva">Spremiti u arhivu: 
                        <div class="form-field">
                            <input type="checkbox" name="arhiva" id="arhiva">
                        </div>
                    </label>
                </div>
                <div class="form-item posalji">
                    <button type="reset" value="Poništi">Poništi</button> 
                    <button type="submit" value="Prihvati">Prihvati</button> 
                </div>
            </form> 
        </section>
        <footer>
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>
