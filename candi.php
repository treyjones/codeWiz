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
  <hr>
 <p><button class="btn"name="account" onclick="window.location.href='vote.php'"> Voter</button>
  <button class="btn"name="account" onclick="window.location.href='candi.php'"> Candidate</button>
  <button class="btn"name="account" onclick="window.location.href='results.php'">Result Reports</button></p>
  <div id ="logs"> 
  <a style="font-weight:bold;" href="logout.php">Logout <span style="background:#ffffff;color:#ff4800">»</span></a>
  </div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="candi.php">Register Candidate</a>
				 				
  </section>
 
  
  <div id="main">
     <form action='#' method='post'>
          <table cellspacing='5' cellpadding='10'align='center'>
             <caption position ='top'> REGISTER CANDIDATE </caption>
             <tr><td>Name:</td><td><input type='text' name='Cname'/></td></tr>
             <tr><td>REG No:</td><td><input type='text' name='REGNO'/></td></tr>
             <tr><td>Candidate ID:</td><td><input type='text' name='CAND_ID'/></td></tr>
             <tr><td>Post:</td><td> <select name='pst'>
			                           <option value=''>Select Post </option>
									   <option value='President'>President </option>
									   <option value='Finance_Secretary'>Finance_Secretary </option>
									   <option value='Sec_general'>Sec_general </option>
									   <option value='Special_needs'>Special_needs </option>
									   <option value='Sports'>Sports </option>
									   <option value='Director_Academic'>Director_Academic </option>
									   <option value='Gender_social_welfare'>Gender_social_welfare </option>
									   
									   </select>   </td></tr>
             <tr><td>Party:</td><td><select name= 'part'>
			                          <option value=''>Select Party </option>
			                          <option value='FREEDOM'>FREEDOM</option>
									  <option value='REBLICAN'>REBLICAN</option>
									  <option value='DEMOCRATIC'>DEMOCRATIC</option>
									</select>       </td></tr>
             <tr><td></td><td><input type='submit' name='Register' value='Register'/></td></tr>
           </table>
       </form>
	    <?php
 if(isset($_POST['Register'])) {   
 session_start();
 $root = realpath($_SERVER["DOCUMENT_ROOT"]);
     include ("$root/Configuration.php");
     $parameters=new Parameters();
     $hostname=$parameters->getHost();
     $user_name=$parameters->getUserName();
     $PSW=$parameters->getPassword();
     $data_base=$parameters->getDatabase();
     $dbhandle = mysql_connect($hostname, $user_name, $PSW) ;
      mysql_select_db($data_base);
  $name=$_POST['Cname'];
  $Reg= $_POST['REGNO'];
  $party=$_POST['part'];
  $CAN_ID=$_POST['CAND_ID'];
  $post=$_POST['pst'];
  if($name!='' && $Reg!='' && $party!='' && $CAN_ID!='' &&$post!=''){
  $query=mysql_query("insert into votes ( CANDI_ID,post) 
      values('$CAN_ID','$post')") 
	  	  or die(mysql_error());
 $query =mysql_query("insert into candidates ( NAMES,REGNO,CAND_ID,PARTY,POST) 
      values('$name','$Reg','$CAN_ID','$party','$post')") or die(mysql_error());
	  echo "1 record added";  
	  }
	  else {
	  echo 'Please fill in all the fields';
	  }
	  }
    else {
   
             }
			 ?>
	
  </div>
  
  
  <div id="footer">
               Copyrights @Kisii university
  </div>
  </div>
  </body>
</html>