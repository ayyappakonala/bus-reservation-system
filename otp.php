
<html>
    <head>
        
                
    </head>
    <body>  
        <form action="otcheck.php">
             <input type="hidden" name="otpc2" id='otpc2' value="" />
            enter the verification code :<input type="text" name="code" id="code" value="" />
            <input type="submit" value="check"  />
        </form>

<?php
session_start();
$_SESSION['name']=$_GET['name'];
$_SESSION['pwd']=$_GET['pwd'];
$_SESSION['email']=$_GET['email'];
$_SESSION['gender']=$_GET['gender'];
$_SESSION['phno']=$_GET['phno'];

$x=$_GET['otpc'];
$e=$_GET['email'];

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
$mail->Body="your email verification code id $x";
$mail->setFrom("yatrabus456@gmail.com");
$mail->addAddress($e);
if($mail->send())
{
    echo "mail sent";
}
else
{
    echo "mail not send";

}

echo "<script>document.getElementById('otpc2').value=$x</script>";


?>
 </body>
</html>