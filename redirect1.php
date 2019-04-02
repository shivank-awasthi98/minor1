<?php
session_start();

if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}

 else{
     
     $link = mysqli_connect("localhost", "root", "", "clg_minor");
     $query="SELECT typeofuser FROM users WHERE id=".$_SESSION['id'].";";
     if(mysqli_query($link,$query))
     {
         $row=mysqli_fetch_assoc(mysqli_query($link,$query));
         if($row['typeofuser']=='parttimer')
         {
             header("location:parttimerinfo.php");
         }
         else{
             header("location:Postjob.php");
         }
     }
 }
?>