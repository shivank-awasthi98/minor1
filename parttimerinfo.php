<?php

session_start();

if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}

    $error = ""; 
     $link = mysqli_connect("localhost", "root", "", "clg_minor");
     
 if (array_key_exists("submit", $_POST)) {
     
     $query="SELECT * FROM users WHERE id=".$_SESSION['id']."";
     $result= mysqli_query($link,$query);
     $row=mysqli_fetch_assoc($result);
     $query2="INSERT INTO `parttimerinfo`(`uid`, `name`, `lastname`, `username`, `shortdiscription`, `parttimerdiscription`, `job1tite`, `job1role`, `job1discription`, `job1skills`, `job2title`, `job2role`, `job2discription`, `job2skills`, `job3title`, `job3role`, `job3discription`, `job3skills`, `frontendskills`, `backendskills`, `otherskills`, `achivements`, `educationlevel1`, `from1`, `starton1`, `finishedon1`, `educationlevel2`, `from2`, `starton2`, `finishedon2`, `phone`, `github`, `linkedin`, `website`, `hobbie1`, `hobbie2`, `hobbie3`) VALUES ('".$row['uid']."','".$row['firstname']."','".$row['lastname']."','".$row['email']."','".mysqli_real_escape_string($link, $_POST['shortdiscription'])."','".mysqli_real_escape_string($link, $_POST['parttimerdiscription'])."','".mysqli_real_escape_string($link, $_POST['job1title'])."','".mysqli_real_escape_string($link, $_POST['job1role'])."','".mysqli_real_escape_string($link, $_POST['job1description'])."','".mysqli_real_escape_string($link, $_POST['job1skills'])."','".mysqli_real_escape_string($link, $_POST['job2title'])."','".mysqli_real_escape_string($link, $_POST['job2role'])."','".mysqli_real_escape_string($link, $_POST['job1description'])."','".mysqli_real_escape_string($link, $_POST['job2skills'])."','".mysqli_real_escape_string($link, $_POST['job3title'])."','".mysqli_real_escape_string($link, $_POST['job3role'])."','".mysqli_real_escape_string($link, $_POST['job1description'])."','".mysqli_real_escape_string($link, $_POST['job3skills'])."','".mysqli_real_escape_string($link, $_POST['frontendskills'])."','".mysqli_real_escape_string($link, $_POST['backendskills'])."','".mysqli_real_escape_string($link, $_POST['otherskills'])."','".mysqli_real_escape_string($link, $_POST['achivements'])."','".mysqli_real_escape_string($link, $_POST['educationlevel1'])."','".mysqli_real_escape_string($link, $_POST['from1'])."','".mysqli_real_escape_string($link, $_POST['startedon1'])."','".mysqli_real_escape_string($link, $_POST['finishedon1'])."','".mysqli_real_escape_string($link, $_POST['educationlevel2'])."','".mysqli_real_escape_string($link, $_POST['from2'])."','".mysqli_real_escape_string($link, $_POST['startedon2'])."','".mysqli_real_escape_string($link, $_POST['finishedon2'])."','".mysqli_real_escape_string($link, $_POST['phone'])."','".mysqli_real_escape_string($link, $_POST['github'])."','".mysqli_real_escape_string($link, $_POST['linkdin'])."','".mysqli_real_escape_string($link, $_POST['website'])."','".mysqli_real_escape_string($link, $_POST['hobbie1'])."','".mysqli_real_escape_string($link, $_POST['hobbie2'])."','".mysqli_real_escape_string($link, $_POST['hobbie3'])."')";
     echo $query2;
       if(!mysqli_query($link,$query2)){
           echo mysqli_error($link);
        
       } 
     else {
         header('location:indexofpartimer.php ');
     }
     
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
                <a class="navbar-brand text-warning " href="landing.php?logout=1">
                    <h4>ParTimers</h4>
                
                </a>
            </div>
        </nav>
        <div class='container mt-5 pt-4 pb-4 bg-white shadow border border-white'>
            <?php if(!$error==""){
         echo '<div class="alert alert-danger mt-2" role="alert" id="error">'.$error.'</div>';}
            ?>
        <form actio='parttimer.php' method='post'>
            <? echo $_SESSION['id']?>
            <input type=hidden value="<?php echo $_SESSION['id'];?>" name='id'>
            <div id='about' class="pl-4 pr-4">
                <div class=row>
                <label for=shortdiscription class='lead col mb-3'>Define your work in max four words</label>
                    <input type="text" size="4" name='shortdiscription' class="form-control col mb-3" required></div>
                <div class=row><label for="parttimerdiscription" class="lead col mb-3">Describe Yourself</label>
                    <textarea class="form-control col mb-3" name="parttimerdiscription" required></textarea></div>
            <div class=row><div class=mx-auto><p class="mx-auto btn btn-warning mb-3" id='wr1btn'>Next</p></div></div>
            </div>
            <div id='workexp'  class="pl-4 pr-4">
            <div class=row>    
            <label for="job1title" class="lead col mb-3">Job Title</label>
            <input type=text placeholder="Title" name='job1title' class="form-control col mb-3">
            </div>
            <div class=row><label for="job1role" class="lead mb-3 col">Job role</label>
            <input type=text placeholder="Role" name='job1role' class="form-control col mb-3" value="">
                </div>
            <div class=row>
            <label for="job1discription" class="lead col mb-3">Job description</label>
            <textarea name="job1description" class="form-control col mb-3"></textarea>
                </div>
            <div class=row>    
            <label for="job1skills" class="lead col mb-3">Skills used</label>
            <input type=text placeholder="Skill1 Skill2 ..etc" name='job1skills' class="form-control col mb-3">
                </div>    
             <div class=row><div class="col ml-5 mr-5 mb-4"><button class=" btn btn-warning ml-5 " id='wr2btn'>Add another</button></div><div class="ml-4 col"><button class=" btn btn-warning ml-5 sklbtn " >Done</button></div>
                </div>
            </div>
            <div id='workexp2'  class="pl-4 pr-4">
            <div class=row>    
            <label for="job2title" class="lead col mb-3">Job Title</label>
            <input type=text placeholder="Title" name='job2title' class="form-control col mb-3">
            </div>
            <div class=row><label for="job2role" class="lead mb-3 col">Job role</label>
            <input type=text placeholder="Role" name='job2role' class="form-control col mb-3">
                </div>
            <div class=row>
            <label for="job2discription" class="lead col mb-3">Job description</label>
            <textarea name="job2description" class="form-control col mb-3"></textarea>
                </div>
            <div class=row>    
            <label for="job2skills" class="lead col mb-3">Skills used</label>
            <input type=text placeholder="Skill1 Skill2 ..etc" name='job2skills' class="form-control col mb-3">
                
                </div>
                <div class="mb-4 row"><div class="col ml-5 mr-5"><button class=" btn btn-warning ml-5 " id='wr3btn'>Add another</button></div><div class="ml-4 col"><button class=" btn btn-warning ml-5 sklbtn " >Done</button></div>
                </div>
            </div>
            <div id='workexp3'  class="pl-4 pr-4">
            <div class=row>    
            <label for="job3title" class="lead col mb-3">Job Title</label>
            <input type=text placeholder="Title" name='job3title' class="form-control col mb-3" >
            </div>
            <div class=row><label for="job3role" class="lead mb-3 col">Job role</label>
            <input type=text placeholder="Role" name='job3role' class="form-control col mb-3" >
                </div>
            <div class=row>
            <label for="job3discription" class="lead col mb-3">Job description</label>
            <textarea name="job3description" class="form-control col mb-3" ></textarea>
                </div>
            <div class=row>    
            <label for="job3skills" class="lead col mb-3">Skills used</label>
            <input type=text placeholder="Skill1 Skill2 ..etc" name='job3skills' class="form-control col mb-3" >
                </div>
                 <div class=row><div class=mx-auto><button class="mx-auto btn btn-warning mb-3 sklbtn" >Next</button></div>
                </div>
            
            </div>
            <div id='skills'  class="pl-4 pr-4">
            <div class=row>    
                <label for=frontendskills class="lead col mb-3">Frontend Skills</label>
                <input class="form-control col mb-3" name="frontendskills" placeholder="Frontend skills">
            </div>  
             <div class=row>    
                <label for=backendskills class="lead col mb-3">Backend Skills</label>
                <input class="form-control col mb-3" name="backendskills" placeholder="Backend skills">
            </div>
            <div class=row>    
                <label for=otherskills class="lead col mb-3">Other Skills</label>
                <input class="form-control col mb-3" name="otherskills" placeholder="Other skills">
            </div>
                 <div class=row><div class=mx-auto><button class="mx-auto btn btn-warning mb-3" id="achbtn">Next</button></div>
                </div>
            </div>
            <div id="achivement"   class="pl-4 pr-4">
                <p class="text-center   display-4"><strong>Achivements</strong></p>
            <textarea class="form-control mx-auto w-50 h-25" name="achivements"></textarea>
             <div class=row><div class=mx-auto><button class="mx-auto btn btn-warning mb-3 mt-3" id="edubtn">Next</button></div>
                </div>
            </div>
            <div id=education   class="pl-4 pr-4">
                <p class="lead dispaly-6"><strong>Highest Education level</strong></p>
            <div class='row'> <select class='form-control col mb-3 mr-2' name="educationlevel1">
            <option value="postgraduate">Post Graduate</option>
            <option value="undergraduate">Under Graduate</option>
            <option value="highersecondary">12<sup>th</sup></option>
            <option value="seniorsecondary">10<sup>th</sup></option>
            <option selected>Select education level</option>
            </select>
            <input type=text name="from1" palceholder="Univercity/School name" class="form-control col mb-3 mr-2">
            <input type=date name="startedon1" palceholder="From" class="form-control col mb-3 mr-2">
            <input type=date name="finishedon1" palceholder="Till" class="form-control col mb-3 mr-2">
                </div>
                <p class="lead dispaly-6"><strong>Second-Highest Education level</strong></p>
            <div class='row'> <select class='form-control col mb-3 mr-2' name="educationlevel2">
            <option value="postgraduate">Post Graduate</option>
            <option value="undergraduate">Under Graduate</option>
            <option value="highersecondary">12<sup>th</sup></option>
            <option value="seniorsecondary">10<sup>th</sup></option>
            <option selected>Select education level</option>
            </select>
            <input type=text name="from2" palceholder="Univercity/School name" class="form-control col mb-3 mr-2">
            <input type=date name="startedon2" palceholder="From" class="form-control col mb-3 mr-2">
            <input type=date name="finishedon2" palceholder="Till" class="form-control col mb-3 mr-2"></div>
            <div class='row'></div>
             <div class=row><div class=mx-auto><button class="mx-auto btn btn-warning mb-3" id="cntbtn">Next</button></div>
                </div>
            </div>
            
            <div id="contactinfo"class="pl-4 pr-4 "  >
            <div class=row>
            <label for="phone" class='lead col mb-3'>Enter your phone number:</label>
            
                <input class="form-control mx-auto col mb-3" type="tel" id="phone" name="phone"
                        pattern="[0-9+]{3}-[0-9]{3}-[0-9]{4}"
                       placeholder='Format: 123-456-7890'
                        required>
                </div>
                <div class=row>
                <label class="lead col mb-3" for="url">Github account link:</label>

                <input type="url" name="github" id="url"
                    placeholder="github.com/username"
                    pattern="https://.*" size="30"
                    class="form-control col mb-3">
                </div>
                <div class=row>
                <label for="url" class="lead col mb-3">Linkdin account link:</label>

                <input type="url" name="linkdin" id="url"
                    placeholder="linkedin.com/in/username"
                    pattern="https://.*" size="30"
                    class="form-control col mb-3">
                </div>
                <div class=row>
                <label for="url" class="lead col mb-3">Your website (if any):</label>

                <input type="url" name="website" id="url"
                    placeholder="https://example.com"
                    pattern="https://.*" size="30"
                    class="form-control col mb-3">
                </div>
                <div class=row><div class=mx-auto><button class="mx-auto btn btn-warning mb-3" id="intbtn">Next</button></div>
                </div></div>
            

               <div id="intrest" class="pl-4 pr-4"  >
                   <p class="display-4 text-center mb-3"><strong>Hobbies</strong></p>
                       <input class="form-control mx-auto w-25 mb-3" name="hobbie1" placeholder="Hobbie 1..">
                       <input class="form-control mx-auto w-25 mb-3" name="hobbie2" placeholder="Hobbie 2..">
                       <input class="form-control mx-auto w-25 mb-3" name="hobbie3" placeholder="Hobbie 2..">
                       
                       
                   <div class=row><div class=mx-auto><button class="mx-auto btn btn-warning mb-3" id="finbtn">Next</button></div>
                </div>      
            </div>


             
            <div class='row' id='submit'><div class='mx-auto mt-3'><button id='submit'class='btn btn-warning' type='submit' name='submit' value=submit>Submit</button></div> </div>
            
            </form>
        
        
        </div>
        
 <script>
        
      $(function() {
          
          $('#about').fadeOut('fast');
         
        $('#workexp').fadeOut();
          
     $('#workexp2').fadeOut();
          
     $('#workexp3').fadeOut();
    $('#skills').fadeOut();
    $('#education').fadeOut();
    $('#achivement').fadeOut();
    $('#contactinfo').fadeOut();
    $('#intrest').fadeOut();
          $('#submit').fadeOut();
    $('#about').fadeIn();
    $('#wr1btn').click(function(){
        $('#wr1btn').css('display','none');
        $('#about').fadeOut('fast');
        $('#workexp').fadeIn('slow');
    })
    $('#wr2btn').click(function(){
        $('#wr2btn').css('display','none');
        $('#workexp').fadeOut('fast');
        $('#workexp2').fadeIn('slow');
    })
    $('#wr3btn').click(function(){
        $('#wr3btn').css('display','none');
        $('#workexp2').fadeOut('fast');
        $('#workexp3').fadeIn('slow');
    })
    $('.sklbtn').click(function(){
         $('#wr1btn').css('display','none');
         $('#wr2btn').css('display','none');
         $('.sklbtn').css('display','none');
         $('#wr3btn').css('display','none');
        $('#workexp2').fadeOut('fast');
        $('#workexp').fadeOut('fast');
        $('#workexp3').fadeOut('fast');
        $('#skills').fadeIn('slow');
    })
          $('#achbtn').click(function(){
         $('#achbtn').css('display','none');
        $('#skills').fadeOut('fast');
        $('#achivement').fadeIn('slow');
    })
           $('#edubtn').click(function(){
         $('#edubtn').css('display','none');
        $('#achivement').fadeOut('fast');
        $('#education').fadeIn('slow');
    })
        $('#cntbtn').click(function(){
        $('#cntbtn').css('display','none');
        $('#education').fadeOut('fast');
        $('#contactinfo').fadeIn('slow');
    })
           $('#intbtn').click(function(){
         $('#intbtn').css('display','none');
        $('#contactinfo').fadeOut('fast');
        $('#intrest').fadeIn('slow');
    })
       
           $('#finbtn').click(function(){
      
       $('#about').fadeIn('fast');
          $('#finbtn').css('display','none');
        $('#workexp').fadeIn();
          
     $('#workexp2').fadeIn();
          
     $('#workexp3').fadeIn();
    $('#skills').fadeIn();
    $('#education').fadeIn();
    $('#achivement').fadeIn();
    $('#contactinfo').fadeIn();
    $('#intrest').fadeIn();
     $('#submit').fadeIn();          

    })
         
          
          
          });
     
        
        </script>
    
        
    </body>
</html>