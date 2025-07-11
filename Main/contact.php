<?php

// Set the email address you want to receive messages on
$receiving_email_address = 'rituraj01204@gmail.com';

// Check if the PHP Email Form library exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

// Create a new contact form object
$contact = new PHP_Email_Form;
$contact->ajax = true; // Enable AJAX if frontend supports it

// Set email receiver and sender information
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'New Contact Form Submission';

// SMTP settings (uncomment and configure if using SMTP instead of PHP's mail function)
/*
$contact->smtp = array(
  'host' => 'smtp.yourserver.com',
  'username' => 'your_email@yourserver.com',
  'password' => 'your_email_password',
  'port' => '587'
);
*/

// Add form messages
$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(isset($_POST['message']) ? $_POST['message'] : '', 'Message', 10);

// Send the message and echo the result
echo $contact->send();

?>
