<?php
require 'connect.inc.php';

$sql="SELECT * FROM DEPARTMENT1 D1,DEPARTMENT2 D2 where D1.NAME=D2.NAME";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Dno</th>
<th>Name</th>
<th>No. of Employees</th>
<th>Mgr_ssn</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['DNO'] . "</td>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "<td>" . $row['NO_OF_EMP'] . "</td>";
  echo "<td>" . $row['MGR_SSN'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


?>

