<?php 
session_start();

    $error = ""; 

if (array_key_exists("submit", $_POST)) {
      $link = mysqli_connect("localhost", "root", "", "clg_minor");
    if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
    if (!$_POST['username']) {
            
            $error .= "A username is required<br>";
            
        }
    if (!$_POST['password']) {
            
            $error .= "Password is required<br>";
            
        }
    if (!$_POST['typeofuser']) {
            
            $error .= "Please select what are you here for<br>";
            
        }
    $query = "SELECT uid FROM `temp` WHERE username = '".mysqli_real_escape_string($link, $_POST['username'])."' LIMIT 1";
                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That username  is taken.";

                }
   
    if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        }
    else {

                    $query ="UPDATE `temp` SET password = '".md5(md5($_SESSION['id']).$_POST['password'])."' WHERE uid = ".$_SESSION['id']." ";
                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later1.</p>";

                    } 
                
                    $query ="UPDATE `temp` SET username = '".$_POST['username']."' WHERE uid = ".$_SESSION['id']." ";
                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later2.</p>";

                    } 
                     $query ="UPDATE `temp` SET typeofuser = '".$_POST['typeofuser']."' WHERE uid = ".$_SESSION['id']." "; 
                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later3.</p>";

                    } 
        
                       
                    else {
                         header("Location: verifyemail.php");                       
                       

                            
                        
                    }
    }

    
}
  
    ?>
 <script>

$(document).ready(function() {
   var referrer =  document.referrer;
           if(!(referrer=="http://localhost/clgMinor/signUP.php")){
                header("location:landing.php");
           }
            });
</script>
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
            .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
                            background-color:#ffc107 !important;
                    }

.custom-checkbox .custom-control-input:checked:focus ~ .custom-control-label::before {
                            box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(255, 193, 7, 0.25)
                    }
.custom-checkbox .custom-control-input:focus ~ .custom-control-label::before {
                            box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem rgba(0, 0, 0, 0.25)
                    }
.custom-checkbox .custom-control-input:active ~ .custom-control-label::before {
                            background-color: #fce397; 
                    }
            .ut:hover{
                color:white;
                background-color: #ffc108;
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
               width: 700px;
                
                position: relative;
                top:10px;
                
            }
            .jumbotron{
                background-color: #222222;
                margin:0px;
                height:150px;
                
               
               
            }
            #textup{
                position: relative;
                left:30%;
                top:10px;
                font-weight: normal;
                
            }
            .form-control:focus {
                border-color: #FFC107;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 193, 7, 0.6);
                }
        </style>

    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow">
            <div class="container">
                <a class="navbar-brand text-warning " href="#">
                    <h4>ParTimers</h4>
                
                </a>
            </div>
        
 
    
        
        </nav>
        <div class="container "></div>
    <div class="container bg-white border shadow mb-4 " id="center">   
        <h3 id="textup">Complete your profile</h3>
        <?php if(!$error==""){
         echo '<div class="alert alert-danger mt-4" role="alert" id="error">'.$error.'</div>';}
            ?>
         <form method="post" >
            
             <br>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-7 col-form-label">What would you like to be called ?</label>
                <div class="col-sm-5">
                    <input type="text"  class="form-control shadow " name="username"  >
                </div>
             </div>
                <div class="form-group row">
                <label for="staticEmail" class="col-sm-7 col-form-label">Password</label>
                <div class="col-sm-5">
                    <input type="password"  class="form-control shadow " name="password"  >
                </div>
             </div>
                <label>I am here for:</label>
                
                <br>
                <div class="row" >
                    <span class="col-sm-1"></span><span class="btn shadow col-sm-5 ut" id="emp">Hiring a Part timer</span>   <span class="btn shadow col-sm-5 ut" id="pt">Work as a part timer</span><span class="col-sm-1"></span>
                <input type="hidden"  id="typeofuser" name="typeofuser">
                </div>
                
                <br>
                <div class="custom-control custom-checkbox checkbox-warning">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Yes,I Understand and agree to <spam class="text-warning">Part Timers terms of service</spam></label>
                    <br>
                    <br>
                </div>
             <br>
             <button type="submit" class="btn btn-warning btn-block col-sm-3 center"  name="submit" value="submit">Submit</button>
                
  
        </form>
        </div>
        

        <div class="jumbotron jumbotron-fluid  ">
           
    
        </div>    
    <script>
        
        $("#emp").click(function(){
            
            $(this).css("background-color","#ffc107");
            $(this).css("color","white");
            $("#pt").css("background-color","white");
            $("#pt").css("color","black");
            $("#typeofuser").val("employer");
            
            
            
            
        })
        $("#pt").click(function(){
            $(this).css("background-color","#ffc107");
            $(this).css("color","white");
            $("#emp").css("background-color","white");
            $("#emp").css("color","black");
            $("#typeofuser").val("parttimer");
            
            
        })
        
        </script>
       
    </body>
</html>