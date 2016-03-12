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
  <caption position ='top'> <img src="12.png" width='220px' height= '150px' ></caption>
  <tr><td>
     <form action='#' method='post'>
    <table cellspacing='5' align='center'>
       <tr><td>User name:</td><td><input type='text' name='uname'/></td></tr>
       <tr><td>Password:</td><td><input type='password' name='upwd'/></td></tr>
       <tr><td></td><td><button class="btn"name="submit" onclick="window.location.href='vote.php'"> Login</button>
	   </td></tr>
	   <tr><td> <a style="font-weight:bold;" href="pass.php">forgot password <span style="background:#ffffff;color:#ff4800">»</span></a></td></tr>
    </table>
       </form>
	   </td></tr></table>
	   <?php
 session_start();
 if(isset($_POST['submit']))
 {
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
     include ("$root/ussd/Configuration.php");
     $parameters=new Parameters();
     $hostname=$parameters->getHost();
     $user_name=$parameters->getUserName();
     $PSW=$parameters->getPassword();
     $data_base=$parameters->getDatabase();
     $dbhandle = mysql_connect($hostname, $user_name, $PSW) ;
      mysql_select_db($data_base);
  $name=$_POST['uname'];
  $pwd=$_POST['upwd'];
  if($name!=''&&$pwd!='')
  {
    $query=mysql_query("select * from admin where USERNAME='".$name."' and 
	PASSWORD='".$pwd."'")
	or die(mysql_error());
    $res=mysql_fetch_row($query);
    if($res)
    {
     $_SESSION['name']=$name;
     header('location:vote.php');
    }
    else
    {
	
     echo'You entered wrong username or password';
    }
  }
  else
  {
   echo'Enter both username and password';
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