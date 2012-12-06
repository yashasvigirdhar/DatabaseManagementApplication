<?php
//echo "hello";
 require 'connect.inc.php';
 $name=$_POST['updateraw'];
 $query="select * from RAW_MATERIAL1 where SHIPMENT_NO='$name'";
 $query_run=  mysql_query($query);
 if($query_run)
 {
   echo "<form action='updatedraw.php' method='POST'>"; 
while($row = mysql_fetch_array($query_run))
  {
   $a=$row['SHIPMENT_NO'];
   $b=$row['PRICE'];
   $c=$row['QUANTITY'];
   echo "Name : <input type='text' readonly='readonly' name='name' value='$a'><br><br>";
   echo "Price : <input type='text' name='price' value='$b'><br><br>";
   echo "Price : <input type='text' name='quantity' value='$c'><br><br>";

  }
  echo "<br><input type='submit' value='Update'>";
  echo "</form>";
  
 }
 
