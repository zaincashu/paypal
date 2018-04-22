<?php
@session_start();  
error_reporting(0); 
ob_start(); 
set_time_limit(0); 
$vic  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = $_SERVER['REMOTE_ADDR'];
$result  = "Unknown";
if(filter_var($vic, FILTER_VALIDATE_IP))
{
$ip = $vic;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP))
{
$ip = $forward;
}
else
{
$ip = $remote;
}
$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
if($ip_data && $ip_data->geoplugin_countryCode != null)
{
$countrycode = $ip_data->geoplugin_countryCode;
$_SESSION['CountryCode'] = $countrycode;
}    
$ip_data2 = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
if($ip_data2 && $ip_data2->geoplugin_countryName != null)
{
$countryname = $ip_data2->geoplugin_countryName;
$_SESSION['CountryName'] = $countryname;
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 781e74912c6396f0ce12d7827d9d43d444d1a239
