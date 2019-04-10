<?php 

session_start();
if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}
$link = mysqli_connect("localhost", "root", "", "clg_minor");
$query12="SELECT username FROM users WHERE uid=".$_REQUEST['bidby']."";
$result=mysqli_query($link,$query12);
$row1=mysqli_fetch_assoc($result);

$query="INSERT INTO `bids`(`bidby`, `bidon`, `bidammount`,`biddername`) VALUES (".$_REQUEST['bidby'].",".$_REQUEST['bidon'].",".$_REQUEST['rangeInput'].",'".$row1['username']."')";
echo $query;
if(mysqli_query($link,$query))
{
    echo '<script>alert("thanks for bidding")</script>';
    sleep(5);
    header("location:jobview.php?id=".$_REQUEST['bidon']."");
    
}
else
    echo "failed";
    
?>