<?php
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['name']) && isset($_POST['no']) && isset($_POST['emp']) && isset($_POST['ssn']))
     { 
     $name=$_POST['name'];
     $no=$_POST['no'];
     $emp=$_POST['emp'];
     $ssn=$_POST['ssn'];
     if(!empty($name) && !empty($no) && !empty($emp))
         {
            
                $query="select DNO from DEPARTMENT1 where DNO='$no'";
                //echo $query;
                $query_run=  mysql_query($query);
                if(mysql_num_rows($query_run)>0){
                    echo 'Department no'.$no.'already exists'.'<br>';
                    $no="";
                }
                else{
                     $query="insert into DEPARTMENT1 values('$no','$name')";
                    $query1="insert into DEPARTMENT2 values('$name','$emp','$ssn')";
                    $query_run=  mysql_query($query);
                    $query_run1= mysql_query($query1);
                   if($query_run && $query_run1){
                       header('Location: department.php');
                       //echo $item_no;
                      mysql_close(mysql_connect("localhost","root", ""));        
                   }
                   else{
                       echo 'error'.'<br>'.$no;
                   }
                    
            
         }
         }
     else {
         echo 'all fields are required';   
          }  
     }
    
    ?>
<form action="insert_department.php" method="POST">
    Dno:<br><input type="text" name="no" maxlength="15" ><br><br>
    Name:<br><input type="text" name="name"><br><br>
    No of Employee:<input type="text" name="emp"><br><br>
    Manager's ssn:
    <?php require 'connect.inc.php';
	$sql1="SELECT * FROM WORKING_STAFF1";
	$result1 = mysql_query($sql1);
	echo "<select name='ssn'>";

	while($row = mysql_fetch_array($result1))
	  {
	    $x=$row['SSN'];
	  echo "<option value='$x'>" . $row['SSN'] ."</option>";
	  }
  	echo "</select><br><br>"
	?>
    <input type="submit" value="create department">
</form>
