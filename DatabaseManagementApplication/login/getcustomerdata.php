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

$sql="SELECT * FROM CUSTOMER";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Customer ID</th>
<th>Address</th>
<th>Phn No</th>
<th>Name</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['CUSTOMER_ID'] . "</td>";
  echo "<td>" . $row['ADDRESS'] . "</td>";
  echo "<td>" . $row['PHN_NO'] . "</td>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


?>
