<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = 'pt1234';

$mysql_db = 'LE Punjabi Chef';

if(mysql_connect($mysql_host,$mysql_user,$mysql_pass) && mysql_select_db($mysql_db)){
    
}
else{
    die(mysql_error());
}
        
?>
