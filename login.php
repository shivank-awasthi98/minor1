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
        if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
        }
        if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
        }
        else {$query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'OR username= '".mysqli_real_escape_string($link, $_POST['email'])."'";
                
                    $result = mysqli_query($link, $query);
                
                    $row =  mysqli_fetch_array($result);
                
                    if (isset($row)) {
                        
                        $hashedPassword = md5(md5($row['uid']).$_POST['password']);
                        
                        if ($hashedPassword == $row['password']) {
                            
                            $_SESSION['id'] = $row['uid'];
                            
                            if ($_POST['stayLoggedIn'] == '1') {

                                setcookie("id", $row['uid'], time() + 60*60*24*365);

                            } 

                            header("Location: redirect.php");
                                
                        } else {
                            
                            $error = "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
                    
                }
            
        }
        
        
    
        
        

?>
<!doctype html>
<html lang="en">
  <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <style>
          .container{
              
             width: 400px;
              height: 500px;
              position: relative;
              top:180px;
              
          }
          body{
              background-color: #F9F9F9;
          }
          form{
              border:solid 2px #D8DEE2;
              background-color: #FFFFFF;
              border-radius: 5%;
              height: 330px;
              
          }
          
          .form-group{
              width: 300px;
              position: relative;
              left:30px;
              top:20px;
          }
          #signup{
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
           .form-control:focus {
                border-color: #FFC107;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 193, 7, 0.6);
                }
      

      
      
      </style>

       <title>Login</title>
  </head>
  <body>
     <div class="container">
         <div id="uptext" >Login to PartTimers</div>
         <?php if(!$error==""){
         echo '<div class="alert alert-danger " role="alert" id="error">'.$error.'</div>';}
            ?>
         
         
        <form method="post">
           
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
             
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="InputPassword1">Password</label>
            <input type="password" class="form-control" id="Password" placeholder="Password" name="password">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="Check" name="stayLoggedIn" checked>
            <label class="form-check-label" for="Check">Stay logged in</label>
          </div>
            <div class="form-group form-check">
             <input type="hidden" name="signUp" value="0">
          </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning btn-block" id="lgin" name="submit" value="Log In!">Login</button>
            </div>
         </form>
         <div class="form-group" id="signup">
             <label id="label">New here?<a href="signUp.php">Create an account!</a></label>
        </div>
         
      
      </div>

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
      
     
        
  </body>
</html>