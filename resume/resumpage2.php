<?php
session_start();

// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: inonefile.php");
    exit();
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "resume");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data for the logged-in user
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM resume_details WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    $data = []; // Default to empty array if no data is found
}

// Close the statement and connection
$stmt->close();
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Resume</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="allcss/resume2.css">
    <link href="https://unpkg.com/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="alljs/login.js"></script>

    
    <!-- CSS classes for different styles  -->
    <style>
        .button1:hover {
            background-color: dodgerblue;
        }
        .style1 h1 {
            color: dodgerblue;
            font-family: 'Times New Roman', Times, serif;
        }
        .style1 section h2 {
            border-bottom: 2px solid dodgerblue;
            font-family: 'Times New Roman', Times, serif;
        }
        .style1 strong {
            font-family: 'Times New Roman', Times, serif;
        }

        
        
        .style2 h1 {
            color: lightseagreen;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .style2 section h2 {  
            border-bottom: 2px solid lightseagreen;
            font-family: Verdana, Geneva, Tahoma, sans-serif;   
        }
        .style2 strong {
            font-family: Verdana, Geneva, Tahoma, sans-serif;   
        }

        
       
        .style3 h1 {
            color: lightsalmon;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            
        }
        .style3 section h2 {
            border-bottom: 2px solid lightsalmon;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .style3 strong {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        
       

      

        @media print {
            /* Hide everything except the main content */
            body * {
                visibility: hidden;
            }
            main, main * {
                visibility: visible;
            }
            main {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    
    </style>
    
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <img src="img/side9-removebg-preview.png" alt="Logo">
        </div>
        <nav class="nav-links">
            <a href="inonefile.php" >Home</a>
            <a href="upadatenow.php">Update Now</a>
            <a href="yourResume.php"  class="active">Your Resume</a>
            <a href="loginform.php"  class="login" id="show-login-form">Logout</a>
            </nav>
            <div class="nave-icon"><i class="ri-menu-line"></i></div>

    </header>
    <div class="more-page"><a href="yourResume.php"><i class="ri-arrow-left-line"></i></a> <br> <br>
    <section id="style-buttons">
        <button class="style-button button1" data-style="style1">Style 1</button>
        <button class="style-button button2" data-style="style2">Style 2</button>
        <button class="style-button button3" data-style="style3">Style 3</button>
        
    </section>
  
    </div>

    <div class="container">
        <main>
            <header>
                <h1><?php echo htmlspecialchars($_SESSION['full-name']); ?></h1>
            </header>

            <section id="contact">
                <h2>Contact Information</h2>
                <ul>
                    <li><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['gmail']); ?></li>
                    <li><strong>Phone:</strong> <?php echo htmlspecialchars($data['phone'] ?? ''); ?></li>
                    <li><strong>Present Address:</strong> <?php echo htmlspecialchars($data['present_address'] ?? ''); ?></li>
                    <li><strong>Permanent Address:</strong> <?php echo htmlspecialchars($data['permanent_address'] ?? ''); ?></li>
                    <li><strong>Gender:</strong> <?php echo htmlspecialchars($data['gender'] ?? ''); ?></li>
                </ul>
            </section>

            <section id="education">
                <h2>Higher Education</h2>
                <p><strong>Degree Name:</strong> <?php echo htmlspecialchars($data['degree'] ?? ''); ?></p>
                <p><strong>University/College Name:</strong> <?php echo htmlspecialchars($data['university'] ?? ''); ?></p>
                <p><strong>Year:</strong> <?php echo htmlspecialchars($data['year'] ?? ''); ?></p>
            </section>

            <section id="experience">
                <h2>Experience</h2>
                <p><strong>Job Title:</strong> <?php echo htmlspecialchars($data['job_title'] ?? ''); ?></p>
                <p><strong>Company Name:</strong> <?php echo htmlspecialchars($data['company_name'] ?? ''); ?></p>
                <p><strong>Start Date:</strong> <?php echo htmlspecialchars($data['start_date'] ?? ''); ?></p>
                <p><strong>End Date:</strong> <?php echo htmlspecialchars($data['end_date'] ?? ''); ?></p>
                <p><strong>Achievements:</strong> <?php echo nl2br(htmlspecialchars($data['responsibilities'] ?? '')); ?></p>
                
            </section>

            <section id="skills">
                <h2>Skills</h2>
                <p><?php echo htmlspecialchars($data['skill'] ?? ''); ?></p>
            </section>

            <section id="projects">
                <h2>Projects</h2>
                <p><strong>Project Title:</strong> <?php echo htmlspecialchars($data['project_title'] ?? ''); ?></p>
                <p><strong>Short Description:</strong> <?php echo nl2br(htmlspecialchars($data['project_description'] ?? '')); ?></p>
                <p><?php echo nl2br(htmlspecialchars($data['project_description'] ?? '')); ?></p>
                <p><strong>Responsibilities: </strong><?php echo nl2br(htmlspecialchars($data['project_responsibilities'] ?? '')); ?></p>
                
            </section>

            <section id="contact-form">
                <h2>Contact Me</h2>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['full-name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($data['contact_email'] ?? ''); ?></p>
                <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($data['contact_message'] ?? '')); ?></p>
                
            </section>
        </main>
        <section id="download-print">
            <button id="printButton">Print Resume</button>
            <button id="downloadButton">Download as PDF</button>
        </section>
       
    </div>

    <script>
    $(document).ready(function() {
        $('.style-button').on('click', function() {
            var style = $(this).data('style');
            $('body').removeClass('style1 style2 style3').addClass(style);
        });

        $('#printButton').on('click', function() {
            window.print();
        });

        $('#downloadButton').on('click', function() {
            var element = document.querySelector('main'); 
            var opt = {
                margin: 0.5,
                filename: 'resume.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 1 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(element).set(opt).save();
        });
    });
    </script>
    <script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });

    document.getElementById('downloadButton').addEventListener('click', function() {
        var element = document.querySelector('main'); 
        var opt = {
            margin: 0.5,
            filename: 'resume.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 1 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(element).set(opt).save();
    });
    </script>
</body>
</html>

