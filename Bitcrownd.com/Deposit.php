<?php
require_once'include/auth.php';
if($Logged_In!==7) {
   header("Location: login.php");
}
$new_address = addslashes(strip_tags($_GET['newaddr']));
if($new_address=="go") {
   $Bytecoind_accountaddress = $Bytecoind->getnewaddress($wallet_id);
   header("Location: Deposit.php");
}
$withdraw_amount = addslashes(strip_tags($_POST['amount']));
$withdraw_address = addslashes(strip_tags($_POST['address']));
if($withdraw_address) {
   if($withdraw_amount) {
      $withdraw_amount = satoshitize($withdraw_amount);
      if($withdraw_amount<$Bytecoind_Balance) {
         $Bytecoind_Withdraw_From = $Bytecoind->sendfrom($wallet_id,$withdraw_address,(float)$withdraw_amount,6);
         $withdraw_message = $Bytecoind_Withdraw_From;
         $Bytecoind_Balance = $Bytecoind->getbalance($wallet_id,6);
      } else {
         $withdraw_message = 'You do not have enough Bitcoins!';
      }
   } else {
      $withdraw_message = 'No amount to withdraw was entered!';
   }
}
?>
<html>
<head>
   <title>Bitcrownd Wallet</title>
   <style>
      body { background: #39a1c6; color: #000000; font-family: times; font-size: 14px; margin: 0px; padding: 0px; }
      hr { height: 1px; background: #39a1c6; }
      table { font-size: 14px; }
      a { text-decoration: none; color: #39a1c6; }
      input { height: 22px; border: 1px solid #39a1c6; border-radius: 6px; -moz-border-radius: 6px; }
      .button { height: 22px; background: #0B6121; border: 1px solid #0B6121; color: #FFFFFF; font-weight: bold; border-radius: 6px; -moz-border-radius: 6px; }
   </style>
       <link rel="stylesheet" type="text/css" href="static/public/css/commond77a.css?464485ff">
<script type="text/javascript" src="static/qrcode/jquery.min.js"></script>
<script type="text/javascript" src="static/qrcode/qrcode.js"></script>

</head>
<body>
	  </ul>
    <div class="navbar-fixed">
      <nav role="navigation" class="blue-grey darken-4">
        <div class="nav-wrapper container"><a id="logo-container" href="#!" title="Bitcrownd Wallet"  class="brand-logo white-text dropdown-button"><img src="static/public/images/logo.png" width="45px/" class="img-responsive">Bitcrownd</a>
          <ul class="right hide-on-med-and-down">

<li class="active"><a href="index.php" class="white-text">Home</a>
</li>



<li><a href="wallet.php" class="white-text">Send</a>
</li>



<li><a href="Deposit.php" class="white-text">Wallet</a>
</li>



<li><a href="Transations.php" class="white-text">Transations</a>
</li>

<li><a href="logout.php">Log Out</a>
</li>

          </ul>
          <ul id="nav-mobile" class="side-nav">

<li class="active"><a href="index">Home</a>
</li>



<li><a href="wallet.php">Withdraw Btc</a>
</li>



<li><a href="Deposit.php">Create Adress</a>
</li>



<li><a href="Transations.php">Transations</a>
</li>

<li><a href="logout.php">Log Out</a>
</li>


          </ul><a href="#" data-activates="nav-mobile" class="button-collapse white-text"><i class="mdi-navigation-menu"></i></a>
        </div>
      </nav>
    </div>
   <center>

   <p></p>
   <div align="center" style="width: 700px; background: #FFFFFF; font-weight: bold; border: 4px solid #0B6121; padding:10px; border-radius: 15px; -moz-border-radius: 15px;">
   <table style="width: 650px;">
      <tr>
      	         <p>Balance: <?php echo $Bytecoind_Balance; ?> BTC<br>
 <br>
 
            <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>
            
         <td colspan="2" align="left" valign="top" style="padding: 5px;" nowrap>
            <?php if($withdraw_message) { echo '<center><b style="color: #FF0000;">'.$withdraw_message.'</b></center>'; } ?>
            
            
         
            <b>Create New Bitcoin Adress<a href="Deposit.php?newaddr=go">(new address)</a></b>
            <br>
            <center>
            	    <br>
            <table>
               <tr>
                  <td align="left" style="padding: 3px;" nowrap>
                     <?php
                     foreach($Bytecoind_accountaddresses as $Bytecoind_accountaddress) {
                        echo $Bytecoind_accountaddress."<br>";
                     }
                     ?>
                  </td>
               </tr>
            </table>

   </div>
   <p></p>
   </center>
</body>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 100,
	height : 100
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
</html>
<?php require'footer.php'; ?>
