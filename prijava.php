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
                    <img src="slike/logo.png" id="logo" alt="Stern logo">
                    <img src="slike/stern.png" id="stern" alt="stern">
                    <br><br><br>
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
                    <button type="reset" value="Poništi">Poništi</button> 
                    <button type="submit" value="Prijava">Prijavi se</button> 
                </div>
            </form>
        </section>
        <section id=registrirajse>
            <a href="registracija.php">Nemaš račun?</a>
        </section>
        <footer>
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>
