<?php
// Check for empty fields
if(empty($_POST['name']) 		||
  empty($_POST['email']) 		||
  empty($_POST['phone']) 		||
  empty($_POST['message'])	||
!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
  echo "No arguments Provided!";
  return false;
}

$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$to="rafael.d.martins@hotmail.com";
$from=strip_tags(htmlspecialchars($_POST['email']));
$from_name=strip_tags(htmlspecialchars($_POST['name']));
$headers="From: rdmar379@rdmartins.me\r\n";
$headers.="MIME-Version: 1.0\r\n";
$headers.="Content-Type: text/html; charset=UTF-8\r\n";
$msg="<html>\r\n";
$msg.="<body>\r\n";
$msg.="<h2>$from_name</h2><br />\r\n";
$msg.="$from<br />\r\n";
$msg.="$phone\r\n";
$msg.="<p>$message</p>\r\n";
$msg.="</body>\r\n";
$msg.="</html>\r\n";
$subject="Contato: $from_name";

mail($to, $subject, $msg, $headers);
?>
