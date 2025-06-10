<?php
$poruka="";

if(isset($_POST['naslov'],$_POST['kratkis'],$_POST['sadrzaj'],$_POST['slika'],$_POST['kategorija'],$_POST['arhiva'])){
    $naslov=$_POST['naslov'];
    $kratkis=$_POST['kratkis'];
    $sadrzaj=$_POST['sadrzaj'];
    $slika=$_POST['slika'];
    $kategorija=$_POST['kategorija'];
    $arhiva=$_POST['arhiva'];
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
                    <img src="slike/logo.png" id="logo" alt="Stern logo">
                    <img src="slike/stern.png" id="stern" alt="stern">
                    <br><br><br>
                    <div class="plutaj">
                        <div class="dolje">
                            <a href="index.html">Početna</a>
                            <a href="kategorija.php?id=politika">Politika</a>
                            <a href="kategorija.php?id=zdravlje">Zdravlje</a>
                            <a href="administrator.php">Administracija</a>
                            <a href="unos.php">Unos vijesti</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <section class="tekstclanka">
            <p id="kategorija">
                <?php
                    echo $kategorija;
                ?>
            </p>
            <h1>
                <?php
                    echo $naslov;
                ?>
            </h1>
            <p id="ispodnaslova">
                <?php
                    echo $kratkis;
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
        <footer class="podnozje">
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>