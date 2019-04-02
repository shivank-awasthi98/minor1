<?php 

session_start();
if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}
$link = mysqli_connect("localhost", "root", "", "clg_minor");

$query="INSERT INTO `bids`(`bidby`, `bidon`, `bidammount`) VALUES (".$_REQUEST['bidby'].",".$_REQUEST['bidon'].",".$_REQUEST['rangeInput'].")";
if(mysqli_query($link,$query))
{
    echo 'success';
    
}
else
    echo "failed";
?>