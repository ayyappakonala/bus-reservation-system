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
$conn= new mysqli("localhost:3306","root","Pippop007","test");
if($conn->connect_error)
{
    die("connection failed".$conn->connect_error);
   
}
 else {
echo "the name is".$_SESSION["name"]."<br>";
 $sql="select pic from users where username='".$_SESSION['name']."'";
 if($result=$conn->query($sql)){
 while($r=$result->fetch_assoc())
{
  echo '<img src="data:image/jpeg;base64,'.base64_encode($r['pic']).'" width="250" height="300">'." ";
}
 }
echo "<a href='logout.php'><input type='button' name='logout' value='logout' /> </a>"."<br>";
echo "<a href='imageinsert.html'><input type='button' name='update profilepic' value='update profilepic' /> </a>";
 }
 
?>
    </body>
</html>


