<?php
// Start the session
session_start();

// Capture form data
$email = $_POST['gmail'];
$new_password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

// Validate form data
if (empty($email) || empty($new_password) || empty($confirm_password)) {
    die("All fields are required.");
}

// Check if new password and confirm password match
if ($new_password !== $confirm_password) {
    die("Passwords do not match.");
}

// Connect to the database
$myconn = mysqli_connect("localhost", "root", "", "resume");

// Check connection
if (!$myconn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL statement to prevent SQL injection
$stmt = $myconn->prepare("SELECT * FROM resume_user WHERE email = ?");
if (!$stmt) {
    die("Prepare failed: " . $myconn->error);
}

// Bind parameters
$stmt->bind_param("s", $email);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if the email exists
if ($result->num_rows === 0) {
    die("Email address not found.");
}

// Hash the new password before saving
// $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

// Prepare the SQL statement to update the password
$stmt = $myconn->prepare("UPDATE resume_user SET password = ? WHERE email = ?");
if (!$stmt) {
    die("Prepare failed: " . $myconn->error);
}

// Bind parameters
$stmt->bind_param("ss", $new_password, $email);

// Execute the query
if ($stmt->execute()) {
    // Redirect to login page or another success page
    header("Location: inonefile.php");
    exit(); // Ensure no further code is executed
} else {
    // Display an error message on failure
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
mysqli_close($myconn);
?>
