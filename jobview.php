<?php
session_start();
if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}
$link = mysqli_connect("localhost", "root", "", "clg_minor");
?>

<html class="w-100 h-100">
    <head>
        <title>SignedUp</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
   
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <style>
            nav a:hover{
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
            #stbj{
                width:600px;
                height:60px;
                position: absolute;
                top:190px;
                left:320px;
                line-height: 60px;
                font-size: 150%;
                font-weight:100;
                 
            }
            #sbj{
                width:150px;
                height:66px;
                
                font-size: 180%;
                font-weight:bolder;
                position: absolute;
                top:280px;
                left:530px;
            }
            .form-control-range{
                width:340px;
                
            }
            #textInput{
                position: relative;
                left:660px;
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
if (isset($_GET['id'])) {
    $query="SELECT * FROM jobs WHERE id=".$_GET['id'].";";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_assoc($result);
   
}else{
    header("location:indexforpartimer.php");
}?>

        <div class="card text-center mt-5">
              <div class="card-header bg-white text-warning">
                <h4><?php echo($row['budget']) ?></h4>
              </div>
              <div class="card-body">
                <h3 class="card-title"><?php echo($row['jobtitle']) ?></h3>
                <p class="card-text"><?php echo($row['jobdiscription']) ?></p>
                  <?php $query3="SELECT typeofuser FROM users WHERE uid=".$_SESSION['id']."";
                   
                  $result3=mysqli_query($link,$query3);
                    
                    $row3 = mysqli_fetch_assoc($result3);
                    
    
                    if(!($row3['typeofuser']=='employer')){ ?>
                 
                      <?php 
                        $query5="SELECT * FROM bids WHERE bidby=".$_SESSION['id']." AND bidon=".$row['id']."";
                        
                        $result5= mysqli_query($link,$query5);
                        $num3=0;
                        $num3= mysqli_num_rows($result5);           
                        if($num3>0){
                            $query6="SELECT * FROM hire WHERE hired=".$_SESSION['id']." AND hiredfor=".$row['id']."";
                            
                                $result6=mysqli_query($link,$query6);
                                $row6=mysqli_fetch_assoc($result6);
                               
                                
                            
                        if($row6['Id']>0){  $query9="SELECT * FROM finishedjobs WHERE finishedjob=".$_GET['id']." " ;
                            
                             $result9=mysqli_query($link,$query9);
                                          if (mysqli_num_rows($result9)>0){ ?><div class='container mt-4'> <div class='card text-dark bg-white border border-warning mb-3 mx-auto'>
  
                                    <div class='card-body'>
                                    <h5 class='card-title'>Job Completed</h5>
                                    <p class='card-text'>Please wait as your payment arrives</p>
                                  </div>
                                </div> </div> <?php } else{ ?> <a href="finishjob.php?id=<?php echo $row6['Id'] ?>" class="btn btn-warning mx-auto">Finish Job</a><?php }}
                        else { ?>
                      <button class="btn btn-warning mx-auto pr-3 disabled" type="submit" disabled>Bid</button>
                      <?php 
                        }
                        }
                    else
                    {?> <form class='form-inline ' method="post" action=bid.php>
                      
                      
                  
                <input type="hidden" name='bidon' value="<?php echo $row['id']; ?>">
                <input type="hidden" name='bidby' value="<?php echo $_SESSION['id']; ?>">
                      <?php if($row['budget']=='basic'){?>
                      <input type="range" name="rangeInput" min="800" max="1500" class='form-control-range mx-auto' onchange="updateTextInput(this.value);">
                      <?php }
                        else{?>
                  
                      <input type="range" name="rangeInput" min="1500" max="5000" class='form-control-range mx-auto' onchange="updateTextInput(this.value);">
                      <?php } ?>
                      <input type="text" id="textInput" class='form-control-plaintext mx-auto' value="Rs" readonly>
                    <button class="btn btn-warning mx-auto pr-3" type="submit" >Bid</button>
                      <?php }?>
                  </form>
                 
              </div>
              <div class="card-footer bg-white text-warning">
                <?php $query1="SELECT  id  FROM bids WHERE bidon=".$row['id'].";";
                    $result1=mysqli_query($link,$query1);
                    if(mysqli_num_rows($result1)>0){$num=mysqli_num_rows($result1);}
                    else
                    {$num=0;}
                    echo("<p class='badge badge-warning text-wrap pl-3 pr-2'>".$num."</p>");?>
              </div>
        </div>
        <?php }
        else 
                     { 
                        $query7="SELECT * FROM hire WHERE hiredfor = ".$_GET['id']." " ;
                        
                        $result7=mysqli_query($link,$query7);
                         
                       
                        if(mysqli_num_rows($result7)>0)
                        {   $query9="SELECT * FROM finishedjobs WHERE finishedjob=".$_GET['id']." " ;
                            
                             $result9=mysqli_query($link,$query9);
                         if (mysqli_num_rows($result9)>0)
                        {
                            echo"</div><a href class='btn btn-warning mx-auto'>Pay</a></div>";
                        }
                          else{  $row7=mysqli_fetch_assoc($result7);
                            $query8="SELECT username FROM users WHERE uid=".$row7['hired']." ";
                            $result8=mysqli_query($link,$query8);
                            $row8=mysqli_fetch_assoc($result8);
                            echo"</div></div>";
                            echo"<div class='container mt-4'> <div class='card text-dark bg-white border border-warning mb-3 mx-auto'>
  
                                    <div class='card-body'>
                                    <h5 class='card-title'>Hired ".$row8['username']."</h5>
                                    <p class='card-text'>Sit back and relax as our parttimer works hard on your project</p>
                                  </div>
                                </div> </div>";}

                            
                        }
                       
                       
                       
                            
                        else{
                            echo"</div></div>";
                            $query2="SELECT * FROM bids WHERE bidon=".$row['id']."";
                            $result1= mysqli_query($link,$query2);
                            echo(" </div></div><div class='mt-4'><table class='table'>
                                <thead class='thead-dark'>
                                <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Username</th>
                                <th scope='col'>Bid amount</th>
                                <th scope='col'>hire</th>
                                </tr>
                                </thead>
                                <tbody>");
                            $sno=0;
                            while($row3=mysqli_fetch_assoc($result1)){
                                $sno=$sno+1;
                                
                            echo("<tr>
                                <th scope="."row".">".$sno."</th>
                                <td>".$row3['biddername']."</a> </td>
                                <td>Rs.".$row3['bidammount']."</td>
                                <td><a href='hire.php?id=".$row3['Id']."' class='btn btn-warning'>Hire</a></td>
                                </tr>");
                            }
                            echo("</tbody></table></div>");
                     }
        }?>
       <footer class="footer bg-dark">
      <div class="container bg-dark">
        <span class="text-muted"></span>
      </div>
    </footer>
    <script>
        function updateTextInput(val) {
          document.getElementById('textInput').value='Rs '+val; 
        }
        
        </script>
   
        
    </body>
    
</html>