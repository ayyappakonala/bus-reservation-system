<?php
session_start();
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
        function check()
        {
            var x=document.getElementById("sourse").value;
            var y=document.getElementById("dstn").value;
            if(x==y)
            {
                return false;
            }
            else
                return true;
        }
    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    
    $('#date').attr('min', maxDate);
});
    function city(bid)
    {
        
        var str=document.getElementById(bid).value;
       var did;
       
       if(bid=='sourse')
           did='1';
       else
           did='2';
         if (str == "") {
            
       document.getElementById(did).innerHTML = "";
        return;
    } else {
        
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(did).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","jqu.php?q="+str+"&r="+bid,true);
        xmlhttp.send();
    }
    }
    function show(lol)
    {
      //alert(pis);
      //alert(lol);
        document.getElementById('sourse').value=lol;
     // if(pis=='sourse')
        document.getElementById('1').innerHTML='';
 // else
      // document.getElementById('2').innerHTML='';
    }
      function show1(lol)
    {
      //alert(pis);
      //alert(lol);
        document.getElementById('dstn').value=lol;
     // if(pis=='sourse')
        document.getElementById('2').innerHTML='';
 // else
      // document.getElementById('2').innerHTML='';
    }
               </script>
        
    </head>
    <body>
        <form action="busses.php" class='b1'>
           
            <table border="0" width="10" cellspacing="10" cellpadding="1" align="center">
                <tbody>
                    <tr>
                        <td><p>FROM:</p></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="sourse" name="sourse" value="" onkeyup="city('sourse')" style="width: 150px;height: 20px"/>
                            <div id="1"></div></td>
                    </tr>
                    <tr>
                        <td><p>TO:</p></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="dstn" name='dstn' value="" onkeyup="city('dstn')" style="width: 150px;height: 20px"/>
                            <div id="2"></div></td>
                    </tr>
                </tbody>
            </table>
        <center><input type="date" name="date" id="date" onmouseover="d()" ><br></center>

                
                        
           
            <center><input type="submit" onclick= "return check()" /></center>
            
        </form>
    </body>
</html>
