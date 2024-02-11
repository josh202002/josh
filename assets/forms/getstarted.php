<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $organization = $_POST["organization"];
    $subscription = $_POST["subscription"];
    $rooms = $_POST["rooms"];
    $country = $_POST["country"];
    
    // Compose email message
    $to = "info@hotler.app"; // Change this to your email address
    $subject = "New form submission";
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Contact Number: $contact\n";
    $message .= "Organization: $organization\n";
    $message .= "Subscription: $subscription\n";
    $message .= "Number of Rooms: $rooms\n";
    $message .= "Country: $country\n";
    
    // Send email
    if (mail($to, $subject, $message)) {
        echo "Thank you! Your form has been submitted.";
    } else {
        echo "Oops! Something went wrong.";
    }
} else {
    echo "Error: Method not allowed";
}
?>
