<?php
   $name= $_POST['name'];
   $visitor_email = $_POST['email'];
   $message = $_POST['mwssage'];
  
   $email_from = 'osawant714@gmail.com';
   $email_subject ="queries";
   $email_body = "User Name: $name.\n".
                  "User Email: $visitor_email.\n".
                    "User Message: $message.\n";
                    

    $to = "";

    $headers = "From: $email_from \r\n";

    $headers .="Reply-To: $visitor_email \r\n";

    mail($to,$email_subject,$email_body,$headers);

    header("Location:contact.html");
?>                