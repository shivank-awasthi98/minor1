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
        
            .fullheight{
                height: calc(100% - 65px);
            }
        
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow">
            <div class="container">
                <a class="navbar-brand text-warning " href="#">
                    <h4>ParTimers</h4>
                
                </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <div class="dropdown" style="a:hover{color:#ffc107}"><a class="nav-link dropdown" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                          
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="myjobsparttimer.php"></a>
                                <a class="dropdown-item disabled" href="searchjobs.php"></a>
                               
                              </div>
                            </div>
                      </li>
                      <li class="nav-item">
                        <div class="dropdown"><a class="nav-link disabled" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                          
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="viewskill.php"></a>
                                <a class="dropdown-item" href="addskill.php"></a>
                               
                              </div>
                            </div>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link disabled " href="#"  ></a>
                      </li>
                        
                      
                    </ul>
                      <a href="landing.php?logout=1" class="btn btn-warning">Logout</a>
                    
                  </div>


                </div>
        
 
    
        
        </nav>
        <div class='  row '>
            <div class='col-sm-4 bg-white border-warning border-right text-warning fullheight'><table class='table'><tr><td scope='col'>sad</td></tr></table></div>
        <div class='col-sm-8 bg-light border-warning border-left text-white fullheight'><span class='text-wrap bg-warning rounded-pill pl-2 pr-2'>asda</span><form class='form-inline'><input type=text class='rounded-pill form-control inline border border-warning '><button class='btn btn-warning form-control inline'>Send</button></form></div>
        </div>
               
   
    </body>
</html>