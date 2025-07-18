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
        <section class="forma">
            <form enctype="multipart/form-data" action="" method="POST" class="formadmin">
                <div class="sire">
                    <label for="naslov">Naslov vijesti</label>
                    <div class="form-field">
                        <input type="text" name="naslov" id="naslov" maxlength="150" class="form-field-textual" 
                            <?php
                                echo " value='". $red['naslov']."'";
                            ?>
                        autofocus required>
                    </div>
                </div>
                <div class="sire">
                    <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova)</label>
                    <div class="form-field">
                        <textarea name="sazetak" id="sazetak" cols="30" rows="10" class="form-field-textual" required><?php echo $red['sazetak'];?></textarea>
                    </div>
                </div>
                <div class="sire">
                    <label for="sadrzaj">Sadržaj vijesti</label>
                    <div class="form-field">
                        <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="form-field-textual" required><?php echo $red['sadrzaj'];?></textarea>
                    </div>
                </div>
                <div class="sire">
                    <label for="slika">Slika: </label>
                    <div class="form-field">
                        <input type="file" accept="image/*" class="input-text" name="slika" id ="slika" 
                            <?php
                                echo ' value="'. $red['slika']. '"';
                            ?>
                        >
                        <br>
                        <br>
                        <img
                            <?php
                                echo 'src="'.direktorij. $red['slika']. '" width=100%';
                            ?>
                        >
                    </div>
                </div>
                <div class="sire">
                    <label for="kategorija">Kategorija vijesti</label>
                    <div class="form-field">
                        <select name="kategorija" id="kategorija" class="form-field-textual" 
                            <?php
                                echo 'value="'. $red['kategorija']. '"';
                            ?>
                        required>
                            <option 
                                <?php
                                    echo 'value="'.$red['kategorija'].'"';
                                ?>
                            >
                                <?php
                                    echo ucwords(strtolower($red['kategorija']));
                                ?>
                            </option>
                            <option value="politika">Politika</option>
                            <option value="zdravlje">Zdravlje</option>
                        </select>
                    </div>
                </div>
                <div class="sire lijevo">
                    <label for="arhiva">Spremiti u arhivu: 
                        <div class="form-field">
                            <span>
                            <?php
                                if($red['arhiva']==0){
                                    echo '<input type="checkbox" name="arhiva" id="arhiva"/>';
                                }else {
                                    echo '<input type="checkbox" name="arhiva" id="arhiva" checked/>';
                                }
                            ?>
                            </span>
                        </div>
                    </label>
                </div>
                <div class="sire">
                    <input type="hidden" name="id" class="form-field-textual" 
                        <?php
                            echo 'value="'.$red['id'].'"';
                        ?>
                    >
                </div>
                <div class="sire">
                    <input type="hidden" name="nemaslike" class="form-field-textual"
                            <?php
                                echo 'value="'.$red['slika'].'"';
                            ?>
                        >
                </div>
                <div class="sire posalji">
                    <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" name="izmjeni" value="Prihvati">Izmjeni</button>
                    <button type="submit" name="izbrisi" value="Izbriši">Izbriši</button>
                </div>
            </form>
        </section>
        <footer>
            <p>Astrid Zubin, azubin@tvz.hr, 2025</p>
        </footer>
    </div>
</body>
</html>

<?php
if(isset($_POST['izbrisi'])){
    $id=$_POST['id'];
    $brisi="DELETE FROM vijesti WHERE id=$id ";
    $izbrisano=mysqli_query($con, $brisi);
}

if(isset($_POST['izmjeni'])){
    $naslov=$_POST['naslov'];
    $sazetak=$_POST['sazetak'];
    $sadrzaj=$_POST['sadrzaj'];
    if($_FILES['slika']['size']==0){
        $slika=$_POST['nemaslike'];
    }else{
        $slika=$_FILES['slika']['name'];
    }
    $kategorija=$_POST['kategorija'];
    $datum=date('d.m.Y');
    if(isset($_POST['arhiva'])){
        $arhiva=1;
    }else{
        $arhiva=0;
    }

    $direktorij=direktorij.$slika;
    move_uploaded_file($_FILES['slika']['tmp_name'],$direktorij);

    $izmjena="UPDATE vijesti SET datum = ?, naslov = ?, sazetak = ?, sadrzaj = ?, slika = ?, kategorija = ?, arhiva = ?
                WHERE id='$id'";

    $stmt=mysqli_stmt_init($con);

    if (mysqli_stmt_prepare($stmt, $izmjena)){
        mysqli_stmt_bind_param($stmt, 'ssssssi', $datum, $naslov, $sazetak, $sadrzaj, $slika, $kategorija, $arhiva);
        mysqli_stmt_execute($stmt);
    }
}
mysqli_close($con);
?>