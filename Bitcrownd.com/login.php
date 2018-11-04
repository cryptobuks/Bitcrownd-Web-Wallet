<?php
session_start();
require_once 'include/class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('wallet.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('wallet.php');
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
          <h1>Welcome to Bitcrownd</h1>
          
          <form method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="txtemail" id="txtemail" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"  name="txtupass" id="txtupass" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="recovery.php">Forgot Password?</a></p>
          <button class="button button-block" name="btn-login" id="btn-login"/>Log In</button>
                          <p><a href="index.php">Go Back</a></p>

          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="static/js/index.js"></script>

</body>
</html>
