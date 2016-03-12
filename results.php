<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
		<link rel="shortcut icon" href="favicon.ico">
    <title> kisii university</title>
	<link href="main1.css" rel="stylesheet" type="text/css"/>
	<script type ="text/javascript">
	function PrintTable(){ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1000, height=700, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 

  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Clearance Power System</title>'); 
   docprint.document.write('<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />');
   docprint.document.write('</head><body onLoad="self.print()" style="width: 94%; font-size:9px; font-family:Times New Roman;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
                        }	
	</script>
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
 
  
  <div id="main">
  <table border='1' cellpadding='5' cellspacing='10'><tr><td>
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
	$query= mysql_query("SELECT * FROM voter");
	echo "<table cellpadding='10' cellspacing='0' border='3'>
	 <caption='top'> registered voters </caption>	 
	<tr>     	
	<td cellpadding='5'>NO.</td>
	<td cellspacing='5'>Registration No.</td>
	<td cellspacing='5'>phone no.</td>
	</tr>";
	 //$i=1;
	 
   while($row = mysql_fetch_array($query, MYSQL_ASSOC) )
   {
   for($i=1;$i<=$row = mysql_fetch_array($query,MYSQL_ASSOC);$i++){
     echo " <tr>	
	     <td> $i . </td>         	<td>{$row['REGNO']} </td>            <td>{$row['phone']}</td> </tr>";
    }
	$i++;
	}
	echo '</table>';	
	?>
	</td>
	<td>
	<table>
	<caption ='top'><h2>Voters' turn up</h2></caption>
	<tr><td> Registered voters     </td><td> <?php $root = realpath($_SERVER["DOCUMENT_ROOT"]);
     include ("$root/Configuration.php");
     $parameters=new Parameters();
     $hostname=$parameters->getHost();
     $user_name=$parameters->getUserName();
     $PSW=$parameters->getPassword();
     $data_base=$parameters->getDatabase();
     $dbhandle = mysql_connect($hostname, $user_name, $PSW) ;
      mysql_select_db($data_base);
	                                          $query= mysql_query("SELECT count(ID) FROM voter");
                                                    while($row = mysql_fetch_array($query, MYSQL_ASSOC) ){
													$vts= "{$row['count(ID)']}";
													echo "<h3>".$vts."<h3>";
   											       }
											  ?>        </td></tr>
	<tr><td> Student voted        </td><td> <?php 
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
     include ("$root/Configuration.php");
     $parameters=new Parameters();
     $hostname=$parameters->getHost();
     $user_name=$parameters->getUserName();
     $PSW=$parameters->getPassword();
     $data_base=$parameters->getDatabase();
     $dbhandle = mysql_connect($hostname, $user_name, $PSW) ;
      mysql_select_db($data_base);
	                                          $query= mysql_query("SELECT sum(status) FROM voter where status = '1'");
                                                    while($row = mysql_fetch_array($query, MYSQL_ASSOC) ){
													$vt= "{$row['sum(status)']}";
													echo "<h3>".$vt."<h3>";
   											       }
											  ?>         </td></tr>
	<tr><td> Percentage turn-Up   </td><td>  <?php  $resul = $vt/$vts;
                                               echo $resul. "%";
											        ?></td></tr>
	</table>
	
	</td></tr>
	</table>
	 <input type='button' onclick='PrintTable()' value='Print'/>
  </div>
 
  
  <div id="footer">
               <p>Copyrights @Kisii university</p>
  </div>
  </div>
  </body>
</html>