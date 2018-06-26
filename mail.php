<?php
//require "lib/PHPMailer/PHPMailerAutoload.php";
require '/home/ayyappa/Downloads/apache-tomcat-8.5.24/webapps/JavaBridgeTemplate621/wtproject/PHPMailer-6.0.3/src/PHPMailer.php';
require '/home/ayyappa/Downloads/apache-tomcat-8.5.24/webapps/JavaBridgeTemplate621/wtproject/PHPMailer-6.0.3/src/SMTP.php';
require '/home/ayyappa/Downloads/apache-tomcat-8.5.24/webapps/JavaBridgeTemplate621/wtproject/PHPMailer-6.0.3/src/Exception.php';

$mail= new PHPMailer\PHPMailer\PHPMailer;
$mail->Host='smtp.gmail.com';
$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->SMTPAuth= true;
$mail->Username="yatrabus456@gmail.com";
$mail->Password="yatrabus12";
$mail->SMTPSecure="tls";
$mail->port=587;
$mail->Subject="email";
$mail->Body="hello mahidhar hw do  do!!";
$mail->setFrom("yatrabus456@gmail.com");
$mail->addAddress("activeboy369@gmail.com");
if($mail->send())
{
    echo "mail sent";
}
else
{
    echo "mail not send";

}
?>