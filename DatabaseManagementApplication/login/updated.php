

<?php
//require 'core.inc.php';
require 'connect.inc.php';
 if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']))
     { 
     $name=$_POST['name'];
     $price=$_POST['price'];
     $category=$_POST['category'];
     
     if(!empty($name) && !empty($price) && !empty($category))
         {
            
                $sql_query="update MENU set NAME='$name',PRICE='$price',CATEGORY='$category' where NAME='$name'";
						echo $sql_query.'<br>';                
                if($query_res=  mysql_query($sql_query)){
                if($query_res){
                       // echo "hello";
                        header('Location: chef.php?flag=3');
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
