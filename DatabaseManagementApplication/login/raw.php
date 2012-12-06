
<?php
//echo "hello";
 require 'connect.inc.php';
 $name=$_POST['cat'];
// echo $name;
 $query1="delete from RAW_MATERIAL1 where SHIPMENT_NO='$name'";
 $query2="delete from RAW_MATERIAL2 where SHIPMENT_NO='$name'";
 $query_run1=  mysql_query($query1);
 $query_run2=  mysql_query($query2);
 if($query_run1 && $name)
 {
     echo "<script type='text/javascript'>alert('Raw Material removed');</script>";
     mysql_close(mysql_connect("localhost","root", "pt1234"));
 }
 


?>
<?php
$flag=$_GET['flag'];
if($flag==1)
    echo "<script type='text/javascript'>alert('Raw material added');</script>";
if($flag==3)
    echo "<script type='text/javascript'>alert('Raw Material updated');</script>";

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
<link href="./../style.css" rel="stylesheet" type="text/css" media="screen" />
<head>
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
xmlhttp.open("GET","get_rawdata.php",true);
xmlhttp.send();
}
</script>
</head>
<body>

    <h2>Raw Material</h2>
<button type="button" onclick="loadXMLDoc()">View Raw material</button><br><br>
<div id="myDiv"><h2></h2></div>
<br><a href="insert_raw.php">Insert</a><br><br>
Select the menu item to delete :
<?php
require 'connect.inc.php';

$sql="SELECT * FROM RAW_MATERIAL1";

$result = mysql_query($sql);

echo "<form action='raw.php' method='POST'><select name='cat'>";

while($row = mysql_fetch_array($result))
  {
    $x=$row['SHIPMENT_NO'];
  echo "<option value='$x'>" . $x ."</option>";
  }
echo "<input type='submit' value='Delete item'>";
echo "</form>";

?>

<h3>Update</h3>
<?php
require 'connect.inc.php';

$sql1="SELECT * FROM RAW_MATERIAL1";

$result1 = mysql_query($sql1);

echo "<form action='updateraw.php' method='POST'><select name='updateraw'>";

while($row = mysql_fetch_array($result1))
  {
    $x=$row['SHIPMENT_NO'];
  echo "<option value='$x'>" . $row['SHIPMENT_NO'] ."</option>";
  }
echo "<input type='submit' class='submit' value='Update'>";
echo "</form>";

?>

<a href="logout.php">Log out </a>
</body>
</html>
