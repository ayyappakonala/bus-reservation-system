<?php
session_start();
$_SESSION["bid"]=$_GET["hidden"];
//echo var_dump($_SESSION);
 ?>
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
        <script>
             
             var scount=0;
    function color(btn) {
        
       
      
       
        if (btn.style.backgroundColor===document.getElementById("dummy").style.backgroundColor)
           {
            btn.style.backgroundColor = "#FFFFFF";
           
            scount--;
        }
        else {
             if(scount<4)
             {
            btn.style.backgroundColor = "#7FFF00";
          
            scount++;
        }
    
     else    
         {
             alert("max limit exceed");
             btn.style.backgroundColor = "#FFFFFF";
             
         }
     }
        
    }
    function final()
    {
        
        var i='1';
        var c;
        for (i='1';i<='54';i++)
        {
            
          //  document.getElementById("p1").innerHTML="hello";
            //document.getElementById("p1").innerHTML="hello";
           if(document.getElementById(i).style.backgroundColor===document.getElementById("dummy").style.backgroundColor)
          {
            //  alert(document.getElementById(i).value);
            if(c==null)
            {
                c=document.getElementById(i).value;
            }
            else
            {
            var d=(document.getElementById(i).value);
            c=c+","+d;
            
            }
            document.getElementById("hidden").value=c ;
          }
        }
        //document.write(c);
       //document.getElementById("p1").innerHTML=c ;
   }
        </script>
    </head>
    <body class='b1'>
        <?php
        $conn= new mysqli("localhost:3306","root","Pippop007","test");
if($conn->connect_error)
{
     die("connection failed".$conn->connect_error);
   
}
else
{
    $v=$_SESSION["bid"];
    $d=$_SESSION["date"];
    $a=array();
    $m=0;
    //echo $v." ".$d;
    $s="select seatno from booked where bid=$v and doj='$d'";
    $result=$conn->query($s);
    if($result->num_rows)
    {
        while($r=$result->fetch_assoc())
        {
            $a[$m++]= $r["seatno"];
        }
       $k=0;
        echo "<form action='trash.php'> <table cellpadding='10' align='center'>";
              echo "<tr>";
              for($i='1';$i<='54';$i++)
              { 
                  if($a[$k]==$i)
                  {
                  echo "<td><input type='button' value='".$i."' name='".$i."' id='".$i."' onclick='color(this)' disabled='disabled'></td>";
                  $k++;
                  }
                  else
                  {
                      echo "<td><input type='button' value='".$i."' name='".$i."' id='".$i."' onclick='color(this)'></td>";
                  }
                  if ($i%6==0)
                  {
                      echo "</tr><tr>";
                  }
                          
              }
              echo "</table>";
              echo "<input type='hidden' name='hidden' id='hidden' value=''>";
              echo "<center><input type='submit' value='confirm seats' onclick='final()'></center>";
              echo "<input type='button' name='dummy' id='dummy' style='display:none;background-color:#7FFF00'>";
              echo "</form>";
     }
     else
     {
          echo "<form action='trash.php'> <table cellpadding='10' align='center'>";
              echo "<tr>";
              for($i='1';$i<='54';$i++)
              {
                  echo "<td><input type='button' value='".$i."' name='".$i."' id='".$i."' onclick='color(this)'></td>";
                  if ($i%6==0)
                  {
                      echo "</tr><tr>";
                  }
                          
              }
              echo "</table>";
              echo "<input type='hidden' name='hidden' id='hidden' value=''>";
              echo "<center><input type='submit' value='confirm seats' onclick='final()'></center>";
              echo "<input type='button' name='dummy' id='dummy' style='display:none;background-color:#7FFF00'>";
              echo "</form>";
          }
}
        ?>
        
      <!--  <form action="trash.php">
            <table cellpadding="10" align="center">
                <tr>
                    <td><input type="button" value="1" name="1" id="1" onclick="color(this)"/></td>
            <td><input type="button" value="2" name="2" id="2" onclick="color(this)" /></td>
            <td><input type="button" value="3" name="3" id="3" onclick="color(this)"  /></td>
            <td></td>  
           <td> <input type="button" value="4" name="4" id="4" onclick="color(this)" /></td>
           <td> <input type="button" value="5" name="5" id="5" onclick="color(this)"  /></td>
           <td> <input type="button" value="6" name="6" id="6" onclick="color(this)"  /></td>
            </tr>
            <tr>
           <td> <input type="button" value="7" name="7" id="7" onclick="color(this)"  /></td>
           <td> <input type="button" value="8" name="8" id="8" onclick="color(this)"  /></td>
           <td> <input type="button" value="9" name="9" id="9" onclick="color(this)"  /></td>
           <td></td>
           <td> <input type="button" value="10" name="10" id="10" onclick="color(this)"  /></td>
           <td> <input type="button" value="11" name="11" id="11" onclick="color(this)"  /></td>
           <td> <input type="button" value="12" name="12" id="12" onclick="color(this)"   /></td>
            </tr>
            <tr>
           <td>  <input type="button" value="13" name="13" id="13" onclick="color(this)"  /></td>
          <td>  <input type="button" value="14" name="14" id="14" onclick="color(this)"  /></td>
           <td> <input type="button" value="15" name="15" id="15" onclick="color(this)"  /></td>
           <td></td>
           <td> <input type="button" value="16" name="16" id="16" onclick="color(this)"  /></td>
           <td> <input type="button" value="17" name="17" id="17" onclick="color(this)"  /></td>
           <td> <input type="button" value="18" name="18" id="18" onclick="color(this)"  /></td>
            </tr>
           <tr>
           <td> <input type="button" value="19" name="19" id="19" onclick="color(this)"  /></td>
           <td> <input type="button" value="20" name="20" id="20" onclick="color(this)" /></td>
           <td> <input type="button" value="21" name="21" id="21" onclick="color(this)" /></td>
           <td></td>
           <td> <input type="button" value="22" name="22" id="22" onclick="color(this)" /></td>
           <td> <input type="button" value="23" name="23" id="23" onclick="color(this)" /></td>
           <td> <input type="button" value="24" name="24" id="24" onclick="color(this)" /></td>
            </tr>
           <tr>
           <td> <input type="button" value="25" name="25" id="25" onclick="color(this)"  /></td>
            <td><input type="button" value="26" name="26" id="26" onclick="color(this)" /></td>
            <td><input type="button" value="27" name="27" id="27" onclick="color(this)" /></td>
           <td></td>
            <td><input type="button" value="28" name="28" id="28" onclick="color(this)" /></td>
            <td><input type="button" value="29" name="29" id="29" onclick="color(this)" /></td>
            <td><input type="button" value="30" name="30" id="30" onclick="color(this)" /></td>
            </tr>
            <tr>
            <td> <input type="button" value="31" name="31" id="31" onclick="color(this)"  /></td>
           <td> <input type="button" value="32" name="32" id="32" onclick="color(this)" /></td>
            <td><input type="button" value="33" name="33" id="33" onclick="color(this)" /></td>
            <td></td>
            <td><input type="button" value="34" name="34" id="34" onclick="color(this)" /></td>
           <td> <input type="button" value="35" name="35" id="35" onclick="color(this)" /></td>
            <td><input type="button" value="36" name="36" id="36" onclick="color(this)" /></td>
            </tr>
            <tr>
            <td>  <input type="button" value="37" name="37" id="37" onclick="color(this)"  /></td>
           <td> <input type="button" value="38" name="38" id="38" onclick="color(this)" /></td>
           <td> <input type="button" value="39" name="39" id="39" onclick="color(this)" /></td>
           <td></td>
           <td> <input type="button" value="40" name="40" id="40" onclick="color(this)" /></td>
           <td> <input type="button" value="41" name="41" id="41" onclick="color(this)" /></td>
           <td> <input type="button" value="42" name="42" id="42" onclick="color(this)" /></td>
            </tr>
           <tr>
           <td>  <input type="button" value="43" name="43" id="43" onclick="color(this)"  /></td>
           <td> <input type="button" value="44" name="44" id="44" onclick="color(this)" /></td>
           <td> <input type="button" value="45" name="45" id="45" onclick="color(this)" /></td>
           <td></td>
           <td> <input type="button" value="46" name="46" id="46" onclick="color(this)" /></td>
           <td> <input type="button" value="47" name="47" id="47" onclick="color(this)" /></td>
            <td><input type="button" value="48" name="48" id="48" onclick="color(this)" /></td>
            </tr>
            <tr>
            <td> <input type="button" value="49" name="49" id="49" onclick="color(this)"  /></td>
            <td><input type="button" value="50" name="50" id="50" onclick="color(this)" /></td>
            <td><input type="button" value="51" name="51" id="51" onclick="color(this)" /></td>
            <td>     </td>
            <td><input type="button" value="52" name="52" id="52" onclick="color(this)" /></td>
            <td><input type="button" value="53" name="53" id="53" onclick="color(this)" /></td>
            <td><input type="button" value="54" name="54" id="54" onclick="color(this)" /></td>
            </tr>
            </table>
            <input type="hidden" name="hidden" id="hidden" value="" />
            <center><input type="submit" value="confirm seats" onclick="final()" /></center>-->
      
           <!-- <input type="button" name="dummy" value="dummy" id="dummy" style="display: none;background-color: #7FFF00" />
        </form>-->
        <p id="p1"></p></br>
        <p id="p2"></p></br>
        <p id="p3"></p>
    </body>
</html>


