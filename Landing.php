<?php 
    session_start();
    if (array_key_exists("logout", $_GET)) {
        echo("<script>alert('logged Out')</script>");
        
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";  
        
    } 
    else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) ) {
        
        header("Location: loggedinpage.php");
        
    }
    else{
        
    }
    ?>
<?php session_destroy() ?>
<html>
<head>
    <title>Landing</title>
        
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|ZCOOL+XiaoWei" rel="stylesheet">

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
   
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <style>
       
        nav a{
            color:black;
        }
        nav a:hover{
            color:#ffc107;
        }
        nav a:active{
            color:#ffc107;
        }
        .jumbotron{
            background-image: url(https://images.unsplash.com/photo-1507646227500-4d389b0012be?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1400&q=80);
            height: 540px;
            margin: 5px 0px 60px 0px;
            color:azure;
        }
        #wrk{
            border: 2px solid white;
            color:azure;
        }
        #wrk:hover{
            font-weight: 500;
            text-decoration: none
            
        }
        .card{
            height:250px;
            margin:10px 0px 10px 30px;
            
        }
       
        .bottom{
            background-color: black;
            color: azure;
            margin:0px;
            background-image: url();
                
        }
    
        .cir{
            border-radius: 50%;
            background-color: aqua;
            height:150px;
            width:150px;
            margin-bottom: 20px;
        }    
        .rimg{
            
            width: 170px;
            height: 170px;
            border-radius: 50%;
            
            margin-bottom: 8px;
        }
        .rimg:hover {
                        width:175px;
                        height:175px;
                        
                       
                        border-radius:50%;
}
        
        h1,h2,h3,h4,h5,h6{
            
            font-family:'Roboto Slab';
        }
        p
        {
            font-family: 'ZCOOL XiaoWei', serif;
        }
    
    </style>
    

</head>
<body class="bg-light">
    <!-- navbar -->
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
      
 <li class="nav-item">
                        <a class="nav-link " href="#about"  >How it works </a>
      </li>
 <li class="nav-item">
                        <a class="nav-link " href="#PopularJobs"  >Popular Jobs</a>
      </li>
      
     
         <li class="nav-item">
                        <a class="nav-link " href="#topcategory"  >Few categories</a>
      </li>
       
    </ul>
    
      
      <a href="login.php" class="btn  my-2 my-sm-0" role="button">LogIn</a>
        <a href="signup.php" class="btn  my-2 my-sm-0" role="button" >SignUp</a>
         <a href="Postjob.php" class="btn  my-2 my-sm-0 btn-warning" role="button" >Post a Project</a>
    
    
  </div>
</div>      
</nav>
    
<!-- big picture-->
    <div class="jumbotron">
  <h1 class="display-4">ParTimers</h1>
  <p class="lead">We work so you can work </p>
  <br class="my-4">
    <br>
    <br>
  <a class="btn btn-warning btn-lg" href="Postjob.php" role="button">I Want to Hire</a>
    <a class="btn btn-link btn-lg" href="login.php" role="button" id="wrk">I Want to Work</a>
</div>
    <!-- text -->
<div  id="about">
   
 <div class="container">      
<div class="row">
    <div class="col-sm-6">
    
        <h2> HOW IT WORKS?</h2>
        <p class='text-muted'>FIND...CONNECT...CHOOSE</p>

        <h3>IF YOU'RE HIRING</h3>

        <ol><h5><li> POST YOUR JOB</li></h5>
            <p>It's easy and free, you can do it in minutes. Just describe the work you want. Remember to give details about your job's 5 W's(what, where, when, where, who). Post your job and get started!</p>
            <br>
            <h5><li>FIND YOUR PERFECT FREELANCER</li></h5>
            <p>Find a freelancer you'd love to work with. Browse through bidder's profiles, chat with them. There are a lot of freelancers around the corner, but choose the best for your work. Compare them with their location, rating, skills and budget. Press the __ button  to hire and the freelancer goes to work.</p>
            <br>
            <h5><li>PAY EASILY WHEN YOU'RE SATISFIED</li></h5>
            <p>Pay safely using our Milestone Payment System. Pay your freelancer by hour, day or the fixed price for the complete project. Release payment according to schedule of goals you set.
                Only pay for work you authorize.</p></ol>
            <br>
            <h3>IF YOU'RE FREELANCING</h3>
                <br>
        <ol><h5><li>COMPLETE YOUR PROFILE</li></h5>
            <p>Give your details. Select your skills and expertise. Upload your profile photo.</p><br>
        <h5><li> BROWSE JOBS</li></h5>
            <p>We have jobs for all type of skills. We have 1 day offline jobs too. Just hop on and get started with searching your ideal project. The greater the success on your project, the more likely you are to get hired by clients.</p>
        <br>
        <h5><li> GET YOUR BEST BID</li></h5>
            <p>Write the best pitch possible. Read the project and let your client know why you are the best person for the job they're offering.</p><br>
        <h5><li>WORK EFFICIENTLY AND AND GET PAID</li></h5>
            <p>Get ready to work once you are hired. Use the chat to communicate with your work for the project to be done efficiently. Complete the job and get your payment through our Milestone Payment System.</p><br>    

        </ol> 
    
    
    </div>
    </div>
    </div>
    </div>
    <!-- square -->
    <div class='bg-white border-white'>
    <div class="container " id="PopularJobs">
         <h2 style='font-weight: normal;'>Few of our popular jobs</h2>
      <div class="row">
          <?php 
                           $link = mysqli_connect("localhost", "root", "", "clg_minor");
                            $query="SELECT * FROM jobs ORDER BY id DESC LIMIT 3 ;";
                            $result=mysqli_query($link,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                echo(" <div class="."'card bg-white border-lg border-warning text-dark mb-4' style= 'width: 16rem; height:16rem;'".">
                <div class="."card-body".">
                    <h4 class="."card-title".">".$row['jobtitle']."</h5>
                   <p class='card-text '>".$row['jobdiscription']."</p> 
                   </div>
            </div>");
                            
                            }
                
                ?>
               </div>
    </div>
    </div>
    <!-- circle -->
    
    <div class="container mt-2 mb-2" id="topcategory">
        <h2 style='font-weight: normal;'>Popular Categories</h2>
        <div class="row">
            <div class="col-sm-4">
                
                    <img  src="webcircle1.jpg" class='rimg'>
                       
            </div>
            <div class="col-sm-4">
                <img src="webcircle1.jpg" class="rimg">
            </div>
            <div class="col-sm-4">
                <img src="webcircle1.jpg" class="rimg">
            </div>
  
  
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="webcircle1.jpg" class="rimg">
            </div>
            <div class="col-sm-4">
               <img src="webcircle1.jpg" class="rimg">
            </div>
            <div class="col-sm-4">
               <img src="webcircle1.jpg" class="rimg">
            </div>
  
  
        </div>
    </div>
    
    

<!-- footer -->
<div class="jumbotron jumbotron-fluid bottom" class='footer'>
  <div class="container text-white">
   
      <ul>
          <li><strong>Parttimers</strong></li>
          <li>Post job</li>
          <li>log-in </li>
          <li>SignUp</li>
          
            
          
      </ul>
  </div>
</div>    
    
    
</body >
</html>