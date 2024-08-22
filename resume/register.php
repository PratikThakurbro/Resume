<!-- 
<?php
// Retrieve form data
$full_name = $_POST["full-name"] ?? '';
$phone = $_POST["phone"] ?? '';
$gmail = $_POST["gmail"] ?? '';
$password = $_POST["password"] ?? '';

// Database connection
$conn = mysqli_connect("localhost", "root", "", "resume");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check for duplicate phone number or email
$check_query = "SELECT * FROM resume_user WHERE phone = ? OR email = ?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("ss", $phone, $gmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Prepare error message
    $message = '';
    if ($row = $result->fetch_assoc()) {
        if ($row['phone'] === $phone) {
            $message .= "Phone number '$phone' already exists. ";
        }
        if ($row['email'] === $gmail) {
            $message .= "Email '$gmail' already exists.";
        }
    }
    $stmt->close();
    mysqli_close($conn);
    echo $message;
    exit();
}

// Insert query
$query = "INSERT INTO resume_user (name, phone, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $full_name, $phone, $gmail, $password);

if ($stmt->execute()) {
    header("Location: resume-page.php");

} else {
    header("Location: inonefile.php");

    echo "Error: " . mysqli_error($conn);
}

// Close statement and connection
$stmt->close();
mysqli_close($conn);
?> -->
