<html dir="ltr">
<head>
<meta charset = "UTF-8" />
<title>Miler by Alali</title>
</head>

<body style="background-color:rgb(231, 231, 231);">
<form action="" method="POST">
<center>
<div style="padding-top:150;">
<input style="padding-bottom:6;" name="to" type="email" value="" placeholder="to:email" /><br/><br/>
<input style="padding-bottom:6;" name="subject" type="text" value="" placeholder="the subject" /><br/><br/>
<textarea style="padding-bottom:6;" name="message" type="text" value="" placeholder="to:message:hello" /></textarea><br/><br/>
<input style="padding-bottom:6;" name="from" type="email" value="" placeholder="From: webmaster@example.com" /><br/><br/>
<input style="font-size:25;width:150;background-color:rgb(92, 178, 54);color:white;border-color:rgb(92, 178, 54);;" name="submit" type="submit" value="send"/><br/>
</div>
</center>
</form>






<?php
$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$from = $_POST['from'];

if(isset($_POST['submit'])){
	if(empty($to) OR empty($subject)OR empty($message)OR empty($from) ){
		
		
		echo'<center><h1><b style="color:#912222;">Error:هنالك شيئ فارغ!</b></h1></center>';
	}else{
		if(isset($_POST['submit'])){
		 $mailer = mail($to, $subject, $message, 'From:'.$from.'');
		 if(isset($mailer)){
   echo'<center><h1><b style="color:#83f35b;">تم الأرسال بنجاح</b></h1></center>';

		 }else{
		echo'<center><h1><b style="color:#red;">Error:فشل ارسال الرسالة!</b></h1></center>';
}
		}
			

		
		
	}
	
	
}
?>
</body>
</html>