<?php
$receiving_email_address = 'rituraj01204@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// ✅ Use SMTP (with Gmail)
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'yourgmail@gmail.com',         // Replace with your Gmail
  'password' => 'your_app_password_here',      // Replace with Gmail App Password
  'port' => '587',
  'encryption' => 'tls'                        // Optional, if supported by the library
);

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
