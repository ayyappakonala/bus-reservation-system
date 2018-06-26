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
            }
        </style>
    </head>
    <body class='b1'>
<?php

$x=$_GET["username"];
$y=$_GET["pwd"];
$conn= new mysqli("localhost:3306","root","Pippop007","test");
if($conn->connect_error)
{
    die("connection problem".$conn->connect_error);
}
else
{
    $sql="select * from users where username='$x'";
    $r=$conn->query($sql);
    if($r->num_rows)
    {
        $row=$r->fetch_assoc();
        if($row["password"]==$y)
        {
            //echo "login sucessufull<br>";
            session_start();
            $_SESSION["name"]=$x;
            $_SESSION['email']=$row['email'];
           echo "<a href='deatils.php'> <input type='button' name='details' value='details' /> </a><br>";
            echo "<a href='logout.php'> <input type='button' name='update profilepic' value='logout' /> </a><br>";
            include 'routes.php';
            
        }
        else
        {
            echo"password incorrect";
            include 'smallform.html';
        }
    }
    else
    {
        echo "enter username properly";
        include 'smallform.html';
    }
}
?>
</body>
</html>