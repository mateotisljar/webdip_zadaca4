<?php

include_once'sesija.class.php';
session_start();
Sesija::obrisiSesiju();

var_dump($_SESSION);
header("Location: prijava.php");