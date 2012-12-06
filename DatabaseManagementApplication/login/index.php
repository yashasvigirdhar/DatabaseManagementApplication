<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
        require 'core.inc.php';
        require 'connect.inc.php';
       if(loggedin()){
           
           echo getuserfield('NAME');
           echo ' is logged in!<br><br>'.'<a href="logout.php">Logout</a>';
       } 
       else
       {
        include 'login.inc.php';
       }
    
        ?>
    </body>
</html>
