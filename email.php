                      <?php
                      if($_POST){
    $to_email = "manuselapak@gmail.com"; //Recipient email, Replace with own email here
    $subject="***Enquiry from MANUSELAPAK.COM***";
    

    
    //Sanitize input data using PHP filter_var().
    $name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message        = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    
    //additional php validation
    if(strlen($name)<2){ // If length is less than 4 it will output JSON error.
        $output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty'));
        die($output);
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email'));
        die($output);
    }
    // if(!filter_var($phone_number, FILTER_SANITIZE_NUMBER_FLOAT)){ //check for valid numbers in phone number field
    //     $output = json_encode(array('type'=>'error', 'text' => 'Enter only digits in phone number'));
    //     die($output);
}
    if(strlen($message)<3){ //check emtpy message
        $output = json_encode(array('type'=>'error', 'text' => 'You forgot the most important part..'));
        die($output);
    }
    
    //email body
    $message_body = $message."\r\n\r\n-".$name."\r\nEmail : ".$email;
    
    //proceed with PHP email.
    $headers = 'From: '.$name.'' . "\r\n" .
    'Reply-To: '.$email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $send_mail = mail($to_email, $subject, $message_body, $headers);
    echo "<h1 style='text-align:center;'>Thank you for contacting us.<br>We will answer you as soon as possible.</h1>";
    echo "<div style='text-align:center';><a href='index.html'>GO BACK</a></div>";
    ?>
    