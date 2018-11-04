<?php
session_start();
require_once 'include/class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
  $user->redirect('wallet.php');
}

if(isset($_POST['btn-submit']))
{
  $email = $_POST['txtemail'];
  
  $stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE UserEmail=:email LIMIT 1");
  $stmt->execute(array(":email"=>$email));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);  
  if($stmt->rowCount() == 1)
  {
    $id = base64_encode($row['userID']);
    $code = md5(uniqid(rand()));
    
    $stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE UserEmail=:email");
    $stmt->execute(array(":token"=>$code,"email"=>$email));
    
    $message= "
           Hello , $email
           <br /><br />
           We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
           <br /><br />
           Click Following Link To Reset Your Password 
           <br /><br />
           <ahttp://84.201.37.11/workspace/Bitcrownd/Bitcrownd.com/recovery.php?id=$id&code=$code'>click here to reset your password</a>
           <br /><br />
           thank you :)
           ";
    $subject = "Password Reset";
    
    $user->send_mail($email,$message,$subject);
    
    $msg = "<div class='alert alert-success'>
          <button class='close' data-dismiss='alert'>&times;</button>
          We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
          </div>";
  }
  else
  {
    $msg = "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>  this email not found. 
          </div>";
  }
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bitcrownd :: Sign In</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="static/css/style.css">

  
</head>

<body>
		     <br>
	     <center><img src="static/public/images/logo.png" alt="Logo" height="200" width="180"></center>  
	          <br>
  <div class="form">
        <div id="login">   
          <h1>Reset your Password</h1>
          
          <form method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="txtemail"/>
          </div>
          
          <button class="button button-block" name="btn-submit" id="btn-submit"/>Recovery</button>
              <p><a href="index.php">Go Back</a></p>
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="static/js/index.js"></script>

</body>
</html>
