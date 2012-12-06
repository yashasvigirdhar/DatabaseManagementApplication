<?php
// URL of script: http://www.blazonry.com/scripting/phpmail.php

  // if submitted form process and send mail
  if ($_SERVER['REQUEST_METHOD'] == "POST") {

	// just to be safe I strip out HTML tags
	$realname = strip_tags($realname);
	$email = strip_tags($email);
	$feedback = strip_tags($feedback);

	// set the variables
	// replace $me@mysite.com with your email address
	$sendto = "yash.girdhar@gmail.com";
	$subject = "Send Mail Feedback Using PHP";
	$message = "$realname, $email\n\n$feedback";

	// send the email
	mail($sendto, $subject, $message);

  }

?>

<html>
<head>
  <title>Collect Feedback And Email It To Yourself</title>
</head>
<body bgcolor="#FFFFFF">

<h2>Collect Feedback And Email It To Yourself</h2>

This coding example shows how to collect feedback from 
your site using a form and email the response to yourself.

The first thing we need is our HTML form. Keeping it simple
for this example, I ask for only name, email and feedback.


<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$realname = $_POST['realname']; 
	$email = $_POST['email']; 
	$feedback = $_POST['feedback']; 
	
	echo("<p><b>Thank you for your feedback. The following message was sent to $email from $realname:</b> (not really)</p>\n");
	echo("<blockquote><pre>\n");
	echo("$feedback");
	echo("</pre></blockquote>");
	}
	else {
?>

<!-- ***  START HTML FORM -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="POST">
  <table cellpadding="4" cellspacing="0" border="0">
	<tr><td><b>Name: </b></td><td><input type="text" name="realname" size="25"></td></tr>
	<tr><td><b>Email:</b></td><td><input type="text" name="email" size="25"></td></tr>
	<tr><td colspan=2><b>Feedback:</b><br />
		<textarea name="feedback" rows="4" cols="40" wrap="physical"></textarea>
	</td></tr>
	<tr><td colspan="2" align="right"><input type="submit" value="Send Feedback"></td></tr>
  </table>
  </form>
<!-- *** END HTML FORM -->

<?php } ?>

</body>
</html>