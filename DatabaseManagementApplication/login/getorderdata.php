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

$sql="SELECT * FROM CUSTOMER_ORDER";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Order no</th>
<th>Amount</th>
<th>Status</th>
<th>Customer id</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['ORDER_NO'] . "</td>";
  echo "<td>" . $row['AMOUNT'] . "</td>";
  echo "<td>" . $row['STATUS'] . "</td>";
  echo "<td>" . $row['CUST_NO'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


?>
