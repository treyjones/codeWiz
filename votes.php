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
  <div id ="logs"> 
  <a style="font-weight:bold;" href="logout.php">Logout <span style="background:#ffffff;color:#ff4800">»</span></a><p>
  
  </div>
  <p><button class="btn"name="account" onclick="window.location.href='vote.php'"> Voter</button>
  <button class="btn"name="account" onclick="window.location.href='candi.php'"> Candidate</button>
   <button class="btn"name="account" onclick="window.location.href='results.php'">Result Reports</button>
   <h4>Time:<input type='text' name ='time' value ='tyme'></h4>
     </section>
    <div id="main1">
	<table border='1' cellpadding='5' cellspacing='10'><tr><td>
		<?php
		//presidential results
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
     include ("$root/Configuration.php");
     $parameters=new Parameters();
     $hostname=$parameters->getHost();
     $user_name=$parameters->getUserName();
     $PSW=$parameters->getPassword();
     $data_base=$parameters->getDatabase();
     $dbhandle = mysql_connect($hostname, $user_name, $PSW) ;
      mysql_select_db($data_base);
	$query= mysql_query("SELECT * FROM votes WHERE post='President'");
	 echo " <table cellpadding='10' cellspacing='0' border='0'>
	 <caption='top'> Presidential results </caption>
	<tr>	
	<td cellpadding='5'>NO.</td>  
	<td cellspacing='5'>Candidate Name</td>
	<td cellspacing='5'>Candidate ID</td> 
	<td cellspacing='5'>votes</td>
	</tr>";
	 $i=1;
   while($row = mysql_fetch_array($query, MYSQL_ASSOC) )
   {
   for($i=1;$i<$row = mysql_fetch_array($query,MYSQL_ASSOC);$i++){
     echo " <tr>	
	     <td> $i . </td>         	<td>{$row['CANDI_ID']} </td> <td>{$row['CANDI_ID']} </td>            <td>{$row['Vote']}</td> </tr>";
    }
	$i++;
	echo '</table>';
	}
	?>
	</td>
	
	<td>
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
	$query= mysql_query("SELECT * FROM votes WHERE post='Director_Academic'");
	 echo " <table cellpadding='10' cellspacing='0' border='0'>
	 <caption='top'> Director Academic results </caption>
	<tr>	
	<td cellpadding='5'>NO.</td>  
	<td cellspacing='5'>Candidate Name</td>
	<td cellspacing='5'>Candidate ID</td> 
	<td cellspacing='5'>votes</td>
	</tr>";
	 $i=1;
   while($row = mysql_fetch_array($query, MYSQL_ASSOC) )
   {
   for($i=1;$i<$row = mysql_fetch_array($query,MYSQL_ASSOC);$i++){
     echo " <tr>	
	     <td> $i . </td>         	<td>{$row['CANDI_ID']} </td> <td>{$row['CANDI_ID']} </td>            <td>{$row['Vote']}</td> </tr>";
    }
	$i++;
	echo '</table>';
	}
	?>
	</td>
	</tr>
	<tr>
	<td>
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
	$query= mysql_query("SELECT * FROM votes WHERE post='Finance_Secretary'");
	 echo " <table cellpadding='10' cellspacing='0' border='0'>
	 <caption='top'> Finance Secretary results </caption>
	<tr>	
	<td cellpadding='5'>NO.</td>  
	<td cellspacing='5'>Candidate Name</td>
	<td cellspacing='5'>Candidate ID</td> 
	<td cellspacing='5'>votes</td>
	</tr>";
	 $i=1;
   while($row = mysql_fetch_array($query, MYSQL_ASSOC) )
   {
   for($i=1;$i<$row = mysql_fetch_array($query,MYSQL_ASSOC);$i++){
     echo " <tr>	
	     <td> $i . </td>         	<td>{$row['CANDI_ID']} </td> <td>{$row['CANDI_ID']} </td>            <td>{$row['Vote']}</td> </tr>";
    }
	$i++;
	echo '</table>';
	}
	?>
	</td>
	<td>
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
	$query= mysql_query("SELECT * FROM votes WHERE post='Gender_social_welfar'");
	 echo " <table cellpadding='10' cellspacing='0' border='0'>
	 <caption='top'> Gender social welfare results </caption>
	<tr>	
	<td cellpadding='5'>NO.</td>  
	<td cellspacing='5'>Candidate Name</td>
	<td cellspacing='5'>Candidate ID</td> 
	<td cellspacing='5'>votes</td>
	</tr>";
	 $i=1;
   while($row = mysql_fetch_array($query, MYSQL_ASSOC) )
   {
   for($i=1;$i<$row = mysql_fetch_array($query,MYSQL_ASSOC);$i++){
     echo " <tr>	
	     <td> $i . </td>         	<td>{$row['CANDI_ID']} </td> <td>{$row['CANDI_ID']} </td>            <td>{$row['Vote']}</td> </tr>";
    }
	$i++;
	echo '</table>';
	}
	?>
	</td>
	</tr>
	</table>	
	</div>
	 
  <div id="footer">
               Copyrights @Kisii university
  </div>
  </div>
  </body>
</html>