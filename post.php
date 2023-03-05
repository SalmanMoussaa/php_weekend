<?php

header("Content-Type: application/json");

// Retrieve the email and password from the POST request
$email = $_POST["email"];
$password = $_POST["password"];

// Define regular expression patterns for email and password validation
$email_pattern = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
$password_pattern = "/^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*()])(?=.*[a-z]).{8,}$/";

// Validate email and password inputs
if (!preg_match($email_pattern, $email)) {
    echo json_encode(array("success" => false, "message" => "Invalid email format"));
} elseif (!preg_match($password_pattern, $password)) {
    echo json_encode(array("success" => false, "message" => "Password should contain at least 8 characters, one uppercase letter, one digit, and one special character"));
} else {
    echo json_encode(array("success" => true));
}
?>