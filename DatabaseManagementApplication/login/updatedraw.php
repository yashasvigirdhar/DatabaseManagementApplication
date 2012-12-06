

<?php
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']))
     { 
     $name=$_POST['name'];
     $price=$_POST['price'];
     $category=$_POST['quantity'];
     
     if(!empty($name) && !empty($price) && !empty($category))
         {
            
                $sql_query="update RAW_MATERIAL1 set SHIPMENT_NO='$name',PRICE='$price',QUANTITY='$category' where SHIPMENT_NO='$name'";
						echo $sql_query.'<br>';                
                if($query_res=  mysql_query($sql_query)){
                if($query_res){
                       // echo "hello";
                        header('Location: raw.php?flag=3');
                        echo 'done';
                       
                }
                }
                else
                       echo 'not done';
         }
     else
         echo 'all fields are required';   
         
     }
    
    ?>
