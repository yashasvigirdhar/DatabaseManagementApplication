<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	// echo "welcome"
} else {
    header('Location: access.php');
}
?>


<?php
$flag1=$_GET['flag'];
if($flag1==3){
    echo "<script type='text/javascript'>alert('Report added.');</script>";
}
if($flag1==1){
    echo "<script type='text/javascript'>alert('Report added with SALES,PROFIT,AMOUNT values overwritten');</script>";
}
if($flag1==2){
    echo "<script type='text/javascript'>alert('Report added with PROFIT,AMOUNT values overwritten');</script>";
}
?>





<?php
//echo "hello";
 require 'connect.inc.php';
 $name=$_POST['cat'];
 

 
 $sqlq="select CUSTOMERS_PER_DAY from REPORTS3 where REPORT_NO='$name'";
 $resq = mysql_query($sqlq);
 $rowq = mysql_fetch_array($resq);
 
 $cus=$rowq['CUSTOMERS_PER_DAY'];
 //echo $cus.'<br>';
 $sqlw="select count(*) from REPORTS3 where CUSTOMERS_PER_DAY='$cus'";
 $resw = mysql_query($sqlw);
 $roww = mysql_fetch_array($resw);
 $cus_no=$roww['count(*)'];
 //echo $cus_no;
 if($cus_no==1)
 {
        $sqlq="select SALES from REPORTS2 where CUSTOMERS_PER_DAY='$cus'";
        $resq = mysql_query($sqlq);
        $rowq = mysql_fetch_array($resq);
        $sales=$rowq['SALES'];
        
        $sqlw="select count(*) from REPORTS2 where SALES='$sales'";
        $resw = mysql_query($sqlw);
        $roww = mysql_fetch_array($resw);
        $sales_no=$roww['count(*)'];
        
 if($sales_no==1)
 {
   $q="delete from REPORTS1 where SALES='$sales'";
   $qr=  mysql_query($q);     
 }
   $q="delete from REPORTS2 where CUSTOMERS_PER_DAY='$cus'";
   $qr=  mysql_query($q);     
 }
 $query="delete from REPORTS3 where REPORT_NO='$name'";
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

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
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
xmlhttp.open("GET","get_reportdata.php",true);
xmlhttp.send();
}
</script>
<link href="./../style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

    <h3>Reports</h3>
<button type="button" onclick="loadXMLDoc()">View Reports</button><br><br>
<div id="myDiv"><h2></h2></div>
<a href="insert_report.php">Insert</a><br><br>
Select the report to delete :
<?php
require 'connect.inc.php';

$sql="SELECT * FROM REPORTS3";

$result = mysql_query($sql);

echo "<form action='report.php' method='POST'><select name='cat'>";

while($row = mysql_fetch_array($result))
  {
    $x=$row['REPORT_NO'];
  echo "<option value='$x'>" . $row['REPORT_NO'] ."</option>";
  }
echo "<input type='submit' value='Delete'>";
echo "</form>";

?>

<a href="logout.php">Log out </a>
</body>
</html>
