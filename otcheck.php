<?php
session_start();
$x=$_GET['otpc2'];
$y=$_GET['code'];
if($x==$y)
{
    
$x=$_SESSION["name"];
$y=$_SESSION["pwd"];
$z=$_SESSION["email"];
$g=$_SESSION["gender"];
$p=$_SESSION["phno"];
$conn= new mysqli("localhost:3306","root","Pippop007","test");
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
}
else{
$sql="insert into users values('$x','$y','$z','$g','$p','')";
if ($conn->query($sql)) {
    include 'smallform.html';
} else {
  echo 'Fail';
} 
}
session_destroy();
session_unset();
$_SESSION[]=array();
$conn->close();
}
else
{
    echo "invalid OTP";
   echo "<a href='form.html'>back</a>";
    
}
?>
