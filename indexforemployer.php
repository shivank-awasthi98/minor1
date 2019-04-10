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
            nav .nav-link:hover{
                color: #ffc107
            }
            html{
                border:0px;
                margin: 0px;
            }
         body{
              background-color: #F9F9F9;
             border:0px;
             margin:0px;
          }
            #center{
               width: 800px;
                height: 300px;
                position: relative;
                top:60px;
                
            }
            .jumbotron{
                background-color: #222222;
                margin:0px;
                bottom:0px;
                height:365px;
                
               
               
            }
            .dropdown-menu:before {
                    content:"";
                    position: absolute;
                    
                    top: -10px;
                   
                    border-style: solid;
                    
                    border-width: 0px 10px 10px 10px;
                    border-color: gainsboro transparent ;
                    
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
                        <div class="dropdown" style="a:hover{color:#ffc107}"><a class="nav-link dropdown" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jobs</a>
                          
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="myjobsemployer.php">My Jobs</a>
                                <a class="dropdown-item" href="#">All job</a>
                                <a class="dropdown-item" href="Postjob.php">Post a job</a>
                              </div>
                            </div>
                      </li>
                      <li class="nav-item">
                        <div class="dropdown"><a class="nav-link" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Freelancers</a>
                          
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="myparttimer.php">My Parttimer</a>
                                <a class="dropdown-item" href="searchparttimer.php">Search parttimer</a>
                               
                              </div>
                            </div>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link " href="messages.php"  >Messages</a>
                      </li>
                        
                      
                    </ul>
                    <a href="landing.php?logout=1" class="btn btn-warning" >Logout</a>
                    
                  </div>


                </div>
        
 
    
        
        </nav>
        <div class="container">
            <h5 class="lead mt-4">@<?php 
                           
                            $query="SELECT username FROM users WHERE uid=".$_SESSION['id']." ";
                            $result=mysqli_query($link,$query);
                            $row=mysqli_fetch_array($result);
                            echo($row['username']);
                
                ?></h5>
            <div class="container mt-4">
                
                <h4 class=lead>Freshers</h4>
                 <table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Freelancer Name</th>
                      <th scope="col">Username</th>
                      <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                           
                            $query="SELECT * FROM users ORDER BY (id) DESC LIMIT 3;";
                            $result=mysqli_query($link,$query);
                           $sno=0; while($row=mysqli_fetch_assoc($result)){$sno=$sno+1;
                                echo("<tr>
                    <th scope="."row".">".$sno."</th>
                    <td><a href='resume.php?id=".$row['uid']."'>".$row['firstname']." ".$row['lastname']."</a></td>
                    <td>".$row['username']."</td>
                    <td><button class='btn btn-light'>Message</button></td>
                </tr>");
                            
                            }
                
                ?>
                </tbody>
            </table>
           
            </div>
        </div>


        

        <div class="jumbotron jumbotron-fluid   ">
           
    
        </div>    

   

    </body>
    
</html>