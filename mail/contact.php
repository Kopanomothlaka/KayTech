<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Prepare email
    $to = "kopanomothlaka@gmail.com"; // Replace with your email address
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Email body
    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<div class='alert alert-success'>Message sent successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to send message. Please try again later.</div>";
    }
} else {
    die("Invalid request method.");
}
?>