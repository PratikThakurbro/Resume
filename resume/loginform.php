<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="allcss/allinone.css">
        <link href="https://unpkg.com/remixicon/fonts/remixicon.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="alljs/login.js"></script>

        
        <title>Login</title>
        <script>
            $(document).ready(function() {
                const urlParams = new URLSearchParams(window.location.search);
                const error = urlParams.get('error');
                const success = urlParams.get('success');
                
                if (error) {
                    alert(error);
                }
                
                if (success) {
                    alert(success);
                }
            });
        </script>
    </head>
    <body>
        <main>
            <div class="container">
                <header class="navbar">
                    <div class="logo">
                        <img src="img/side9-removebg-preview.png" alt="Logo">
                    </div>
                    <nav class="nav-links">
                    <a href="inonefile.php" >Home</a>
                    <a href="resume-page.php">Resume Maker</a>
                    <a href="yourResume.php">Your Resume</a>
                    <a href="loginform.php" id="show-login-form" class="active login" >Login</a>
                    </nav>
            <div class="nave-icon"><i class="ri-menu-line"></i></div>

                </header>
                <div class="section">
                    <!-- Login Form -->
                    <div class="account-create-form" id="login-form">
                        <div class="form">
                            <h2>Login</h2>
                            <form id="loginForm" method="POST" action="login.php">
                                <label for="login-gmail">Enter your Gmail</label>
                                <input type="email" id="login-gmail" name="gmail" >
                                <div id="loginGmailError" class="error-login"></div>

                                <label for="login-password">Password</label>
                                <input type="password" id="login-password" name="password" >
                                <div id="loginPasswordError" class="error-login"></div>

                                <a href="#" id="forgot-password-link">Forgot password</a> <br><br>

                                <div class="button-box">
                                    <button class="login-button" type="submit" name="login">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Forgot Password Form -->
                    <div class="forget-box" id="forgot-password-form">
                        <i class="ri-close-line close-icon " id="close-forgot-password"></i>
                        <h2>Forgot Password</h2>
                        <form id="forgotPasswordForm" method="POST" action="forgot_password.php">
                            <label for="f-gmail">Enter your Gmail</label>
                            <input type="email" id="f-gmail" name="gmail">
                            <div id="forgotGmailError" class="error-forgot-pass"></div>

                            <label for="f-password">Password</label>
                            <input type="password" id="f-password" name="password">
                            <div id="forgotPasswordError" class="error-forgot-pass"></div>

                            <label for="f-conform-password">Confirm Password</label>
                            <input type="password" id="f-conform-password" name="confirm-password">
                            <div id="forgotConfirmPasswordError" class="error-forgot-pass"></div>

                            <div class="button-box">
                                <button class="login-button" type="submit" name="forgot">Reset Password</button>
                            </div>
                        </form>
                    </div>

                    <div class="img">
                        <img src="img/side5-removebg-preview.png" alt="img1">
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
