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
        <script>
    history.pushState("null","null",document.title);
    window.addEventListener('popstate',function(){
        history.pushState("null","null",document.title);
    })
</script>
    </head>
    <body>
<?php
session_start();
session_unset();
$_SESSION=array();
session_destroy();
include 'smallform.html';
?>
    </body>

</html>