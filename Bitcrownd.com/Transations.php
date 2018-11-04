<?php
require_once'include/auth.php';
if($Logged_In!==7) {
   header("Location: login.php");
}
$new_address = addslashes(strip_tags($_GET['newaddr']));
if($new_address=="go") {
   $Bytecoind_accountaddress = $Bytecoind->getnewaddress($wallet_id);
   header("Location: wallet.php");
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
         $withdraw_message = 'You do not have enough Bytecoins!';
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
           
       
            <b>Last 10 Transactions:</b>
            <center>
            <table>
               <tr>
                  <td align="left" style="font-weight: bold; padding: 3px;" nowrap>Date</td>
                  <td align="left" style="font-weight: bold; padding: 3px;" nowrap>Address</td>
                  <td align="right" style="font-weight: bold; padding: 3px;" nowrap>Type</td>
                  <td align="right" style="font-weight: bold; padding: 3px;" nowrap>Amount</td>
                  <td align="right" style="font-weight: bold; padding: 3px;" nowrap>Fee</td>
                  <td align="right" style="font-weight: bold; padding: 3px;" nowrap>Confs</td>
                  <td align="left" style="font-weight: bold; padding: 3px;" nowrap>Info</td>
               </tr>
               <?php
               $bold_txxs = "";
               foreach($Bytecoind_List_Transactions as $Bytecoind_List_Transaction) {
                  if($bold_txxs=="") { $bold_txxs = "color: #666666; "; } else { $bold_txxs = ""; }
                  if($Bytecoind_List_Transaction['category']=="send") { $tx_type = '<b style="color: #FF0000;">Sent</b>'; } else { $tx_type = '<b style="color: #01DF01;">Received</b>'; }
                  echo '<tr>
                           <td align="left" style="'.$bold_txxs.'padding: 3px;" nowrap>'.date('n/j/Y h:i a',$Bytecoind_List_Transaction['time']).'</td>
                           <td align="left" style="'.$bold_txxs.'padding: 3px;" nowrap>'.$Bytecoind_List_Transaction['address'].'</td>
                           <td align="right" style="'.$bold_txxs.'padding: 3px;" nowrap>'.$tx_type.'</td>
                           <td align="right" style="'.$bold_txxs.'padding: 3px;" nowrap>'.abs($Bytecoind_List_Transaction['amount']).'</td>
                           <td align="right" style="'.$bold_txxs.'padding: 3px;" nowrap>'.abs($Bytecoind_List_Transaction['fee']).'</td>
                           <td align="right" style="'.$bold_txxs.'padding: 3px;" nowrap>'.$Bytecoind_List_Transaction['confirmations'].'</td>
                           <td align="left" style="padding: 3px;" nowrap><a href="http://blockexplorer.bytecoin.in/tx/'.$Bytecoind_List_Transaction['txid'].'" target="_blank">Info</a></td>
                        </tr>';
               }
               ?>
            </table>
            </center>
         </td>
      </tr>
      <br>
   </table>
   </div>
   <p></p>
   </center>
</body>
</html>
<?php require'footer.php'; ?>
