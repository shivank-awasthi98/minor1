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
                position: relative;
                left:500px;
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
                <a class="navbar-brand text-warning " href="#">
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
                  <form class='form-inline ' method="post" action=bid.php>
                      <?php if($row['budget']=='basic'){?>
                      <input type="range" name="rangeInput" min="800" max="1500" class='form-control-range' onchange="updateTextInput(this.value);">
                      <?php }
                        else{?>
                      <input type="range" name="rangeInput" min="Rs1500" max="Rs5000" class='form-control-range' onchange="updateTextInput(this.value);">
                      <?php } ?>
                      
                  <input type="text" id="textInput" class='form-control-plaintext' value="Rs" readonly>
                <input type="hidden" name='bidon' value="<?php echo $row['id']; ?>">
                <input type="hidden" name='bidby' value="<?php echo $_SESSION['id']; ?>">
                    <button class="btn btn-warning" type="submit">Bid</button>
                  </form>
                 
              </div>
              <div class="card-footer bg-white text-warning">
                <?php $query1="COUNT('id') FROM bids WHERE bidon=".$row['id'].";";
                    $result1=mysqli_query($link,$query1);
                    echo($result1);?>
              </div>
        </div>
        <?php }
        else 
                     {      echo"</div></div>";
                            $query2="SELECT * FROM bids WHERE bidon=".$row['id']."";
                            $result1= mysqli_query($link,$query2);
                            echo(" <div class='mt-4'><table class='table'>
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
                            while($row=mysqli_fetch_assoc($result1)){
                                $sno=$sno+1;
                                
                            echo("<tr>
                                <th scope="."row".">".$sno."</th>
                                <td>".$row['bidby']."</a> </td>
                                <td>Rs.".$row['bidammount']."</td>
                                <td><button class='btn btn-warning'>Hire</button></td>
                                </tr>");
                            }
                            echo("</tbody></table></div>");
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