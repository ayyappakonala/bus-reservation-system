<html>
    <head>
        <style>
            ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}


        </style>
    </head>
<?php
$q = $_GET['q'];
$r = $_GET['r'];
$conn= mysqli_connect("localhost:3306","root","Pippop007", "test");
    if(!$conn)
    {
        die("connection failed".mysqli_connect_errno());
    }
    $query="select distinct $r from bus where $r like '$q%'";
    $result=mysqli_query($conn,$query);
    if($result->num_rows)
    {
        echo "<ul>";
        while($row=$result->fetch_assoc())
        {
            if($r=='sourse')
            echo "<li><input type='button' value='$row[$r]' onclick='show(this.value)' style='width: 150px;height: 20px'></li>";
            else
              echo "<li><input type='button' value='$row[$r]' onclick='show1(this.value)' style='width: 150px;height: 20px'></li>";  
            }
        echo "</datalist>";
    }
    else{
        echo "done";
    }

?>
</html>