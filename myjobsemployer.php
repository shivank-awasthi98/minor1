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
                                <a class="dropdown-item disabled" href="myjobsemployer.php">My Jobs</a>
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
    <table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">JobTitle</th>
                      <th scope="col">Category</th>
                      <th scope="col">TotalBids</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                           
                            $query="SELECT * FROM jobs WHERE pid=".$_SESSION['id']." LIMIT 3;";
                            $result=mysqli_query($link,$query);
                   
                           $sno=0; 
                    while($row=mysqli_fetch_assoc($result))
                    {$sno=$sno+1;
                    $query1="COUNT('id') FROM bids WHERE bidon=".$row['id'].";";
                    $result1=mysqli_query($link,$query1);
                    echo("<tr>
                        <th scope="."row".">".$sno."</th>
                        <td><a href='jobview.php?id=".$row['id']."'class='text-dark text-decoration-none'>".$row['jobtitle']."</a> </td>
                        <td>".$row['category']."</td>
                        <td>.$result1.</td>
                        </tr>");
                    
                            }
                
                ?>
                </tbody>
            </table>

    </body>

</html>