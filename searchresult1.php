<?php
session_start();
if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}
$link = mysqli_connect("localhost", "root", "", "clg_minor");
?>

<html>
    <head>
        <title>SignedUp</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
   
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <style>
            html {
                  position: relative;
                  min-height: 100%;
                }
                body {
                  margin-bottom: 60px; /* Margin bottom by footer height */
                }
                .footer {
                  position: absolute;
                  bottom: 0;
                  width: 100%;
                  height: 80px; /* Set the fixed height of the footer here */
                  line-height: 60px; /* Vertically center the text there */
                  
                }
            nav a:hover{
                color: #ffc107
            }
           
            
            
            
            
              
                  
               
            
            

        </style>

    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow">
            <div class="container">
                <a class="navbar-brand text-warning " href="redirect.php">
                    <h4>ParTimers</h4>
                
                </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <div class="dropdown" style="a:hover{color:#ffc107}"><a class="nav-link dropdown" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> </a>
                          
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="myjobsemployer.php"></a>
                                <a class="dropdown-item" href="#"></a>
                                <a class="dropdown-item" href="Postjob.php"></a>
                              </div>
                            </div>
                      </li>
                      <li class="nav-item">
                        <div class="dropdown"><a class="nav-link" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                          
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="myparttimer.php"></a>
                                <a class="dropdown-item" href="searchpartimer.php"></a>
                               
                              </div>
                            </div>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link " href="#"  ></a>
                      </li>
                        
                      
                    </ul>
                    <a href="landing.php?logout=1" class="btn btn-warning my-2 my-sm-0">Logout</a>
                    
                  </div>


                </div>
        
 
    
        
        </nav>
        <?php 



if($_REQUEST['typeofuser']=='parttimer'){
    $query="SELECT * FROM jobs WHERE jobtitle='".$_REQUEST['keyword']."' OR category='".$_REQUEST['keyword']."' OR subcategory='".$_REQUEST['keyword']."' OR skills='".$_REQUEST['keyword']."';";
    $result=mysqli_query($link,$query);
        while($row=mysqli_fetch_assoc($result)){
            echo('<div class="card mt-3 mb-3">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5><a href="jobview.php?id='.$row["id"].'" class="card-title text-decoration-none">'.$row["jobtitle"].'</a></h5>
    <p class="card-text">'.$row["jobdiscription"].'.</p>
    <p href="#" class="btn btn-warning text-white">'.$row["category"].'</p>
  </div>
    <div class="card-footer">
    
  </div></div>');
        }
        
}
else {
    $query="SELECT * FROM users WHERE typeofuser=parttimer AND username=".$_REQUEST['keyword'].";";
    $result=mysqli_query($link,$query);
        while($row=mysqli_fetch_assoc($result)){
            echo('<div class="card mt-3 mb-3">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5><a href="resume.php?id='.$row["id"].'" class="card-title text-decoration-none">'.$row["jobtitle"].'</a></h5>
    <p class="card-text">'.$row["jobdiscription"].'.</p>
    <p href="#" class="btn btn-warning text-white">'.$row["category"].'</p>
  </div>
    <div class="card-footer">
    
  </div></div>');
        
        }
}        ?>

        
 
 

<footer class="footer bg-dark">
      <div class="container bg-dark">
        <span class="text-muted"></span>
      </div>
</footer>
    </body>
</html>