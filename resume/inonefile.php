<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="allcss/allinone.css">
    <link href="https://unpkg.com/remixicon/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
    <script src="alljs/login.js"></script>
    <title>Registration</title>
   
</head>
<body>
    <main>
        <div class="container">
            <header class="navbar">
                <div class="logo">
                    <img src="img/side9-removebg-preview.png" alt="Logo">
                </div>
                <nav class="nav-links">
                    <a href="#home" class="active">Home</a>
                    <a href="resume-page.php">Resume Maker</a>
                    <a href="yourResume.php">Your Resume</a>
                    <a href="loginform.php" id="show-login-form">Login</a>
                </nav>
                <div class="nave-icon"><i class="ri-menu-line"></i></div>
            </header>
            <div class="section">
                <div class="register-form" id="register-form-text">
                    <p> Resume Builder</p>
                    <h2>Build your resume <br><span class="way">the smart way</span></h2>
                    <h5>Easily create an out-of-this-world resume with expert content that can be customized just for you!.</h5>
                    <div class="button-box">
                        <div class="registernow">
                            <button class="registernow-button" id="show-register-form"> Registration</button>
                        </div>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="account-create-form" id="register-form">
                    <div class="form">
                        <i class="ri-close-line close-icon" id="close-register-form"></i>
                        <h2>Register Now</h2>
                        <form id="registrationForm" method="post" action="register.php">
                     

                            <label for="full-name">Enter your full name</label>
                            <input type="text" id="full-name" name="full-name">
                            <div class="error-register" id="fullNameError"></div>

                            <label for="phone">Enter your phone number</label>
                            <input type="number" id="phone" name="phone">
                            <div class="error-register" id="phoneError"></div>

                            <label for="gmail">Enter your Gmail</label>
                            <input type="email" id="gmail" name="gmail">
                            <div class="error-register" id="gmailError"></div>

                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                            <div class="error-register" id="passwordError"></div>

                            <div class="button-box">
                                <button class="registernow-button" type="submit">Register Now</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="img">
                    <img src="img/side5-removebg-preview.png" alt="img1">
                </div>
            </div>
        </div>
    </main>
</body>
</html>
