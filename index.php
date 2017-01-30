<?php

include_once 'sesija.class.php';

$sesija = new Sesija();

Sesija::kreirajKorisnika('korisnik');
var_dump($_SESSION);



?>
<html>
    <head>
        <title>Početna stranica</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Mateo Tišljar">
        <meta name="keywords" content="FOI, WebDiP">
        <link href="mtisljar.css" rel="stylesheet" type="text/css">
        <link href="mtisljar_mobiteli.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <h1 id="h1">Zadaca_02</h1>
            
        </header>
        <aside>
            <nav id="nav">
                <ul>
                    <li><a href="index.php" class="selected">Početna stranica</a></li>
                    <li><a href="omiljeno.php">Omiljeno</a></li>
                    <li><a href="registracija.php">Registracija</a></li>
                    <li><a href="prijava.php">Prijava</a></li>
                    <li><a href="korisnici.php">Korisnici</a></li>
                    
                    <li><a href="http://eportfolio.foi.hr/user/view.php?id=2998" target="_blank">E-portfolio</a></li>
                </ul>
            </nav>
        </aside>
        
        <div id="sadrzaj">
            <div id="sli">
            <figure class="slike">
                
                <figcaption>Galaxy</figcaption>
                <a href="galaxy.jpg"><img class="sli" src="galaxy.jpg" alt="galaxy" align="center"></a>
                
            </figure>
            
            <figure class="slike">
                <figcaption>
                    Nogomet
                </figcaption>
                <a href="footbal.jpg"><img class="sli" src="footbal.jpg" alt="football"></a>
                
            </figure>
            
            <figure class="slike">
                <figcaption>
                    Automobili
                </figcaption>
                <a href="driving.jpg"><img class="sli" src="driving.jpg" alt="driving" align="middle"></a>
                
            </figure>
            <figure class="slike">
                <figcaption>
                    Custom recovery
                </figcaption>
                <a href="twrp.jpg"><img class="sli" src="twrp.jpg" alt="twrp"></a>
                
            </figure>
            <figure class="slike">
                <figcaption >
                    Vinograd
                </figcaption>
                <a href="vinograd.jpg"><img class="sli" src="vinograd.jpg" alt="vinograd"></a>
                
            </figure>
            </div>
            
            
            <div id="video">
            <video controls width="300" height="200">
                <source src="twrp.mp4">
            </video>
            <video controls width="300" height="200">
                <source src="rast.mp4">
            </video>
            <video controls width="300" height="200">
                <source src="vinograd.mp4">
            </video>    
        
        
            </div>
            
            <div id="audio">
                <audio controls>
                    <source src="tardis.mp3" title="tardis">
                </audio>
            </div>
            </div>
        
        
        <footer>

            <div id="div1"><address>Kontakt: <a href="mailto:mtisljar@foi.hr">Mateo Tišljar</a></address>
                <p>M. Tišljar</p></div>
            <p>Vrijeme potrebno za zadacu: 30 sati</p>
            <div id="div2"><figure>
                <p>
                    <a href="http://validator.w3.org/check/referer" target="_blank"><img class="foot" src="HTML5.png" alt="HTML5" ></a>
                    <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img class="foot" src="CSS3.png" alt="CSS" height="50" width="50"></a>
                </p>
            </figure></div>
        </footer>
    </body>
</html>
