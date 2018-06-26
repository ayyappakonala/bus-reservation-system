<html>
    <head>
        <style>
             html,body{
                height: 100%;
            }
            .b1 {
                background-image: url("pics/bg3.jpg");
                    height: 100%;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
        </style> 
    </head>
    <body class='b1'>
<?php
session_start();
$x=$_GET["hidden"];
//echo var_dump($_SESSION);

$i=0;

$p=0;
$s=array();
for($i=0;$i<strlen($x);$i++)
{
    if($x[$i]!=',')
    {
      if($s[$p]==null)
      {
         $s[$p]=$x[$i];
      }
      else {
          
          $s[$p]=$s[$p].$x[$i];
      }
    }
    else if($x[$i]==','){
        $p++;
    }
   
}
//for($i=0;$i<count($s);$i++)
//{
  //  echo $s[$i];
//}

//echo count($s);

$conn= new mysqli("localhost:3306","root","Pippop007","test");
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
   
}
 else
 {
   for($i=0;$i<count($s);$i++)
    {
       $l=$_SESSION["bid"];
       $b=$_SESSION["name"];
       $d=$_SESSION["date"];
       $v=$s[$i];
        $sql="insert into booked values('$l','$b','$d','$v')";
       if($conn->query($sql))
       {
           
       }
       else
       {
           echo "not booked";
       }
        
    }  
    
   echo "tickets confirmed.....please check your mail!!"."<br>";
           echo "<h1>THANK YOU!!</h1>";
           echo "<a href='logout.php'>logout</a>";
 }
 $s="select email from users where username=".$_SESSION['name'];
 //$result=$conn->query($s);
 //$r=$result->fetch_assoc();
 $z=$_SESSION['email'];
 
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
$msg=  "<h1>dear customer,</h1> <br>"
        . "please carry a copy of this to the boarding point and procrrd the bill payment<br>"
        . "the details are<br> "
        . "passenger name".$_SESSION['name']."<br>"
        . "date of journey".$_SESSION['date']."<br>"
        ."seats reserved are".$x."<br>";
$mail->Subject="email";
$mail->Body= $msg;
$mail->setFrom("yatrabus456@gmail.com");
$mail->addAddress($z);
if($mail->send())
{
    echo "mail sent";
}
else
{
    echo "mail not send";
}
?>
  </body>
</html>



