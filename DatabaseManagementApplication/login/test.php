<html>
<head>
<title>test mail</title>
</head>
<body>

<?php

       require_once "Mail.php";

        $from = "yash.girdhar@gmail.com";
        $to = "yashasvi.girdhar@students.iiit.ac.in";
        $subject = "Hi!";
        $body = "Hi,\n\nHow are you?";

        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "yash.girdhar@gmail.com";
        $password = " jeaymwnacaokxjrg ";

        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp = Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));

        $mail = $smtp->send($to, $headers, $body);

        if (PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
         } else {
          echo("<p>Message successfully sent!</p>");
         }

    ?>
    </body>
    </html>