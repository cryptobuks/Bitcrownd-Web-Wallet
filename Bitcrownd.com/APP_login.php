<?php

	 include 'include/config.php';
    $result='';
     if(isset($_POST['UserEmail']) && isset($_POST['PIN_Code']))
     {


	   	  $username = $_POST['UserEmail'];
          $password = $_POST['PIN_Code'];
		  

          $sql = 'SELECT * FROM tbl_users WHERE  UserEmail = :UserEmail AND PIN_Code = :PIN_Code';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':UserEmail', $username, PDO::PARAM_STR);
          $stmt->bindParam(':PIN_Code', $password, PDO::PARAM_STR);
          $stmt->execute();
          if($stmt->rowCount())
          {
			 $result="true";	
          }  
          elseif(!$stmt->rowCount())
          {
			  	$result="false";
          }

   		  echo $result;
  	}
	
?>