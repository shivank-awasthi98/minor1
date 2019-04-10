<?php 

session_start();
if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}
$link = mysqli_connect("localhost", "root", "", "clg_minor");
echo $_GET['id'];
$query="SELECT * FROM bids WHERE bidon=".$_GET['id']."";
echo $query;
$result=mysqli_query($link,$query);
$row=mysqli_fetch_assoc($result);
$query2="INSERT INTO `finishedjobs`(`finishedby`,  `finishedjob`) VALUES (".$_SESSION['id'].",".$row['bidon'].")";
if(mysqli_query($link,$query2))
{   $query4="SELECT * FROM jobs WHERE id=".$row['bidon']." ";
    $row4=mysqli_fetch_assoc(mysqli_query($link,$query4));
    $query3="INSERT INTO `notify`(`notifyuser`, `notifymessage`) VALUES (".$row['bidby'].",'has completed  ".$row4['jobtitle']." ' )";
    if(mysqli_query($link,$query3)){
    header('location:jobview.php?id='.$row["bidon"].'');
    }
    else{
        echo $query3;
    }
                                    
}


?>