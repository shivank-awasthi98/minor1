<?php

session_start();

if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}

 else{
     $link = mysqli_connect("localhost", "root", "", "clg_minor");

$query="INSERT INTO `users` (`uid`,`firstname`,`lastname`,`email`,`username`,`password`,`typeofuser`) 
SELECT `uid`,`firstname`,`lastname`,`email`,`username`,`password`,`typeofuser` 
FROM `temp` WHERE uid = ".$_SESSION['id']." ";
if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later3.</p>";
                        echo($error);

                    } 
else{
    header("location:redirect1.php");
    
    
}
     }

?>
<script>

$(document).ready(function() {
   var referrer =  document.referrer;
           if(!(referrer=="http://localhost/clgMinor/signinpage.php")){
                header("location:landing.php");
           }
            });
</script>