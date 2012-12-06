<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	// echo "welcome"
} else {
    header('Location: access.php');
}
?>

<?php
require 'connect.inc.php';

$sql="SELECT * FROM WORKING_STAFF1";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>SSN</th>
<th>NAME</th>
<th>SALARY</th>
<th>SEX</th>
<th>DNUM</th>
<th>CATEGORY</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['SSN'] . "</td>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "<td>" . $row['SALARY'] . "</td>";
  echo "<td>" . $row['SEX'] . "</td>";
  echo "<td>" . $row['DNUM'] . "</td>";
  $str=$row['SSN'];
  $q="SELECT * FROM WORKING_STAFF2 where SSN='$str'";
  $res=  mysql_query($q);
  $row1 = mysql_fetch_array($res);
  echo "<td>" . $row1['CATEGORY'] . "</td>";
  echo "<tr>";
  
  }
echo "</table>";
?>

