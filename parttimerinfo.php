<?php

session_start();

if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}

    $error = ""; 
     $link = mysqli_connect("localhost", "root", "", "clg_minor");
     
 if (array_key_exists("submit", $_POST)) {
            if(!$_POST['educationlevel'])
            {$error .= "Please select a your highest education level<br>";}
        echo $error;
     
            if($error=='')
            {   echo "inside";
                $query="INSERT INTO `skills`( `uid`, `hasskills`, `haseducationlevel`) VALUES (".$_SESSION['id'].",'".mysqli_real_escape_string($link, $_POST['skills'])."','".$_POST['educationlevel']."');";
                echo $query;
               
                
                if(mysqli_query($link,$query)){
                    echo"inside";
                header("location:redirect.php");
                }

            }
            
        }
else{
    echo "out";
}

?>
<html>
    <head>
        <title>Info</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
   
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <style>
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
    <body class='bg-light'>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow">
            <div class="container">
                <a class="navbar-brand text-warning " href="#">
                    <h4>ParTimers</h4>
                
                </a>
            </div>
        </nav>
        <div class='container mt-5 pt-4 pb-4 bg-white shadow border border-white'>
            <?php if(!$error==""){
         echo '<div class="alert alert-danger mt-2" role="alert" id="error">'.$error.'</div>';}
            ?>
        <form actio='parttimer.php' method='post'>
            <div class='row mt-2 pl-2 pr-2'>
            <laber class='col-4 lead '>Highest level of education</laber>
            <select class='form-control col-8' name="educationlevel">
            <option value="postgraduate">Post Graduate</option>
            <option value="undergraduate">Under Graduate</option>
            <option value="highersecondary">12<sup>th</sup></option>
            <option value="seniorsecondary">10<sup>th</sup></option>
            <option selected>Select education level</option>
            </select>
            
            </div>
            <div class='row mt-2 pl-2 pr-2'>
            <label class='col-4 lead'>Skills</label>
            <input type='text' placeholder='Eg Html CSS...'class='form-control col-8' name='skills'>
            <p class='text-muted text-right'>                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add blank spaces between different skills</p>
            </div>
            <div class='row'><div class='col-4 mx-auto mt-3'><button class='btn btn-warning' type='submit' name='submit' value=submit>Submit</button></div></div>
            </form>
        
        
        </div>
        
 
    
        
    </body>
</html>