<?php
session_start();

$conn= new mysqli("localhost:3306","root","Pippop007","test");
  if(!$conn){
      die("connection failed". mysqli_connect_error());
  }
 else
  {
     if(isset($_POST['insert']))
     {
        
         $data= addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $s="update users set pic='$data' where username='".$_SESSION['name']."'";
         //echo $data;
         if($conn->query($s))
         {
             echo "sucessfully updated!!";
         }
         else
         {
             echo "sry cannot update now!!";
         }
     }
  }
  //header("Content-type: image/jpeg");
 // header("content-type: image/png");
 // $sql="select data from img where id=1";
  //$result=$conn->query($sql);
  //while($r=$result->fetch_assoc())
  //{
   //  echo '<img src="data:image/jpeg;base64,'.base64_encode($r['data']).'" width="250" height="300">'." ";
  //}
  ?>