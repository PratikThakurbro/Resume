<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Location: inonefile.php";
    exit();
}

// Assign user_id from the session to a variable
$user_id = $_SESSION['user_id'];

// Database connection
$conn = new mysqli("localhost", "root", "", "resume");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $email = filter_var($_POST['contact_email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['contact_phone'], FILTER_SANITIZE_STRING);
    $present_address = filter_var($_POST['present_address'], FILTER_SANITIZE_STRING);
    $permanent_address = filter_var($_POST['permanent_address'], FILTER_SANITIZE_STRING);
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
    $degree = filter_var($_POST['degree'], FILTER_SANITIZE_STRING);
    $university = filter_var($_POST['university'], FILTER_SANITIZE_STRING);
    $year = filter_var($_POST['year'], FILTER_SANITIZE_STRING);
    $job_title = filter_var($_POST['jobTitle'], FILTER_SANITIZE_STRING);
    $company_name = filter_var($_POST['companyName'], FILTER_SANITIZE_STRING);
    $start_date = filter_var($_POST['startDate'], FILTER_SANITIZE_STRING);
    $end_date = filter_var($_POST['endDate'], FILTER_SANITIZE_STRING);
    $responsibilities = filter_var($_POST['responsibilities'], FILTER_SANITIZE_STRING);
    $skill = filter_var($_POST['skill'], FILTER_SANITIZE_STRING);
    $project_title = filter_var($_POST['projectTitle'], FILTER_SANITIZE_STRING);
    $project_description = filter_var($_POST['projectDescription'], FILTER_SANITIZE_STRING);
    $project_responsibilities = filter_var($_POST['projectResponsibilities'], FILTER_SANITIZE_STRING);
    $contact_name = filter_var($_POST['contactName'], FILTER_SANITIZE_STRING);
    $contact_email = filter_var($_POST['contactEmail'], FILTER_SANITIZE_EMAIL);
    $contact_message = filter_var($_POST['contactMessage'], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Check if data already exists for this user
    $sql = "SELECT * FROM resume_details WHERE user_id = {$user_id}";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Data exists, perform an update
        $sql = "UPDATE resume_details SET
                    email = '{$email}', 
                    phone = '{$phone}', 
                    present_address = '{$present_address}', 
                    permanent_address = '{$permanent_address}', 
                    gender = '{$gender}', 
                    degree = '{$degree}', 
                    university = '{$university}', 
                    year = '{$year}', 
                    job_title = '{$job_title}', 
                    company_name = '{$company_name}', 
                    start_date = '{$start_date}', 
                    end_date = '{$end_date}', 
                    responsibilities = '{$responsibilities}', 
                    skill = '{$skill}', 
                    project_title = '{$project_title}', 
                    project_description = '{$project_description}', 
                    project_responsibilities = '{$project_responsibilities}', 
                    contact_name = '{$contact_name}', 
                    contact_email = '{$contact_email}', 
                    contact_message = '{$contact_message}' 
                WHERE user_id = {$user_id}";

        if (!$conn->query($sql)) {
            die("Error: " . $conn->error);
        }
    } else {
        // Data does not exist, perform an insert
        $sql = "INSERT INTO resume_details (
                    user_id, email, phone, present_address, permanent_address, gender, 
                    degree, university, year, job_title, company_name, start_date, end_date, 
                    responsibilities, skill, project_title, project_description, project_responsibilities, 
                    contact_name, contact_email, contact_message
                ) 
                VALUES (
                    {$user_id}, '{$email}', '{$phone}', '{$present_address}', '{$permanent_address}', '{$gender}', 
                    '{$degree}', '{$university}', '{$year}', '{$job_title}', '{$company_name}', '{$start_date}', '{$end_date}', 
                    '{$responsibilities}', '{$skill}', '{$project_title}', '{$project_description}', '{$project_responsibilities}', 
                    '{$contact_name}', '{$contact_email}', '{$contact_message}'
                )";

        if (!$conn->query($sql)) {
            die("Error: " . $conn->error);
        }
    }

    // Redirect after successful operation
    header("Location: yourResume.php");
    exit();
} else {
    die("Invalid request method.");
}
$conn->close();

?>
