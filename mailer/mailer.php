<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/partials/functions.php';

    define("CONTACT_EMAIL_ADDRESS", "contact@fadgiras.com");
    define("EMAIL_OBJECT", "Contact from ");

    function sendContactMail($firstName, $lastName, $contactorEmail, $messageFromForm)
    {
        $to = CONTACT_EMAIL_ADDRESS;
        $subject = EMAIL_OBJECT . $firstName . $lastName;
        $message = "From: $firstName $lastName <$contactorEmail>\n\n$messageFromForm";
        $headers = "From: $contactorEmail";

        if (mail($to, $subject, $message, $headers)) {
            echo constructErrorMessage("Message sent!");
        } else {
            echo constructErrorMessage("Email failed to send.");
        }
    }
?>