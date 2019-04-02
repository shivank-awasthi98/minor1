<?php 
    session_start();

if(array_key_exists('id',$_SESSION))
{
    


$link = mysqli_connect("localhost", "root", "", "clg_minor");
    $query="SELECT typeofuser FROM `users` WHERE uid = ".$_SESSION['id']." ";
     $result=mysqli_query($link, $query);
    $row=mysqli_fetch_array($result);
    if($row['typeofuser']=="employer")
    {
        header("location:indexforemployer.php");
            
    }
    elseif($row['typeofuser']=="parttimer")
    {
        header("location:indexofparttimer.php");
    }
}
else{
    header("location:landing.php");
}


        ?>