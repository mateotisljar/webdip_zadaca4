<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once 'baza.class.php';
$baza = new Baza();



$korisnicko_ime = $_GET['korisnicko_ime'];
$upit = "select * from korisnici2 where korisnicko_ime = '$korisnicko_ime' limit 1";
$rezultat = $baza->select($upit);
$dohvaceni_podaci = $rezultat->fetch_array();
?>



<html>
    <head>
        <title>Detalji korisnika</title>
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
                </ul>
            </nav>
        </aside>

        <div id="sadrzaj">
            <section>
                <form method="POST" id="form1" name="form1"> 
                    <label class="labele" for="ime">Unesite svoje ime: </label>
                    <input type="text" class="inputi" id="ime" name="ime" placeholder="Ime" size="20" value="<?php echo $dohvaceni_podaci[1]; ?>" ><br><br>

                    <label class="labele" for="prezime">Unesite svoje prezime: </label>
                    <input type="text" class="inputi" id="prezime" name="prezime" placeholder="Prezime" size="30"  value="<?php echo $dohvaceni_podaci[2]; ?>" ><br><br>

                    <label class="labele" for="korisnicko_ime">Korisničko ime: </label>
                    <input type="text" class="inputi" id="korisnicko_ime" name="korisnicko_ime" maxlength="20" size="10" placeholder="Korsničko ime"  value="<?php echo $dohvaceni_podaci[3]; ?>" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password">Lozinka: </label>
                    <input type="text" class="inputi" name="password" id="password" placeholder="Lozinka" value="<?php echo $dohvaceni_podaci[4]; ?>" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password2">Ponovno upišite lozinku: </label>
                    <input type="text" class="inputi" name="password2" id="password2" placeholder="Lozinka" value="<?php echo $dohvaceni_podaci[5]; ?>" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="enkripcija">Enkripcija: </label>
                    <keygen class="inputi" id="enkripcija" name="keygen" value="<?php echo $dohvaceni_podaci[6]; ?>" ><br><br>

                    <label class="labele" for="rodjendan_dan">Rođendan (dan): </label>
                    <input type="number" class="inputi" id="rodjendan_dan" name="rodjendan_dan"  value="<?php echo $dohvaceni_podaci[7]; ?>" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="rodjendan_mjesec">Rođendan (mjesec): </label>
                    <input list="rodjendan_mjesec2" class="inputi" id="rodjendan_mjesec" name="rodjendan_mjesec" value="<?php echo $dohvaceni_podaci[8]; ?>" > <span class="nevidljivo"></span><br><br>
                    
                    <label class="labele" for="rodjendan_godina">Rođendan (godina) </label>
                    <input type="number" class="inputi" id="rodjendan_godina" name="rodjendan_godina" value="<?php echo $dohvaceni_podaci[9]; ?>" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="spol">Spol: </label>
                    <input id="spol" name="spol" value="<?php echo $dohvaceni_podaci[10]; ?>" >
                    
                    <br><br>
                    <label class="labele" for="mobilni_telefon">Mobilni telefon: </label>
                    <input id="drzava" name="drzava" value="<?php echo $dohvaceni_podaci[11]; ?>" >
                    
                    <input type="tel" class="inputi" id="mobilni_telefon" name="mobilni_telefon" value="<?php echo $dohvaceni_podaci[12]; ?>" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="email">Email adresa: </label>
                    <input type="email" class="inputi" id="email" name="email" value="<?php echo $dohvaceni_podaci[13]; ?>" ><span class="nevidljivo"></span><br><br>


                    <label class="labele" for="lokacija">Lokacija: </label>
                    <textarea id="lokacija" class="inputi" name ="lokacija" cols="100" rows="40"  value="<?php echo $dohvaceni_podaci[14]; ?>" ></textarea><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="slika">Slika: </label>
                    <img src="img/twrp.jpg" style=" height:50px;width:50px" ><br><br>

                    <label class="labele" for="obavijest">Obavijesti: </label>
                    <input  id="obavijest" name="obavijest"  value="<?php echo $dohvaceni_podaci[15]; ?>" >
                    


                </form>
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
