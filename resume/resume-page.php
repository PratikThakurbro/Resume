<?php 
   session_start();
   if (!isset($_SESSION['full-name'])) {
       header("Location: inonefile.php");
       exit();
   }
// Debug session variables

// session_start();

// echo "Full Name: " . (isset($_SESSION['full-name']) ? $_SESSION['full-name'] : 'Not Set') . "<br>";
// echo "Gmail: " . (isset($_SESSION['gmail']) ? $_SESSION['gmail'] : 'Not Set') . "<br>";
// echo "Phone: " . (isset($_SESSION['phone']) ? $_SESSION['phone'] : 'Not Set') . "<br>";

// if (!isset($_SESSION['full-name'])) {
//     echo "Session variable 'full-name' is not set.<br>";
// }

// if (!isset($_SESSION['gmail'])) {
//     echo "Session variable 'gmail' is not set.<br>";
// }

// if (!isset($_SESSION['phone'])) {
//     echo "Session variable 'phone' is not set.<br>";
// }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Resume</title>
    <link rel="stylesheet" href="allcss/resume.css">
    <link href="https://unpkg.com/remixicon/fonts/remixicon.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="alljs/login.js" ></script>
</head>
<body>
    <main>
        <header class="navbar">
            <div class="logo">
                <img src="img/side9-removebg-preview.png" alt="Logo">
            </div>
            <nav class="nav-links">
            <a href="inonefile.php" >Home</a>
            <a href="resume-page.php" class="active">Resume Maker</a>
            <a href="yourResume.php">Your Resume</a>
            <a href="logout.php" class="login">Logout</a>
            </nav>
            <div class="nave-icon"><i class="ri-menu-line"></i></div>

        </header>
        
        <div class="container"> 
            <header>
                <h1><?php echo htmlspecialchars($_SESSION['full-name']); ?></h1>
            </header>

            <form id="resumeForm" method="post" action="save_resume.php">
                <!-- Contact Information Section -->
                <section id="contact">
                    <h2>Contact Information</h2>
                    
                    <div class="form-row">
                        <label for="contact_email">Email:</label>
                        <input type="email" id="contact_email" name="contact_email" value="<?php echo htmlspecialchars($_SESSION['gmail']); ?>" required>
                    </div>
                    <div class="form-row">
                        <label for="contact_phone">Phone:</label>
                        <input type="text" id="contact_phone" name="contact_phone" value="<?php echo htmlspecialchars($_SESSION['phone']); ?>" required>
                    </div>
                    <div class="form-row">
                        <label for="present_address">Present Address:</label>
                        <input type="text" id="present_address" name="present_address" placeholder="Present Address" required>
                    </div>
                    <div class="form-row">
                        <label for="permanent_address">Permanent Address:</label>
                        <input type="text" id="permanent_address" name="permanent_address" placeholder="Permanent Address"  required>
                    </div>
                    <div class="form-row">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </section>

                <!-- Education Section -->
                <section id="education">
                    <h2>Higher Education</h2>
                    <div class="form-row">
                        <label for="degree">Degree Name:</label>
                        <input type="text" id="degree" name="degree">
                    </div>
                    <div class="form-row">
                        <label for="university">University/College Name:</label>
                        <input type="text" id="university" name="university">
                    </div>
                    <div class="form-row">
                        <label for="year">Year:</label>
                        <input type="text" id="year" name="year" min="1900" max="2025" step="4">
                    </div>
                </section>

                <!-- Experience Section -->
                <section id="experience">
                    <h2>Experience</h2>
                    <div class="form-row">
                        <label for="jobTitle">Job Title:</label>
                        <input type="text" id="jobTitle" name="jobTitle">
                    </div>
                    <div class="form-row">
                        <label for="companyName">Company Name:</label>
                        <input type="text" id="companyName" name="companyName">
                    </div>
                    <div class="form-row">
                        <label for="startDate">Start Date (Month/Year):</label>
                        <input type="text" id="startDate" name="startDate" placeholder="e.g., January 2020">
                    </div>
                    <div class="form-row">
                        <label for="endDate">End Date (Month/Year):</label>
                        <input type="text" id="endDate" name="endDate" placeholder="e.g., December 2022">
                    </div>
                    <div class="form-row">
                        <label for="responsibilities">Achievements:</label>
                        <textarea id="responsibilities" name="responsibilities" rows="4"></textarea>
                    </div>
                </section>

                <!-- Skills Section -->
                <section id="skills">
                    <h2>Skills</h2>
                    <div class="form-row">
                        <label for="skill">Add Skill:</label>
                        <input type="text" id="skill" name="skill">
                    </div>
                </section>

                <!-- Projects Section -->
                <section id="projects">
                    <h2>Projects</h2>
                    <div class="form-row">
                        <label for="projectTitle">Project Title:</label>
                        <input type="text" id="projectTitle" name="projectTitle">
                    </div>
                    <div class="form-row">
                        <label for="projectDescription">Short Description:</label>
                        <textarea id="projectDescription" name="projectDescription" rows="4"></textarea>
                    </div>
                    <div class="form-row">
                        <label for="projectResponsibilities">Responsibilities</label>
                        <textarea id="projectResponsibilities" name="projectResponsibilities" rows="4"></textarea>
                    </div>
                </section>

                <!-- Contact Me Section -->
                <section id="contact-form">
                    <h2>Contact Me</h2>
                    <div class="form-row">
                        <label for="contactName">Name:</label>
                        <input type="text" id="contactName" name="contactName" value="<?php echo htmlspecialchars($_SESSION['full-name']); ?>">
                    </div>
                    <div class="form-row">
                        <label for="contactEmail">Email:</label>
                        <input type="email" id="contactEmail" name="contactEmail" value="<?php echo htmlspecialchars($_SESSION['gmail']); ?>">
                    </div>
                    <div class="form-row">
                        <label for="contactMessage">Message:</label>
                        <textarea id="contactMessage" name="contactMessage"></textarea>
                    </div>
                </section>

                <button type="submit">Save Your Resume</button>
            </form>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            function validateForm() {
                let isValid = true;
                $('#resumeForm input, #resumeForm select, #resumeForm textarea').each(function() {
                    if ($(this).val().trim() === '') {
                        alert("Please fill out the " + $(this).prev('label').text() + " field.");
                        isValid = false;
                        return false; // Stop the loop on the first empty field
                    }
                });
                return isValid;
            }

            $('#resumeForm').on('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
