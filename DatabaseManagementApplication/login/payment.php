<?php
session_start();


if(isset($_SESSION['view']))
$_SESSION['view']=$_SESSION['view']+1;
else{
$_SESSION['view']=1; 
$uname =$_GET['name'];
$ussn =$_GET['ssn'];
}

//echo "Views=". $_SESSION['view'];
?> 

<?php
//echo "hello";
 require 'connect.inc.php';
 $id=$_POST['cat'];
 $query="delete from PAYMENT where CUSTOMER_ID='$id'";
 $query_run=  mysql_query($query);
 if($query_run && $name)
 {
     echo "<script type='text/javascript'>alert('Payment deleted');</script>";
     mysql_close(mysql_connect("localhost","root", "pt1234"));
 }
 


?>
<?php
$flag=$_GET['flag'];
if($flag==1){
    echo "<script type='text/javascript'>alert('You have successfuly registered.');</script>";
}

global $uname;
global $ussn;
echo "<br>".$uname."<br>";
echo $ussn."<br>";
echo "<br><br>This is employee page<br><br>";
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
<head>
<link href="./../style.css" rel="stylesheet" type="text/css" media="screen" />
<script>
function loadXMLDoc()
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
xmlhttp.open("GET","get_paymentdata.php",true);
xmlhttp.send();
}
</script>
</head>
<body>
   <h3>Payments</h3>
<button type="button" onclick="loadXMLDoc()">View Previous Payments</button><br><br>
<div id="myDiv"></div><br>
<a href="insert_payment.php"><h3>Insert</h3></a><br><br>
Select the payment to delete :
<?php
require 'connect.inc.php';

$sql="SELECT * FROM PAYMENT";

$result = mysql_query($sql);

echo "<form action='payment.php' method='POST'><select name='cat'>";

while($row = mysql_fetch_array($result))
  {
    $x=$row['CUSTOMER_ID'];
  echo "<option value='$x'>" . $row['CUSTOMER_ID'] ."</option>";
  }
echo "<input type='submit' class='submit' value='Delete'>";
echo "</form>";

?>
<a href="logout.php">Logout</a>
</body>
</html>
