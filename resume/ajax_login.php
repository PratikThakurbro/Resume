<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    // Your database connection and password checking logic here
    // Assuming $isPasswordCorrect is the result of the password check

    if (!$isPasswordCorrect) {
        // Return a JSON response with an error message
        echo json_encode(['success' => false, 'message' => 'Incorrect password. Please try again.']);
    } else {
        // Return a JSON response indicating success
        echo json_encode(['success' => true, 'message' => 'Login successful!']);
    }
    exit();
}
?>
