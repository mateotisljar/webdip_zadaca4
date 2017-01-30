<!DOCTYPE html>
<?php
include_once './baza.class.php';
$baza = new Baza();
$poruke = "";

if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $rodjendan_dan = $_POST['rodjendan_dan'];
    $rodjendan_mjesec = $_POST['rodjendan_mjesec'];
    $rodjendan_godina = $_POST['rodjendan_godina'];
    $spol = $_POST['spol'];
    $drzava = $_POST['drzava'];
    $mobilni_telefon = $_POST['mobilni_telefon'];
    $email = $_POST['email'];

    $lokacija = $_POST['lokacija'];
    $obavijest = $_POST['obavijest'];



    if (ctype_upper($korisnicko_ime[0])) {
        $poruke.="Korisnicko ime mora poceti s malim slovom. <br>";
    }


    $uzorak_korisnicko_ime = '/([A-Z]{1})([_,-,!,#,$,?]{2})$/';
    if (!preg_match($uzorak_korisnicko_ime, $korisnicko_ime)) {
        $poruke .="Korisničko ime mora sadržavati jedno veliko slovo, te 2 specijalna znaka.<br>";
    }
    $uzorak_lozinka = '^[a-zA-Z]+\d+[_, -, !, #, $, ?]+^';
    if (!preg_match($uzorak_lozinka, $password)) {
        $poruke.="Lozinka mora imati mala i velika slova, brojeve i specijalne znakove. <br>";
    }

    if (strlen($korisnicko_ime) < 10) {
        $poruke.="Korisničko ime mora imati minimalno 10 znakova. <br>";
    }

    if (strlen($password) < 8) {
        $poruke.="Lozinka mora imati minimalno 8 znakova. <br>";
    }

    if ($password2 != $password) {
        $poruke.="Lozinke nisu identicne. <br>";
    }


    if (empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($password) || empty($password2) || empty($rodjendan_dan) || empty($rodjendan_mjesec) || empty($rodjendan_godina)  || empty($mobilni_telefon) || empty($email) || empty($lokacija) || empty($obavijest)) {
        $poruke.="Nisu uneseni svi podaci. <br>";
    }


    if ($rodjendan_dan < 1) {
        $poruke.="Datum nesmije biti negativan <br>";
    }

    if ($rodjendan_godina < 1930 || $rodjendan_godina > 2015) {
        $poruke.="Godina rodjenja mora biti veca od 1930 i manja od 2015. <br>";
    }

    $uzotak_email = '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+^';
    if (!preg_match($uzotak_email, $email)) {
        $poruke.="Email mora biti formata: nesto.nesto@nesto. <br>";
    }


    $upit = "SELECT * from korisnici2 WHERE korisnicko_ime = '{$korisnicko_ime}' LIMIT 1";
    $rezultat = $baza->select($upit);
    $upit = "SELECT * from korisnici2 WHERE email = '{$email}' LIMIT 1";
    $rezultat2 = $baza->select($upit);

    if ($rezultat->num_rows == 1) {
        $poruke.="Korisnicko ime je vec zauzeto. <br>";
    }

    if ($rezultat2->num_rows == 1) {
        $poruke.="Email je vec zauzet. <br>";
    }

    $aktivacijski_kod = md5($korisnicko_ime . time());
    $nacin = "Y-m-d H:i:s";
    $vrijeme = new DateTime(date($nacin));
    $formatirano_vrijeme = $vrijeme->format($nacin);
    if (empty($poruke)) {
        $mail_od = 'Zadaca_04';
        $headers = '';
        $headers.='Content-type: text/html; charset=utf-8 \r\n;';
        $headers.='From: ' . $mail_od . "\r\n";
        $upit = "INSERT into korisnici2 (id_korisnika, ime, prezime, korisnicko_ime, password,  password2, rodjendan_dan, rodjendan_mjesec, rodjendan_godina, spol, drzava, mobilni_telefon, email, lokacija, obavijest, aktivan, vrijeme_registracije) values(default, '{$ime}', '{$prezime}', '{$korisnicko_ime}', '{$password}', '{$password2}', '{$rodjendan_dan}', '{$rodjendan_mjesec}', '{$rodjendan_godina}', '{$spol}', '{$drzava}', '{$mobilni_telefon}', '{$email}', '{$lokacija}', '{$obavijest}', '{$aktivacijski_kod}', '{$formatirano_vrijeme}');";
        if ($baza->update($upit)) {


            $primatelj = $email;
            $naslov = "Aktivacija računa";
            $poruka = "Aktivacija korisničkog računa vrši se putem klika na: <a href='https://barka.foi.hr/WebDiP/2015/zadaca_04/mtisljar/aktivacija.php?aktivan={$aktivacijski_kod}'>link</a>";
            mail($primatelj, $naslov, $poruka, $headers);
            header("Location: prijava.php");
        } else {
            $poruke .="Neuspješna registracija. <br>";
        }
    }
}
?>
<html>
    <head>
        <title>Registracija korisnika</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Mateo Tišljar">
        <meta name="keywords" content="FOI, WebDiP">
        <link href="css/mtisljar.css" rel="stylesheet" type="text/css">
        <link href="css/mtisljar_mobiteli.css" rel="stylesheet" type="text/css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <header>
            <h1 id="h1">Zadaca_04</h1>

        </header>
        <aside>
            <nav id="nav">
                <ul>
                    
                    <li><a href="registracija.php" class="selected">Registracija</a></li>
                    <li><a href="prijava.php">Prijava</a></li>
                    <li><a href="ispis_korisnika.php">Ispis korisnika</a></li>
                    <li><a href="http://eportfolio.foi.hr/user/view.php?id=2998" target="_blank">E-portfolio</a></li>
                </ul>
            </nav>
        </aside>

        <div id="sadrzaj">

            <section>
                <form method="POST" id="form1" name="registracija" action="<?php echo $_SERVER['PHP_SELF']; ?>" > 
                    <label class="labele" for="ime">Unesite svoje ime: </label>
                    <input type="text" class="inputi" id="ime" name="ime" placeholder="Ime" size="20" ><br><br>

                    <label class="labele" for="prezime">Unesite svoje prezime: </label>
                    <input type="text" class="inputi" id="prezime" name="prezime" placeholder="Prezime" size="30" ><br><br>

                    <label class="labele" for="korisnicko_ime">Korisničko ime: </label>
                    <input type="text" class="inputi" id="korisnicko_ime" name="korisnicko_ime" maxlength="20" size="10" placeholder="Korsničko ime" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password">Lozinka: </label>
                    <input type="password" class="inputi" name="password" id="password" placeholder="Lozinka"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password2">Ponovno upišite lozinku: </label>
                    <input type="password" class="inputi" name="password2" id="password2" placeholder="Lozinka"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="enkripcija">Enkripcija: </label>
                    <keygen class="inputi" id="enkripcija" name="enkripcija"><br><br>

                    <label class="labele" for="rodjendan_dan">Rođendan (dan): </label>
                    <input type="number" class="inputi" id="rodjendan_dan" name="rodjendan_dan"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="rodjendan_mjesec">Rođendan (mjesec): </label>
                    <input list="rodjendan_mjesec2" class="inputi" id="rodjendan_mjesec" name="rodjendan_mjesec"> <span class="nevidljivo"></span>
                    <datalist id="rodjendan_mjesec2">
                        <option value="Siječanj">
                        <option value="Veljača">
                        <option value="Ožujak">
                        <option value="Travanj">
                        <option value="Svibanj">
                        <option value="Lipanj">
                        <option value="Srpanj">
                        <option value="Kolovoz">
                        <option value="Rujan">
                        <option value="Listopad">
                        <option value="Studeni">
                        <option value="Prosinac">
                    </datalist><br><br>
                    <label class="labele" for="rodjendan_godina">Rođendan (godina) </label>
                    <input type="number" class="inputi" id="rodjendan_godina" name="rodjendan_godina"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="spol">Spol: </label>
                    <select id="spol" name="spol">
                        <option value="0">Muški</option>
                        <option value="1">Ženski</option>
                    </select>
                    <br><br>
                    <label class="labele" for="mobilni_telefon">Mobilni telefon: </label>
                    <select id="drzava"  name="drzava">
                        <option value="+382 Crna Gora">+382 Crna Gora</option>
                        <option value="+383 Kosovo">+383 Kosovo</option>
                        <option value="+385 Hrvatska">+385 Hrvatska</option>
                        <option value="+386 Slovenija">+386 Slovenija</option>
                        <option value="+387 Bosna i Hercegovina">+387 Bosna i Hercegovina</option>

                    </select>
                    <input type="tel" class="inputi" id="mobilni_telefon" name="mobilni_telefon"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="email">Email adresa: </label>
                    <input type="email" class="inputi" id="email" name="email"><span class="nevidljivo"></span><br><br>



                    <label class="labele" for="lokacija">Lokacija: </label>
                    <textarea id="lokacija" class="inputi" name="lokacija" cols="100" rows="40" ></textarea><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="slika">Slika: </label>
                    <input type="file" class="inputi" id="slika" name="slika" ><br><br>

                    <label class="labele" for="obavijest">Obavijesti: </label>
                    <input type="radio" id="obavijest" name="obavijest" value="Da">Da
                    <input type="hidden" id="obavijest" name="obavijest" value="Ne">Ne<br><br>
                    <div class="g-recaptcha" data-sitekey="6LcY4B4TAAAAABXJZ-ODWygBNmv3nxhRh3d8WXKW"></div>

                    <input type="submit" name="submit" id="submit" value="Registriraj me" ><br><br>

                    <article id="greske">
                        <?php
                        echo $poruke;
                        ?>
                    </article>

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
