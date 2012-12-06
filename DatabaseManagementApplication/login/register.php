<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()){
 if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['sex']) && isset($_POST['department']) && isset($_POST['staff']) && isset($_POST['secure']))
     { 
     $name=$_POST['name'];
     $password=$_POST['password'];
     $password_again=$_POST['password_again'];
     $sex=$_POST['sex'];
     $departmentname=$_POST['department'];
     $staff=$_POST['staff'];
     $secure=$_POST['secure'];
     
     if(!empty($name) && !empty($password) && !empty($password_again) && !empty($sex) && !empty($departmentname) && !empty($staff) && !empty($secure))
         {
            if($password!=$password_again){
               echo 'passwords do not match';
            }
            else{
                $query="select NAME from WORKING_STAFF1 where NAME='$name'";
                //echo $query;
                $query_run=  mysql_query($query);
                if(mysql_num_rows($query_run)>0){
                    echo 'Name'.$name.'already exists'.'<br>';
                    $username="";
                }
    		else
                {
                    if($_SESSION['secure']!=$secure){
                        echo $secure+'<br>'+$_SESSION['secure']+'<br>';
                        echo 'the text you entered doesn\'t match the given text';
                    }
                    else
                    {
                    $password=  md5($password);
                    echo $password;
                   
                    $ssn=  rand(1000, 2000)+rand(1000,2000);
                    
                    $salary=rand(1000,2000);
                    $query_for_department="select DNO from DEPARTMENT1 where NAME='$departmentname'"; 
                    $res=mysql_query($query_for_department);
                    $dno = mysql_result($res,0,"DNO");
                    $query="insert into WORKING_STAFF1 values('$ssn','$name','$salary','$sex','$dno','$password')";
                    $query1="insert into WORKING_STAFF2 values('$ssn','$staff')";
                   
           
                    $user_name=$name;
                    $user_ssn=$ssn;
                    $query_run=  mysql_query($query);
                    $query_run1= mysql_query($query1);
                    $_SESSION['uname']=$name;
                    $_SESSION['ussn']=$ssn;
                   if($query_run && $query_run1){
			$_SESSION['loggedin']=true;
                       header('Location: '.$staff.'.php?name='.$user_name.'&ssn='.$user_ssn.'&flag=1');
                   }
                   else{
                       echo 'fuck off';
                   }
                    
            }
         }
        }
}
     else {
         echo 'all fields are required';   
          }  
     }
    
    ?>
<link href="./../style.css" rel="stylesheet" type="text/css" media="screen" />
<h2>Registration Form</h2>
<form action="register.php" method="POST">
    Name:<br><input type="text" name="name" maxlength="15" value="<?php if(isset($username)){ echo $username;} ?>"><br><br>
    Password:<br><input type="password" name="password"><br><br>
    Retype Password:<br><input type="password" name="password_again"><br><br>
    Sex:
        <select name ="sex">
  <option value="M">Male</option>
  <option value="F">Female</option>
    </select> <br><br>
    Department name:
    <select name ="department">
  <option value="Indian">Indian</option>
  <option value="Continental">Continental</option>
  <option value="Chinese">Chinese</option>
  <option value="Tech">Technical department</option>
    </select> <br><br>
    Category:<select name ="staff">
  <option value="chef">Chef</option>
  <option value="waiter">Waiter</option>
  <option value="employee">Employee</option>
    </select><br><br>
    Enter the numbers shown below:<br><img src="generateimage.php">
    <input type="textarea" name="secure"><br><br>
    <input type="submit" value="Register">
</form><br>
<a href="logout.php"><h3>HOME<h3></a>
<?php
}
else{
  echo 'you are already logged in';
}
?>
