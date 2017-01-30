<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'baza.class.php';

$greska = "";
$baza = new Baza();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $pass = $_POST['password'];
    $upit = "SELECT * from korisnici2 WHERE korisnicko_ime ='" . $korisnicko_ime . "' and password = '" . $pass . "'";
    $rezultat = $baza->select($upit);
    if (mysqli_num_rows($rezultat) == 1) {
        $pronadjeni = mysqli_fetch_array($rezultat);
        setcookie("korisnicko_ime", $_POST['korisnicko_ime'], time() + 3600);
        setcookie("password", $_POST['password'], time() + 3600);
        header("Location: ispis_korisnika.php");
    } else {
        $greska = "Korisnicko ime i lozinka nisu ispravni.";
    }
}
?>
<html>
    <head>
        <title>Prijava korisnika</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Mateo Tišljar">
        <meta name="keywords" content="FOI, WebDiP">
        <link href="css/mtisljar.css" rel="stylesheet" type="text/css">
        <link href="css/mtisljar_mobiteli.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            section{ padding: 5px 5px; font-weight: bold; float:right; 
            }
            section > form> input{ float:right;}
        </style>
    </head>

    <body>
        <header>
            <h1 id="h1">Zadaca_04</h1>

        </header>
        <aside>
            <nav id="nav">
                <ul>
                    
                    <li><a href="registracija.php">Registracija</a></li>
                    <li><a href="prijava.php" class="selected">Prijava</a></li>
                    <li><a href="ispis_korisnika.php">Ispis korisnika</a></li>
                    <li><a href="http://eportfolio.foi.hr/user/view.php?id=2998" target="_blank">E-portfolio</a></li>
                </ul>
            </nav>
        </aside>

        <div id="sadrzaj2">

            <section>
                <form method="POST" id="form" name="form" action=""  > 
                    <span class="nevidljivo"></span><br>
                    <span class="nevidljivo"></span><br>
                    <label  for="korisnicko_ime" >Korisničko ime: </label>
                    <input type="text" id="korisnicko_ime" name="korisnicko_ime" placeholder="Korisničko ime" autofocus="autofocus"><br><br>

                    <label for="lozinka">Lozinka: </label>
                    <input type="password" id="password" name="password" placeholder="Lozinka"><br><br>

                    <label for="checkbox">Zapamti me?</label>
                    <input type="checkbox" id="checkbox" name="checkbox" checked="checked" ><br><br>

                    <input type="submit" name="submit" value="Prijavi se"><br><br>

                    <a href="registracija.php">Zaboravljena lozinka?</a><br><br>

                    <p>
                        Korisnicko ime: mtisljarM?!<br>
                        Lozinka: mateoTisljar94?!
                    </p>

                </form>
                <section id="greska">
                    <?php
                    echo $greska;
                    ?>
                </section>
            </section>


        </div>
        <footer>

            <div id="div1"><address>Kontakt: <a href="mailto:mtisljar@foi.hr">Mateo Tišljar</a></address>
                <p>M. Tišljar</p></div>
            <p>Vrijeme potrebno za zadacu: 30 sati</p>
            <div id="div2"><figure>
                    <p>
                        <a href="http://validator.w3.org/check/referer" target="_blank"><img class="foot" src="img/HTML5.png" alt="HTML5" ></a>
                        <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img class="foot" src="img/CSS3.png" alt="CSS" height="50" width="50"></a>
                    </p>
                </figure></div>
        </footer>
        <script type="text/javascript" src="js/mtisljar.js"></script>
    </body>
</html>
