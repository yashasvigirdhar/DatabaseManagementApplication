
<?php
//session_start();
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phn']))
     { 
     $name=$_POST['name'];
     $address=$_POST['address'];
     $phn=$_POST['phn'];
     
     if(!empty($name) && !empty($address) && !empty($phn))
         {
            
                $query="select NAME from CUSTOMER where NAME='$name'";
                //echo $query;
                $query_run=  mysql_query($query);
                if(mysql_num_rows($query_run)>0){
                    echo 'Name'.$name.'already exists'.'<br>';
                    $name="";
                }
                else{
  
                     $customer_id=rand(1,10)+rand(1,10)+rand(1,10);
                    $query="insert into CUSTOMER values('$customer_id','$address','$phn','$name')";
                    $query_run=  mysql_query($query);
                   if($query_run){
                       header('Location: employee.php');
                       echo $item_no;
                      mysql_close(mysql_connect("localhost","root", ""));        
                   }
                   else{
                       echo 'error'.'<br>'.$item_no;
                   }
                    
            
         }
         }
     else {
         echo 'all fields are required';   
          }  
     }
    
    ?>
<form action="insert_customer.php" method="POST">
    Name:<br><input type="text" name="name" maxlength="15" ><br><br>
    Address:<br><input type="text" name="address"><br><br>
    Phone number:<br><input type="text" name="phn"><br><br>
    <input type="submit" value="Add customer">
</form>
