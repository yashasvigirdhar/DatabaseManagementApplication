<!--<html>
<body>

  <form method='post' action="contact-us-send.php">
  Email: <input name='email' type='text' /><br />
  Subject: <input name='subject' type='text' /><br />
  Message:<br />
  <textarea name='message' rows='15' cols='40'>
  </textarea><br />
  <input type='submit' value="submit"/>
  </form>
  
  
</body>
</html> -->

<?php
$email = $_REQUEST['email'] ;
  $message = $_REQUEST['message'] ;

  
if(mail("yash.girdhar@gmail.com", "Feedback Form Results",
    $message, "From: $email")){
	echo "sent"	;
}

else {
	echo 'not sent';
	}
 
?>