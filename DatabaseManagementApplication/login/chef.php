<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	// echo "welcome"
} else {
    header('Location: access.php');
}
?>


 <?php
//session_start();


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
 $name=$_POST['cat'];
 $query="delete from MENU where NAME='$name'";
 $query_run=  mysql_query($query);
 if($query_run && $name)
 {
     echo "<script type='text/javascript'>alert('Menu item deleted');</script>";
     mysql_close(mysql_connect("localhost","root", "pt1234"));
 }
 


?>
<?php
$flag=$_GET['flag'];
if($flag==1){
    echo "<script type='text/javascript'>alert('You have successfuly registered.');</script>";
}
if($flag==3)
    echo "<script type='text/javascript'>alert('Menu item updated');</script>";

global $uname;
global $ussn;
echo "<br>".$uname."<br>";
echo $ussn."<br>";
echo "<br><br>This is chef page<br><br>";
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
xmlhttp.open("GET","get_menudata.php",true);
xmlhttp.send();
}
</script>
</head>
<body>

    <h3>Menu</h3>
<button type="button" onclick="loadXMLDoc()">Get Menu</button><br><br>
<div id="myDiv"><h2></h2></div>
<a href="insert_menu.php">Insert</a><br><br>
Select the menu item to delete :
<?php
require 'connect.inc.php';

$sql="SELECT * FROM MENU";

$result = mysql_query($sql);

echo "<form action='chef.php' method='POST'><select name='cat'>";

while($row = mysql_fetch_array($result))
  {
    $x=$row['NAME'];
  echo "<option value='$x'>" . $row['NAME'] ."</option>";
  }
echo "<input type='submit' class='submit' value='Delete'>";
echo "</form>";

?>
<h3>Update</h3>
<?php
require 'connect.inc.php';

$sql1="SELECT * FROM MENU";

$result1 = mysql_query($sql1);

echo "<form action='updatemenu.php' method='POST'><select name='updatecat'>";

while($row = mysql_fetch_array($result1))
  {
    $x=$row['NAME'];
  echo "<option value='$x'>" . $row['NAME'] ."</option>";
  }
echo "<input type='submit' class='submit' value='Update'>";
echo "</form>";

?>
<a href="logout.php">Logout</a>
</body>
</html>
