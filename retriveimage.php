<?php
$conn= new mysqli("localhost:3306","root","Pippop007","test");
if($conn->connect_error)
{
    echo "connection failed".$conn->connect_error;
   
}
 else {
     
     $p="select image from image where id=100";
     $result=$conn->query($p);
     while($r=$result->fetch_assoc())
     {
       //  header('Content-type: image/jpg');
        $s=$r['image'];
        echo '<img height="300" width="300" src="data:image;base64,'. base64_encode($s).'">';
        
        }
}
?>
