<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico">
    <title> kisii university</title>
	<link href="main1.css" rel="stylesheet" type="text/css"/>
	 </head>
  <body>
  <div class="container">
 
 <div id="header"><img src="logo.png" alt="--" >
  </div>
  
  <section> 
  <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
  <div id ="logs"> 
  <a style="font-weight:bold;" href="logout.php">Logout <span style="background:#ffffff;color:#ff4800">»</span></a>
  </div>
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
  </section>
 
  
  <div id="main">
  <table cellspacing='5' align='center'>
     <form action='#' method='post'>
    <table cellspacing='5' align='center'>
       <tr><td>User name:</td><td><input type='text' name='uname'/></td></tr>
       <tr><td>Phone No:</td> <td> <input name="someid" type="number" onkeypress=" return isNumberKey(event)" /></td></tr>
       <tr><td></td><td><button class="btn"name="submit" onclick="window.location.href='check.php'"> Submit</button>
	   </td></tr>
    </table>
       </form>
	   </td></tr></table>
	    <SCRIPT TYPE="text/javascript">
	function isNumberKey(evt){
	 
	 var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false();	
}else{		
    return true;
}
	</SCRIPT>
	   <?php
 session_start();
 if(isset($_POST['submit']))
 {
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
     include ("$root/Configuration.php");
     $parameters=new Parameters();
     $hostname=$parameters->getHost();
     $user_name=$parameters->getUserName();
     $PSW=$parameters->getPassword();
     $data_base=$parameters->getDatabase();
     $dbhandle = mysql_connect($hostname, $user_name, $PSW) ;
      mysql_select_db($data_base);
  $name=$_POST['uname'];
  $pwd=$_POST['someid'];
  if($name!=''&&$pwd!='')
  {
    $query=mysql_query("select * from admin where USERNAME='".$name."' and 
	TELEPHONE='".$pwd."'")or die(mysql_error());
    $res=mysql_fetch_row($query);
    if($res)
    {
	//sms sending
	require_once('sms/AfricasTalkingGateway.php');
    $username   = "trey";
    $apikey     = "d18c75326bfa62b0a8ffbb6aae0088c1bccb36461b363458008bdaee56fa8ac0";
    $recipients = $pwd;
    $message    = $pin;
    $gateway    = new AfricasTalkingGateway($username, $apikey);

    try 
    { 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        
        echo " Number: " .$result->number;
		echo '</br>';
        echo " Status: " .$result->status;
		echo '</br>';
        echo " MessageId: " .$result->messageId;
		echo '</br>';
        echo " Cost: "   .$result->cost."\n";
      }
    }
    catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while sending: ".$e->getMessage();
    }
if (!@AfricasTalkingGatewayException){
     header('location:check.php');
	 }
    }
    else
    {
	
     echo'You entered wrong username or phone no.';
    }
  }
  else
  {
   echo'Enter both username and phone no.';
  }
 }
 ?>
	
  </div>
  
  
  <div id="footer">
               <p>Copyrights @Kisii university</p>
  </div>
  </div>
  </body>
</html>