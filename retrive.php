<html>
<?php
$x=$_GET["stdname"];
$conn= new mysqli("localhost:3306","root","Pippop007","test");
if($conn->connect_error)
    die("connection failed".$conn->connect_error);
else
{
    $sql="select * from student where stdname='$x'";
    $r=$conn->query($sql);
    if($r->num_rows)
    {
    echo "<table>";
        
        while($row=$r->fetch_assoc())
        {
            echo "<tr>
             <td>".$row["stdname"]."</td>
               <td>".$row["stdid"]."</td>
            </tr>";
        }
        
      echo " </table>";
    }
    else
    {
        echo "no record";
  }
}
$conn->close();
?>
</html>