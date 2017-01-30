<?php
include_once 'baza.class.php';
include_once 'sesija.class.php';

session_start();
$baza = new Baza();
$sesija = new Sesija();
?>

<html>
    <head>
        <title>Ispis korisnika</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Mateo Tišljar">
        <meta name="keywords" content="FOI, WebDiP">
        <link href="css/mtisljar.css" rel="stylesheet" type="text/css">
        <link href="css/mtisljar_mobiteli.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <h1 id="h1">Zadaca_04</h1>

        </header>
        <aside>
            <nav id="nav">
                <ul>
                    
                    <li><a href="registracija.php">Registracija</a></li>
                    <li><a href="prijava.php">Prijava</a></li>
                    <li><a href="ispis_korisnika.php">Ispis korisnika</a></li>
                    <li><a href="http://eportfolio.foi.hr/user/view.php?id=2998" target="_blank">E-portfolio</a></li>
                    <li><a href="logout.php">Odjava</a></li>
                </ul>
            </nav>
        </aside>
        <div><form enctype="multipart/form-data" method="post">
                <input type="file" name="datoteka">
                <input type="submit" value="pošalji">
            </form></div>
        <div id="sadrzaj_ispis_korisnika">
            <section>
                <?php
                if (isset($_COOKIE['korisnicko_ime']) && isset($_COOKIE['password'])) {
                    var_dump($_SESSION);
                    $upit = "SELECT * from korisnici2 where aktivan!='1'";
                    $rezultat = $baza->select($upit);
                    echo "<table border=1>";
                    echo "<caption>Ispis neaktiviranih korisnika koji sadrze u imenu i prezimenu slovo 'a' </caption>";
                    echo "<thead>"
                    . "<th>ID</th>"
                    . "<th>Ime</th>"
                    . "<th>Prezime</th>"
                    . "<th>Korisnicko ime</th>"
                    . "<th>Lozinka</th>"
                    . "<th>Lozinka</th>"
                    . "<th>Keygen</th>"
                    . "<th>Dan</th>"
                    . "<th>Mjesec</th>"
                    . "<th>Godina</th>"
                    . "<th>Spol</th>"
                    . "<th>Drzava</th>"
                    . "<th>Telefon</th>"
                    . "<th>Email</th>"
                    . "<th>Lokacija</th>"
                    . "<th>Obavijest</th>"
                    . "<th>Kod</th>"
                    . "<th>Vijeme registracije</th>"
                    . "</thead>";

                    while ($lista = $rezultat->fetch_array()) {
                        if (strpos($lista[1], 'a') && strpos($lista[2], 'a')) {
                            echo "<tr>"
                            . "<td>$lista[0]</td>"
                            . "<td>$lista[1]</td>"
                            . "<td>$lista[2]</td>"
                            . "<td>$lista[3]</td>"
                            . "<td>$lista[4]</td>"
                            . "<td>$lista[5]</td>"
                            . "<td>$lista[6]</td>"
                            . "<td>$lista[7]</td>"
                            . "<td>$lista[8]</td>"
                            . "<td>$lista[9]</td>"
                            . "<td>$lista[10]</td>"
                            . "<td>$lista[11]</td>"
                            . "<td>$lista[12]</td>"
                            . "<td>$lista[13]</td>"
                            . "<td>$lista[14]</td>"
                            . "<td>$lista[15]</td>"
                            . "<td>$lista[16]</td>"
                            . "<td>$lista[18]</td>"
                            . "</td>";
                        }
                    }

                    echo "</table>";

                    

                } else {
                    echo "Greška";
                }
                
                ?>
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

    </body>
</html>
