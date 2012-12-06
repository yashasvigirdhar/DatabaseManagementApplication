<?php
require 'connect.inc.php';

$sql="SELECT * FROM RAW_MATERIAL1";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Shipment no</th>
<th>Price</th>
<th>Quantity</th>
<th>Supplier</th>
<th>Type</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
    $a=$row['E_ID'];
    $q="SELECT * FROM SUPPLIER where ID='$a'";
    $res = mysql_query($q);
    $r = mysql_fetch_array($res);
    $b=$row['SHIPMENT_NO'];
    $q1="SELECT * FROM RAW_MATERIAL2 where SHIPMENT_NO='$b'";
    $res1 = mysql_query($q1);
    $r1 = mysql_fetch_array($res1);
  echo "<tr>";
  echo "<td>" . $row['SHIPMENT_NO'] . "</td>";
  echo "<td>" . $row['PRICE'] . "</td>";
  echo "<td>" . $row['QUANTITY'] . "</td>";
  echo "<td>" . $r['Name'] . "</td>";
  echo "<td>" . $r1['TYPE'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


?>
