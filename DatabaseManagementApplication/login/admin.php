<?php
session_start();
if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {
	// echo "welcome"
} else {
    header('Location: access.php');
}
?>

<?php
require 'connect.inc.php';
$b=$_POST['admin'];
//echo $b;
$sqlq="delete from ADMIN where USER='$b'";
if(!empty($b) && mysql_query($sqlq)){
    echo "<script type='text/javascript'>alert('Admin removed');</script>";
}
?>


<?php
require 'connect.inc.php';
$c=$_POST['user'];
//echo $c;
$sqlq="delete from WORKING_STAFF1 where SSN='$c'";
$sqlw="delete from WORKING_STAFF2 where SSN='$c'";
if(!empty($c) && mysql_query($sqlq) && mysql_query($sqlw)){
    echo "<script type='text/javascript'>alert('User removed');</script>";
}
?>

<?php
$a=$_POST['catt'];
echo $a;
$sqla="select PASSWORD from WORKING_STAFF1 where NAME='$a'";
$password=mysql_query($sqla);
$row = mysql_fetch_array($password);
$pass= $row['PASSWORD'];
if(!empty($a) && !empty($pass))
{
$query="insert into ADMIN values('$a','$pass')";
if(mysql_query($query))
    echo "<script type='text/javascript'>alert('Changes done');</script>";
}
?>

<html>
<head>
<script>
function loadXMLDoc(z)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
	//alert("hello");
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
if(z==1){
xmlhttp.open("GET","adminuser.php",true);
xmlhttp.send();
}
else
    {
    xmlhttp.open("GET","admindata.php",true);
    xmlhttp.send();   
    }
}
</script>
<link href="./../style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

    <h3>Admin List</h3>
<button type="button" onclick="loadXMLDoc(1)">Show Admin Users</button><br><br>
<button type="button" onclick="loadXMLDoc(2)">Show Normal Users</button><br><br>
<div id="myDiv"><h2></h2></div><br>
<?php
require 'connect.inc.php';

$sql="SELECT * FROM WORKING_STAFF1";

$result = mysql_query($sql);

echo "<form action='admin.php' method='POST'><select name='catt'>";

while($row = mysql_fetch_array($result))
  {
    $x=$row['NAME'];
  echo "<option value='$x'>" . $row['NAME'] ."</option>";
  }
echo "<input type='submit' value='Make Admin'>";
echo "</form>";

?>

<?php
require 'connect.inc.php';

$sql1="SELECT * FROM ADMIN";

$result1 = mysql_query($sql1);

echo "<form action='admin.php' method='POST'><select name='admin'>";

while($row = mysql_fetch_array($result1))
  {
    $x=$row['USER'];
  echo "<option value='$x'>" . $row['USER'] ."</option>";
  }
echo "<input type='submit' value='Remove from Admin List'>";
echo "</form>";



?>

<?php
require 'connect.inc.php';

$sql1="SELECT * FROM WORKING_STAFF1";

$result1 = mysql_query($sql1);

echo "<form action='admin.php' method='POST'><select name='user'>";

while($row = mysql_fetch_array($result1))
  {
    $x=$row['NAME'];
    $y=$row['SSN'];
  echo "<option value='$y'>" . $row['NAME'] ."</option>";
  }
echo "<input type='submit' value='Remove from User List'>";
echo "</form>";



?>

<br>
<h2> Tables </h2><br>
<a href="chef.php">MENU</a><br><br>
<a href="department.php">DEPARTMENT</a><br><br>
<a href="raw.php">RAW MATERIAL</a><br><br>
<a href="report.php">REPORTS</a><br><br>
<a href="payment.php">PAYMENTS</a><br><br>
<a href="employee.php">CUSTOMERS AND CUSTOMER ORDERS</a><br><br><br>


<a href="createtable.php">CREATE TABLE </a><br><br>

<a href="logout.php"><img width=90 height=75 src="logout.jpg"/></a>
