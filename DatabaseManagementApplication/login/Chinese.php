<html>
<head>

<link href="./../style.css" rel="stylesheet" type="text/css" media="screen" />
<title>Chinese food menu</title>
</head>
<body>
<h2>Chinese Food Menu</h2>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<?php 
require 'connect.inc.php';
$query="SELECT * from MENU where CATEGORY= 'Chinese' ";
$query_res=mysql_query($query); 
$num_rows=mysql_num_rows($query_res);
echo "<table border='1'>
<tr>
<th>Item No</th>
<th>Price</th>
<th>Category</th>
<th>Name</th>
</tr>";

while($row = mysql_fetch_array($query_res))
  {
  echo "<tr>";
  echo "<td>" . $row['ITEM_NO'] . "</td>";
  echo "<td>" . $row['PRICE'] . "</td>";
  echo "<td>" . $row['CATEGORY'] . "</td>";
  echo "<td>" . $row['NAME'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
?>
</body>
</html>
