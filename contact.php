<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "you@example.com"; // Replace with your email
    $subject = "New Contact Form Submission";

    // Sanitize input
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Create HTML email body
    $body = "
    <html>
    <head>
      <title>New Contact Submission</title>
    </head>
    <body>
      <h2>Contact Details</h2>
      <p><strong>Name:</strong> {$name}</p>
      <p><strong>Email:</strong> {$email}</p>
      <p><strong>Phone:</strong> {$phone}</p>
      <p><strong>Message:</strong><br />" . nl2br($message) . "</p>
    </body>
    </html>
    ";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: {$email}" . "\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent!";
    } else {
        echo "Failed to send.";
    }
}
?>
