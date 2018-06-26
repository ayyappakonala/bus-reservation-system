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
$s=$_GET["sourse"];
$d=$_GET["dstn"];
$a=$_GET["date"];
$_SESSION["date"]=$a;
//echo $s."hello ".$d;
$conn= new mysqli("localhost:3306","root","Pippop007","test");
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
   
}
 else {
     
     $sql="select * from bus where sourse='$s' and dstn='$d'";
     if($conn->query($sql))
     {
         
         $result=$conn->query($sql);
         while($r=$result->fetch_assoc())
         {
             echo "<form action='seats.php'>";
            // echo "<a href='seats.php'>";
             echo $r["bid"]." ".$r["bname"]." ".$r["rating"];
            echo "<input type = 'submit' id = ".$r['bid']." value='viewseats' ) />";
            echo "<input type = 'hidden' value =".$r["bid"]." name = 'hidden' />";            
            // echo "</a>";
             echo "</form>";
         }
     }
 }
 
?>
    </body>
</html>