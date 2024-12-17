<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email field
    $email = trim($_POST['email']);

    // Validate email
    if (empty($email)) {
        echo "Please enter an email address.";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Destination email
    $to = "leninmariyajoseph@gmail.com";
    $subject = "New Inquiry from Let's Talk";

    // Email body
    $body = "A new user wants to get in touch.\n\n";
    $body .= "Email: $email";

    // Email headers
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! We’ll be in touch soon.";
    } else {
        echo "Sorry, there was an error. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
