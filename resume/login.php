
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_gmail = $_POST["gmail"] ?? '';
    $login_password = $_POST["password"] ?? '';

    // Validate inputs
    if (empty($login_gmail) || empty($login_password)) {
        header("Location: loginform.php?error=Email and password are required.");
        exit();
    }

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "resume");

    if (!$conn) {
        header("Location: loginform.php?error=Connection failed: " . mysqli_connect_error());
        exit();
    }

    // Prepare and execute query
    $query = "SELECT * FROM resume_user WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        header("Location: loginform.php?error=Prepare failed: " . $conn->error);
        exit();
    }
    $stmt->bind_param("ss", $login_gmail, $login_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['full-name'] = $user['name'];
        $_SESSION['gmail'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        header("Location: upadatenow.php");
        exit();
    } else {
        header("Location: loginform.php?error=Invalid email or password.");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
