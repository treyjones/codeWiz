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
  
  <p><button class="btn"name="account" onclick="window.location.href='vote.php'"> Voter</button>
  <button class="btn"name="account" onclick="window.location.href='candi.php'"> Candidate</button>
   <button class="btn"name="account" onclick="window.location.href='results.php'">Result Reports</button>
  </p>  
  <div id ="logs"> 
  <a style="font-weight:bold;" href="logout.php">Logout <span style="background:#ffffff;color:#ff4800">»</span></a>
  </div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="vote.php">Register voter</a>     				
  </section>
 <SCRIPT TYPE="text/javascript">
	function isNumberKey(evt){
	 
	 var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false();	
}else{		
    return true;
}
	</SCRIPT>
  
  <div id="main">
     <form action='#' method='post'>
 <table cellspacing='5' cellpadding='10'align='center'>
  <caption position ='top'> REGISTER VOTER </caption>
 <tr><td>National_ID No:</td><td><input type='text' name='nat'/></td></tr>
 <tr><td>REG No:</td><td><input type='text' name='Reg'/></td></tr>
 <tr><td>Phone No:</td> <td> <input name="someid" type="number" onkeypress=" return isNumberKey(event)" /> </td> </tr>
 <tr><td></td><td><input type='submit' name='Submit' value='Submit'/></td>
     <td><input type='Reset' name='Reset' value='Reset' onclick='reset()'/></td></tr>
	
	<script type= 'text/javascript'>
	 function reset(){
	 nat.setText("");
	 }	 
	 </script>
	 </table>
  </form>

  <?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
     include ("$root/Configuration.php");
     $parameters=new Parameters();
     $hostname=$parameters->getHost();
     $user_name=$parameters->getUserName();
     $PSW=$parameters->getPassword();
     $data_base=$parameters->getDatabase();
     $dbhandle = mysql_connect($hostname, $user_name, $PSW) ;
      mysql_select_db($data_base); 
 if(isset($_POST['Submit'])) {   
  $pin= randal();
   $reg=$_POST['Reg'];
   $nato= $_POST['nat'];
   $phonee = $_POST['someid']; 
   //check there is some entry.
  if($phonee!='' && $reg!=''&& $nato !=''){

//fetch data from database and check if the registration exist in student table. if not dont register 
$query = mysql_query ("select * from students where national_id='$nato'") or die(mysql_error());
$row =  mysql_fetch_array($query, MYSQL_ASSOC);
if ($nato = "{$row['national_id']}"&& $reg = "{$row['RegNo']}"){
	  // sms code.
    require_once('sms/AfricasTalkingGateway.php');
    $username   = "trey";
    $apikey     = "d18c75326bfa62b0a8ffbb6aae0088c1bccb36461b363458008bdaee56fa8ac0";
    $recipients = $phonee;
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
	$query= mysql_query("insert into voter ( REGNO, phone, PASSWORD) 
      values('$reg','$phonee','$pin')") or die(mysql_error());
	  echo 'ONE RECORD ADDED!';
	}
	  
	  }
	  else{
	  echo 'You are not our student';
	  }
	  }
	  else{
	   echo 'Please fill the fields'; 
           }

}
?>
  <?php
  //generate random no.
function randal($length=4){
$passwrd="";
$possible="0123456789";
$maxlength= strlen($possible);
if($length > $maxlength){
     $length = $maxlength;
}
$i=0;
while($i<$length){
$char = substr($possible,mt_rand(1,$maxlength-1),1);
if(!strstr($passwrd,$char)){
$passwrd.=$char;
$i++;
}

}
return $passwrd;

}
?>
	
  </div>
  
  
  <div id="footer">
               Copyrights @Kisii university
  </div>
  </div>
  </body>
</html>