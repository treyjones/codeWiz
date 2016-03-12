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
  <p> 
  <p><button class="btn"name="account" onclick="window.location.href='vote.php'"> Back</button>
  <div id ="logs"> 
  <a style="font-weight:bold;" href="logout.php">Logout <span style="background:#ffffff;color:#ff4800">»</span></a>
  </div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
  <p><p><button class="btn"name="account" onclick="window.location.href='results.php'"> Voters</button>
  <button class="btn"name="account" onclick="window.location.href='candidates.php'"> Candidates</button>
   <button class="btn"name="account" onclick="window.location.href='votes.php'">Votes</button>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
  </section>
 
  
  <div id="main2">
 <?php
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
     include ("$root/ussd/Configuration.php");
     $parameters=new Parameters();
     $hostname=$parameters->getHost();
     $user_name=$parameters->getUserName();
     $PSW=$parameters->getPassword();
     $data_base=$parameters->getDatabase();
     $dbhandle = mysql_connect($hostname, $user_name, $PSW) ;
      mysql_select_db($data_base);
	$query= mysql_query("SELECT * FROM candidates");
	 echo " <table cellpadding='10' cellspacing='0' border='3'>
	 <caption='top'> registered CANDIDATES </caption>
	<tr>	
	<td ></td>   <td >NO.</td>       	<td >NAMES</td>     <td>REG NO.</td>        <td>CANDIDATE ID</td>  <td>PARTY</td>  <td>POST</td>
	</tr>";
	 $i=1;
   while($row = mysql_fetch_array($query, MYSQL_ASSOC) )
   {
   for($i=1;$i<$row = mysql_fetch_array($query,MYSQL_ASSOC);$i++){
     echo " <tr>	
	    <td> <input type='checkbox' name='edit' value='{$row['NAMES']}' /> 
		</td>  <td> $i . </td>      <td>{$row['NAMES']} </td> <td>{$row['REGNO']} </td> <td>{$row['CAND_ID']} </td>    	<td>{$row['PARTY']} </td>            <td>{$row['POST']}</td> </tr>";
    }
	$i++;
	echo '</table>';
	}
	?>
	
  </div>
  
  
  <div id="footer">
               <p>Copyrights @Kisii university</p>
  </div>
  </div>
  </body>
</html>