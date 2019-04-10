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
        <title class="bg-warning">Part Timer</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
   
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <style>
            .dropdown-menu:before {
                    content:"";
                    position: absolute;
                    
                    top: -10px;
                   
                    border-style: solid;
                    
                    border-width: 0px 10px 10px 10px;
                    border-color: gainsboro transparent ;
                    
                    }
            .container a:hover{
                color: #ffc107
            }
            html{
                border:0px;
                margin: 0px;
            }
         body{
             height: 100%;
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
            .form-control:focus {
                border-color: #FFC107;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 193, 7, 0.6);
                }
            .custom-file-label:focus{
                border-color: #FFC107;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 193, 7, 0.6);
                
                
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
                        <div class="dropdown" style="a:hover{color:#ffc107}"><a class="nav-link dropdown" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jobs</a>
                          
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="myjobsparttimer.php">My Jobs</a>
                                <a class="dropdown-item" href="searchjob.php">Search jobs</a>
                               
                              </div>
                            </div>
                      </li>
                      <li class="nav-item">
                        <div class="dropdown"><a class="nav-link" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Skills</a>
                          
                              
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php echo('<a class="dropdown-item" href="resume.php?id='.($_SESSION['id']).'">View my resume</a>');?>
                                <a class="dropdown-item" href="#"data-toggle="modal" data-target="#skillmodal">Add new skill</a>
                               
                              </div>
                            </div>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link " href="#" data-toggle="modal" data-target="#messagemodal"  >Messages</a>
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
                
                <h4 class=lead>New Jobs</h4>
                 <table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Job Title</th>
                      <th scope="col">Category</th>
                      <th scope="col">Total Bids</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php 
                           
                            $query="SELECT * FROM jobs ORDER BY id DESC LIMIT 3;";
                            $result=mysqli_query($link,$query);
                           $sno=0; while($row=mysqli_fetch_assoc($result)){$sno=$sno+1;
                                $query1="SELECT bidon FROM bids WHERE bidon=".$row['id'].";";
                               
                            $result1=mysqli_query($link,$query1);
                             if(mysqli_num_rows($result1)>0)   {$row1=mysqli_num_rows($result1);   
                                                               }
                            else
                            { $row1=0;}
                            
                                                                          
                                                                           
                                                                           
                                echo("<tr>
                    <th scope="."row".">".$sno."</th>
                    <td><a href='jobview.php?id=".$row['id']."'class='text-dark text-decoration-none'>".$row['jobtitle']."</a> </td>
                    <td>".$row['category']."</td>
                    <td><p class='badge badge-warning text-wrap pl-4 pr-2' >".$row1."</p></td>
                </tr>");
                            
                            }
                
                ?>
                </tbody>
            </table>
           <h3 class=lead>Current Jobs</h3>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid ">
           
    
        </div>    
   <div class="modal fade" id="skillmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      
    <div class="modal-content">
        <form action=indexofparttimer.php method="post">
      <div class="modal-header">
          
        <h5 class="modal-title" id="exampleModalLabel">New Skills</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          
              <div ><label class='mx-auto'>What is your new skill ?</label></div>
                <div class='mx-auto'><input class='form-control' type=text name="newskill"></div>
          
      </div>
      <div class="modal-footer">
        
        <button  class="btn btn-warning" type="submit" value="submit" name='submit' data-dismiss="modal">Save changes</button>
      </div>
          </form>
  </div>
</div>
        </div>
    <div class="modal fade" id="messagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      
    <div class="modal-content">
        <form action=indexofparttimer.php method="post">
      <div class="modal-header">
          
        <h5 class="modal-title" id="exampleModalLabel">New Skills</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div ><label class='mx-auto'>What is your new skill type ?</label></div>
                <div class='mx-auto'><select class='form-control' id="newskilltype"><option value="frontend">Frontend</option>
                                                                <option value="backend">Backend</option>
                                                                <option value="otherskill">Other</option></select></div>
              <div ><label class='mx-auto'>What is your new skill ?</label></div>
                <div class='mx-auto'><input class='form-control' type=text name="newskill" id="newskill1"></div>
          
      </div>
      <div class="modal-footer">
        
        <button  class="btn btn-warning"  name='submit' data-dismiss="modal" onclick="addskill()">Save changes</button>
      </div>
          </form>
  </div>
</div>
        </div>
       <script>
        function addskill(){
          var skilltype=$("#newskilltype").val();
        var skillname=$("#newskill1").val();
            alert(skilltype);
            <?php
            $skilltype='skilltype';
            $skillname ='skillname';

            $query34="UPDATE parttimerinfo SET frontendskills="
            

            
            ?>  }
        
        
           
        
        </script>
    </body>
    
</html>