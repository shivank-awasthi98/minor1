<?php 
 session_start();
if(array_key_exists('id',$_SESSION))
{
    header("location:redirect.php");
}


    $error = "";    
if (array_key_exists("submit", $_POST)) {
    $link = mysqli_connect("localhost", "root", "", "clg_minor");
    if (mysqli_connect_error()) {
            
            die ("Database Connection Error");
            
        }
    if (!$_POST['email']) {
            
            $error .= "An email address is required<br>";
            
        }
    if (!$_POST['firstname']) {
            
            $error .= "First name is required<br>";
            
        }
    if (!$_POST['lastname']) {
            
            $error .= "Last name is required<br>";
            
        }
    if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        } else {
                 $query = "SELECT uid FROM `temp` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                }
                else {

                    $query = "INSERT INTO `temp` (`firstname`,`lastname`, `email`) VALUES ('".mysqli_real_escape_string($link, $_POST['firstname'])."', '".mysqli_real_escape_string($link, $_POST['lastname'])."', '".mysqli_real_escape_string($link, $_POST['email'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {
                            
                       

                        
                        $query1 = "SELECT uid FROM `temp` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                         $result=mysqli_query($link, $query1);
                        $row=mysqli_fetch_array($result);
                        

                        $_SESSION['id'] = $row['uid'];
                        echo("alert(".$_SESSION['id'].")");

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("id", $_SESSION['id'], time() + 60*60*24*365);

                        } 

                        header("Location: signinpage.php");

                    }

                } 
    }
}
            



?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <?php include("logheader.php")?>
      <style>
          
           .form-control:focus {
                border-color: #FFC107;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 193, 7, 0.6);
                }
          .container{
              
             width: 400px;
              height: 500px;
              position: relative;
              top:180px;
              
          }
          body{
              background-color: #F9F9F9;
          }
          
          .form-group{
              width: 300px;
              position: relative;
              left:30px;
              top:20px;
          }
          #login{
              position: relative;
              left: -0px;
              border:solid 2px #D8DEE2;
              border-radius: 5%;
              width:370px;
              height:50px;
          }
          #label{
              position: relative;
              left:40px;
              top:10px;
          }
          #uptext{
              text-align: center;
              font-size: 150%;
              font-weight: lighter;
              position: relative;
              top:-50px;
          }
          #rc{
              border-radius: 5%;
              background-color: #FFFFFF;
          }
      

      </style>

    <title>SignUp</title>
  </head>
  <body>
     

 <div class="container">
     <div id="uptext" >SignUp to PartTimers</div>
      <?php if(!$error==""){
         echo '<div class="alert alert-danger" role="alert" id="error">'.$error.'</div>';}
            ?>
     <div class="shadow" id="rc">
    <form method="post" >
          <div class="form-group ">
            <label >Your name</label>
            <div class="row">
               
                <div class="col">
                  <input type="text" class="form-control" placeholder="First name" name="firstname">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name" name="lastname">
                </div>
            </div>
            
          </div>
         
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control"  placeholder="Email" name="email" autocomplete="off">
          </div>
         
          <div class="form-group">

            <input type="hidden" name="signUp" value="1">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="stayLoggedIn" checked>
            <label class="form-check-label" for="exampleCheck1" ><strong>Stay Logged In</strong></label>
          </div>
            <div class="form-group">
             <button type="submit" class="btn btn-warning btn-block"  name="submit" value="Sign Up!">SignUp</button>
           </div>
        </form>
     </div>
         <div class="form-group shadow" id="login">
             <label id="label">Already a member?<a href="login.php">Log In!</a></label>
        </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>