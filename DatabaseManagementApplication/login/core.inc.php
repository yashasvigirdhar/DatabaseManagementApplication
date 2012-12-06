<?php   

ob_start();
session_start();
$_SESSION['loggedin'] = false;
$current_file = $_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
$http_referer=$_SERVER['HTTP_REFERER'];
}
if(!isset($_SESSION['secure'])){  
    $_SESSION['secure']=  rand(1000, 9999);
}
function loggedin(){
    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        return true;
    }
    else{
        return false;
    }
}

function getuserfield($field){
    $uid=(int)$_SESSION['user_id'];
    $query="select $field from WORKING_STAFF1 where SSN=$uid";
    if($query_run=mysql_query($query)){
        if($query_result = mysql_result($query_run,0,$field)){
            return $query_result;
        }
    }

}
?>
