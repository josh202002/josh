<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Require necessary PHPMailer files
require '/assets/forms/PHPMailer/src/Exception.php';
require '/assets/forms/PHPMailer/src/PHPMailer.php';
require '/assets/forms/PHPMailer/src/SMTP.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $organization = $_POST['organization'];
    $subscription = $_POST['subscription'];
    $rooms = $_POST['rooms'];
    $country = $_POST['country'];

    // Compose email message
    $message = "
    <h2>New Registration Details</h2>
    <p><strong>Full Name:</strong> $name</p>
    <p><strong>Contact Email:</strong> $email</p>
    <p><strong>Contact Number:</strong> $contact</p>
    <p><strong>Organization Name:</strong> $organization</p>
    <p><strong>Subscription:</strong> $subscription</p>
    <p><strong>Number of Rooms:</strong> $rooms</p>
    <p><strong>Country:</strong> $country</p>
    ";

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // Set SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.elasticemail.com'; // Your SMTP server host
    $mail->Port = 2525; // Your SMTP server port
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'web@hotler.app'; // SMTP username
    $mail->Password = '09EE51D19A26E79B8D2092FE084CBD124729'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted

    // Set email headers
    $mail->setFrom('from@example.com', 'Sender Name'); // Sender's email address and name
    $mail->addAddress('info@hotler.app', 'Recipient Name'); // Recipient's email address and name
    $mail->Subject = 'New Registration Details'; // Subject of the email
    $mail->isHTML(true); // Set email format to HTML
    $mail->Body = $message; // Body of the email

    // Send email
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
        // Redirect to a thank you page or display a success message
    }
} else {
    // Redirect to an error page or display an error message
    echo 'Form submission method not allowed';
}
?>
